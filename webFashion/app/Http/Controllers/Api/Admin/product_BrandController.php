<?php

namespace App\Http\Controllers\Api\Admin;
use App\Models\product_brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Toastr;
class product_BrandController extends Controller
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
        $brand = product_brand::all();
        return view('admin.productBrand.get_Brand')->with(compact('brand'));
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
        $brands = new  product_brand();
        $brands ->BrandName = $request->brand;
        $brands ->save();
        Toastr::success('Thêm mới thương hiệu sản phẩm thành công', 'Thành công');
        $brand = product_brand::all();
        // return view('admin.productBrand.get_Brand')->with(compact('brand'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_brand)
    {
        $this->authenUpdate();
        $brands = product_brand::find($product_brand);
        return view('admin.productBrand.edit_Brand')->with(compact('brands'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_brand)
    {
        $this->authenUpdate();
        $data = $request->all();
        $brands  = product_brand::find($product_brand);
        $brands ->BrandName = $data['brand'];
        $brands ->save();
        Toastr::success('Cập nhật thương hiệu sản phẩm thành công', 'Thành công');
        $brand = product_brand::all();
        return view('admin.productBrand.get_Brand')->with(compact('brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_brand)
    {
        $this->authenLogin();
        product_brand::find($product_brand)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
