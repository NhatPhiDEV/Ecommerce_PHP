@extends('home.layoutshome')
@section('home')
<div class="container">
        <div class="contact" style="margin-top: 100px">
          <p style="text-align: center; margin-top: 20px; margin-bottom: 30px; font-size: 20px">
            <b>THÔNG TIN LIÊN HỆ</b>
          </p>
          <div class="col-md-6 col-sm-6">
            <ul class="list-unstyled">
              <li>
                <div class="contact_phone_show" style="margin-bottom: 10px">
                  <p style="font-size: 18px"><b>DỊCH VỤ KHÁCH HÀNG</b></p>
                  <i class="fa fa-phone">&nbsp;LIÊN HỆ</i>
                </div>
                <div class="contact_phone_hide">
                  <ul>
                    <li>
                      <p style="font-size: 12px; margin-left: 15px">
                        <b>Địa chỉ:</b> Tầng 2, tòa nhà Hutech - 475A Điện Biên Phủ - P25 - Quận Bình Thạnh - TP.HCM
                      </p>
                      <p style="font-size: 12px; margin-left: 15px; margin-top: -10px">
                        <b>Email:</b> dhkhang1003@gmail.com
                      </p>
                      <p style="font-size: 12px; margin-left: 15px; margin-top: -10px">
                        <b>Mua hàng online:</b> 0339059847
                      </p>
                      <p style="font-size: 12px; margin-left: 15px; margin-top: -10px">
                        <b>CSKH:</b> cskhdk@gmail.com.vn
                      </p>
                    </li>
                  </ul>
                  <p style="font-size: 12px; margin-left: 15px; margin-top: -10px">
                    Thứ Hai đến Thứ Bảy, từ 8:00 đến 17:00
                  </p>
                </div>
              </li>
              <li>
                <div class="contact_phone_show1">
                  <p style="font-size: 18px"><b>CHÍNH SÁCH BẢO HÀNH & SỬA CHỮA</b></p>
                </div>
                <div class="contact_phone_hide1">
                  <p style="font-size: 12px">
                    Chỉ tại KD shop, bạn được hỗ trợ về sản phẩm với chính sách bảo hành sản phẩm trọn đời miễn phí!
                  </p>
                  <p style="font-size: 12px">
                    Tuy nhiên, chính sách này không bao gồm những trường hợp đặc biệt như sau :
                  </p>
                  <p style="font-size: 12px">
                    - Các sản phẩm mang nhãn KD, áo ,đầm; các sản phẩm chất liệu thun/len/thun len, jeans,…
                  </p>
                  <p style="font-size: 12px">
                    - Nếu sửa sản phẩm mất thêm chi phí nguyên vật liệu, Qúy khách hàng vui lòng trả thêm phần chi phí
                    đó.
                  </p>
                  <p style="font-size: 12px">
                    - Đối với khách hàng mua hàng online. Quý khách có yêu cầu sửa chữa bảo hành có thể mang sản phẩm
                    tới bất kỳ showroom chính hãng của KD để sử dụng dịch vụ.
                  </p>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-6">
            <div id="map"></div>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1251208102735!2d106.71230301462275!3d10.801727892304376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a459cb43ab%3A0x6c3d29d370b52a7e!2sHo%20Chi%20Minh%20City%20University%20of%20Technology%20-%20HUTECH!5e0!3m2!1sfr!2s!4v1638367967480!5m2!1sfr!2s"
              width="600"
              height="620"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
            ></iframe>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
@endsection