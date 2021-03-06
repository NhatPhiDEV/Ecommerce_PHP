<?php

namespace App\Http\Controllers\Api\Home;

use Session;
session_start();
use App\Models\product_type;
use App\Models\product_size;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\details_discount;
use App\Models\discount;
use App\Models\method_pay;
use App\Models\details_bill;
use Illuminate\Http\Request;
use App\Models\product_rating;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DateTime;


class CartController extends Controller
{
    public function addCart (Request $request){
   
        $producId = $request->productId;
        $count = $request ->counts;
        $product_info = Product::with('product_Size')->where('ProductID',$producId)->first();

        $data['id'] = $product_info-> ProductID;
        $data['qty'] = $count;
        $data['name'] = $product_info-> ProductName;
        $data['price'] = $product_info-> ProductPrice;
        $data['weight'] = $product_info-> ProductCount -1;
        $data['options']['image'] = $product_info-> ProductImage;
        $data['options']['size'] = $product_info->product_Size->SizeName;
        Cart::add($data);
        Cart::setGlobalTax(0);
        return Redirect::to('api/carts');
        
    }

    public function showCart (Request $request){

        $types = product_type::where('Status',1)->get();
        if (Session::get('cart')){
            return view('home.cart.cart_show')->with(compact('types'));
        }else{
            return view('home.cart.cart_null')->with(compact('types'));
        }
        
    }

    public function deleteCart ($rowId){

        if (Session::get('cart')){
            Cart::remove($rowId);
            return Redirect::to('api/carts');
        }else{
            return view('home.cart.cart_null')->with(compact('types'));
        }
        
    }
    public function updateCart (Request $request){

            $rowId = $request->cart_quantity;
            $qty = $request->update_qty;
            Cart::update($rowId,$qty);
            return Redirect::to('api/carts'); 
    }

    public function deliveryCart (Request $request){

        $types = product_type::where('Status',1)->get();
        session()->forget('discountid');
        session()->forget('discountprice');
        session()->forget('detaildiscountid');

        if(Session::get('idcustomer')){
            $idCustomer = Session::get('idcustomer');
            $data = Customer::find($idCustomer);
            if($data->CustomerAdress != "" || $data->CustomerPhone != ""){
                return view('home.cart.cart_delivery')->with(compact('types','data'));
            }else{
                $result = $data;
                return view('home.user.updateaddress')->with(compact('types','result'));
            }
           
        }else{
            return view('home.user.login_User')->with(compact('types'));
        }
    }

    public function paymentCart (Request $request){

        $types = product_type::where('Status',1)->get();
        $method_pay = method_pay::where('Status',1)->orderBy('PayID','DESC')->get();
        
        $discounts = details_discount::with('discount_code')->where('CustomerID',Session::get('idcustomer'))->where('Status',1)->get();
        Session::put('method_pay',1);
       
        return view('home.cart.cart_payment')->with(compact('types','method_pay','discounts'));
    }
    public function addBill (){

        $types = product_type::where('Status',1)->get();
        $date = new DateTime();
        $idCustomer = Session::get('idcustomer');
        $data = Customer::find($idCustomer);
        
        $bill = new  Bill();
        $bill -> DateCreated =  $date;
        $bill-> CustomerID = $data->CustomerID;

        if(Session::get('discountprice') != 0){

            $bill -> TotalMoney = number_format(Session::get('discountprice'),0,',','.');
            $bill -> discountID = Session::get('discountid');

            $iddetaildis = Session::get('detaildiscountid');
            $details_discount = details_discount::find($iddetaildis);
            $details_discount->Status = 0;
            $details_discount-> save();

        }else{
            $bill -> TotalMoney = Cart::total(0,',','.');
        }
        $bill -> Status = 0;
        $bill -> PayID = Session::get('method_pay');

        if (Session::get('customeraddress') != ""){
            $bill -> ReceiverAdress = Session::get('customeraddress');
        }else{
            $bill -> ReceiverAdress = $data -> CustomerAdress;
        }
        

        $bill -> ReceiverName = $data -> CustomerName;
        $bill -> ReceiverPhone = $data -> CustomerPhone;
        $bill -> save();

        $contents = Cart::content();
        foreach ($contents as $key => $content)
        {
            
            $dBill = new details_bill();


            $idpro = $content->id;
            $product = Product::find($idpro);
            $countold = $product->ProductCount;

            $countnew = $content->qty;

            $product->ProductCount = $countold - $countnew;
            $product -> save();
            $dBill-> BillID = $bill-> BillID;
            $dBill-> ProductID = $content->id;
            $dBill-> ProductCount = $content->qty;
            $dBill-> Note = $content->price;
            $dBill ->save();
        }
        Cart::destroy();
        Session::forget('ward');
        Session::forget('address');
        Session::forget('customeraddress');
        return view('home.cart.oder_success')->with(compact('types'));
    }
    
