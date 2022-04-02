
@extends('admin.layoutsadmin')
@section('admin')

@csrf
<div class="card-body" id="table_load">

<table class='table table-striped' id="table1">
@if (Session::get('Thêm, xóa, Sửa danh mục sản phẩm') == "Thêm, xóa, Sửa danh mục sản phẩm")
    <div style="margin-left: 10px;">
        <a href="" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm mới</a>
    </div>
@endif
<thead style="text-align">
        <tr style="text-align:center;">
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;">Tên loại</th>
            <th>Trạng thái</th>
            @if (Session::get('Thêm, xóa, Sửa danh mục sản phẩm') == "Thêm, xóa, Sửa danh mục sản phẩm")
            <th style="text-align:center;"> Quản lý</th>  
            @endif          
        </tr>
    </thead>
    <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach($type as $types )
    @csrf     
    @php
        $i++
    @endphp                                   
        <tr style="text-align:center;">
            <td>{{$i}}</td>
            <td>{{$types->TypeName}}</td>
            @if (Session::get('Thêm, xóa, Sửa danh mục sản phẩm') == "Thêm, xóa, Sửa danh mục sản phẩm")   

            <td>
            @if($types->Status == 1)
                    <button name="changestatustp" style="border:none; background: transparent; margin-left:10px;" data-url="{{route('product-type.staType',[$types->Type])}}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/eye.png')}}" alt=""></button>
            @else
                    <button name="changestatustp" style="border:none; background: transparent; margin-left:10px;" data-url="{{route('product-type.staType',[$types->Type])}}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/visibility-off.png')}}" alt=""></button>

            @endif
            </td>
            <td>  
          
                <a href="{{route('product-type.show',[$types->Type])}}" ><img style="width:23px" src="{{asset('/icon/pencil.png')}}" alt=""></a>
                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('product-type.destroy',[$types->Type]) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
			@endif
            </td>                                    
        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>
<script type="text/javascript">

$(document).on('click', "button[name='changestatustp']", function () {
        var url = $(this).attr('data-url');

            $.ajax({
                method: 'POST',
                url: url,
                data: { _token: '{{csrf_token()}}' },
                success: function(response) {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
    })
</script>
@include('admin.productType.add_Type')
@endsection