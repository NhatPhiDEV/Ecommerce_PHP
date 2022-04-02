@extends('admin.layoutsadmin')
@section('admin')
<div class="modal-content">
    <form autocomplete="off" action="{{route('product.update',[$product->ProductID])}}"   method="POST" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal-header">
            <h4 style="display:flex" class="modal-title">Sửa thông tin sản phẩm -> <p style="color:#dbd7d7"> &ensp;{{$product->ProductName}}</p></h4>
            <a href="{{route('product.index')}}" type="button" class="close" data-dismiss="modal" aria-hidden="true">Đóng</a>
        </div>
        <div class="modal-body" style="display:flex;">
            <div class="form-group" style="width:80%" >

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 50px;">Tên</p>
                    <input value="{{$product->ProductName}}" id="test" name="name" type="text" class="form-control"  placeholder="Tên sản phẩm....." required >
                </div>
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 53px;">Vốn</p>
                    <input value="{{$product->DefaultPrice}}" name="pricedeafa" type="number" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Giá....." required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">VNĐ</span>
                    </div>
                </div>
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 53px;">Bán</p>
                    <input value="{{$product->ProductPrice}}" name="price" type="number" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Giá....." required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">VNĐ</span>
                    </div>
                </div>

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 45px;">Loại</p>
                    <select name="type" id="selecttype" class="form-select" aria-label="Default select example">
                        @foreach ($types as $key => $type)	
                            <option {{ $type->Type == $product->Type ? 'selected' : ''}} value="{{$type->Type}}">{{$type->TypeName}}</option>
                        @endforeach															
                    </select>
                </div>						
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 43px;">Size:</p>
                    <select name ="size" id="selectsize" class="form-select" aria-label="Default select example">
                    @foreach ($sizes as $key => $size)	
                            <option {{ $size->Size == $product->Size ? 'selected' : ''}} value="{{$size->Size}}">{{$size->SizeName}}</option>
                        @endforeach																	
                    </select>
                </div>	

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: -5px;">Thương hiệu:</p>
                    <select name="brand" id="selectbrand" class="form-select" aria-label="Default select example">
                    @foreach ($brands as $key => $brand)	
                            <option {{ $brand->Brand == $product->Brand ? 'selected' : ''}} value="{{$brand->Brand}}">{{$brand->BrandName}}</option>
                    @endforeach		
                    </select>
                </div>
                
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 44px;">Sale</p>
                    <select name ="sale" id="selectsale" class="form-select" aria-label="Default select example">
                    @foreach ($sales as $key => $sale)	
                            <option {{ $sale->Sale == $product->Sale ? 'selected' : ''}} value="{{$sale->Sale}}">{{$sale->SaleName}}  %</option>
                    @endforeach	
                    </select>
                </div>

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 54px;">SL</p>
                    <input value="{{$product->ProductCount}}" min="0" oninput="validity.valid||(value='');"  name="count" type="number" class="form-control" required  placeholder="Số lượng.....">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Cái</span>
                    </div>
                </div>
            </div>

            <div>
                <div style="display:flex;margin-top: 10px;">
                    <p style="text-align: right;margin:0px 10px 0px 30px">Chọn ảnh:</p>
                    <input type="file" name="ImageUpload" onchange="ShowImagePreview(this, document.getElementById('previewImage'))" />
                </div>							
                    <div style="display: block; margin-left: 72px;">
                        <img  src="{{asset('/uploads/'.$product->ProductImage)}}" style="width: 70%; margin: 10px 0px 0px 2px;" id="previewImage" />
                    </div>                        
                </div>
            </div>

        <div style="display:flex;margin:0px 33px">
            <p style="margin-right: 32px;">Mô tả:</p>
            <div class="form-group">
                <textarea name="note"  id="ckeditor_desc"   style="overflow:auto;resize: none"  rows="0" class="form-control"   placeholder="Mô tả sản phẩm...">{{$product->Note}}</textarea>
            </div>
        </div>	
        <div class="modal-footer">
         
            <button style="margin:20px 50px 20px 0" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
@endsection