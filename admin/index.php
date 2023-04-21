<?php 
  session_start();
  require_once("../autoload/autoload.php");
  if(isset($_SESSION['id']))
  {
    redirect_to('admin/home/index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Shop Mĩ Phẩm</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../public/dist/css/skins/_all-skins.min.css">

  <!-- my style css -->
  <link rel="stylesheet" href="../public/style/css/styles.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Đăng nhập</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   

    <p class="login-box-msg" style="color: red;">
        <?php
            if (isset($_SESSION['error_login'])) {
                echo $_SESSION['error_login'];

                unset($_SESSION['error_login']);
            }
        ?>
    </p>


    <form action="../controller/admin/dang-nhap.php?action=login" method="post">

      <input type="hidden" name="_token" value="">

      <div class="form-group">

        <input type="email" name="email" class="form-control" placeholder="Email" value="">

        <span class="text-danger"><p></p></span>
        
      </div>
      <div class="form-group has-feedback ">

        <input type="password" name="password" class="form-control" placeholder="Password">

        <span class="text-danger"><p></p></span>
      </div>
      <div class="row" style="margin-left: 8px;">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <!-- p>- OR -</p> -->
      <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a> -->
    </div>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="../public/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../public/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../public/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/style/js/main.js"></script>

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
