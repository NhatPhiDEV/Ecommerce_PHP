<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\details_bill;
use App\Models\discount;
use App\Models\details_discount;
use App\Models\Product;
use App\Models\product_rating;
use PDF;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
use Toastr;
use App\Exports\ExportsBillSuccess;
use App\Exports\ExportsBillCancel;
use App\Exports\ExportsBillTrport;
use App\Exports\ExportsBillWaiting;
use Excel;


class BillController extends Controller
{
    public function authenLogin(){
        $admin_user = Session::get('Chỉnh sửa đơn hàng');

        if($admin_user){
            return Redirect::to('api/home');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }
    public function authenswatch(){
        $admin_user = Session::get('Xem đơn hàng');

        if($admin_user){
            return Redirect::to('api/home');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    public function authenscancer(){
        $admin_user = Session::get('Hủy đơn hàng');

        if($admin_user){
            return Redirect::to('api/home');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    public function authenprintbill(){
        $admin_user = Session::get('In đơn hàng');

        if($admin_user){
            return Redirect::to('api/home');
        }else{
            return Redirect::to('api/admin')->send();
        }
    }

    //Bill waiting
    public function showBillwai (){

        $this->authenswatch();
        $bills = Bill::where('Status',0)->orderBy('BillID','DESC')->get();
        return view('admin.bill.getbill_waiting')->with(compact('bills'));
    }
    public function statusBill ($id){
        
        $this->authenLogin();
        $bill = Bill::find($id);
        $bill-> Status = 1;
        $bill->save();
        Toastr::success('Cập nhật thông tin thành công', 'Thành công');
        return response()->json(['data'=>'bill'],200);
        
    }
    
    public function statusBillsc ($id){
        
         $this->authenswatch();
        $bill = Bill::find($id);
        $iddetail = $bill -> BillID;
        $detailsbill = details_bill::where('BillID',$iddetail)->get();
        // foreach ($detailbill as $key => $detail){
        //     $a = $detail->ProductID;
        //     $pro = Product::find($a);
        //     $b =  $pro -> ProductCount;
        //     $pro -> ProductCount = $b + $detail->ProductCount;
        //     $pro->save();
        // }
        $bill-> Status = 3;
        $bill->save();
        return response()->json(['data'=>$bill],200);
        
    }

    public function detailBill ($id){
        $this->authenswatch();
        $dataUsers = Bill::with('customer_bill','discount_bill','pay_bill')->where('BillID',$id)->get();
        
        $detailbills = details_bill::with('product_bill')->where('BillID',$id)->get();

        return view('admin.bill.detailbill_waiting')->with(compact('dataUsers','detailbills'));
 
        
    }   

    //Bill transport
    public function showBilltransport (){
    $this->authenswatch();
        $bills = Bill::where('Status',1)->orderBy('BillID','DESC')->get();
        return view('admin.bill.getbill_trasport')->with(compact('bills'));
    }


    public function statusBilltr ($id){
        $this->authenLogin();
        $bill = Bill::find($id);
        $bill-> Status = 2;
        $bill->save();
        $customer = $bill -> CustomerID;
        $details = details_bill::where('BillID',$id)->get();
        foreach ($details as $detail ){
            $product_rating = new product_rating();

            $product_rating -> ProductID = $detail-> ProductID;
            $product_rating -> CustomerID = $customer;
            $product_rating -> Status = 0;
            $product_rating -> Rate = 0;
            $product_rating ->save();
        }
        
        return response()->json(['data'=>'bill'],200);
        
    }
    //Status pro
    
    public function staProduct ($id){
        
        $data = Product::find($id);
        if ($data->Status == 1){

            $data->Status = 0;
            $data ->save();
            return response()->json(['data'=>'bill'],200);
        }else{

            $data->Status = 1;
            $data ->save();
            return response()->json(['data'=>'bill'],200);
        }  
    }
    //Bill success
    public function showBillsuccess (){
        $this->authenswatch();
        $bills = Bill::where('Status',2)->orderBy('BillID','DESC')->get();
        return view('admin.bill.getbill_success')->with(compact('bills'));
    }

    //
    public function showBillcancel (){
        $this->authenswatch();
        $bills = Bill::where('Status',3)->orderBy('BillID','DESC')->get();
        return view('admin.bill.getbill_cancel')->with(compact('bills'));
    }
    //In pfd
    public function billPDF ($id){
        
        $this->authenprintbill();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }

    public function print_order_convert ($id){
        $this->authenprintbill();
        $dataUsers = Bill::with('customer_bill','discount_bill','pay_bill')->where('BillID',$id)->get();
        
        $detailbills = details_bill::with('product_bill')->where('BillID',$id)->get();

        $html = '';
        $html .= ' <style>
                body{
                    font-family: DejaVu Sans;
                }
             </style>';
             $html .= '<div >';
             $html .= ' <div><h2>THORMETAL.stores</h2></div>';
             $html .= ' <div style="margin-top:-32px;"><p>&#9742;: 0332283252</p></div>';
             $html .= ' <div style="margin-top:-32px;"><p>Website: www.thormetalstore.com</p></div>';
             $html .= ' <div style="margin-top:-32px;"><p>Email: thormetalstores0103@gmail.com</p></div>';
             $html .= ' <div style="margin-top:-32px;"><p>Địa chỉ: Trường đại học công nghệ Thành Phố HCM</p></div>';
             $html .= '</div>';

             $html .= '<hr>';
             $html .='<div style="text-align:center;"><h3 style="font-weight: bold;">ĐƠN ĐẶT HÀNG</h3> </div>';
                
             foreach($dataUsers as $dataUser ) {
                $html .= '<div style="border-left:bold">';
                $html .= '<div style="display:flex">
                        <p style="" >Khách hàng:&ensp;</p>
                        <p style = "margin-left:125px">'.$dataUser->ReceiverName.'</p>
                        </div>';
                $html .= '<div style="display:flex;margin-top:-65px;">
                        <p style="" >Địa chỉ:&ensp;</p>
                        <p style = "margin-left:125px;">'.$dataUser->ReceiverAdress.'</p>
                        </div>'; 
                $html .= '<div style="display:flex;margin-top:-65px">
                        <p style="" >Số điện thoại:&ensp;</p>
                        <p style = "margin-left:125px;">'.$dataUser->ReceiverPhone.'</p>
                        </div>';
                $html .= '<div style="display:flex;margin-top:-65px">
                        <p style="" >Ngày đặt:&ensp;</p>
                        <p style = "margin-left:125px;">'.$dataUser->DateCreated.'</p>
                        </div>';
                $html .= '<div style="display:flex;margin-top:-65px">
                        <p style="" >Phương thức thanh toán:&ensp;</p>
                        <p style = "margin-left:200px;">'.$dataUser->pay_bill->PayName.'</p>
                        </div>';

            $html .= '</div>';            
            $html .= '
            <p style="margin-top:-65px">Mô tả đơn hàng:</p>
         
            <table style="" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" scope="col">STT</th>
                        <th style="text-align:center;width:280px" scope="col">Tên sản phẩm</th>
                        <th style="text-align:center;width:150px" scope="col">Số lượng</th>
                        <th style="text-align:center ; width:50px" scope="col">Giá</th>
                        <th style="text-align:center; width:150px" scope="col">Thành tiền</th>
                        <th></th>
                    </tr>
                   
                </thead>
                
                <tbody>';
          
                    $i = 0;
                    $count = 0;
                    
                foreach($detailbills as $detailbill ) {
                 
                    $i++;
                    $kq = $detailbill->ProductCount * $detailbill->Note;
                    $html .='   <tr>
                            <th style="text-align:center;">'.$i.'</th>
                            <td style="text-align:center;">'.$detailbill->product_bill->ProductName.'</td>
                            <td style="text-align:center;">'.$detailbill->ProductCount.'</td>
                            <td style="text-align:center;">'.$detailbill->Note.'</td>
                            <td style="text-align:center;">'.$kq.'</td>
                        </tr>';  
                    $count = $count + $detailbill->ProductCount;      
            }
            $html .='</table>'; 
            $html .= '<div>';
            $html .= '<div style="display:flex;margin-top:15px;margin-left:300px;">
                <p style="" >Số lượng sản phẩm:&ensp;</p>
                <p style = "margin-left:200px;">'.$count.'</p>
                </div>';
                $price =  $dataUser->TotalMoney;
                $a = rtrim($price,',');
               
                $b = intval($a);
            if( $b > 2)
            {
                $html .= '<div style="display:flex;margin-top:-65px;margin-left:300px;">
                <p style="" >Phí vận chuyển:&ensp;</p>
                <p style = "margin-left:200px;">Freeship</p>
                </div>';
            }else{
                $html .= '<div style="display:flex;margin-top:-65px;margin-left:300px;">
                <p style="" >Phí vận chuyển:&ensp;</p>
                <p style = "margin-left:200px;">Có phí</span></p>
                </div>';
            }

            if($dataUser->discountID != NULL)
            {
                if ($dataUser->discount_bill->function == "Giảm tiền"){
                    $html .= '<div style="display:flex;margin-top:-65px;margin-left:300px;">
                    <p style="" >Giảm:&ensp;</p>
                    <p style = "margin-left:200px;">'.$dataUser->discount_bill->Feature.'<span> vnđ</span></p>
                    </div>';
                }else{
                    $html .= '<div style="display:flex;margin-top:-65px;margin-left:300px;">
                    <p style="" >Giảm:&ensp;</p>
                    <p style = "margin-left:200px;">'.$dataUser->discount_bill->Feature.'<span> %</span></p>
                    </div>';
                }
            }
            $html .= '<div style="display:flex;margin-top:-65px;margin-left:300px;">
            <p style="" >Tổng giá trị đơn hàng:&ensp;</p>
            <p style = "margin-left:200px;font-weight:bold">'.$dataUser->TotalMoney.'<span> vnđ</span></p>
            </div>';
           
            $html .= '</div>';
        }
        $html .= '<i>Vui lòng kiểm tra đơn hàng trước khi nhận nhé !</i>';
        $html .=' <br>';
        $html .=' <br>';
        $html .= '<div><i style="float:right">...........Ngày........tháng..........năm....... !</i></div>';
        $html .=' <br>';
        $html .=' <br>';
        $html .=' <br>';
        $html .= '<div style="display:flex;margin-top:-65px">
                    <p style="margin-left:100px;">Người giao hàng</p>
                    <p style="margin-left:500px;">Người nhận hàng</p>
                </div>';
               
        return $html;
    }

    public function loadCustomer (Request $request){

        $data = $request->all();
        $idrate = $data['iddiscount'];

        $customer = Customer::all();
        $lisdiscount = details_discount::where('discountID', $idrate)->get();
        
        return response()->json(['lisdiscount'=>$lisdiscount,'customer'=>$customer],200); 
    }

    public function export_Bill_Success(){
        return Excel::download(new ExportsBillSuccess , 'billsuccess.xlsx');
    }
    public function export_Bill_Waiting(){
        return Excel::download(new ExportsBillWaiting , 'billwaiting.xlsx');
    }
    public function export_Bill_Cancel(){
        return Excel::download(new ExportsBillCancel , 'billcancel.xlsx');
    }
    public function export_Bill_Trport(){
        return Excel::download(new ExportsBillTrport , 'billtrport.xlsx');
    }
    
}
