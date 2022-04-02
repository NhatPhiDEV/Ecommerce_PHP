@extends('admin.layoutsadmin')
@section('admin')

	<div class="panel-body">
		<div class="postion-center">
			<!-- <form method="POST" autocomplete="off" action="" data-url="{{ route('product-brand.store') }}" id="form-add" role="form"> -->
				@csrf
				<div class="form-group">
					<label for="exampleInputPassword1">---Chọn thành phố---</label>
                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                    
                    @foreach( $city as $cty)
                    <option value="{{$cty->MaTP}}">{{$cty->Name_City}}</option>
                    @endforeach
                    </select>
				</div>
                <div class="form-group">
					<label for="exampleInputPassword1">Chọn quận huyện</label>
                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                        <option value="">---Chọn quận huyện---</option>
                    </select>
				</div><div class="form-group">
					<label for="exampleInputPassword1">Chọn xã phường</label>
                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                        <option value="">---Chọn xã phường---</option>
                    </select>
				</div>
                <div class="form-group">
					<label for="exampleInputPassword1">Phí vận chuyển</label>
                   <input type="text" name="free_ship" class="form-control free_ship" >
				</div>
				
				<div class="modal-footer">
				
					<button type="button" name="add_delivery" class="btn btn-primary add_delivery">Thêm phí vận chuyển</button>
				</div>
			</form>
		</div>
	</div>

@endsection