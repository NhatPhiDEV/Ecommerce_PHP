<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<form autocomplete="off" action="" data-url="{{ route('product.store') }}" id="form-add" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Thêm sản phẩm mới</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" style="display:flex;">
					<div class="form-group" style="width:85%" >

						<div style="display:flex;margin-top: 10px;">
							<p style="">Tên sản phẩm</p>
							<input id="test" name="name" type="text" class="form-control"  placeholder="Tên sản phẩm....." required >
						</div>
						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 53px;">Vốn</p>
							<input name="pricedefaul" type="number" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Giá....." required>
							<div class="input-group-append">
                        		<span class="input-group-text" id="basic-addon2">VNĐ</span>
              				</div>
						</div>
						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 53px;">Bán</p>
							<input name="price" type="number" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Giá....." required>
							<div class="input-group-append">
                        		<span class="input-group-text" id="basic-addon2">VNĐ</span>
              				</div>
						</div>

						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 45px;">Loại</p>
							<select name="type" id="selecttype" class="form-select" aria-label="Default select example">																
							</select>
						</div>						

						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 45px;">Size:</p>
							<select name ="size" id="selectsize" class="form-select" aria-label="Default select example">																
							</select>
						</div>	

						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 8px;">Thương hiệu:</p>
							<select name="brand" id="selectbrand" class="form-select" aria-label="Default select example">
								
							</select>
						</div>
						
						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 44px;">Sale</p>
							<select name ="sale" id="selectsale" class="form-select" aria-label="Default select example">
								
							</select>
						</div>

						<div style="display:flex;margin-top: 10px;">
							<p style="margin-right: 53px;">SL</p>
							<input min="0" oninput="validity.valid||(value='');"  name="count" type="number" class="form-control" required  placeholder="Số lượng.....">
							<div class="input-group-append">
                        		<span class="input-group-text" id="basic-addon2">Cái</span>
              				</div>
						</div>
					
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

				<div style="display:flex;margin:5px 33px">
					<p style="margin-right: 32px;">Mô tả:</p>
					<div class="form-group">
						<textarea name="note"  id="ckeditor_desc"   style="overflow:auto;resize: none" rows="0" class="form-control"   placeholder="Mô tả sản phẩm..."></textarea>
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
