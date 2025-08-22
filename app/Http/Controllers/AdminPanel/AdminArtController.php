<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;


class AdminArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data=Art::all();
        return view('admin.art.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::all();
        return view('admin.art.create',['data'=>$data]);
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
                return redirect('admin/art');
            } else {
                $file=$request->file('video');
                $file->move('upload',$file->getClientOriginalName());
                $file_name=$file->getClientOriginalName();
                $data->video=$file_name;
                $data->save();
                return redirect('admin/art');
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function show(Art $art,$id)
    {
        $data=Art::find($id);
        return view('admin/art/show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function edit(Art $art,$id)
    {
        $data=Art::find($id);
        $datalist=Category::all();
        return view('admin.art.edit',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Art $art,$id)
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
            return redirect('admin/art');
        } else {
            $file=$request->file('video');
            $file->move('upload',$file->getClientOriginalName());
            $file_name=$file->getClientOriginalName();
            $data->video=$file_name;
            $data->save();
            return redirect('admin/art');
        }
    }
      
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function destroy(Art $art, $id)
    {
        // Find the art
        $data = $art->find($id);
    
        // Check if the art exists
        if (!$data) {
            return redirect('admin/art')->with('error', 'Art not found!');
        }
    
        // Check and delete the image
        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::delete($data->image);
        }
    
        // Delete associated comments
        Comment::where('art_id', $id)->delete();
    
        // Delete the art
        $data->delete();
    
        return redirect('admin/art')->with('success', 'Art and associated comments deleted successfully.');
    }
    
}
