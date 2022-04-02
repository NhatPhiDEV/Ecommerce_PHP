
@extends('home.layoutshome')
@section('home')
@csrf
<section class="delivery">
     <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                   <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="delivery-top-adress delivery-top-item">
                   <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="delivery-top-payment delivery-top-item">
                   <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
         </div>
     </div>
     
     <div class="container">
         <div class="delivery-content row">
             <div class="delivery-content-left">
                  
                <div class="delivery-content-left-input-top row">
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Họ tên <span style="color: red;">*</span></label>
                        <input type="text" value = "{{$data->CustomerName}}" readonly>
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label style="margin-left: -11px" for="">Điện thoại <span style="color: red;">*</span></label>
                        <input style="margin-left: -11px;" type="text" value="{{$data->CustomerPhone}}" readonly>
                    </div>
                </div>
                <br>              
                @if (Session::get('customeraddress') == "")
                    <p style="">Giao hàng đến địa chỉ</p>
                    <div style="margin-left: -5px;" class="delivery-content-left-input-bottom">
                        <label style="margin-top: 10px;" for="">Địa chỉ <span style="color: red;">*</span></label>
                        <input style = "" type="text" value="{{$data->CustomerAdress}}" readonly>
                    </div>
                @else
                    <p style="">Giao hàng đến địa chỉ</p>
                    <a class="btn btn-danger" href="{{route('addressdefau.addDefaut')}}">Chọn địa chỉ mặc định</a>                    
                @endif
                <div style="margin-left: -5px;" class="delivery-content-left-input-bottom">
                    <label style="margin-top: 10px;" for="">Địa chỉ khác: <span style="color: red;">*</span></label>
            <form method="POST"  action="{{route('addressdiff.addAddress')}}" data-url="" role="form">
                    @csrf 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Tỉnh/TP:</p>
                    <select style="  width: 100%;height: 35px;border: 1px solid #dddddd;padding-left: 6px;"  name="calc_shipping_provinces" required="">
                            <option value="">Tỉnh / Thành phố</option>
                        </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Quận/Huyện:</p>
                    <select style="  width: 100%;height: 35px;border: 1px solid #dddddd;padding-left: 6px;"  name="calc_shipping_district"  required="">
                            <option value="">Quận / Huyện</option>
                        </select>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p style="margin-top:10px">Phường/Xã:</p>
                    <input value="{{Session::get('ward')}}" size="50" type="text" placeholder="Phường/Xã..."style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" name="ward" required />
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p style="margin-top:10px">Địa chỉ:</p>
                    <input value="{{Session::get('address')}}" size="20" type="text" placeholder="Địa chỉ..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" name="address" required />
                  </div>
                    @if(Session::get('customeraddress'))
                        
                    @else
                         <div style="margin:0px 200px;" >
                             
                            <input style="margin-top:30px" class="btn btn-warning" style="width:50px" type="submit" value="Chọn">
                        </div>
                    @endif
                    
            </form>
                </div>
              <div class="delivery-content-left-button row">
                <a href="{{route('carts.showCart')}}"><span>«</span><p>Quay lại giỏ hàng</p></a>
              </div>
             </div>
             <div class="delivery-content-right">
             <?php 
                $contents = Cart::content();

             ?>
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th style="text-align: center;">Giá</th>
                        <th style="text-align: center;">Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                @foreach ($contents as $content)
                    <tr>
                        <td>{{$content->name}}</td>
                        <td><p>{{number_format($content->price),',','.'}} <sup>vnđ</sup></p></td>
                        <td>{{$content->qty}}</td>
                        <td><p>
                                <?php 
                                    $sub = $content->qty * $content->price;
                                    echo number_format($sub,0,',','.');
                                ?>
                            <sup>vnđ</sup>
                        </p></td>
                    </tr>
                 @endforeach
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng</td>
                        <td style="font-weight: bold;"><p>{{Cart::priceTotal(0,',','.')}}<sup>đ</sup></p></td>
                    </tr>
                    <tr>
                       <td style="font-weight: bold;" colspan="3">Thuế VAT</td>
                       <td style="font-weight: bold;"><p>{{Cart::tax(0,',','.')}}<sup>đ</sup></p></td>
                   </tr>
                   <tr>
                       <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                       <td style="font-weight: bold;"><p>{{Cart::total(0,',','.')}}<sup>đ</sup></p></td>
                   </tr>
                </table>
                <div class="delivery-content-left-button row">
               <a href="{{route('payment.paymentCart')}}"><button><p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p></button></a> 
              </div>
           </div>
           
         </div>
       
     </div>
 </section>
 
@endsection