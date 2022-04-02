<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\discount;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
use Toastr;

class DiscountController extends Controller
{


    public function authenWat(){
        $admin_user = Session::get('Xem mã giảm giá');

        if($admin_user){
            return Redirect::to('api/homes');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    public function authenUpda(){
        $admin_user = Session::get('Thêm, xóa, Sửa mã giảm giá');

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
        $this->authenWat();
        $discounts = discount::all();
       
        return view('admin.discount.get_discount')->with(compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authenUpda();
        $discount = new discount();
        $discount -> discountCode = $request->id;
        $discount -> discountName = $request->name;
        $discount -> discountCondition = $request->discounyfrom;
        $discount -> Count = $request->count;
        $discount -> Feature = $request->features;
        $discount -> discountExpiry = $request->date;
        $discount -> function = $request->feature;
        $discount->save();
        $discounts = discount::all();
        Toastr::success('Thêm mới thành công', 'Thành công');
        return view('admin.discount.get_discount')->with(compact('discounts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = discount::find($id);
        return view('admin.discount.edit_discount')->with(compact('discount'));
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
        $discount = discount::find($id);
        $discount -> discountCode = $request ->code;
        $discount->discountName = $request -> name ;
        $discount->discountCondition = $request -> condition;
        $discount->discountExpiry = $request -> expiry;
        $discount->Count = $request -> count;
        $discount->save();
        Session::put('users', 'Update Successfully ');
        return \Redirect::route('discounts.index')->with('users','Update Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        discount::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
