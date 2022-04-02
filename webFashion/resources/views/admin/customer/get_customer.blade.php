
@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">
<table class='table table-striped' id="table1">
<thead>
        <tr>
            <th>STT</th>
            <th>Họ Tên</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Tài khoản</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customer as $customers )                                       
        <tr>
            <td>{{$customers->CustomerID}}</td>
            <td>{{$customers->CustomerName}}</td>
            <td>{{$customers->CustomerSex}}</a></td>
            <td>{{$customers->CustomerAdress}}</a></td>
            <td>{{$customers->CustomerEmail}}</td>
            <td>{{$customers->CustomerPhone}}</td>
            <td>{{$customers->UserName}}</td>                                  
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection