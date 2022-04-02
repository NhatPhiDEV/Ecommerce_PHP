
@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">
<form action="{{route('export-bill-waiting.export_Bill_Waiting')}}" method="POST">
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

            <th></th>
        
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
            @if (Session::get('Chỉnh sửa đơn hàng') == "Chỉnh sửa đơn hàng") 
                <button name="changestatus" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('status.statusBill',[$bill->BillID])}}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/stopwatch.png')}}" alt=""></button>
            @endif 
            @if (Session::get('Hủy đơn hàng') == "Hủy đơn hàng")    
                <button name="changestatus-cancel" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('status-sc.statusBillsc',[$bill->BillID])}}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancels.png')}}" alt=""></button>
            @endif 
            </td>
           
            <td>
           
                <a href="{{ route('details-bill.detailBill',$bill->BillID)}}"><img style="width:23px" src="{{asset('/icon/file.png')}}" alt=""></a>
             
            </td>
       
                       
        </tr>
        @endforeach
    </tbody>
</table>
</div>

 <script type="text/javascript">

$(document).on('click', "button[name='changestatus']", function () {
        var url = $(this).attr('data-url');
        if (confirm('Chuyển sang trang thái đang giao hàng')) {
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
        }
        
    })

    $(document).on('click', "button[name='changestatus-cancel']", function () {
        var url = $(this).attr('data-url');
        if (confirm('Hủy đơn hàng')) {
            $.ajax({
                method: 'POST',
                url: url,
                data: { _token: '{{csrf_token()}}' },
                success: function(response) {
                  alert(response.data);
                    location.reload();                       
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        }
        
    })


</script>
@endsection