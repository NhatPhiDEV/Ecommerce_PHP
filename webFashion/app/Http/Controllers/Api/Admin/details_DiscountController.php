<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\details_discount;
use App\Models\discount;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
use Toastr;

class details_DiscountController extends Controller
{

    public function authenWat(){
        $admin_user = Session::get('Thêm, xóa, mã giảm giá cho khách hàng');

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
        // $detail_discounts = details_discount::all();
        return view('admin.details_discount.get_discount')->with(compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $discounts = discount::all();
        $customer = Customer::all();
        return response()->json(['data'=>$discounts,'customer'=>$customer],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authenWat();
        $discounts = discount::all();
        $dis = $request->discountselect;

        if(isset($_POST['checkdiscount']) == true){
            foreach ($_POST['checkdiscount'] as $v){

                $discount = new details_discount();

                $discount -> discountID = $dis;
                $discount -> CustomerID = $v;
                $discount -> Status = 1;
                
                $discount -> save();
            }
        }
        Toastr::success('Thêm mới thành công', 'Thành công');
        return view('admin.details_discount.get_discount')->with(compact('discounts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authenWat();
        $discounts = details_discount::with('discount_code','customer_discount')->where('discountID',$id)->orderBy('Status','DESC')->get();

        return view('admin.details_discount.show_discount')->with(compact('discounts'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        details_discount::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }
}
