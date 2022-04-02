@extends('admin.layoutsadmin')
@section('admin')
<div class="modal-content">
    <form autocomplete="off" action="{{route('details-new.update',[$details->ID])}}"   method="POST" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal-header">
            <h4 style="display:flex" class="modal-title">Sửa thông tin tin tức</h4>
            <a href="{{route('details-new.index')}}" type="button" class="close" data-dismiss="modal" aria-hidden="true">Đóng</a>
        </div>
        <div class="modal-body" style="display:flex;">
            <div class="form-group" style="width:80%" >

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 50px;">Tên</p>
                    <input value="{{$details->DetailsTittle}}" id="test" name="tittle" type="text" class="form-control"  >
                </div>
            
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 45px;">Loại</p>
                    <select name="type" id="selecttype" class="form-select" aria-label="Default select example">
                        @foreach ($news as $key => $new)	
                            <option {{ $new -> NewsID == $details-> NewsID ? 'selected' : ''}} value="{{$new->NewsID}}">{{$new->TittleNews}}</option>
                        @endforeach															
                    </select>
                </div>	
            <div style="display:flex;margin:20px 0px 0px 0px">
                <p style="margin-right: 32px;">Mô tả:</p>
                <div class="form-group">
                    <textarea name="description"  id="ckeditor_desc"   style="overflow:auto;resize: none"  rows="0" class="form-control"  >{{$details->Description}}</textarea>
                </div>
            </div>  
        </div>

            <div>
                <div style="display:flex;margin-top: 10px;">
                    <p style="text-align: right;margin:0px 10px 0px 30px">Chọn ảnh:</p>
                    <input type="file" name="ImageUpload" onchange="ShowImagePreview(this, document.getElementById('previewImage'))" />
                </div>							
                    <div style="display: block; margin-left: 72px;">
                        <img  src="{{asset('/uploads/'.$details->DetailsImage)}}" style="width: 70%; margin: 10px 0px 0px 2px;" id="previewImage" />
                    </div>                        
                </div>
            </div>

       	
        <div class="modal-footer">
         
            <button style="margin:20px 50px 20px 0" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
@endsection