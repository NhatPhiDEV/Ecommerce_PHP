<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Session;
use Storage;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();
use Toastr;

class NewsController extends Controller
{
    public function authenLogin(){
        $admin_user = Session::get('name');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin');
        }
    }
    public function authenWath(){
        $admin_user = Session::get('Xem tiêu đề tinh tức');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin');
        }
    }

    public function authenUpdate(){
        $admin_user = Session::get('Thêm,xóa, Sửa tiêu đề tin tức');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authenWath();
        $news = News::all();
        return view('admin.news.get_News')->with(compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authenUpdate();
        $new = new News();
        $new -> TittleNews = $request->tittle;
        $new -> Description = $request->description;

        if($request['ImageUpload']){
            $ProductImage = $request['ImageUpload'];
            $ext = $ProductImage->getClientOriginalExtension();
            $name = time().'_'.$ProductImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($ProductImage));
            $new->NewsImage = $name;
        }else{
            $new -> NewsImage ='default.jpg';
        }
    
        $new->save();
        Toastr::success('Thêm mới thành thành công', 'Thành công');
        $news = News::all();
        return view('admin.news.get_News')->with(compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authenUpdate();
        $news = News::find($id);
        return view('admin.news.edit_News')->with(compact('news'));
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
        $this->authenUpdate();
        $new =  News::find($id);
        $new -> TittleNews = $request->tittle;
        $new -> Description = $request->description;

        if($request['ImageUpload']){

            $ProductImage = $request['ImageUpload'];
            $ext = $ProductImage->getClientOriginalExtension();
            $name = time().'_'.$ProductImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($ProductImage));
            $new -> ProductImage = $name;
     
        }

        $new->save();
        
        Toastr::success('Cập nhật thành thành công', 'Thành công');
        $news = News::all();
        return view('admin.news.get_News')->with(compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        News::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
