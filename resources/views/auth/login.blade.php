<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="icon" type="image/png" href="{{ asset('logintemplate/images/icons/favicon.ico') }} "/> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/bootstrap/css/bootstrap.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/fonts/iconic/css/material-design-iconic-font.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/animate/animate.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/css-hamburgers/hamburgers.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/animsition/css/animsition.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/select2/select2.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/daterangepicker/daterangepicker.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/css/util.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/css/main.css') }} ">
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            }

            .container {
                color: white;
            }
    </style>

</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @include('msgs.success')
                <!-- Start form here -->

                <form class="login100-form validate-form"method="POST" action="{{ route('login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-local-grocery-se"></i>
                    </span>
                    <span class="login100-form-title p-b-3 p-t-4">
                        PMS
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username{{ $errors->has('email') ? ' has-error' : '' }}">


                        <input class="input100" id="email" type="email" name="email" placeholder="pemba.ramadhani@tls.co.tz" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100" data-placeholder="&#9993;"></span>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input class="my-password input100" id="password" type="password" name="password" placeholder="Password" required>

                        <span class="focus-input100" data-placeholder="&#xf191;"></span>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>



                    <div class="container">
                        <input type="checkbox" class="showPassword" style="color: white;" /> Show Password
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
                <!-- End form here -->

                <div class="text-center">
                    <a class="d-block medium mt-3" href="{{ url('/customerregister') }}">Customer add account</a>
                </div>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script src="{{ asset('logintemplate/vendor/jquery/jquery-3.2.1.min.js') }} "></script>

    <script src="{{ asset('logintemplate/vendor/animsition/js/animsition.min.js') }} "></script>

    <script src="{{ asset('logintemplate/vendor/bootstrap/js/popper.js') }} "></script>

    <script src="{{ asset('logintemplate/vendor/bootstrap/js/bootstrap.min.js') }} "></script>

    <script src="{{ asset('logintemplate/vendor/select2/select2.min.js') }} "></script>

    <script src="{{ asset('logintemplate/vendor/daterangepicker/moment.min.js') }} "></script>

    <script src="{{ asset(' logintemplate/vendor/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('logintemplate/vendor/countdowntime/countdowntime.js') }} "></script>

    <script src="{{ asset('logintemplate/js/main.js') }} "></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('.showPassword').on('change',function(){
            var isChecked = $(this).prop('checked');
            if (isChecked) {
              $('.my-password').attr('type','text');
            } else {
              $('.my-password').attr('type','Password');
            }
          });
        });
    </script>

</body>
</html>
