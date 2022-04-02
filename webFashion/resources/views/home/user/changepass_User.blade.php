
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
            <form method="POST"  action="{{route('newpassuser.updatepass',$result -> CustomerID)}}" data-url="" role="form">
         
                @csrf 
            <div class="col-sm-12" style="margin-bottom: 100px">
                  <h4>Thông tin khách hàng</h4>
           
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>Họ tên:</p>
                    <input value ="{{$result->CustomerName}}"   type="text" name="surname" placeholder="Họ..."  style="width: 100%;height: 30px;border: 1px solid #dddddd; padding-left: 6px;"  readonly />
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>Mật khẩu hiện tại:</p>
                    <input type="password" name="pass" placeholder="Mật khẩu..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"required />
                    <input type="hidden"  value ="{{$result->PassWord}}" name="oldpass"/>
                    @if (session('notifi'))
                            <p style="color:red;margin-top:10px">{{session('notifi')}}</p>
                    @endif
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Email:</p>
                    <input value ="{{$result->CustomerEmail}}"  type="email" name="email" placeholder="Email..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" readonly/>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Mật khẩu mới:</p>
                    <input type="password" placeholder="Nhập lại mật khẩu..." name="newpass" style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                    
                  </div> 
                 
                  
                  <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>Tên:</p>
                    <input type="text" name="name" placeholder="Tên..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                  </div> -->
                  
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Điện thoại:</p>
                    <input value ="{{$result->CustomerPhone}}" type="text" name="phone" placeholder="Điện thoại..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"readonly />
                  </div>
                
                  <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Ngày sinh:</p>
                    <input type="date" name="datebirth" placeholder="Ngày sinh..." style="  width:100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                  </div> -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Nhập lại mật khẩu mới:</p>
                    <input type="password" placeholder="Nhập lại mật khẩu..." name="newpass1" style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                    @if (session('notification'))
                            <p style="color:red;margin-top:10px">{{session('notification')}}</p>
                    @endif
                    <div class="btn-box">
                      <br></br>
                      <button type="submit">CẬP NHẬT</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:-60px">Giới tính:</p>
                    <input  value ="{{$result->CustomerSex}}"  name="sex" style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"  readonly/>
                        <!-- @if($result->CustomerSex == 'Nam')
                          <option select="selected" value="" >Nam</option>
                          <option value="" > Nữ </option>
                        @else
                          <option select="selected" value="" >Nữ </option>
                          <option value="" >Nam</option>
                        @endif -->
                  </div>           
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
