<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\product_sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Toastr;
class product_SaleController extends Controller
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
        $sale = product_sale::all();
        return view('admin.productSale.get_Sale')->with(compact('sale'));
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
        $sales = new  product_sale();
        $sales ->SaleName = $request->sale;
        $sales ->save();
        Toastr::success('Thêm mới khuyến mãi sản phẩm thành công', 'Thành công');
        $sale = product_sale::all();
        // return view('admin.productSale.get_Sale')->with(compact('sale'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_sale)
    {
        $this->authenUpdate();
        $sales = product_sale::find($product_sale);
        return view('admin.productSale.edit_Sale')->with(compact('sales'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_sale)
    {
        $this->authenUpdate();
        $data = $request->all();
        $sales = product_sale::find($product_sale);
        $sales ->SaleName = $data['sale'];
        $sales ->save();
        Toastr::success('Cập nhật khuyến mãi sản phẩm thành công', 'Thành công');
        $sale = product_sale::all();
        return view('admin.productSale.get_Sale')->with(compact('sale'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_sale)
    {
        $this->authenLogin();
        product_sale::find($product_sale)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
