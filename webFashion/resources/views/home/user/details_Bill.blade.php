

@extends('home.layoutshome')
@section('login')

@foreach($dataUsers as $dataUser )
<div class="container">
        <div class="info" style="padding: 80px 25px 50px 25px">
          <div class="tt">
            <p style="text-align: center; font-size: 15px; font-weight: bold; margin-bottom:20px">QUẢN LÝ ĐƠN HÀNG</p>
          </div>
          <div class="col-sm-2">
            <div class="panel panel-default">

              <div class="panel-heading">Tài khoản của tôi</div>
              <div class="panel-body">
                <a href="{{route('info-user.infoUser',$result)}}"><p style="font-size: 12px;"><span><i class="fas fa-clipboard-check"></i></span> Thông tin tài khoản</p></a>
                <a href="{{route('addr-user.addrUser', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-clipboard-check"></i></span> Địa chỉ nhận hàng</p></a>
              </div>
              <div class="panel-heading">Đơn hàng</div>
              <div class="panel-body">
              
                <a href="{{route('success-bill.successbillUser', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-clipboard-check"></i></span> Giao thành công</p></a>
                <a href="{{route('waiting-bill.waitingbillUser', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-recycle"></i></span> Đang chờ xử lý</p></a>
                <a href="{{route('transport-bill.transportbillUser', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-shipping-fast"></i></span> Đang vận chuyển</p></a>
                <a href="{{route('cancel-bill.cancelbillUser', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-ban"></i></span> Đơn hàng đã hủy </p></a>
                <a href="{{route('judge-product.judgeProduct', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-gavel"></i></span> Đánh giá sản phẩm </p></a>
              </div>
              <div class="panel-heading">Khuyến mãi</div>
              <div class="panel-body">           
                <a href="{{route('discount-user.discountUsser', $result)}}"><p style="font-size: 12px;"><span><i class="fas fa-tags"></i></span> Mã giảm giá</p></a>
              </div>
            </div>
          </div>
          <div class="col-md-10 col-sm-9 col-xs-12">
<div class="card-body" >
<div style="text-align:center"><h4 style="font-weight: bold;">Thông tin nhận hàng</h4> </div> 
    <br>
    <br>
       
    <div class="row" style="font-size: 16px">
        <div class="col" style="margin:10px 105px;">
            <div style="display:flex">
                 <p style="font-weight: bold;">Mã đơn hàng :&ensp;</p>
                 <p>{{$dataUser->BillID}}</p>
            </div>
            <div style="display:flex">
                 <p style="font-weight: bold;" >Tên khách hàng :&ensp;</p>
                 <p>{{$dataUser->ReceiverName}}</p>
            </div>
            <div style="display:flex">
                 <p style="font-weight: bold;">Ngày lập :&ensp;</p>
                 <p>{{$dataUser->DateCreated}}</p>
            </div>
            <div style="display:flex">
                 <p style="font-weight: bold;">Địa chỉ:&ensp;</p>
                 <p>{{$dataUser->ReceiverAdress}}</p>
            </div>
            <div style="display:flex">
                 <p style="font-weight: bold;">Phí vận chuyển :&ensp;</p>
                 <?php 
                    $price =  $dataUser->TotalMoney;
                    $a = rtrim($price,',');                   
                    $b = intval($a);
                 ?>
                 @if($b>2)
                    <p>Freeship</p>
                 @else
                    <p>Có phí</p>
                 @endif
            </div>
            
        </div>
        <div class="col">
            <div style="display:flex">
                    <p style="font-weight: bold;">Số điện thoại :&ensp;</p>
                    <p>{{$dataUser->ReceiverPhone}}</p>
                </div>
                <div style="display:flex">
                    <p style="font-weight: bold;">Giới tính :&ensp;</p>
                    <p>{{$dataUser->customer_bill->CustomerSex}}</p>
                </div>
                <div style="display:flex">
                    <p style="font-weight: bold;">Email :&ensp;</p>
                    <p>{{$dataUser->customer_bill->CustomerEmail}}</p>
                </div>
                <?php 
                    $discount = $dataUser->discountID;
                ?>
                @if ($discount != NULL)
                    <div style="display:flex">
                        <p style="font-weight: bold;">Mã khuyến mãi :&ensp;</p>
                        <p>{{$dataUser->discount_bill->discountCode}}</p>
                    </div>
                @endif
                
                <div style="display:flex">
                    <p style="font-weight: bold;">Tổng giá trị đơn hàng :&ensp;</p>
                    <p>{{$dataUser->TotalMoney}} <span>vnđ</span> </p>
                </div>
        </div>
  </div>
  @endforeach
    <br>
    <br>
    <br>
    <table class="table">
        <thead>
        <tr><div style="text-align:center;"><h4 style="font-weight: bold;">Danh sách chi tiết đơn hàng</h4> </div> </tr>
            <tr>
                <th style="text-align:center;" scope="col">STT</th>
                <th style="text-align:center;" scope="col">Ảnh</th>
                <th style="text-align:center;" scope="col">Tên sản phẩm</th>
                <th style="text-align:center;" scope="col">Số lượng</th>
                <th style="text-align:center;" scope="col">Giá</th>
                <th style="text-align:center;" scope="col">Thành tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 0;
            $count = 0;
        @endphp 
            @foreach($detailbills as $detailbill ) 
                @php
                    $i++
                @endphp    
                <tr>
                    <th style="text-align:center;" scope="row">{{$i}}</th>
                    <td style="text-align:center;"><img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 60px;" src="{{asset('/uploads/' .$detailbill->product_bill->ProductImage)}}" alt="dmm"></td>
                    <td style="text-align:center;">{{$detailbill->product_bill->ProductName}}</td>
                    <td style="text-align:center;">{{$detailbill->ProductCount}}</td>
                    <td style="text-align:center;">{{$detailbill->Note}}</td>
                    <td style="text-align:center;">
                        <?php 
                            echo $detailbill->ProductCount * $detailbill->Note;
                        ?>
                    </td>

                    <?php 
                        $count = $count + $detailbill->ProductCount
                    ?>
                </tr>
                
                
            @endforeach
               
                   
        </tbody>
    </table>
    <div>
        <p>Tổng số lượng sản phẩm: 
            <span> 
                <?php 
                    echo $count;
                ?>
            </span>
        </p>
    </div>
</div>

</div>
        </div>
      </div> 
@endsection



