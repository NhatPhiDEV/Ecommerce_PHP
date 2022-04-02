
@extends('home.layoutshome')
@section('home')
<section class="payment">
    <div class="container">
        <div class="payment-top-wrap">
            <div class="payment-top">
                <div class="payment-top-delivery payment-top-item">
                   <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="payment-top-adress payment-top-item">
                   <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="payment-top-payment payment-top-item">
                   <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
         </div>
    </div>
    <div class="container">
        <div class="payment-content row">
            <div class="payment-content-left">
                <div class="payment-content-left-method-delivery">
                    <p style="font-weight: bold;">Phương thức giao hàng</p>
                    <div class="payment-content-left-method-delivery-item">
                        <input checked type="radio">
                        <label for="">Giao hàng chuyển phát nhanh</label>
                    </div>
                </div>
                <div class="payment-content-left-method-payment">
                    <p style="font-weight: bold;">Phương thức thanh toán</p>
                    <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                @foreach ($method_pay as $method_pays)            
                    <div class="payment-content-left-method-payment-item">
                        <input name="method-payment" type="radio" checked>
                        <label for="">{{$method_pays ->PayName}}</label>
                    </div>
                    <div class="payment-content-left-method-payment-item-img">
                        <img src="{{asset('/uploads/'.$method_pays->Image)}}" alt="">
                    </div>
                   
                    <!-- pAYpAL -->
                   
                @endforeach 
                <?php 
                        $price =  Cart::total(0,',','');
                        $a = rtrim($price,','); 
                        $b = intval($a);
                        $vnd_to_usd = $b/23082;
                    ?>
                    <div class="paypal">
                        <div id="paypal-button" style="margin-top:10px"></div>
                    </div>
                   <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">       
                </div>
            </div>
            <div class="payment-content-right">
                <form method="POST"  action="{{route('discount.addDiscount')}}" data-url="" role="form">
                 @csrf  
                        <div class="payment-content-right-button">
                            <select style="margin-right:20px" name ="discount" id="selectsize" class="form-select" aria-label="Default select example">
                                <option value="" selected>-- Chọn mã quà tặng/ giảm giá --</option>	
                                <?php 
                                    $price =  Cart::total(0,',','');
                                    $a = rtrim($price,','); 
                                    $b = intval($a);
                                ?>
                                @foreach($discounts as $discount)
                                    <?php 
                                        $c = $discount->discount_code->discountID;
                                       
                                    ?>
                                    @if ($b >= $c)
                                        @if ($discount->discount_code->function == "Giảm phần trăm")
                                            <option value="{{$discount->discount_code->discountID}}/{{$discount->ID}}" > Giảm {{$discount->discount_code-> Feature}}% cho đơn hàng từ {{number_format($discount->discount_code->discountCondition,0,'','.')}}đ</option>
                                         @else
                                            <option value="{{$discount->discount_code->discountID}}/{{$discount->ID}}" > Giảm {{$discount->discount_code-> Feature}} K cho đơn hàng từ {{number_format($discount->discount_code->discountCondition,0,'','.')}}đ</option>
                                         @endif
                                    @endif
                                @endforeach															
							</select>
                        @if(Session::get('customeraddress') == "")
                            <input type="submit" value="Áp dụng">
                        @endif
                </div>
                </form>
                <!-- <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã cộng tác viên">
                    <button><i class="fas fa-check"></i></button>
                </div> -->
                <div style="width: 100%;margin-top: 20px;" class="delivery-content-right">
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
                       <td style="font-weight: bold;">
                            <p>
                                @if(Session::get('discountprice') != 0)
                                    {{number_format(Session::get('discountprice'),0,',','.')}}<sup>đ</sup>
                                @else
                                    {{Cart::total(0,',','.')}}<sup>đ</sup>
                                @endif
                            </p>
                    </td>
                   </tr>
                </table>
           </div>
                
            </div>
        </div>
        <div class="payment-content-right-payment">
          <a href="{{route('addBill.addBill')}}"><button>HOÀN THÀNH THANH TOÁN</button></a>
        </div>
    </div>
</section>
<script>
    var usd = document.getElementById('vnd_to_usd').value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ATE0WvtMrLmfSQ-YEzihlcEhXuHi8aMduwBLay1OTZDCw-Lkz5QcbuivUasQEjdi1-0oSc_ffR3FXg7R',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total:`${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn bạn đã mua hàng!');
      });
    }
  }, '#paypal-button');

</script>
@endsection

