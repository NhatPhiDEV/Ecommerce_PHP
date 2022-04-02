@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">

<table class='table table-striped' id="table1">

<div style="margin-left: 10px;">
<button data-url="" id="btn-addproduct" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">+Thêm mới</button>
</div>

<thead style="text-align">
        <tr>
            <th style="text-align:center;" ></th>
            <th style="text-align:center;" >Tên sile</th>
            <th style="text-align:center;">Ảnh</th>


            <th style="text-align:center;"></th>
            <th style="text-align:center;"></th>
        </tr>
    </thead>
    <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach($slides as $slide )
    @csrf
    @php
        $i++
        @endphp
        <tr style="text-align">
            <td style="text-align:center;">{{$i}}</td>
            <td style="text-align:center;">{{$slide->SlideName}}</td>
            <td style="text-align:center;"><img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 60px;" src="{{asset('/uploads/'.$slide->SlideImage)}}" alt="dmm"></td>


            <td style="text-align:center;">

            </td> 
            <td>
            @if (Session::get('Chỉnh sửa thông tin sản phẩm') == "Chỉnh sửa thông tin sản phẩm") 
                <a href="{{route('slide.show',[$slide->ID])}}" ><img style="width:23px" src="{{asset('/icon/pencil.png')}}" alt=""></a>
            @endif
            @if (Session::get('Xóa sản phẩm') == "Xóa sản phẩm") 
                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('slide.destroy',[$slide->ID]) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
            @endif
            </td> 

        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>

@include('admin.slide.add_Slide')
@endsection
