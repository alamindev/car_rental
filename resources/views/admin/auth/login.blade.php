<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dawn | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/dist/css/custom.css">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ route('home') }}" class="text-white"><b>Dawn</b> Car Rental</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form method="POST" action="{{ route('admin_login') }}">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
          <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" id="email" name="email"
            value="{{ old('email') }}" required autofocus>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span> @if ($errors->has('email'))
          <span class="invalid-feedback">
                <strong class="text-white">{{ $errors->first('email') }}</strong>
            </span> @endif
        </div>
        <div class="form-group has-feedback">
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
            placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span> @if ($errors->has('password'))
          <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span> @endif
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="{{ asset('admin-asset') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ asset('admin-asset') }}/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="{{ asset('admin-asset') }}/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  </script>
</body>

</html>