
@extends('home.layoutshome')
@section('login')
<div class="container">
    <div class="info" style="padding: 100px 25px 50px 25px">
        <div class="tt">
            <p style="text-align: center; font-size: 15px; font-weight: bold">THÔNG TIN KHÁCH HÀNG</p>
        </div>
        <div class="col-sm-2">
            <div class="panel panel-default">
            <div class="panel-heading">Tài khoản của tôi</div>
              <div class="panel-body">
                <a href="{{route('info-user.infoUser',$result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-clipboard-check"></i></span> Thông tin tài khoản</p></a>
                <a href="{{route('addr-user.addrUser', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-clipboard-check"></i></span> Địa chỉ nhận hàng</p></a>
              </div>
              <div class="panel-heading">Đơn hàng</div>
              <div class="panel-body">
              
              <a href="{{route('success-bill.successbillUser', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-clipboard-check"></i></span> Giao thành công</p></a>
                <a href="{{route('waiting-bill.waitingbillUser', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-recycle"></i></span> Đang chờ xử lý</p></a>
                <a href="{{route('transport-bill.transportbillUser', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-shipping-fast"></i></span> Đang vận chuyển</p></a>
                <a href="{{route('cancel-bill.cancelbillUser', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-ban"></i></span> Đơn hàng đã hủy </p></a>
                <a href="{{route('judge-product.judgeProduct', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-gavel"></i></span> Đánh giá sản phẩm </p></a>
              </div>
              <div class="panel-heading">Khuyến mãi</div>
              <div class="panel-body">           
                <a href="{{route('discount-user.discountUsser', $result->CustomerID)}}"><p style="font-size: 12px;"><span><i class="fas fa-tags"></i></span> Mã giảm giá</p></a>
              </div>
            </div>
          </div>

        <div class="col-sm-10">
            <form method="POST"  action="{{route('updateaddress.updateAddress')}}" data-url="" role="form">
         
                @csrf 
            <div class="col-sm-12" style="margin-bottom: 100px">
                <input name ="id" type="hidden" value="{{$result -> CustomerID}}">
                  <h4>Cập nhật thông tin khách hàng</h4>
                  <div style="margin-left:80px" class="col-md-6 col-sm-6 col-xs-12">
                    <p>Số điện thoại:</p>
                    <input value =""   type="text" name="phone" placeholder="Số điện thoại"  style="width: 100%;height: 30px;border: 1px solid #dddddd; padding-left: 6px;"   />
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Tỉnh/TP:</p>
                    <select style="  width: 100%;height: 35px;border: 1px solid #dddddd;padding-left: 6px;"  name="calc_shipping_provinces" required="">
                            <option value="">Tỉnh / Thành phố</option>
                        </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Quận/Huyện:</p>
                    <select style="  width: 100%;height: 35px;border: 1px solid #dddddd;padding-left: 6px;"  name="calc_shipping_district"  required="">
                            <option value="">Quận / Huyện</option>
                        </select>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p style="margin-top:10px">Phường/Xã:</p>
                    <input size="50" type="text" placeholder="Phường/Xã..."style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" name="ward" required />
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p style="margin-top:10px">Địa chỉ:</p>
                    <input size="20" type="text" placeholder="Địa chỉ..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" name="address" required />

                        <div style ="margin-left:60px" class="btn-box">
                        <br>

                        <button type="submit">CẬP NHẬT</button>
                        </div>
                  </div>          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
