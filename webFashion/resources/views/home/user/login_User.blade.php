
@extends('home.layoutshome')
@section('login')
<section class="cart">
      <div class="container">
        <div class="login-info">
          <p style="font-size:28px">ĐĂNG NHẬP</p>
        </div>
        <div class="login">
          <div class="login-left">
            <h4>Đăng nhập tài khoản thường:</h4>
            <p>
              Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên
              và nhận được những ưu đãi tốt hơn!
            </p>
            @if (session('message'))
              <p style="color:red;text-align:center;">{{session('message')}}</p>
            @endif
            <form action="{{route('users.check')}}" method="POST">
                {{csrf_field()}}
                <table align="left ">
                    <tr style="height: 40px">
                      <td><p>Nhập Email của bạn:</p></td>
                      <td>
                        <div class="input-box">
                          <input maxlength="15" type="text" name="user" placeholder="Tài khoản của bạn..." />
                        </div>
                      </td>
                    </tr>
                    <tr style="height: 40px">
                      <td><p>Mật khẩu:</p></td>
                      <td>
                        <div class="input-box">
                          <input maxlength="15" type="password" name="pass" placeholder="Mật khẩu của bạn..." />
                        </div>
                      </td>
                    </tr>
                    <tr style="height: 40px">
                      <td></td>
                      <td>
                      <label for="">Đăng nhập với:</label>
                        <a href="{{route('login-google.loginGoogle')}}"><img width="26px" src="{{asset('/icon/google.png')}}" alt=""></a>
                        <td></td>
                      </td>
                    </tr>
                    <tr style="height: 40">
                      <td></td>
                      <td>
                        <div class="btn-box">
                        <button type="submit">ĐĂNG NHẬP</button>
                        </div>
                      </td>
                    </tr>
                </table>
            </form>
          </div>
          <div class="login-right">
            <h4>Khách hàng mới của Thormetal Store</h4>
            <p>
              Nếu bạn chưa có tài khoản trên Thormetal, hãy sử dụng tùy chọn
              này để truy cập biểu mẫu đăng ký.
            </p>
            <p>
              Bằng cách cung cấp cho Thormetal Store thông tin chi tiết của bạn ,quá
              trình mua hàng trên thormetal.com sẽ là một trãi ngiệm thú vị và
              nhanh chóng hơn!
            </p>
            <br></br>
            <div class="btn-box">
              <a href="{{route('regis-user.regis')}}">
              <button type="submit" >ĐĂNG KÝ</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
