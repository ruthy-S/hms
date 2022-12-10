<?php
ob_start();
session_start();
include("../admin/inc/config.php");
include("../admin/inc/functions.php");
include("../admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doctor | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="" rel="shortcut icon"/>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>Doctor </b>Login</a>
  </div>
  <!-- User name -->

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../admin/dist/img/user.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="login_code.php" class="lockscreen-credentials" method="post">
      <?php $csrf->echoInputField(); ?>
      <div class="input-group">
        <input type="text" name="doctor_id" class="form-control" placeholder="Doctor Id" required>
        <div class="input-group-append">
          <button type="submit" name="form1" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
</div>

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>

<script src="../admin/dist/js/sweetalert.min.js"></script>

<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
  ?>
  <script>
      swal({
      title: "<?php echo $_SESSION['status']; ?>",
      //text: "You clicked the button!",
      icon: "<?php echo $_SESSION['status_code']; ?>",
      button: "Ok Done!",
      });
  </script>
<?php
  unset($_SESSION['status']);
}
?>

</body>
</html>