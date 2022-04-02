
@extends('admin.layoutsadmin')
@section('admin')
@csrf
<div class="card-body" id="table_load">

<table class='table table-striped' id="table1">
@if (Session::get('Thêm, xóa, mã giảm giá cho khách hàng') == "Thêm, xóa, mã giảm giá cho khách hàng")
<div style="margin-left: 10px;">
    <button data-url="{{ route('details-new.create')}}" id="btn-addproduct-news" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">+Thêm mới</button>
</div>
@endif
<thead style="text-align">
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;">Tên tiêu đề</th>
            <th style="text-align:center;">Ảnh tin</th>
            <th style="text-align:center;">Mô tả</th> 
        </tr>
    </thead>
    <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach($details as $detail )
    @csrf     
    @php
        $i++
    @endphp                                   
        <tr style="text-align:center;">
            <td>{{$i}}</td>
            <td>{{$detail->DetailsTittle}}</td>
            <td><img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 100px;" src="{{asset('/uploads/'.$detail->DetailsImage)}}" alt="dmm"></td>
            <td style="text-align:left;"> <p style="text-overflow: ellipsis;">{!!substr("$detail->Description",0,150)!!}...</p></td>
            <td>     
                <a href="{{route('details-new.show',$detail->ID)}}" ><img style="width:23px" src="{{asset('/icon/pencil.png')}}" alt=""></a>
                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('details-new.destroy',[$detail->ID]) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
			</td>                                    
        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>
@include('admin.details_news.add_details')
@endsection