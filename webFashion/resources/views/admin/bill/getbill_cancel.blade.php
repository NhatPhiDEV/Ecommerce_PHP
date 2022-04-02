
@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">
<form action="{{route('export-bill-cancel.export_Bill_Cancel')}}" method="POST">
          @csrf
       <input type="submit" value="Xuất dữ liệu" name="export_csv" class="btn btn-success">
</form>
    
<table class='table table-striped' id="table1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Người đặt</th>
            <th>Tổng đơn hàng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill )                                       
        <tr>
            <td></td>
            <td>{{$bill->BillID}}</td>
            <td>{{$bill->DateCreated}}</td>
            <td>{{$bill->ReceiverName}}</a></td>
            <td>{{$bill->TotalMoney}}</a></td>   
            <td>
                <a href="{{ route('details-bill.detailBill',$bill->BillID)}}"><img style="width:23px" src="{{asset('/icon/file.png')}}" alt=""></a>
                
            </td>
                                    
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection