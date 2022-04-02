<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\product_size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Toastr;

class product_SizeController extends Controller
{

    public function authenLogin(){
        $admin_user = Session::get('name');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin');
        }
    }
    public function authenwath(){
        $admin_user = Session::get('Xem danh mục sản phẩm');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    public function authenUpdate(){
        $admin_user = Session::get('Xem danh mục sản phẩm');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authenwath();
        $size = product_size::all();
        return view('admin.productSize.get_Size')->with(compact('size'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authenLogin();
        $sizes = new  product_size();
        $sizes ->SizeName = $request->size;
        $sizes ->save();
        Toastr::success('Thêm mới size sản phẩm thành công', 'Thành công');
        $size = product_size::all();
        // return view('admin.productSize.get_Size')->with(compact('size'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_size)
    {
        $this->authenUpdate();
        $sizes = product_size::find($product_size);
        return view('admin.productSize.edit_Size')->with(compact('sizes'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_size)
    {
        $this->authenUpdate();
        $data = $request->all();
        $sizes = product_size::find($product_size);
        $sizes ->SizeName = $data['size'];
        $sizes ->save();
        Toastr::success('Cập nhật size sản phẩm thành công', 'Thành công');
        $size = product_size::all();
        return view('admin.productSize.get_Size')->with(compact('size'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_size)
    {
        $this->authenLogin();
        product_size::find($product_size)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
