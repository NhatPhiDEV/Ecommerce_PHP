
@extends('home.layoutshome')
@section('login')
<div class="container">
        <div class="info" style="padding: 80px 25px 50px 25px">
          <div class="tt">
            <p style="text-align: center; font-size: 15px; font-weight: bold; margin-bottom:20px">QUẢN LÝ KHUYẾN MÃI</p>
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
          <div class="col-md-10 col-sm-9 col-xs-12">
            <div >
                <p style=" font-size:16px;">Danh sách mã khuyến mãi</p>
            </div>
                <div style ="float:left;display:flex;">
                  <div style ="">
                    <p style="font-weight:bold">Chưa sử dụng</p>
                    @foreach($discountnew as $discountnews)
                      <div style = "width:400px;background:#53afff; height:120px;display:flex;padding:20px;box-shadow: 5px 5px 5px #3e3636;margin-bottom:20px;border-radius:10px">
                          <img style="" src="{{asset('/icon/discount.jpg')}}" alt="">
                          <div style="margin-left:40px">
                              <p style="font-weight:bold">{{$discountnews->discount_code->discountName}}</p>
                              <p><span>Giảm </span>{{$discountnews->discount_code->Feature}} 
                                  @if($discountnews->discount_code->function == 'Giảm tiền')
                                    <span>K</span>
                                  @else
                                    <span>%</span>
                                  @endif
                             </p>
                              <p><span>Cho đơn hàng từ </span>{{$discountnews->discount_code->discountCondition}} <span>vnđ</span></p>
                          </div>
                      </div>
                      @endforeach
                  </div>

                  <div style ="margin-left:20px">
                    <p style="font-weight:bold">Đã sử dụng</p>
                    @foreach($discountold as $discountolds)
                      <div style = "width:400px;background:#d3d3d9; height:120px;display:flex;padding:20px;box-shadow: 5px 5px 5px #3e3636;margin-bottom:20px;border-radius:10px">
                          <img style="" src="{{asset('/icon/discount.jpg')}}" alt="">
                          <div style="margin-left:40px">
                              <p style="font-weight:bold">{{$discountolds->discount_code->discountName}}</p>
                              <p><span>Giảm </span>{{$discountolds->discount_code->Feature}} 
                              <span>
                                  <?php 
                                    if($discountolds->discount_code->function == "Giảm phần trăm")
                                      echo "%";
                                    else
                                      echo "K";
                                  ?>
                              </span> </p>
                              <p><span>Cho đơn hàng từ </span>{{$discountolds->discount_code->discountCondition}} <span>vnđ</span></p>
                          </div>
                      </div>
                      @endforeach
                  </div>
                </div>
          </div>
        </div>
      </div> 
      <script type="text/javascript">
    $(document).on('click', "button[name='changestatusbillsca']", function () {
        var url = $(this).attr('data-url');
        if (confirm('Bạn muốn hủy đơn hàng')) {
            $.ajax({
                method: 'POST',
                url: url,
                data: { _token: '{{csrf_token()}}' },
                success: function(response) {
                    location.reload();                       
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        }
    })

</script>
@endsection
