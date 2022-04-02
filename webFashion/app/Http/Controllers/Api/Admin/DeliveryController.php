<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\FeeShip;

use Storage;
use File;
class DeliveryController extends Controller
{
    public function insert_Delivery(Request $request){
        $data = $request->all();
        $fee_ship =new FeeShip();
        $fee_ship->Fee_MaTP = $data['city'];
        $fee_ship->Fee_MaQH = $data['province'];
        $fee_ship->Fee_XaID = $data['wards'];
        $fee_ship->Fee_Ship = $data['fee_ship'];
        $fee_ship->save();
    }



    public function add_Delivery(Request $request){
        $city = City::orderby('MaTp','ASC')->get();
        return view('admin.delivery.add_Delivery')->with(compact('city'));
    }

    public function select_Delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output ='';
            if($data['action'] == "city"){
                $select_Province = Province::where('MaTP', $data['ma_id'])->orderby('MaQH', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach($select_Province as $key => $province){
                $output .=  '<option value ="' .$province->MaQH .'">'.$province->Name_Province.'</option>';
                }
            }else{
                $select_Wards = Wards::where('MaQH', $data['ma_id'])->orderby('XaID', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';

                foreach($select_Wards as $key => $wards){
                $output .=  '<option value ="' .$wards->XaID.'">'.$wards->Name_Wards.'</option>';
                 }
            }
            echo $output;
        }
       
    }

    public function index()
    {

       
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      

    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}