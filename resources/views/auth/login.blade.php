<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Satuan Penjamin Mutu') }} - Login </title>

    <!-- Styles -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
    <!-- Scripts -->

</head>

<body>
    <div class="form-bg">
        <div class="container d-flex justify-content-center align-items-center container-h">
            <div class="w-100 row justify-content-center align-items-center ">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <span class="heading">Log In</span>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}" required autofocus>
                            <i class="bi bi-person-fill"></i>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group help {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" required>
                            <i class="bi bi-key-fill"></i>
                            <a href="#" class="fa fa-question-circle"></a>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <div class="main-checkbox">
                                <input type="checkbox" value="None" id="remember" name="remember">
                                <label for="remember"></label>
                            </div>
                            <span class="text">Remember me</span>
                            <button type="submit" class="btn btn-default">log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
</body>

</html>
