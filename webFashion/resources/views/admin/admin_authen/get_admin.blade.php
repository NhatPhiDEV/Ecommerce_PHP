
@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">
<div style="margin-left: 10px;">
    <a href="" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm mới</a>
</div>
<table class='table table-striped' id="table1">
<thead>
        <tr>
            <th style="text-align:center;" >STT</th>
            <th style="text-align:center;">Tên admin</th>
            <th style="text-align:center;">Tài khoản</th>
            <th style="text-align:center;">Mật khẩu</th>
            <th style="text-align:center;">Trạng thái</th>
            <th style="text-align:center;"></th>
            <th style="text-align:center;"></th>
        </tr>
    </thead>
    <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach($admins as $admin )    
        @php
            $i++
        @endphp                                              
            <tr>
                <td style="text-align:center;">{{$i}}</td>
                <td style="text-align:center;">{{$admin->FullName}}</td>   
                <td style="text-align:center;">{{$admin->UserName}}</td>   
                <td style="text-align:center;">{{$admin->Password}}</td>
                <td style="text-align:center;">{{$admin->Status}}</td>                 
                <td style="text-align:center;"></td>
                <td style="text-align:center;"></td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@include('admin.admin_authen.add_admin')
@endsection