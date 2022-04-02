

@extends('admin.layoutsadmin')
@section('detail')

<div class="card-body" id="table_load">
<div style="text-align:left"><a href="{{route('details-discount.index')}}" style="font-weight: bold;">Trở về</a> </div> 
    <table class='table table-striped' id="table1">
        <thead>
        <tr><div style="text-align:center;"><h4 style="font-weight: bold;">Danh sách khách hàng</h4> </div> </tr>
            <tr>
                <th style="text-align:center;" scope="col">STT</th>
                <th style="text-align:center;" scope="col">Tài khoản</th>
                <th style="text-align:center;" scope="col">Tên khách hàng</th>
                <th style="text-align:center;" scope="col">Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 0;
            $count = 0;
        @endphp 
            @foreach($discounts as $discount ) 
                @php
                    $i++
                @endphp    
                <tr>
                    <th style="text-align:center;" scope="row">{{$i}}</th>
                    <td style="text-align:center;">{{$discount->customer_discount->UserName}}</td>
                    <td style="text-align:center;">{{$discount->customer_discount->CustomerName}}</td>
                    <td style="text-align:center;">
                    <?php 
                        if ($discount->Status == 1){
                            echo "Chưa sử dụng";
                        }else
                            echo "Đã sử dụng";
                    ?>
                    </td>
                    <td>
                        <?php 
                            $status = $discount->Status; 
                        ?>
                        @if (Session::get('Thêm, xóa, mã giảm giá cho khách hàng') == "Thêm, xóa, mã giảm giá cho khách hàng")
                            @if($status == 1)
                                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('details-discount.destroy',$discount->ID) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
                            @endif
                        @endif
                    </td>
                </tr>
                
                
            @endforeach
               
                   
        </tbody>
    </table>
</div>
@endsection



