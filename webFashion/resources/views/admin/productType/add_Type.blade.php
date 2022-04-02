<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form autocomplete="off" action="" data-url="{{ route('product-type.store') }}" id="form-add" method="POST" role="form">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Thêm loại sản phẩm</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group" style="display:flex;">
						<p style="display:inline;">Tên loại</p>
						<input name="type" type="text" class="form-control" id="hoten-add" placeholder="Loại.....">
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
