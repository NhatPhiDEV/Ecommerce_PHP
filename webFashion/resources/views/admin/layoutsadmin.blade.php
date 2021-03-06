<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin fashion Store</title>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            CKEDITOR.replace('ckeditor_desc');
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add_delivery').click(function(){

                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship =$('.free_ship').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                url:'{{route('insert-delivery.insert_Delivery')}}',
                method: 'POST',
                data:{city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token},
                success:function(data){
                    alert('Th??m th??nh c??ng');
                }
                 });
            })
            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if(action == 'city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url:'{{route('select-delivery.select_Delivery')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                    });
                });
        })
        
    </script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{asset('home/image/lg_o1.png')}}" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class='sidebar-title'>Main Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{route('homes.home')}}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Home</span>
                            </a>    
                        </li>
                    @if (Session::get('Xem th??ng tin kh??ch h??ng') == "Xem th??ng tin kh??ch h??ng")
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Kh??ch h??ng</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="{{route('customer.index')}}">Kh??ch h??ng</a>
                                </li>                         
                            </ul>
                        </li>
                    @endif
                    @if (Session::get('Xem ????n h??ng') == "Xem ????n h??ng")
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="shopping-bag" width="20"></i>
                                <span>????n h??ng</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="{{route('bill-waiting.showBillwai')}}">??ang ch??? s??? l??</a>
                                </li>                         

                                <li>
                                    <a href="{{route('bill-transport.showBilltransport')}}">??ang v???n chuy???n</a>
                                </li>
                                <li>
                                    <a href="{{route('bill-success.showBillsuccess')}}">????n ho??n th??nh</a>
                                </li>
                                <li>
                                    <a href="{{route('bill-cancel.showBillcancel')}}">????n h??ng h???y</a>
                                </li>
                            </ul>

                        </li>
                     @endif
                     @if (Session::get('Xem s???n ph???m') == "Xem s???n ph???m")
                        <li class="sidebar-item ">
                            <a href="{{route('product.index')}}" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>S???n ph???m</span>
                            </a>                         
                        </li>  
                        @endif
                        @if (Session::get('Xem danh m???c s???n ph???m') == "Xem danh m???c s???n ph???m")
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="droplet" width="20"></i>
                                <span> Danh m???c s???n ph???m</span>
                            </a>
                            <ul class="submenu ">

                                <li>
                                    <a href="{{route('product-type.index')}}">Lo???i s???n ph???m</a>
                                </li>

                                <li>
                                    <a href="{{route('product-size.index')}}">K??ch th?????c</a>
                                </li>

                                <li>
                                    <a href="{{route('product-brand.index')}}">Th????ng hi???u</a>
                                </li>
                                <li>
                                    <a href="{{route('product-sale.index')}}">Khuy???n m??i</a>
                                </li>

                            </ul>
                        </li>
                        @endif
                        @if (Session::get('Xem m?? gi???m gi??') == "Xem m?? gi???m gi??")
                        <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="gift" width="20"></i>
                                <span>M?? gi???m gi??</span>
                            </a>
                            <ul class="submenu ">

                                <li>
                                    <a href="{{route('discounts.index')}}">M?? gi???m gi??</a>
                                </li>

                                <li>
                                    <a href="{{route('details-discount.index')}}">Danh s??ch gi???m gi??</a>
                                </li>

                            </ul>
                        </li>
                        
                        @endif
                        @if (Session::get('Xem tin t???c') == "Xem tin t???c")

                        <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="edit" width="20"></i>
                            <span>Danh m???c Tin t???c</span>
                        </a>
                        <ul class="submenu ">
                            <li>
                                <a href="{{route('news.index')}}">Ti??u ????? tin</a>
                            </li>
                            <li>
                                <a href="{{route('details-new.index')}}">Tin t???c</a>
                            </li>                         
                        </ul>
                    </li>
                    @endif
                    @if (Session::get('admin') == "admin")
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="users" width="20"></i>
                            <span>Danh m???c admin</span>
                        </a>
                        <ul class="submenu ">
                      
                            <li>
                                <a href="{{route('admin-authen.index')}}">T??i kho???n</a>
                            </li>
                        
                            <li>
                                <a href="{{route('loadadmin.loadAdmin')}}">Ph??n quy???n</a>
                            </li>                         
                        </ul>
                    </li>
                    @endif
                    @if (Session::get('Th??m, x??a, s???a slide') == "Th??m, x??a, s???a slide")
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="sliders" width="20"></i>
                            <span>Danh m???c Slide</span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{route('slide.index')}}">Slide Banner</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li  class="sidebar-item  ">
                            <a  href="{{route('statistical.getStatistical')}}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Th???ng k??</span>
                            </a>    
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="sliders" width="20"></i>
                            <span>V???n chuy???n</span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{route('delivery.add_Delivery')}}">Qu???n l?? v???n chuy???n</a>
                            </li>
                        </ul>
                    </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                Dmmm cmm
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>                        
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{asset('icon/viking.png')}}" alt="" srcset="">
                                </div>

                                @if (session('name'))
                                        <div class="d-none d-md-block d-lg-inline-block">{{session('name')}}</div>
                                    @else
                                        <div class="d-none d-md-block d-lg-inline-block">Admin</div>
                                @endif
                               
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> T??i kho???n</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Nh???n tin</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> C??i ?????t</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('adminss.logout',Session::get('idadmin'))}}"><i data-feather="log-out"></i> ????ng xu???t</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Qu???n l??</h3>
               
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href=""></a>&#9876;</li>
                                    <li class="breadcrumb-item active" aria-current="page">&#9876;</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <!-- <div class="card-header">
                            Simple Datatable
                        </div> -->               
                  @yield('admin')
                  @yield('detail')
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Thometal</p>
                    </div>
                    <div class="float-end">
                        <p>Created with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                href="">Thormetal</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- @if(!Session::get('name'))
        <script>window.location = "admin";</script> 
    @endif -->
    <script src="{{asset('admin/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    <script src="{{asset('js/load_img.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendors.js')}}"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat:"yy-mm-dd"
            });
            $( "#datepicker2" ).datepicker({
                dateFormat:"yy-mm-dd"
            });
        });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {

        

       
        $('.btn-show').click(function(){
            var url = $(this).attr('data-url');            
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {   
                    alert('M??y x??a th??nh c??ng r???i ????')      
                    $('#name').val(response.data.TypeName)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //x??? l?? l???i t???i ????y
                }
            })
        })

        $('#btn-addproduct').click(function(){
            var url = $(this).attr('data-url');            
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $('#selecttype').empty();
                    $('#selectbrand').empty();
                    $('#selectsale').empty();
                    $('#selectsize').empty();
                        //  Lo???i
                        $.each(response.data, function (k, v) {
                           
                            let opt = '<option value = "' + v.Type + '">' + v.TypeName + '</option>';
                            $('#selecttype').append(opt);
                        });
                        
                        //Thuong hieu
                        $.each(response.brand, function (k, v) {
                        
                            let br = '<option value = "' + v.Brand + '">' + v.BrandName + '</option>';
                            $('#selectbrand').append(br);
                        });

                        //Sale
                        $.each(response.sale, function (k, v) {
                        
                            let sa = '<option value = "' + v.Sale + '">' + v.SaleName + '   %</option>';
                            $('#selectsale').append(sa);
                        });

                        //Size

                        $.each(response.size, function (k, v) {
                        
                            let si = '<option value = "' + v.Size + '">' + v.SizeName + '</option>';
                            $('#selectsize').append(si);
                        });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //x??? l?? l???i t???i ????y
                }
            })
        })
        $('#btn-addproduct-news').click(function(){
            var url = $(this).attr('data-url');            
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $('#selectsize').empty();
                        
                        $.each(response.data, function (k, v) {
                        
                            let si = '<option value = "' + v.NewsID + '">' + v.TittleNews + '</option>';
                            $('#selectsize').append(si);
                        });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //x??? l?? l???i t???i ????y
                }
            })
        })


        $('#btn-addproduct-discount').click(function(){
            var url = $(this).attr('data-url');            
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $('#selectsize').empty();
                        $.each(response.data, function (k, v) {
                        
                            let si = '<option value = "' + v.discountID + '">' + v.discountName + '</option>';
                            $('#selectsize').append(si);
                        });
                    var x = 1;
                    $('#grdiscount').empty();
                   
                    $.each(response.customer, function (k, v) {
                    
                        let tr = '<tr>'
                            tr += '<td style="text-align:center">' + x + '</td>';
                            tr += '<td style="text-align:center">' + v.CustomerName + '</td>';
                            tr += '<td style="text-align:center">' + v.UserName + '</td>';
                            tr += '<td style="text-align:center"><input type="checkbox" value="'+v.CustomerID+'" name="checkdiscount[]" ></td>'; 
                        x++;
                        $('#grdiscount').append(tr);
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //x??? l?? l???i t???i ????y
                }
            })
        })
//     $('#form-edit').submit(function(e){
//     e.preventDefault();
//     var url=$(this).attr('data-url');

//     $.ajax({
//         type: 'put',
//         url: url,
//         data: {
//             hoten: $('#hoten-edit').val(),
           
//         },
//         success: function(response) {
//             // console.log(response.studentid)
//             toastr.success(response.message)
//             $('#modal-edit').modal('hide');
//             $('#hoten-'+response.studentid).text(response.student.hoten)

//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             //x??? l?? l???i t???i ????y
//         }
//     })
// })

});
$(document).on('click', "button[name='delete']", function () {
            var url = $(this).attr('data-url');
            var _this = $(this);
            if (confirm('May co chac muon xoa khong?')) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    data: { _token: '{{csrf_token()}}' },
                    success: function(response) {
                        location.reload();                       
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("kak");
                    }
                })
            }
        })
    </script>
  
</body>
</html>