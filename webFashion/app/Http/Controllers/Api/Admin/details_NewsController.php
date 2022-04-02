<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\details_news;
use App\Models\News;
use Session;
use Storage;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();
use Toastr;

class details_NewsController extends Controller
{
    public function authenLogin(){
        $admin_user = Session::get('name');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin');
        }
    }

    public function authenWa(){
        $admin_user = Session::get('Xem tin tức');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin');
        }
    }

    public function authenUpa(){
        $admin_user = Session::get('Thêm, xóa, Sửa tin tức');

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
        $this->authenWa();
        $details = details_news::all();
        return view('admin.details_news.get_details')->with(compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authenLogin();
        $news = News::all();
        return response()->json(['data'=>$news],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details = details_news::all();
        $this->authenWa();
        $news = new details_news();
        $news -> DetailsTittle = $request->tittle;
        $news -> Description = $request->description;
        $news -> NewsID = $request->size;

        if($request['ImageUpload']){
            $ProductImage = $request['ImageUpload'];
            $ext = $ProductImage->getClientOriginalExtension();
            $name = time().'_'.$ProductImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($ProductImage));
            $news->DetailsImage = $name;
        }else{
            $news -> DetailsImage ='default.jpg';
        }
    
        $news->save();
        Toastr::success('Thêm mới thành công', 'Thành công');
        return view('admin.details_news.get_details')->with(compact('details'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authenWa();
        $details = details_news::find($id);
        $news = News::all();
        return view('admin.details_news.edit_details')->with(compact('details','news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $details = details_news::all();
        $detail = detailsnews::find($id);
        $detail -> DetailsTittle  = $request ->tittle;
        $detail-> Description= $request -> description ;
        $detail-> NewsID= $request -> type ;
        if($request['ImageUpload']){

            $DetailsImage = $request['ImageUpload'];
            $ext = $DetailsImage->getClientOriginalExtension();
            $name = time().''.$DetailsImage->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($DetailsImage));
            $detail->DetailsImage = $name;

        }
        $detail->save();
        Toastr::success('Thêm mới thành công', 'Thành công');
        return view('admin.details_news.get_details')->with(compact('details'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authenLogin();
        details_news::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
