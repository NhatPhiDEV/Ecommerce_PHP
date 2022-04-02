

@extends('admin.layoutsadmin')
@section('detail')
@foreach($dataUsers as $dataUser )
<div class="card-body" >
@if (Session::get('In đơn hàng') == "In đơn hàng") 
    <div style ="float:right"><a target ="_blank" href="{{ route('print-bill.billPDF',$dataUser->BillID)}}"><img width ="50" src="{{asset('/icon/pdf.png')}}" alt=""></a></div>
@endif
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
                 <p style="font-weight: bold;">Địa chỉ giao hàng :&ensp;</p>
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
@endsection



