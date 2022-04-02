<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\product_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Toastr;

class product_TypeController extends Controller
{

    public function authenLogin(){
        $admin_user = Session::get('name');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin')->send();
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
        $type = product_type::all();
        return view('admin.productType.get_Type')->with(compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     ** 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authenLogin();
        $types = new  product_type();
        $types ->TypeName = $request->type;
        $types ->Status = '1';
        $types ->save();
        $type = product_type::where('Status',1)->get();
        // return view('admin.productType.get_Type')->with(compact('type'));
        return redirect()->back();
    }
  

    /**
     * Display the specified resource.
     * @param  \App\Models\product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function show( $product_type)
    {
        $this->authenUpdate();
        $types = product_type::find($product_type);
        return view('admin.productType.edit')->with(compact('types'));
         
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $product_type)
    {
        $this->authenUpdate();
        $data = $request->all();
        $types = product_type::find($product_type);
        $types ->TypeName = $data['type'];
        $types ->save();
        Toastr::success('Cập nhật loại sản phẩm thành công', 'Thành công');
        $type = product_type::where('Status',1)->get();
        return view('admin.productType.get_Type')->with(compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function destroy( $product_type)
    {
        
        product_type::find($product_type)->delete();
        return response()->json(['data'=>'removed'],200);
    }
    public function staType ($id){

        $data = product_type::find($id);

       if ($data->Status == 1){

        $data->Status = 0;
        $data ->save();
        return response()->json(['data'],200);
        }else{

            $data->Status = 1;
            $data->save();
            return response()->json(['data'],200);
        }
    }

}
