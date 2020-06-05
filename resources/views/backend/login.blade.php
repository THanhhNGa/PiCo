<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="public/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/backend/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/backend/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b>PICO</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Đăng nhập</p>
        @if(session('thongbao'))
        <div class="alert alert-danger" roles="alert">
            <strong>{{ session('thongbao') }}</strong>
        </div>
        @endif
      <form method="POST">
          @csrf
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Nhập Email" name="email" >
          @if ($errors->has('email'))
              <div class="alert alert-warning" role="alert">
                {{ $errors->first('email') }}
              </div>
          @endif
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Nhập Password" name="pass" >
          @if ($errors->has('pass'))
              <div class="alert alert-warning" role="alert">
                {{ $errors->first('pass') }}
              </div>
          @endif
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div>
      <a href="#">Quên mật khẩu</a>
      <a href="register.php" class="text-center" style="float: right;">Đăng kí</a>
    </div>
  </div>

	<!-- jQuery 3 -->
	<script src="public/backend/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="public/backend/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
