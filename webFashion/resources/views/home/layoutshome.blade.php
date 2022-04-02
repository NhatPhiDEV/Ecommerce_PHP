<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('home/css/mainstyle.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/loginstyle.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/regisstyle.css')}}">
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    
    
    <title>Website - Store Fashion</title>
</head>
<body>
    <secsion  class="top">
        <div class="container">
            <div class="row">
                <div class="top-logo">
                   <a href="{{route('home.index')}}"><img src="{{asset('home/image/lg_o1.png')}}" alt=""></a> 
                </div>
                <div class="top-menu-items">
                    <ul>
                        @foreach($types as $type)                      
                            <li> <a style="color: black;font-weight: bold;width:100%;text-decoration-line:none;" href="{{route('home.show',[$type->Type])}}">{{$type ->TypeName}}</a></li>                                         
                        @endforeach
                        <li><a style="text-decoration: none;color: black;" href="{{route('news-home.news')}}">Tin tức</a></li>
                        <li><a style="text-decoration: none;color: black;" href="{{route('contact-home.contactHome')}}">Thông tin</a></li>
                    </ul>
                </div>
                <div class="top-menu-icons">
                    <ul>
                        <li>
                        <form autocomplete="off" action="{{route('search-detail.searchDetail')}}"   method="POST" >
                        @csrf
                        <div style="display:flex">
                            <input name="search" type="text" class="input-search-ajax" placeholder="tìm kiếm">
                            <button style="border: none;"  type="submit" ><i class="fas fa-search"></i> </button>
                        </div>
                                                      
                          </form>
                            <div class="list-unstyled search-ajax" style="position: absolute;width: 313px;background-color:#ffffff;top: 55px;overflow-x: hidden;overflow-y: auto;max-height: 500px;">
                            </div>
                             {{csrf_field()}}               
                        </li>
                        <li>
                            <a style="color:black" href="{{route('carts.showCart')}}"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                          @if (session('username'))
                            <li style="width: 160px;">
                                  <a style="text-decoration:none"  href="{{route('info-user.infoUser',session('idcustomer'))}}">{{session('username')}}</a>
                              </li>
                              <li>
                                  <a style="color:black" href="{{route('logout-out.logoutUser')}}"><i class="fas fa-sign-out-alt"></i></a>
                              </li>
                          @else
                            <li>
                                <a href="{{route('login-user.login')}}"><i class="fas fa-user-secret"></i></a>
                            </li>
                          @endif
                    </ul>
                </div>
   
            </div>
        </div>

    </secsion>
  
    <!-- -----------------------SLlDER---------------------------------------->
    @yield('home')
    @yield('login')

    <!-- -------------------------Footer -->
    <section style="padding-top: 10px;" class="footer">
    <div class="footer-container">
      
        <div class="footer-items">
            <li><a href=""><img src="image/dathongbao.png" alt=""></a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Tuyển dụng</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href=""><i class="fab fa-facebook-f"></i></a><a href=""><i class="fab fa-youtube"></i></a></li>
        </div>
        <div class="footer-text">
            Trường đại học công nghệ Thành Phố HCM<br>
Đồ án chuyên ngành: Công nghệ phần mềm_Lập trình website bằng PhP <br>
Đặt hàng online : 033 22 83252 .
        </div>
        <div class="footer-bottom">
            ©ThorMetal All rights reserved
        </div>
    </div>
</section> 

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="CUZDFi8t"></script>
<script src="{{asset('home/js/scripthome.js')}}"></script>

    <script>//<![CDATA[
if (address_2 = localStorage.getItem('address_2_saved')) {
  $('select[name="calc_shipping_district"] option').each(function() {
    if ($(this).text() == address_2) {
      $(this).attr('selected', '')
    }
  })
  $('input.billing_address_2').attr('value', address_2)
}
if (district = localStorage.getItem('district')) {
  $('select[name="calc_shipping_district"]').html(district)
  $('select[name="calc_shipping_district"]').on('change', function() {
    var target = $(this).children('option:selected')
    target.attr('selected', '')
    $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
    address_2 = target.text()
    $('input.billing_address_2').attr('value', address_2)
    district = $('select[name="calc_shipping_district"]').html()
    localStorage.setItem('district', district)
    localStorage.setItem('address_2_saved', address_2)
  })
}
$('select[name="calc_shipping_provinces"]').each(function() {
  var $this = $(this),
    stc = ''
  c.forEach(function(i, e) {
    e += +1
    stc += '<option value=' + e + '>' + i + '</option>'
    $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
    if (address_1 = localStorage.getItem('address_1_saved')) {
      $('select[name="calc_shipping_provinces"] option').each(function() {
        if ($(this).text() == address_1) {
          $(this).attr('selected', '')
        }
      })
      $('input.billing_address_1').attr('value', address_1)
    }
    $this.on('change', function(i) {
      i = $this.children('option:selected').index() - 1
      var str = '',
        r = $this.val()
      if (r != '') {
        arr[i].forEach(function(el) {
          str += '<option value="' + el + '">' + el + '</option>'
          $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
        })
        var address_1 = $this.children('option:selected').text()
        var district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('address_1_saved', address_1)
        localStorage.setItem('district', district)
        $('select[name="calc_shipping_district"]').on('change', function() {
          var target = $(this).children('option:selected')
          target.attr('selected', '')
          $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
          var address_2 = target.text()
          $('input.billing_address_2').attr('value', address_2)
          district = $('select[name="calc_shipping_district"]').html()
          localStorage.setItem('district', district)
          localStorage.setItem('address_2_saved', address_2)
        })
      } else {
        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.removeItem('address_1_saved', address_1)
      }
    })
  })
})
//]]></script>
<script type="text/javascript">



    $('.input-search-ajax').keyup(function(){
        var query = $('.input-search-ajax').val();
        var _token =$('input[name="_token"]').val();
        
        if(query != ''){
            $.ajax({
                 url: '{{route('search-product.ajaxSearch')}}',
                 method: 'POST',
                 data: {query:query, _token:_token},
                 success: function(response) {
                    console.log(response.data);
                    $('.search-ajax').empty();
                    $.each(response.data, function (k, v) {
                          
                        $('.search-ajax').fadeIn();
                            var s = v.ProductID;
                            var _html= '';  
                                _html += ' <div data-id_id="'+v.ProductName+'" id="searchclick" style="width: 313px;margin-top: 10px;display:flex;margin: 10px 0px 10px 10px" class="media">';              
                                _html += ' <div style="margin-left:10px;border-bottom: 1px solid;" class="media-body">';
                                _html += ' <h5 class="mt-0">'+v.ProductName+'</h5>';
                                _html += ' <p>Giá: <span>'+v.ProductPrice+'</span></p>';
                                _html += ' </div>';
                                _html += '</div>';
                               
                            $('.search-ajax').append(_html);
                       });
                 }
             })
        }else{
            $('.search-ajax').empty();
        }
    });

    $(document).on('click', '#searchclick' , function(){
      var id = $(this).data("id_id");
      $('.input-search-ajax').val(id);
      $('.search-ajax').empty();
  });
</script>
<div class="zalo-chat-widget" data-oaid="3229584540218124366" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="" data-height=""></div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
</body>
</html>                     