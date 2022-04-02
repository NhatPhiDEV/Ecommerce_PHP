@extends('home.layoutshome')
@section('home')
    <!-- --------------------------Cartegory -->
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>⟶	</span> <p>Nữ</p> <span>⟶</span> <p>Sản phẩm tìm kiếm</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                    <ul>                      
                        <li class="cartegory-left-li "><a href="#">THƯƠNG HIỆU</a>
                            <ul>
                                @foreach($brands as $brand)                      
                                    <li><a href="{{route('brand.show',[$brand->Brand])}}">{{strtoupper($brand->BrandName)}}</a></li>                                       
                                @endforeach
                            </ul>
                        </li>

                        <li class="cartegory-left-li"><a href="#">KHUYẾN MÃI</a>
                            <ul>
                            @foreach($sales as $sale)                      
                                    <li><a href="{{route('sale.show',[$sale->Sale])}}">SALE {{strtoupper($sale->SaleName)}} %</a></li>                                       
                                @endforeach
                            </ul>
                        </li>
                       
                        <!-- <li class="cartegory-left-li"><a href="">TRE EM</a></li>
                        <li class="cartegory-left-li"><a href="">BỘ SƯU TẬP</a></li>
                        <li class="cartegory-left-li"><a href="">ĐỒ BẢO HỘ</a></li> -->
                    </ul>
                    
                    <div >
                        <ul>
                        <li class="cartegory-left-li"><a style="font-weight:100;text-decoration:none" href="#">Sản phẩm mới</a>
                        @foreach($productnew as $productnews)
                            <li>
                                <div style="display:flex;">
                                    <img style="width:30px" src="{{asset('/uploads/'.$productnews->ProductImage)}}" alt="{{Str::slug($productnews->ProductName)}}" alt="">
                                    <a href="{{route('product-detalis.show',[$productnews->ProductID])}}"><p style="margin-left:5px;margin-top:7px;width:130px;word-wrap: break-word;">
                                    <?php 
                                        $a = ucfirst(mb_strtolower($productnews->ProductName,'UTF-8'));
                                        echo $a;
                                    ?></p></a>
                                   
                                </div> 
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="cartegory-right row">
                   <div>
                       <p>Sản phẩm tìm kiếm</p>
                   </div>
                     <div class="cartegory-right-content row">
                   

                         @foreach($products  as $product)
                                <div class="cartegory-right-content-item">
                                    <a style="text-decoration-line:none;" href="{{route('product-detalis.show',[$product->ProductID])}}">
                                        <img src="{{asset('/uploads/'.$product->ProductImage)}}" alt="{{Str::slug($product->ProductName)}}">
                                        <h1 style="font-weight: bold;font-size: 12px;">{{$product->ProductName}}</h1>
                                    </a>      
                                    <?php 
                                        $price = $product->ProductPrice;
                                        $sale = $product->product_Sale->SaleName;
                                        $price_sale =$price -( $price*($sale/100))
                                    ?>                      
                                <p style="font-size: 15px;">{{number_format($price_sale,0,',','.')}}&#160;<span style="font-size: 11px;font-weight: 100;font-style: italic;">-{{$product->product_Sale->SaleName}}%</span></p>
                                </div>
                            @endforeach
                    </div>
                   <div class="cartegory-right-bottom row">
                       <div class="cartegory-right-bottom-items">
                           <p>Hiện thị 2 <span>|</span> 4 sản phẩm</p>
                       </div>
                       <div class="cartegory-right-bottom-items">
                            <div>
                                {{$products->links()}}
                            </div>
                        </div>
                   </div> 
                </div>
                
            </div>
        </div>
    </section>
    @endsection
    