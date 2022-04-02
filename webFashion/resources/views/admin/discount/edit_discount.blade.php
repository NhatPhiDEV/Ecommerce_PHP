@extends('admin.layoutsadmin')
@section('admin')


<form method="POST" action="{{route('discounts.update',[$discount->discountID])}}">
    @method('PUT')
      @csrf
<div class="modal-dialog-small modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sửa thông tin mã giảm giá </h5>
        </button>
      </div>
      <div class="modal-body" style="display:flex;">
            <div class="form-group" style="width:60%" >

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 60px;">Mã giảm giá</p>
                    <input value="{{$discount->discountCode}}" id="test" name="code" type="text" class="form-control"  placeholder="Mã giảm giá....." required >
                </div>

                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 58px;">Tên giảm giá</p>
                    <input value="{{$discount->discountName}}" name="name" type="text" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Tên giảm giá..." required>
                </div>
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 50px;">Cho đơn hàng</p>
                    <input value="{{$discount->discountCondition}}" name="condition" type="text" class="form-control" min="0" oninput="validity.valid(value='');" placeholder="Thêm cho đơn hàng" required>
                </div> 
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 60px;">Hạn sử dụng</p>
                    <input value="{{$discount->discountExpiry}}" name="expiry" type="text" class="form-control" min="0" oninput="validity.valid(value='');" placeholder="Hạn sử dụng" required>
                </div> 
                <div style="display:flex;margin-top: 10px;">
                    <p style="margin-right: 80px;">Số lượng</p>
                    <input value="{{$discount->Count}}" name="count" type="text" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Số lượng" required>
                </div> 

            </div>
    </div>
    <div class="modal-footer">

         <button style="margin:20px 50px 20px 0" type="submit" class="btn btn-primary">Lưu</button>
     </div>
    </div>
</div>
</form>
 
@endsection