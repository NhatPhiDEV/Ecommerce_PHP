
@extends('admin.layoutsadmin')
@section('admin')
@csrf
<div class="card-body" id="table_load">

<table class='table table-striped' id="table1">
@if (Session::get('Thêm,xóa, Sửa tiêu đề tin tức') == "Thêm,xóa, Sửa tiêu đề tin tức") 
    <div style="margin-left: 10px;">
        <a href="" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm mới</a>
    </div>
@endif
<thead style="text-align">
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;">Tiêu đề</th>
            <th style="text-align:center;">Ảnh tin</th>
            <th style="text-align:center;">Mô tả tin tức</th>
            <th style="text-align:center;">Quản lý</th>  
        </tr>
    </thead>
    <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach($news as $new )
    @csrf     
    @php
        $i++
    @endphp                                   
        <tr style="text-align:center;">
            <td>{{$i}}</td>
            <td>{{$new->TittleNews}}</td>
            <td><img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 100px;" src="{{asset('/uploads/'.$new->NewsImage)}}" alt="dmm"></td>
            <td style="text-align:left;"> <p style="text-overflow: ellipsis;">{!!substr("$new->Description",0,150)!!}...</p></td>
            <td>  
            @if (Session::get('Thêm,xóa, Sửa tiêu đề tin tức') == "Thêm,xóa, Sửa tiêu đề tin tức")    
                <a href="{{route('news.show',$new->NewsID)}}" ><img style="width:23px" src="{{asset('/icon/pencil.png')}}" alt=""></a>
                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('news.destroy',[$new->NewsID]) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
			@endif
            </td>                                    
        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>
@include('admin.news.add_News')
@endsection