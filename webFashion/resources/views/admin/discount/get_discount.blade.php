
@extends('admin.layoutsadmin')
@section('admin')
@csrf
<div class="card-body" id="table_load">
<table class='table table-striped' id="table1">
@if (Session::get('Thêm, xóa, Sửa mã giảm giá') == "Thêm, xóa, Sửa mã giảm giá")
<div style="margin-left: 10px;">
    <a href="" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm mới</a>
</div>
@endif
<thead style="text-align">
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;"> Mã giảm giá</th>
            <th style="text-align:center;">Tên mã giảm giá</th>
            <th style="text-align:center;">Ad cho đơn hàng</th>
            <th style="text-align:center;">Hạn sủ dụng</th>
            <th style="text-align:center;">Số lượng</th>
            <th></th>  
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
            <td>{{$discount->discountCondition}}</td>
            <td>{{$discount->discountExpiry}}</td>
            <td>{{$discount->Count}}</td>
            <td>  
            @if (Session::get('Thêm, xóa, Sửa mã giảm giá') == "Thêm, xóa, Sửa mã giảm giá")   
                <a href="{{ route('discounts.show',$discount->discountID) }}" ><img style="width:23px" src="{{asset('/icon/pencil.png')}}" alt=""></a>
                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('discounts.destroy',$discount->discountID) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
			@endif
            </td>                                    
        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>
@include('admin.discount.add_discount')
@endsection