<?php
include('conn.php');
include 'config/securite.php';




if(isset($_POST['submit'])){
	//extract($_POST);
	$ad_email=securite(mysqli_escape_string($con,$_POST['ad_email']));
    $ad_pass=securite(mysqli_escape_string($con,$_POST['ad_pass']));
    $hash=sha1($ad_pass);
	$check=mysqli_query($con,"select * from admin where ad_email='$ad_email' and ad_password='$hash'");
	$check_fetch=mysqli_fetch_array($check);
	
	if($check_fetch['ad_id']!=''){
		$_SESSION['ad_id']=$check_fetch['ad_id'];
		if ($check_fetch['type']=='admin') {
      header('location:../admin/index.php');
      $_SESSION['nom']=$check_fetch['nom'];
      $_SESSION['prenom']=$check_fetch['prenom'];
    }elseif ($check_fetch['type']=='user') {
      header('location:index.php');
       $_SESSION['nom']=$check_fetch['nom'];
      $_SESSION['prenom']=$check_fetch['prenom'];
    }else{
      echo "<script>alert('le mot de passe ou adresse mail est incorrect');</script>";
      header('location:login.php');

    }

		}
	
	}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex" />
  <?php include 'title.php'; ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Alpha-Romeo</b> Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Se Connecter</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="ad_email" class="form-control" placeholder="Email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="ad_pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Commexion</button>
          </div>
         </div>
         <div class="row pt-1">
         <div class="col-12 text-center">
            <div class="icheck-primary">
             <a href="forgot-password.php">Mot de passe oublié</a>
            </div>
            </div>
          </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
