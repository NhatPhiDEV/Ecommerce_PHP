
@extends('home.layoutshome')
@section('login')
<div class="container">
        <div class="info" style="padding: 80px 25px 50px 25px">
          <div class="tt">
            <p style="text-align: center; font-size: 15px; font-weight: bold; margin-bottom:20px">ĐÁNH GIÁ SẢN PHẨM</p>
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
                <p style=" font-size:16px;"></p>
            </div>
            <table class="table table-sm">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $s =1;
                    ?>
                @foreach($product_rating as $product_ratings)
                    <tr>
                        <th style="text-align:center;"><p style="margin-top:60px">{{$s}}</p></th>
                        <td style="text-align:center"><img width="100px" src="{{asset('/uploads/'.$product_ratings->rating_product->ProductImage)}}" alt=""></td>
                        <td style="text-align:center;">
                            <p style="margin-top:40px;font-weight:bold">{{$product_ratings->rating_product->ProductName}}</p>
                           
                       
                            <ul style="" class="list-inline">
                            @for($i = 1; $i<=5; $i++)
                                <?php 
                                    if($i <= $product_ratings->Rate){
                                        $co = "color:#ffcc00;";
                                    }else{
                                        $co = "color:#ccc;";
                                    }                          
                                ?>
                                <li title="đánh giá sao" id="{{$product_ratings->rating_product->ProductID}}-{{$i}}" data-rating_id ="{{$product_ratings->id}}" data-index ="{{$i}}" data-product_id="{{$product_ratings->rating_product->ProductID}}" data-rating="{{$product_ratings->Rate}}" class="rating" style="cursor:pointer; {{$co}} font-size:30px">&#9733;</li>
                            @endfor
                           </ul>
                        </td>
                    <td>
                        <div>
                            <form method="POST"  action="{{route('update-comment.updateComment',$product_ratings->id)}}" data-url="" role="form">
                            @csrf  
                                <input name="comment" placeholder="  Viết đánh giá về sản phẩm ..." style="width:400px;height:35px;border-radius:5px ;margin-top:45px;boder:none;border:1px solid" type="text" require>
                                <input style="background: none;width:50px;height:40px;border:none;font-size: 30px" type="submit" value ="&#8626;">
                            </form>
                        </div>                     
                    </td>
                    </tr>
                    <?php 
                        $s++
                    ?>
                @endforeach
                </tbody>
                </table>
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

function remove_background (product_id){    
    for(var i = 1; i<= 5; i++){
        $('#'+product_id+'-'+i).css('color','#ccc');
    }
}

$(document).on('mouseenter','.rating' ,function () {
   
    var index = $(this).data("index");
    var product_id = $(this).data("product_id");
    remove_background(product_id);
    for(var i = 1;i<= index;i++){
        $('#'+product_id+'-'+i).css('color','#ffcc00');
    }
});

$(document).on('mouseleave','.rating' ,function () {
   
   var index = $(this).data("index");
   var product_id = $(this).data("product_id");
   var rating = $(this).data("rating");
  
   remove_background(product_id);

   for(var i = 1; i <= rating; i++){
       $('#'+product_id+'-'+i).css('color','#ffcc00');
   }
});

$(document).on('click', '.rating' , function(){
    var index = $(this).data("index");
    var product_id = $(this).data("product_id");
    var rating_id =  $(this).data("rating_id");
    $.ajax({

        url: "{{route('rating-product.ratingProduct')}}",
        method: "POST",
        data: { index: index, rating_id: rating_id , product_id: product_id, _token: '{{csrf_token()}}' },
        success: function(data) {
            if(data == 'done'){
                alert("Sản phẩm được đánh giá "+index+" sao");
                location.reload();
            } else{
                alert("Lỗi đánh giá !")
                location.reload();
            }                     
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("kak");
        }
    });
});


</script>
@endsection
