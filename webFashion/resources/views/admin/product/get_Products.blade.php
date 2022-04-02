
@extends('admin.layoutsadmin')
@section('admin')
@if (Session::has('users'))   
       <div class="alert alert-primary" role="alert">
           <p>{{Session::get('success')}}</p>
      </div>
@endif

@csrf
<div class="card-body" id="table_load">
<table class='table table-striped' id="table1">
@if (Session::get('Thêm sản phẩm mới') == "Thêm sản phẩm mới") 
<div style="margin-left: 10px;display:flex">
    <button data-url="{{ route('product.create')}}" id="btn-addproduct" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">+Thêm mới</button>
    <form action="{{route('export-excel.export_Excel')}}" method="POST">
          @csrf
       <input style="margin-left:10px" type="submit" value="Xuất dữ liệu" name="export_csv" class="btn btn-success">
    </form>
    <form action="{{route('import-excel.import_Excel')}}" method="POST" enctype="multipart/form-data">
          @csrf  
       <input style="margin-left:10px" type="submit" value="Thêm mới dữ liệu" name="import_csv" class="btn btn-warning">
       <input style="margin-left:10px;margin-top:5px" type="file" name="file" accept=".xlsx">
</form>
</div>

@endif
<thead style="text-align">
        <tr>
            <th style="text-align:center;" ></th>
            <th style="text-align:center;" >Tên sản phẩm</th>
            <th style="text-align:center;">Giá</th>
            <th style="text-align:center;">Ảnh</th>
            <th style="text-align:center;">SL</th>
            <th style="text-align:center;">Loại</th>
            <th style="text-align:center;">Thương hiệu</th>
            <th style="text-align:center;"></th>
            <th style="text-align:center;"></th>       
        </tr>
    </thead>
    <tbody>       
    @php
        $i = 0;
    @endphp 
    @foreach($products as $product )
    @csrf     
    @php
        $i++
    @endphp                          
        <tr style="text-align">
            <td style="text-align:center;">{{$i}}</td>
            <td style="text-align:center;">{{$product->ProductName}}</td>
            <td style="text-align:center;">{{$product->ProductPrice}}</td> 
            <td style="text-align:center;"><img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 60px;" src="{{asset('/uploads/'.$product->ProductImage)}}" alt="dmm"></td>            
            <td style="text-align:center;">{{$product->ProductCount}}</td>  
            <td style="text-align:center;">{{$product->product_Type->TypeName}}</td>   
            <td style="text-align: center;">{{$product->product_Brand->BrandName}}</td>
            <td style="text-align:center;">
            @if (Session::get('Ẩn sản phẩm') == "Ẩn sản phẩm") 
                @if($product->Status == 1)
                    <button name="changestatuspr" style="border:none; background: transparent; margin-left:10px;" data-url="{{route('statusproduct.staProduct',[$product->ProductID])}}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/eye.png')}}" alt=""></button>
                @else
                    <button name="changestatuspr" style="border:none; background: transparent; margin-left:10px;" data-url="{{route('statusproduct.staProduct',[$product->ProductID])}}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/visibility-off.png')}}" alt=""></button>
                @endif
            @endif
            </td> 
            <td>
            @if (Session::get('Chỉnh sửa thông tin sản phẩm') == "Chỉnh sửa thông tin sản phẩm") 
                <a href="{{route('product.show',[$product->ProductID])}}" ><img style="width:23px" src="{{asset('/icon/pencil.png')}}" alt=""></a>
            @endif
            @if (Session::get('Xóa sản phẩm') == "Xóa sản phẩm") 
                <button name="delete" style="border:none; background: transparent; margin-left:10px;" data-url="{{ route('product.destroy',[$product->ProductID]) }}"​ type="button" id="btn-delete" data-target="#delete" data-toggle="modal" ><img style="width:23px" src="{{asset('/icon/cancel.png')}}" alt=""></button>
                @endif
            </td>                                       
        </tr>
    @endforeach
    </tbody>
    </tbody>
</table>
</div>

<script type="text/javascript">

$(document).on('click', "button[name='changestatuspr']", function () {
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
@include('admin.product.add_Product')
@endsection