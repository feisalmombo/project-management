<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Customer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="icon" type="image/png" href="{{ asset('logintemplate/images/icons/favicon.ico') }} "/> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/vendor/bootstrap/css/bootstrap.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintemplate/fonts/iconic/css/material-design-iconic-font.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset(' logintemplate/vendor/animate/animate.css') }}">

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
    </style>
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <!-- Start form here -->

                <form class="login100-form validate-form"method="POST" action="{{ url('/customerregister') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <h8 style="text-align: center;">@include('msgs.success')</h8>

                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-local-grocery-se"></i>
                    </span>

                    <span class="login100-form-title p-b-3 p-t-4">
                        PMS
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter first name{{ $errors->has('first_name') ? ' has-error' : '' }}">


                        <input class="input100" id="first_name" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
                        <span class="focus-input100" data-placeholder="&#9991;"></span>

                        @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="wrap-input100">
                        <input class="input100" id="middle_name" type="text" name="middle_name" placeholder="Middle Name (Optional)">
                        <span class="focus-input100" data-placeholder="&#9991;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter last name{{ $errors->has('lname') ? ' has-error' : '' }}">


                        <input class="input100" id="last_name" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>
                        <span class="focus-input100" data-placeholder="&#9991;"></span>

                        @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter email{{ $errors->has('email') ? ' has-error' : '' }}">


                        <input class="input100" id="email" type="email" name="email" placeholder="kajuma@gmail.com" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100" data-placeholder="&#9993;"></span>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>



                    <div class="wrap-input100 validate-input" data-validate = "Enter phone number{{ $errors->has('phone_number') ? ' has-error' : '' }}">


                        <input class="input100" id="phone_number" type="tel" name="phone_number" placeholder="+255 654 234 678" value="{{ old('phone_number') }}" required autofocus>
                        <span class="focus-input100" data-placeholder="&#9990;"></span>

                        @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input class="input100" id="password" type="password" name="password" placeholder="Password" required>

                        <span class="focus-input100" data-placeholder="&#xf191;"></span>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    {{-- <div class="wrap-input100 validate-input" data-validate="Enter confirm password{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                        <input class="input100" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required>

                        <span class="focus-input100" data-placeholder="&#xf191;"></span>

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong style="color: #A94442;">{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div> --}}

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center">
                        <a class="d-block medium mt-3" href="{{ route('login') }}">Login</a>
                    </div>
                </form>
                <!-- End form here -->

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

    <script src="{{ asset('logintemplate/vendor/daterangepicker/daterangepicker.js') }} "></script>

    <script src="{{ asset('logintemplate/vendor/countdowntime/countdowntime.js') }} "></script>

    <script src="{{ asset('logintemplate/js/main.js') }} "></script>

</body>
</html>
