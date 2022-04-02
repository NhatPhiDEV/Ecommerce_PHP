
@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">

<table class='table table-striped' id="table1">
<thead>
        <tr>
            <th style="text-align:center;" >STT</th>
            <th style="text-align:center;">Tên admin</th>
            <th style="text-align:center;">Tài khoản</th>
            <th style="text-align:center;">Mật khẩu</th>
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
            @if ($admin->id != 13) 
                <tr>
                <td style="text-align:center;">{{$i}}</td>
                <td style="text-align:center;">{{$admin->FullName}}</td>   
                <td style="text-align:center;">{{$admin->UserName}}</td>   
                <td style="text-align:center;">{{$admin->Password}}</td>                
                <td style="text-align:center;">
                    <a href="{{ route('get-role.getRole',$admin->id)}}">Add role</a>
                </td>
                <td style="text-align:center;"></td>
            </tr>
             @endif                                        
            
        @endforeach
    </tbody>
</table>
</div>

@endsection



 