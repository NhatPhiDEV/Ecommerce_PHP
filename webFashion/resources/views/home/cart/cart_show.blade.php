
@extends('home.layoutshome')
@section('home')
@csrf
<section class="cart">
     <div class="container">
         <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                   <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                   <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                   <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
         </div>
     </div>
     <div class="container">
         <div class="cart-content row">
             <div class="cart-content-left">
             <?php 
                $contents = Cart::content();

             ?>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Size</th>
                        <th>SL</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    @foreach ($contents as $content)
                    <a href="{{route('product-detalis.show',[$content->id])}}">
                        <tr>
                       
                            <td> <a href="{{route('product-detalis.show',[$content->id])}}"><img  src="{{asset('/uploads/'.$content->options->image)}}" alt=""> </a></td>
                            <td> <a href="{{route('product-detalis.show',[$content->id])}}"><p>{{$content->name}}</p> </a></td>
                            <td><p>{{number_format($content->price) }} <sup>vnđ</sup></p></td>
                            <td><p>{{$content->options->size}}</p></td>
                            <form action="{{route('update.updateCart')}}" method="POST">
                                {{csrf_field()}}
                                <td><input style="width: 35px;" type="number" name="update_qty"  value="{{$content->qty}}" min="1" max="{{$content->weight}}"> <input style="border:none;font-size: 20px;color: #37bf27;" type="submit" value="&#10004;" class="btn btn-default btn-sm"></td>
                                <input type="hidden" value="{{$content->rowId}}"  name="cart_quantity" class="form-control">
                            </form>
                            <td><p>
                                <?php 
                                    $sub = $content->qty * $content->price;
                                    echo number_format($sub,0,',','.');
                                ?>
                            <sup>vnđ</sup></p></td>
                            <td><a href="{{route('delete.deleteCart',$content->rowId)}}"><span>&#10006;</span></a></td>

                        </tr>
                   </a>
                    @endforeach
                </table>
             </div>
             
             <div class="cart-content-right">
                 <table>
                     <tr>
                         <th colspan="2">TỔNG TIỀN GIỎ HÀNG:</th>
                     </tr>
                     <tr>
                         <td>TỔNG SẢN PHẨM:</td>
                         <td>{{Cart::count()}}</td>
                     </tr>
                     <tr>
                         <td>TỔNG TIỀN HÀNG:</td>
                         <td><p>{{Cart::priceTotal(0,',','.')}} <sup>vnđ</sup></p></td>
                     </tr>
                     <tr>
                         <td>THUẾ</td>
                         <td><p style="color: black; font-weight: bold;">{{Cart::tax(0,',','.')}}<sup>vnđ</sup></p></td>
                     </tr>
                     <tr>
                         <td>VẬN CHUYỂN</td>
                         @if(Cart::priceTotal(0,',','.') > 2)
                         <td><p style="color: black; font-weight: bold;">Freeship</p></td>
                            
                        @else
                        <td><p style="color: black; font-weight: bold;">Tính phí</p></td>
                        @endif
                        
                     </tr>
                     <tr>
                         <td>TẠM TÍNH:</td>
                         <td><p style="color: black; font-weight: bold;">{{Cart::total(0,',','.')}}<sup>vnđ</sup></p></td>
                     </tr>
                 </table>
                 <div class="cart-content-right-text">
                   
                    
                        @if(Cart::priceTotal(0,',','.') > 2)
                            <p style="color:red">Đơn hàng của bạn đã được freeship</p>
                            
                        @else
                            <p style="color:red">Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p>
                        @endif
                   
                 </div>
                 <div class="cart-content-right-button">
                    <a href="{{route('home.index')}}"><button style="">TIẾP TỤC MUA SẮM</button></a> 
                     <a href="{{route('pay.deliveryCart')}}"><button>THANH TOÁN</button></a>
                 </div>
                    @if (session('username'))
                        <div class="cart-content-right-dangnhap">
                            <p></p> <br>
                            <p></p>
                        </div>
                    @else
                        <div class="cart-content-right-dangnhap">
                            <p>TÀI KHOẢN</p> <br>
                            <p>Hãy <a href="{{route('login-user.login')}}">Đăng nhập</a> tài khoản của bạn để thanh toán đơn hàng</p>
                        </div>
                    @endif
            </div>
         </div>
     </div>
 </section>
 <script type="text/javascript">


</script>
@endsection