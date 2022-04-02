@extends('admin.layoutsadmin')
@section('admin')
<div class="modal-content">
    <form autocomplete="off" action="{{route('slide.update',[$slide->ID])}}"   method="POST" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal-header">
            <h4 style="display:flex" class="modal-title">Sửa thông tin sản phẩm -> <p style="color:#dbd7d7"> &ensp;{{$slide->SlideName}}</p></h4>
            <a href="{{route('slide.index')}}" type="button" class="close" data-dismiss="modal" aria-hidden="true">Đóng</a>
        </div>
        <div class="modal-body" style="display:flex;">
            <div class="form-group" style="width:80%" >

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 50px;">Tên</p>
                    <input value="{{$slide->SlideName}}" id="test" name="name" type="text" class="form-control"  placeholder="Tên sản phẩm....." required >
                </div>


            <div>
                <div style="display:flex;margin-top: 10px;">
                    <p style="text-align: right;margin:0px 10px 0px 30px">Chọn ảnh:</p>
                    <input type="file" name="ImageUpload" onchange="ShowImagePreview(this, document.getElementById('previewImage'))" />
                </div>
                    <div style="display: block; margin-left: 72px;">
                        <img  src="{{asset('/uploads/'.$slide->SlideImage)}}" style="width: 70%; margin: 10px 0px 0px 2px;" id="previewImage" />
                    </div>
                </div>
            </div>


        <div class="modal-footer">

            <button style="margin:20px 50px 20px 0" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
@endsection