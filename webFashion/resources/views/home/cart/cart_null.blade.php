@extends('home.layoutshome')
@section('home')
<section class="cart">
     <div class="container">
<div style="margin:110px 0px 150px 0px;">
        <img style="width:200px;margin-left: 40%;" src="{{asset('home/image/cofirmcart.png')}}" />
        <p style="margin-top:15px;margin-left: 35%;">Không có sản phẩm nào trong giỏ hàng của bạn !</p>
        <div style="margin-top:60px; padding-bottom:40px;">
            <a style="padding-top:40px;margin-left: 41%;" href="{{route('home.index')}}"><button style="background-color: rgb(253, 216, 53);color: rgb(74, 74, 74);font-weight: 500;display: inline-block;border-radius: 4px;width: 170px;height:30px;border:none" class="custom-btn btn-7"><span>Tiếp tục mua sắm</span></button></a>
        </div>
</div>
</div>
</section>
@endsection