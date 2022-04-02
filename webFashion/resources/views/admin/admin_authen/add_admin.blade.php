<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-bg modal-dialog-centered">
		<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Thêm mã tài khoản admin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="POST" autocomplete="off" action="" data-url="{{route('admin-authen.store')}}" id="form-add" role="form">
				@csrf 
				<div class="modal-body" style="display:flex;">
					<div class="form-group" style="width:100%" >
						<div style="margin-top: 10px;">
							<p style="">Họ và tên:</p>
							<input  name="name" type="text" class="form-control" value = ""  required >
						</div>
                        <div style="margin-top: 10px;">
							<p style="">Tên đăng nhập:</p>
							<input  name="username" type="text" min="5" max="15" class="form-control"  required >
						</div>
                        <div style="margin-top: 10px;">
							<p style="">Mật khẩu:</p>
							<input  name="passwword" type="password" class="form-control"   required >
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


