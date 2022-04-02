
@extends('home.layoutshome')
@section('home')

    <!-- --------------------------Product-------------------------------- -->
    <form action="{{route('cart.addCart')}}" method="POST" >
    {{ csrf_field() }}
        <input name="productId" type="hidden" value="{{$product_details->ProductID}}" class="cart_product_id">
        <input type="hidden" value="{{$product_details->ProductName}}" class="cart_product_name">
        <input type="hidden" value="{{$product_details->ProductImage}}" class="cart_product_image">
        <input type="hidden" value="{{$product_details->ProductPrice}}" class="cart_product_price">
        <input type="hidden" value="1" class="cart_product_count">
    <section class="product">
        <div class="container">
            <div class="product-top row">
                <p>Trang chủ</p> <span>⟶	</span> <p><a style="color:black" href="{{route('home.show',$taglinkid)}}">{{$taglink}}</a></p> <span>⟶</span><p>{{$product_details->ProductName}}</p>
            </div>
            <div class="product-content row">
              
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="{{asset('/uploads/'.$product_details->ProductImage)}}" alt="{{Str::slug($product_details->ProductName)}}">
                    </div>
                    <div class="product-content-left-small-img">
                        <img style="margin-bottom: 5px;" src="{{asset('/uploads/'.$product_details->ProductImage)}}" alt="{{Str::slug($product_details->ProductName)}}">
                        <img style="margin-bottom: 5px;" src="{{asset('/uploads/'.$product_details->ProductImage)}}" alt="{{Str::slug($product_details->ProductName)}}">
                        <img style="margin-bottom: 5px;" src="{{asset('/uploads/'.$product_details->ProductImage)}}" alt="{{Str::slug($product_details->ProductName)}}">
                        <img  src="{{asset('/uploads/'.$product_details->ProductImage)}}" alt="{{Str::slug($product_details->ProductName)}}">
                    </div>
                </div>
                <div class="product-content-right" style="margin-left: 25px;">
                    <div class="product-content-right-product-name">
                        <div style= "display:flex">
                        <h1 style="font-weight: bold;">{{$product_details->ProductName}} MS {{$product_details->ProductID}}538</h1><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="20px" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                        </div>
                        
                        <p>MSP: {{$product_details->ProductID}}E098</p>
                    </div>
                    <div class="product-content-right-product-price">
                            <?php 
                                $prices = $product_details->ProductPrice;
                                $sales = $product_details->product_Sale->SaleName;
                                $price_sales =$prices -( $prices*($sales/100))
                            ?>
                        <p >{{number_format($price_sales,0,',','.')}}&#160;<sup style="font-size: 15px;font-weight: 100;">vnđ</sup><span style="font-size: 15px;font-weight: 100;font-style: italic;">-{{$product_details->product_Sale->SaleName}}%</span></p>
                    </div>
                    <div class="product-content-right-product-color">
                        <p><span style="font-weight: bold;">Thương hiệu</span>:&ensp;{{$product_details->product_Brand->BrandName}}</p>
                        <p>&ensp;</span></p>                        
                        <p><span style="font-weight: bold;">Màu sắc</span>:&ensp;Xanh Cổ Vịt Nhạt <span style="color: red;">*</span></p>
                        <!-- <div class="product-content-right-product-color-img">
                            <img src="image/spcolor.png" alt="">
                        </div> -->
                    </div>
                    <div style="display: inline-flex"class="product-content-right-product-size">
                        <p style="font-weight: bold;">Kích thước:&ensp;</p>
                        <div class="quantity">
                            <span>{{$product_details->product_Size->SizeName}}</span>
                        </div>
                    </div>
                    <div class="quantity">
                        <p style="font-weight: bold;">Số lượng:&ensp;</p>
                        <input name="counts" type="number" min="1" value="1"> 
                    </div>
                    
                    <div class="product-content-right-product-button">
                      
                        <button type="submit" class="add-cart-product" data-id="{{$product_details->ProductID}}"><i class="fas fa-shopping-cart"></i> <p>MUA HÀNG</p></button>
                        <button><p>TÌM TẠI CỬA HÀNG</p></button>
                    </div>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-phone-alt"></i> <p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-comments"></i> <p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-envelope"></i><p>Mail</p>
                        </div>
                    </div>
                    <div class="product-content-right-product-QR"  >
                        <p style="font-weight: bold;">Đánh giá sao</p>
                        <ul class="list-inline" style="margin-left:10px">
                            @for($i = 1; $i<=5; $i++)
                            <?php 
                                if($i <= $rating){
                                    $co = "color:#ffcc00;";
                                }else{
                                    $co = "color:#ccc;";
                                }                          
                            ?>
                            <li title="đánh giá sao" id="{{$product_details->ProductID}}-{{$i}}" data-index ="{{$i}}" data-product_id="{{$product_details->ProductID}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$co}} font-size:30px">&#9733;</li>
                        @endfor
                        </ul>
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                        &#8744;
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                        <p style="font-weight: bold;">Chi tiết sản phẩm</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan">
                                        <p style="font-weight: bold;">Bình luận sản phẩm</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                   {!!$product_details->Note!!}
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                @foreach ($comment as $comments)
                                    <div style="display:flex">
                                        <div style="text-align:center;">                                                                        
                                            <img src="{{asset('/icon/discount.jpg')}}" width="50px" alt="">
                                            <p style="font-weight:bold">{{$comments->rating_customer->CustomerName}}</p>
                                        </div>
                                        <div style="margin-left:10px">
                                            <ul class="list-inline" style="margin-left:10px">
                                                @for($i = 1; $i <= $comments->Rate; $i++)
                                                    <?php 
                                                        if($i <= $comments->Rate){
                                                            $co = "color:#ffcc00;";
                                                        }else{
                                                            $co = "color:#ccc;";
                                                        }                          
                                                    ?>
                                                <li title="đánh giá sao" id="{{$product_details->ProductID}}-{{$i}}" data-index ="{{$i}}" data-product_id="{{$product_details->ProductID}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$co}} font-size:15px;border:1px solid">&#9733;</li>
                                                @endfor
        
                                                <span>
                                                    <?php 
                                                        if ($comments->Rate == 1 || $comments->Rate == 2)
                                                        {
                                                            echo "Không hài lòng";
                                                        } else if ($comments->Rate == 3 || $comments->Rate == 4){
                                                                echo "Hài lòng";
                                                        } else {
                                                            echo "Cực kỳ hài lòng";
                                                        }
                                                    ?>
                                                </span>
                                            </ul>
                                            <p style="color:#30ad1f;"><span>&#10004; </span>Đã mua hàng</p>
                                            <p>{{$comments->Comment}}</p>
                                        </div>
                                    </div>
                                <hr>
                                @endforeach
                                </div>
                               
                            </div>
                        
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
       
    </section>
    
    </form>
    
    <!-- "product-related"------------------- -->
    <section class="product-related container">
        <div class="product-related-title">
            <p>SẢN PHẨM LIÊN QUAN</p>
        </div>
       
        <div class=" row product-content">
            @foreach ($product_relates as $product_relate)
                <div class="product-related-item">
                    <a href="{{route('product-detalis.show',[$product_relate->ProductID])}}">
                        <img src="{{asset('/uploads/'.$product_relate->ProductImage)}}" alt="{{Str::slug($product_relate->ProductName)}}">    
                        <h1 style = "font-weight:bold">{{$product_relate->ProductName}}</h1>
                        <div>
                        @if($product_details->product_Sale->SaleName != 0)
                            <p>Giá:&ensp;{{number_format($product_relate['ProductPrice'],0,',','.')}}<sup style="text-decoration-line:none">&ensp;-{{$product_details->product_Sale->SaleName}} %</sup></p>
                        
                        @endif
                        </div>                 
                        <div >
                            <?php 
                                $price = $product_relate->ProductPrice;
                                $sale = $product_details->product_Sale->SaleName;
                                $price_sale =$price -( $price*($sale/100))
                            ?>
                            <p style="text-decoration:none;font-weight:bold;color:black"><span>
                                <?php 
                                    if($product_details->product_Sale->SaleName != 0){
                                        echo "Còn:";
                                    }else
                                        echo "Giá:";
                                ?>

                            </span>&ensp;{{number_format($price_sale,0,',','.')}}<sup>&ensp;vnđ</sup></p>
                        </div>
                        
                    </a>
                </div>
            @endforeach 
        </div>
    </section>


    @endsection
 
    