
@extends('home.layoutshome')
@section('login')
<section class="cart">
      <div class="container">
        <div class="regis-info">
            <p style="font-size:28px">ĐĂNG KÝ</p>
        </div>
        <div class="regis">
        <form method="POST"  action="{{route('regis-users.registerUser')}}" data-url="" role="form">
        @csrf  
        
          <div class="regis-left">
                <div class="col-sm-6">
                  <h4>Thông tin khách hàng</h4>
        
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>Họ:</p>
                    <input type="text" name="surname" size="20" placeholder="Họ..."  style="width: 100%;height: 30px;border: 1px solid #dddddd padding-left: 6px;"  required />
                  </div>
        
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>Tên:</p>
                    <input type="text" name="name" size="15" placeholder="Tên..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Email:</p>
                    <input type="email" name="email" placeholder="Email..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Điện thoại:</p>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{7}" placeholder="Điện thoại..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"required />
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Giới tính:</p>
                    <select name="sex" style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"required >
                      <option value="Nam">Nam</option>
                      <option value="Nữ">Nữ</option>
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p style="margin-top:10px">Ngày sinh:</p>
                    <input type="date" name="datebirth" placeholder="Ngày sinh..." style="  width:100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                  </div>
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
                  </div>
                </div>
              </div>
              <div class="regis-right">
                <div class="col-sm-6">
                  <h4>Thông tin tài khoản</h4>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p>Tài khoản:</p>
                    <input type="text" maxlength="15" name="user" placeholder="Tài khoản..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"required />
                    @if(Session::get('err1'))
                      <p style="color:red">* Tên tài khoản đã tồn tại !</p>
                    @endif
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p style="margin-top:10px">Mật khẩu:</p>
                    <input type="password" maxlength="15" name="pass" placeholder="Mật khẩu..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;"required />
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <p style="margin-top:10px">Nhập lại mật khẩu:</p>
                    <input type="password" name="password_re"  maxlength="15" placeholder="Nhập lại mật khẩu..." style="  width: 100%;height: 30px;border: 1px solid #dddddd;padding-left: 6px;" required />
                    @if(Session::get('err0'))
                      <p style="color:red">* Mật khẩu không trùng khớp !</p>
                    @endif
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <br></br>
                    <button type="submit">ĐĂNG KÝ</button>
                  </div>
                </div>
              </div>       
        </form>
        </div>  
      </div>
</section>
@endsection
