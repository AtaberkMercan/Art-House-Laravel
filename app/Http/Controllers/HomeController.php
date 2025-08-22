<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Art;
use App\Models\Image;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;
class HomeController extends Controller
{
    public function index()
    {
        $page = 'home';
    
        // En yüksek rate alan üç sanat eserini bul
        $highestRatedArtIds = Comment::select('art_id')
            ->groupBy('art_id')
            ->orderByRaw('AVG(rate) DESC')
            ->take(3)
            ->get();
    
        // Eğer en yüksek rate alan sanat eserleri bulunduysa
        if ($highestRatedArtIds->isNotEmpty()) {
            $sliderdata = Art::whereIn('id', $highestRatedArtIds)->get();
        } else {
            // Eğer hiç yorum yapılmamışsa veya hiç sanat eseri yoksa
            $sliderdata = collect(); // Boş bir koleksiyon oluştur
        }
    
        // Diğer verileri hazırla
        $artlist1 = Art::get();
        $artlist2 = Art::latest()->take(3)->get();
        $artlist3 = Art::inRandomOrder()->limit(9)->get();
        $setting = Setting::first();
        
        // View'e verileri geçir ve görünümü döndür
        return view('home.index', [
            'page' => $page,
            'setting' => $setting,
            'sliderdata' => $sliderdata,
            'artlist1' => $artlist1,
            'artlist2' => $artlist2,
            'artlist3' => $artlist3
        ]);
    }
    public function contact(){
        $setting=Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }
    public function storemessage(Request $request){
        $data=new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip=request()->ip();
        $data->save();
        return redirect()->route('contact',[])->with('info','Your Message Has Been Sent,Thanks.');
    }
    public function storecomment(Request $request){
        $data=New Comment();
        $data->user_id=Auth::id();
        $data->art_id=$request->input('art_id');
        $data->subject=$request->input('subject');
        $data->review=$request->input('review');
        $data->rate=$request->input('rate');
        $data->ip=request()->ip();
        if($data->rate == NULL)
        return redirect()->route('art',['id'=>$request->input('art_id')])->with('error','Please Select A Rating To Proceed...');
        $data->save();
        return redirect()->route('art',['id'=>$request->input('art_id')])->with('success','Your Comment Has Been Sent,Thanks.');
    }
    public function references(){
        $setting=Setting::first();
        return view('home.references',['setting'=>$setting]);
    }
    public function about(){
        $setting=Setting::first();
        return view('home.about',['setting'=>$setting]);
    }
    public function faq(){
        $setting=Setting::first();
        $datalist=Faq::all();
        return view('home.faq',['datalist'=>$datalist,'setting'=>$setting]);
    }
   

    public function art($id)
    {
        $data=Art::find($id);
        $images=DB::table('images')->where('art_id',$id)->get();
        $artlist3=Art::inRandomOrder()->limit(15)->get();
        $setting=Setting::first();
        $reviews=Comment::where('art_id',$id)->where('status','True')->paginate(3);
        return view('home.art',['data'=>$data,'setting'=>$setting,'images'=>$images,'artlist3'=>$artlist3,'reviews'=>$reviews]);
    }

    public function artuser($id)
    {
        $user=User::find($id);
        $arts=Art::with('user')->where('user_id',$id)->get();
        $artlist2=Art::latest()->take(3)->get();
        $artlist3=Art::inRandomOrder()->limit(15)->get();
        $setting=Setting::first();
        return view('home.artuser',['user'=>$user,'arts'=>$arts,'setting'=>$setting,'artlist3'=>$artlist3,'artlist2'=>$artlist2]);
    }

    public function categoryarts($id)
    {
        $category=Category::find($id);
        $arts=Art::with('category')->where('category_id',$id)->get();
        $artlist2=Art::latest()->take(3)->get();
        $artlist3=Art::inRandomOrder()->limit(9)->get();
        return view('home.categoryarts',['category'=>$category,'arts'=>$arts,'artlist2'=>$artlist2,'artlist3'=>$artlist3]);
    }

    public static function maincategorylist()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
        }
        public function loginadmincheck(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('/admin/category');
            }
    
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    
}
