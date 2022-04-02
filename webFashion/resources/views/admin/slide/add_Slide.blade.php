<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form autocomplete="off" action="" data-url="{{ route('slide.store') }}" id="form-add" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Slide mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="display:flex;">
                    <div class="form-group" style="width:80%" >

                        <div style="display:flex;margin-top: 10px;">
                            <p style="">Tên slide</p>
                            <input id="test" name="name" type="text" class="form-control"  placeholder="Tên slide....." required >
                        </div>

                    <div>
                        <div style="display:flex;margin-top: 10px;">
                            <p style="text-align: right;margin:0px 10px 0px 10px">Chọn ảnh:</p>
                            <input type="file" name="ImageUpload" onchange="ShowImagePreview(this, document.getElementById('previewImage'))" />
                        </div>
                        <div style="display: block; margin-left: 72px;">
                            <img  src="{{asset('icon/empty.png')}}" style="width: 75%; margin: 10px 0px 0px 2px;" id="previewImage" />
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
