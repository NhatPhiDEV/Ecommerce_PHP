<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\statistical; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Customer;
use App\Models\News;
use App\Models\discount;
use App\Models\Admin;

class StatisticalController extends Controller
{
    public function getStatistical (){

        $product = Product::all()->count();
        $customer = Customer::all()->count();
        $news = News::all()->count();
        $bill = Bill::all()->count();
        $discount = discount::all()->count();

        $news_action = News::orderBy('Action','DESC')->take(20)->get();
        $product_action = Product::orderBy('Action','DESC')->take(10)->get();
        return view('admin.statistical.get_statistical')->with(compact('product','customer','news','bill','discount','news_action','product_action'));
    
    }


    public function getDate (Request $request){

        $datas = $request->all();

        $fomdate = $datas['fromdate'];
        $todate = $datas['todate'];

         $get = statistical::whereBetween('order_date',[$fomdate,$todate])->orderBy('order_date','ASC')->get();

        foreach ($get as $key => $val){

        $char_data[] = array(
                'period' => $val-> order_date,
                'order' => $val-> total_order,
                'sales' => $val-> sales,
                'profit' => $val-> profit,
                'quantity' => $val-> quantity,
             );
        }
       
        return response()->json(['data'=>$char_data],200);
    }

    public function getWeek (Request $request){
        
        $now = Carbon::now('Asia/Ho_Chi_Minh')-> toDateString ();
      
        $week = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)-> toDateString ();

        //   $now = "2020-11-08";
        // $week = "2020-10-28";

        $get = statistical::whereBetween('order_date',[$week,$now])->orderBy('order_date','ASC')->get();

        foreach ($get as $key => $val){

        $char_datas[] = array(
                'period' => $val-> order_date,
                'order' => $val-> total_order,
                'sales' => $val-> sales,
                'profit' => $val-> profit,
                'quantity' => $val-> quantity,
             );
        }
       
        return response()->json(['data'=>$char_datas],200);
    }
    
}