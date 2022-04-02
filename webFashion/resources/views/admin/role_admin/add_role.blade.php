@extends('admin.layoutsadmin')
@section('admin')

<div class="modal-dialog-small modal-dialog-centered" role="document">
  <div class="modal-content">
  <div class="modal-header">
		<h4 class="modal-title">Xét quyền cho tài khoản truy cập</h4>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="POST" autocomplete="off" action="{{ route('changerole.addRole')}}" data-url="" id="form-add" role="form">
				@csrf 
				<input type="hidden" name ="id" value ="{{$idAdmin}}">
				<div class="modal-body" style="display:flex;">
					<div class="form-group" style="width:100%; margin-left:150px" >
					@foreach($roles as $role )
						@if ($role->role->idRole != 1)
						<?php 
							if ($role->role->idRole == 2) {
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý khách hàng</p>';
							}
						?>
						<div class="form-check form-switch" style="margin-left:70px">
							<input name ="checkrole[]" value="{{$role->id}}" {{ $role->Status == 1 ? 'checked' : ''}} class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
							<label class="form-check-label" for="flexSwitchCheckDefault">{{$role->role->RoleName}}</label>
						</div>
						<?php 
							 if ($role->role->RoleName == "Xem thông tin khách hàng"){
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý hóa đơn</p>';
							} else if ($role->role->RoleName == "Hủy đơn hàng"){
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý sản phẩm</p>';
							} else if ($role->role->RoleName == "Ẩn sản phẩm"){
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý danh mục sản phẩm</p>';
							} else if ($role->role->RoleName == "Ẩn danh mục sản phẩm"){
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý mã giảm giá</p>';
							} else if ($role->role->RoleName == "Thêm, xóa, mã giảm giá cho khách hàng"){
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý danh mục tin tức</p>';
							}else if ($role->role->RoleName == "Thêm, xóa, Sửa tin tức"){
								echo '<p style="margin-bottom:5px;margin-top:5px;color:black;font-weight:bold">Quản lý danh mục slide</p>';
							}
						?>
						@endif
					@endforeach
					</div>
					</div>	
				<div>  
      <div class="modal-footer">
        <div style="margin:20px 250px 20px 0px">     
		<input type="submit" class="btn btn-success" value="Lưu"> 
        </div>
      </div>
    </div>
   
  </div>
</form>
 
@endsection