<?php
error_reporting(0);
include 'conn.php';
include 'auth.php';

$a=10;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include"title.php"; ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed navbar-fixed">
<div class="wrapper">
 <!-- Navbar -->
   <?php include"topbar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include"config/menu.php"; ?>
<?php
date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");
$edit = $_GET['edit'];

 $resultt = mysqli_query($con,"SELECT * FROM admin where ad_id=".$edit."");
 $roww = mysqli_fetch_array($resultt);

if(isset($_POST['publise'])){
	
$nom1= $_POST['nom'];
$nom = str_replace("'","\'", $nom1);
$mail1 = $_POST['mail'];
$mail = str_replace("'","\'", $mail1);
$password1 = $_POST['password'];
$password = str_replace("'","\'", $password1);
$confirme1 = $_POST['confirme'];
$confirme=str_replace("'", "\'", $confirme1);
$user=$_POST['user'];
$hash=sha1($password);
if($_FILES['lis_img']['name']!=''){
$lis_img = rand().$_FILES['lis_img']['name'];
}
else{
	$lis_img = $roww["img"];
}

$tempname = $_FILES['lis_img']['tmp_name'];
$folder = "images/user/".$lis_img;
$valid_ext = array('png','jpeg','jpg');
// file extension
$file_extension = pathinfo($folder, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);
// Check extension
if(in_array($file_extension,$valid_ext)){
// Compress Image
compressImage($tempname,$folder,60);
}
if($edit==''){
  if ($confirme==$password) {
    $insertdata = mysqli_query($con,"INSERT INTO admin(nom,ad_email,ad_password,type,img
)VALUES('$nom','$mail','$hash','$user','$lis_img')");
echo "<script>alert('insertion reussie!!');</script>
  <script>window.location.href = 'view-user.php'</script>";
  }else{
    echo "<script>alert('Le mot de passe est incorrect');</script>
          <script>window.location.href='add-user.php'</script>";
  }
}
elseif($edit!=''){
  if ($confirme==$password) {
    $insertdata = mysqli_query($con,"UPDATE admin SET nom='$nom',ad_email='$mail',ad_password='$hash',type='$user',img='$lis_img' where ad_id=".$edit."");
echo "<script>alert('Modification reussie!!');</script>
  <script>window.location.href = 'view-user.php'</script>";
  }else{
    echo "<script>alert('Le mot de passe est incorrect');</script>
          <script>window.location.href='view-user.php'</script>";
  }
}
}

// Compress image function
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter un utulisateur</h1>
          </div>
           <div class="col-sm-6">
          <a href="view-teams.php" class="btn btn-success" style="float: right;"><i class="fa fa-eye" aria-hidden="true"></i>  Voir les utilisateur</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
		<form action="" method="post" enctype="multipart/form-data">
          <div class="card card-outline card-info">
            
			 
			<div class="card-header">
             <div class="form-group">
                  <label>Entrer le nom</label>
                 <input name="nom" value="<?php echo $roww["nom"]; ?>" type="text" class="form-control" placeholder="Entrer le nom complet..." required>
                </div>
            </div>
            <div class="card-header">
             <div class="form-group">
                  <label>l'adresse mail</label>
                 <input name="mail" value="<?php echo $roww["ad_email"]; ?>" type="email" class="form-control" placeholder="Entrer son adresse mail ..." required>
                </div>
            </div>
             <div class="card-header">
             <div class="form-group">
                  <label>Entrer le mot de passe</label>
                 <input name="password" type="password" class="form-control" placeholder="Entrer son Mot de passe ..." required>
                </div>
            </div>
            
            <div class="card-header">
             <div class="form-group">
                  <label>Confirmer le mot de passe</label>
                 <input name="confirme" type="password" class="form-control" placeholder="confirmer le mot de passe ..." required="required">
                </div>
            </div>
            <div class="card-header">
            <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" value="user" name="user" checked>
                        <label for="radioPrimary1">
                          Utilisateur
                        </label>
                      </div>
                      
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary3" value="admin" name="user">
                        <label for="radioPrimary3">
                          Administrateur
                        </label>
                      </div>
                    </div>
			<div class="card-header">
			<div class="form-group">
                    <label for="exampleInputFile">photo de profil<span style="color:red;">(only compresed)</span></label>
					<p style="color:red;">img size 370px x 370px</p>
                        <input name="lis_img" type="file">
                     <?php echo $roww["img"]; ?>
                  </div>
			</div>
			 
			<div class="card-header">
             <div class="form-group">
					<div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
				<button type="submit" name="publise" class="btn btn-primary btn-lg">Enregistrer</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
		  </form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include"footer.php"; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
