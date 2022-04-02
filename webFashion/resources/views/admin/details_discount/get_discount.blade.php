
@extends('admin.layoutsadmin')
@section('admin')
@csrf
<div class="card-body" id="table_load">
<table class='table table-striped' id="table1">
@if (Session::get('Thêm, xóa, mã giảm giá cho khách hàng') == "Thêm, xóa, mã giảm giá cho khách hàng")
<div style="margin-left: 10px;">
    <button data-url="{{ route('details-discount.create')}}" id="btn-addproduct-discount" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">+Thêm mới</button>
</div>
@endif
</div>
<thead style="text-align">
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;"> Mã giảm giá</th>
            <th style="text-align:center;">Tên mã giảm giá</th>
            <th style="text-align:center;">Hạn sử dụng</th>

        </tr>
    </thead>
    <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach($discounts as $discount )
    @csrf     
    @php
        $i++
    @endphp                                   
        <tr style="text-align:center;">
            <td>{{$i}}</td>
            <td>{{$discount->discountCode}}</td>
            <td>{{$discount->discountName}}</td>
            <td>{{$discount->discountExpiry}}</td>
            <td>
             @if (Session::get('Thêm, xóa, mã giảm giá cho khách hàng') == "Thêm, xóa, mã giảm giá cho khách hàng")     
                <a href="{{ route('details-discount.show',$discount->discountID) }}" ><img style="width:23px" src="{{asset('/icon/binoculars.png')}}" alt=""></a>
            @endif 
			</td>                                    
        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>
@include('admin.details_discount.add_discount')
@endsection