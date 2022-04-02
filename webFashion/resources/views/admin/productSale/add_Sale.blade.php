<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" autocomplete="off" action="" data-url="{{ route('product-sale.store') }}" id="form-add" role="form">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Thêm giá trị khuyến mãi sản phẩm</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group" style="display:flex;">
						<p style="display:inline;">Phần trăm khuyến mãi</p>
						<input name="sale" type="text" class="form-control" id="hoten-add" placeholder="Khuyến mãi.....">
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
