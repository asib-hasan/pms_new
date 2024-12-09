<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store_info->store_title }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="white-bg">
<div class="middle-box loginscreen animated fadeInDown">
    <div class="text-center">
        <img src="{{ asset('images/logo.png') }}" style="width: 200px;margin-bottom: 20px;" />
    </div>
    @include('partials.alerts')
    <form  role="form" action="{{ url('authenticate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" maxlength="11" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" required />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required />
        </div>
        <button type="submit" name="btn_login" class="btn btn-primary block full-width"><i class="fa fa-check"></i> Get Started</button>
    </form>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
