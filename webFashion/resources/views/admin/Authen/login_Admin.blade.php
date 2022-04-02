
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
   
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
</head>

<body>
 
<div id="auth">
        <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img src="{{asset('admin/assets/images/favicon.svg')}}" height="48" class='mb-4'>
                            <h3>Sign In</h3>
                            <p>Please sign in to continue to Voler.</p>
                        </div>
                        @if (session('message'))
                            <p style="color:red;text-align:center;">{{session('message')}}</p>
                        @endif
                        <form action="{{route('admins.check')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group position-relative has-icon-left">
                                <label for="username">Username</label>
                                <div class="position-relative">
                                    <input name="user" type="text" class="form-control" id="username" require="">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left">
                                <div class="clearfix">
                                    <label for="password">Password</label>
                                    <a href="auth-forgot-password.html" class='float-end'>
                                        <small>Forgot password?</small>
                                    </a>
                                </div>
                                <div class="position-relative">
                                    <input name="pass" type="password" class="form-control" id="password" require="" >
                                    <div class="form-control-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                </div>
                            </div>

                            <div class='form-check clearfix my-4'>
                              
                               
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary float-end">Submit</button>
                            </div>
                        </form>
                        
                        <div class="divider">
                            <div class="divider-text">ThorMeTal</div>
                        </div>
                            <!-- <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="{{asset('admin/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('asmin/assets/js/main.js')}}"></script>
</body>

</html>