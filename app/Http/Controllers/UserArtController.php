<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Validator;

class UserArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Setting::first();
        $data=Art::where('user_id',Auth::id())->get();
        return view('home.user.art.index',['data'=>$data,'setting'=>$setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting=Setting::first();
        $data=Category::all();
        return view('home.user.art.create',['data'=>$data,'setting'=>$setting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Art();
        $data->category_id=$request->category_id;
        $data->user_id=Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->code=$request->code;
        $data->status=$request->status;
        if($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $validator=Validator::make($request->all(), ['video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm']);
        if ($validator->fails()) {
            $data->save();
            return redirect('artt');
        } else {
            $file=$request->file('video');
            $file->move('upload',$file->getClientOriginalName());
            $file_name=$file->getClientOriginalName();
            $data->video=$file_name;
            $data->save();
            return redirect('artt');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting=Setting::first();
        $data=Art::find($id);
        return view('home.user.art.show',['data'=>$data,'setting'=>$setting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting=Setting::first();
        $data=Art::find($id);
        $datalist=Category::all();
        return view('home.user.art.edit',['data'=>$data,'datalist'=>$datalist,'setting'=>$setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Art::find($id);
        $data->category_id=$request->category_id;
        $data->user_id=Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->code=$request->code;
        $data->status=$request->status;
        if($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $validator=Validator::make($request->all(), ['video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm']);
        if ($validator->fails()) {
            $data->save();
            return redirect('artt');
        } else {
            $file=$request->file('video');
            $file->move('upload',$file->getClientOriginalName());
            $file_name=$file->getClientOriginalName();
            $data->video=$file_name;
            $data->save();
            return redirect('artt');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the art
        $art = Art::find($id);
        
        // Check if the art exists
        if(!$art){
            return redirect('artt')->with('error', 'Art not found!');
        }
    
        // Check and delete the image
        if($art->image && Storage::disk('public')->exists($art->image)){
            Storage::delete($art->image);
        }
    
        // Delete associated comments
        Comment::where('art_id', $id)->delete();
    
        // Delete the art
        $art->delete();
    
        return redirect('artt')->with('success', 'Art and associated comments deleted successfully.');
    }
    
}
