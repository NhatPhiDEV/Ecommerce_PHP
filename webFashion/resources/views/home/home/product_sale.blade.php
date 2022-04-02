@extends('home.layoutshome')
@section('home')
    <!-- --------------------------Cartegory -->
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>⟶	</span> <p>Sale {{$taglink}} %</p> 
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
                        <li class="cartegory-left-li"><a style="text-decoration:none" href="#">SẢN PHẨM MỚI</a>
                        @foreach($productnew as $productnews)
                            <li>
                                <div style="display:flex;">
                                    <img style="width:30px" src="{{asset('/uploads/'.$productnews->ProductImage)}}" alt="{{Str::slug($productnews->ProductName)}}" alt="">
                                    <a style="text-decoration:none; color:black;font-size:12px" href="{{route('product-detalis.show',[$productnews->ProductID])}}"><p style="margin-left:5px;margin-top:7px;width:130px;word-wrap: break-word;">
                                   {{$productnews->ProductName}}
                                  </p></a>
                                   
                                </div> 
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="cartegory-right row">
                <div class="cartegory-right-top-item" style="margin-top:5px" >
                    <form method="POST"  action="{{route('search-price.searchPrice',$ids)}}" data-url="" role="form">
                      @csrf
                        <div style="display:flex ">
                            <label style="margin-top:6px" for="">Giá:&nbsp;</label>
                            <input name ="dateto"  style="width:120px;font-weight:100;font-size:14px " type="number" min="1" placeholder="Giá từ....." required>
                            <lable>_ </lable>
                            <input name="datefrom" style="width:120px;margin-right:5px;font-weight:100;font-size:14px" min="1" type="number" placeholder="Giá đến..." required>
                            <input style="font-weight:100" class ="btn btn-secondary"  type="submit" value="Áp dụng">
                        </div>
                    </form>    
                    </div>
                    <div style="display:flex;" class="cartegory-right-top-item">
                        <a style="color:black" href="{{route('popular-product.popularPro',$ids)}}"><button>Sắp xếp Phổ biến &#9829;	</button></a>
                    </div>
                    <div style="display:flex;boder:none" class="cartegory-right-top-item">
                        <a style="color:black" href="{{route('high-price.highPrice',$ids)}}"><button>Sắp xếp giá cao &uarr;</button></a>
                    </div>
                    <div class="cartegory-right-top-item" style="display:flex">
                        <a style="color:black" href="{{route('low-price.lowPrice',$ids)}}" ><button style="boder:none">Sắp xếp giá thấp &#8595;</button></a>
                     </div>
                     <div class="cartegory-right-content row">
                         @foreach($products  as $product)
                            <div class="cartegory-right-content-item">
                                <a href="{{route('product-detalis.show',[$product->ProductID])}}">
                                    <img src="{{asset('/uploads/'.$product->ProductImage)}}" alt="{{Str::slug($product->ProductName)}}">
                                    <h1>{{$product->ProductName}}</h1>
                                </a>                            
                                <p>{{number_format($product['ProductPrice'],0,',','.')}}&#160;<sup>vnđ</sup></p>  
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
    