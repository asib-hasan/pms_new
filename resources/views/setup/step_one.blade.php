<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Step 1 - Admin Account Information</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="ibox float-e-margins">
                       @include('partials.alerts')
                        <div class="ibox-title">
                            <h2><span style="color: blue">SETUP STEP 1</span> <span style="font-size: 13px;font-weight: bold">PROVIDE ACCOUNT INFORMATION</span></h2>
                        </div>
                        <div class="ibox-content">
                            <small style="font-weight: bold;color: maroon">1. This account will be considered as a system super admin account. Make sure all provided information is correct.</small>
                            <br><small style="font-weight: bold;color: maroon">2. Red marked fields are mandatory.</small>
                            <form action="{{ url('/step/one/store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name<b class="required_mark">*</b></label>
                                    <input type="text" maxlength="50" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your name" required />
                                    @if (session('invalid') && session('invalid')->has('name'))
                                        <span class="text-danger">{{ session('invalid')->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" maxlength="255" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email address" />
                                    @if (session('invalid') && session('invalid')->has('email'))
                                        <span class="text-danger">{{ session('invalid')->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone<b class="required_mark">*</b></label>
                                    <input type="text" maxlength="11" class="form-control" name="phone" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{ old('phone') }}" placeholder="Enter phone number" required />
                                    @if (session('invalid') && session('invalid')->has('phone'))
                                        <span class="text-danger">{{ session('invalid')->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<b class="required_mark">*</b></label>
                                    <input type="password" maxlength="50" minlength="6" class="form-control" name="password" value="" placeholder="Enter password" required />
                                    @if (session('invalid') && session('invalid')->has('password'))
                                        <span class="text-danger">{{ session('invalid')->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password<b class="required_mark">*</b></label>
                                    <input type="password" maxlength="50" class="form-control" name="confirm_password" value="" placeholder="Enter confirm password" required />
                                    @if (session('invalid') && session('invalid')->has('confirm_password'))
                                        <span class="text-danger">{{ session('invalid')->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label></label>
                                    <button class="btn btn-primary pull-right" type="submit">Save & Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