    public function addDiscount (Request $request){
        $data = $request->discount;
        session()->forget('discountid');
        session()->forget('discountprice');
        session()->forget('detaildiscountid');
       if ($data){

        $char = explode('/', $data);
        $data1 = intval($char[0]);
        $data2 = intval($char[1]);

         $dis = discount::find($data1);
         $fun = $dis->function;
         $id = $dis-> discountID;

           if ( $fun == "Gi???m ti???n"){
            
                $pricedis = $dis-> Feature;
               
                $price =  Cart::total(0,',','');
                $a = rtrim($price,',');
               
                $b = intval($a);
                $disprice = $b - $pricedis;
                
                Session::put('detaildiscountid',$data2);
                Session::put('discountid',$id);
                Session::put('discountprice',$disprice);
           } else {
                $pricedis = $dis-> Feature;

                $price =  Cart::total(0,',','');
                $a = rtrim($price,',');
            
                $b = intval($a);

                $percent = (($pricedis * $b)/100);
                $disprice = $b - $percent;
              
                Session::put('detaildiscountid',$data2);
                Session::put('discountid',$id);
                Session::put('discountprice',$disprice);
           }
           
       } else {
            Session::put('discountprice',Cart::total(0,',',''));
       }
       return redirect()->back();
    }

    public function addAddress (Request $request){
        $pro_dis = ["","An Giang","B?? R???a - V??ng T??u","B???c Li??u","B???c K???n","B???c Giang","B???c Ninh","B???n Tre","B??nh D????ng","B??nh ?????nh","B??nh Ph?????c","B??nh Thu???n","C?? Mau","Cao B???ng","C???n Th??","???? N???ng","?????k L???k","?????k N??ng","?????ng Nai","?????ng Th??p","??i???n Bi??n","Gia Lai","H?? Giang","H?? Nam","H?? N???i","H?? T??nh","H???i D????ng","H???i Ph??ng","H??a B??nh","H???u Giang","H??ng Y??n","Th??nh ph??? H??? Ch?? Minh","Kh??nh H??a","Ki??n Giang","Kon Tum","Lai Ch??u","L??o Cai","L???ng S??n","L??m ?????ng","Long An","Nam ?????nh","Ngh??? An","Ninh B??nh","Ninh Thu???n","Ph?? Th???","Ph?? Y??n","Qu???ng B??nh","Qu???ng Nam","Qu???ng Ng??i","Qu???ng Ninh","Qu???ng Tr???","S??c Tr??ng","S??n La","T??y Ninh","Th??i B??nh","Th??i Nguy??n","Thanh H??a","Th???a Thi??n - Hu???","Ti???n Giang","Tr?? Vinh","Tuy??n Quang","V??nh Long","V??nh Ph??c","Y??n B??i"] ;

        $province = $pro_dis[$request -> calc_shipping_provinces];
        $district =$request->calc_shipping_district;
        $ward = $request->ward;
        $address=$request ->address;

        $customeraddress = $address. ', '.$ward. ', ' .$district. ', ' .$province;
        Session::put('ward',$ward);
        Session::put('address',$address);
        Session::put('customeraddress',$customeraddress );
        return redirect()->back();

    }
    public function addDefaut (){
        
        Session::forget('ward');
        Session::forget('address');
        Session::forget('customeraddress');
        
        return redirect()->back();

    }

    
}
