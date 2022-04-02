<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-bg modal-dialog-centered">
		<div class="modal-content">
		
				<div class="modal-header">
					<h4 class="modal-title">Thêm mã giảm giá</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="POST" autocomplete="off" action="" data-url="{{route('discounts.store')}}" id="form-add" role="form">
				@csrf 
				<div class="modal-body" style="display:flex;">
					<div class="form-group" style="width:100%" >
						<div style="margin-top: 10px;">
							<p style="">Mã giảm giá</p>
							<input  name="id" type="text" class="form-control" value = "<?php echo $disID =  substr(md5(microtime()),rand(0,25),8);?>"  >
						</div>
                        <div style="margin-top: 10px;">
							<p style="">Tên mã giảm giá</p>
							<input  name="name" type="text" class="form-control"  placeholder="Tên mã giảm giá..." required >
						</div>
                        <div style="margin-top: 10px;">
							<p style="">Số lượng mã giảm giá</p>
							<input  name="count" type="number" class="form-control"  placeholder="Số lượng mã giảm giá..." required >
						</div>
                        <div style="margin-top: 10px;">
                            <div >
                                <p style="">Tính năng: </p>
                                <div style="display:flex">
                                    <select name="feature" class="form-control" >
                                        <option value="Giảm phần trăm">Giảm phần trăm</option>
                                        <option value="Giảm tiền">Giảm tiền</option>
                                        <option value="">---</option>
                                    </select>
                                    <input  name="features" type="number" class="form-control"  placeholder="Giảm giá..." required >
                                </div>
                                
                            </div>
                        <div style="margin-top: 10px;">
							<p style="">Áp dụng cho đơn hàng từ</p>
							<input  name="discounyfrom" type="number" class="form-control"  placeholder=".." required >
						</div>
                        <div style="margin-top: 10px;">
							<p style="">Hạn sử dụng</p>
							<input  name="date" type="date" class="form-control"  placeholder=".." required >
						</div>
						</div>
						<div>                       
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


