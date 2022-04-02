
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
            <div class="title">
              <u><p style="font-size: 20px; margin-top: 20px">BẢNG THÔNG TIN CỦA TÔI</p></u>
            </div>
            <div class="col-md-12">
              <p>Xin chào, {{$result->CustomerName}}</p>
              <div>
                <p>
                  Từ bảng điều khiển bạn có thể xem ngắn gọn các giao dịch vừa thực hiện và cập nhật thông tin tài
                  khoản. Lựa chọn đường dẫn dưới đây để xem hoặc chỉnh sửa thông tin.
                </p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Thông tin tài khoản</div>
                <div class="panel-body">
                  <div class="col-md-6 col-sm-6">
                    <b>Liên hệ</b>

                    <p style="margin-top:15px; font-size:12px"> {{$result->CustomerName}}</p>
                    <p style="margin-top:-10px; font-size:12px">  {{$result->CustomerEmail}}</p>
                    <a href="{{route('cpuser.changepassUser',$result->CustomerID)}}">Đổi mật khẩu</a>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <b>Đăng ký nhận bảng tin</b>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Sổ địa chỉ</div>
                <div class="panel-body">
                  <div class="col=md-6 col-sm-6">
                    <p style="font-weight: bold; font-size: 12px">Địa chỉ nhận hàng mặc định</p>
                    <p>{{$result->CustomerName}}</p>
                    <p>{{$result->CustomerAdress}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
