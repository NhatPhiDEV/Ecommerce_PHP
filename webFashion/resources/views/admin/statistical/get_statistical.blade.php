@extends('admin.layoutsadmin')
@section('admin')

<div class="card-body" id="table_load">
    <div class="row" >
        <p>Thống kê đơn hàng</p>
        <form autocomplete="off" action="">
        @csrf
        <div style="display: flex;float:center">
            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

            </div>
            <div class="col-md-8" style="display:flex;margin-left:10px">
            
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                <div style="margin-top:22px;margin-left:10px">
                    <input  type="button" id="btn-dashboard-filter" class="btn btn-dark btn-sm" value="Lọc">
                </div>

            </div>
                
        </div>
        
     </form>
     <div id="myfirstchart" style="height: 250px;"></div>
    </div>
    <div class="row" style="width:100%">
    <div class="col-md-4 col-xs-12">
        <p class="title_thongke"  >Thống kê</p>
        <div id="donut" class="morris-donut-inverse"></div>
    </div>

    <div class="col-md-4 col-xs-12">
        <p class="title_thongke">Bài viết xem nhiều</p>
        <ol class="list_view">
            @foreach($news_action as $key => $newss)
            <li>
                <a target="_blank" href="{{route('detail-news.detailnews',$newss->NewsID)}}"> 
                    <?php $a = ucfirst(mb_strtolower($newss->TittleNews,'UTF-8'));
                     echo $a;?> | <span style="color:red;">{{$newss->Action}}</span>
                </a>
            </li>
            @endforeach
        </ol>
    </div>

    <div class="col-md-4 col-xs-12">
        <p class="title_thongke">Sản phẩm xem nhiều</p>
        <ol class="list_view">
            @foreach($product_action as $key => $pro)
            <li>
                <a target="_blank" href="{{route('product-detalis.show',$pro->ProductID)}}">
                    <?php $a = ucfirst(mb_strtolower($pro->ProductName,'UTF-8'));
                     echo $a;?>  | <span style="color:red;">{{$pro->Action}}</span></a>
            </li>
            @endforeach
        </ol>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        loadWeek();
      var char =  new Morris.Area({

        element: 'myfirstchart',
        lineColors: ['#E30224','#0220E3','#B7F797','#1D3838','#90B319'],

        pointFillColors: ['#ffffff'],
        pointStrokeColors: ['black'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        parseTime: false,
     

        xkey: 'period',

        ykeys: ['order','sales','profit','quantity'],

        behaveLikeLine: true,
        
        labels: ['Đơn hàng','Doanh số', 'Lợi nhuận','Số lượng']
        });

        function loadWeek(){
           
           $.ajax({
               method: "POST",
               url: "{{route('week.getWeek')}}",
               data: { _token: '{{csrf_token()}}' },
               success: function(response) {

                   console.log(response.data)    
                   char.setData(response.data);             
               },
               error: function (jqXHR, textStatus, errorThrown) {
                  alert("Lỗi");
               }
           });
       
         };


    $('#btn-dashboard-filter').click(function(){
      
        var fromdate = $('#datepicker').val();
        var todate = $('#datepicker2').val();
       
        $.ajax({
                method: "POST",
                url: "{{route('date.getDate')}}",
                data:{fromdate: fromdate, todate: todate, _token: '{{csrf_token()}}' },
                success: function(response) {
                    console.log(response.data)    
                    char.setData(response.data);            
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Ngày nhập không đúng định dạng (năm/tháng/ngày)");
                }
            });
    })
})
</script>
<script type="text/javascript">
       $(document).ready(function(){
            var colorDanger = "#FF1744";
            Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#33F7FF',
                '#336DFF',
                '#FF8933',
                '#FF3345',
                '#FFFB33',
                

            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [
                {label:"Sản phẩm", value:<?php echo $product ?>},
                {label:"Khách hàng", value:<?php echo $customer ?>},
                {label:"Đơn hàng", value:<?php echo $bill ?>},
                {label:"Tin tức", value:<?php echo $news ?>},
                {label:"Mã giảm giá", value:<?php echo $discount ?>},
              
            ]
            });
       })
</script>
@endsection
