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

 $resultt = mysqli_query($con,"SELECT * FROM teams where id=".$edit."");
 $roww = mysqli_fetch_array($resultt);

if(isset($_POST['publise'])){
	
$title1 = $_POST['title'];
$title = str_replace("'","\'", $title1);
$designation1 = $_POST['designation'];
$designation = str_replace("'","\'", $designation1);

$contact1 = $_POST['contact'];
$contact=str_replace("'", "\'", $contact1);
$fb1=$_POST['fb'];
$fb=str_replace("'", "\'", $fb1);
$insta1=$_POST["insta"];
$insta=str_replace("'", "\'",$insta1);
$linkdin1=$_POST["linkdin"];
$linkdin=str_replace("'", "\'", $linkdin1);
$whatsapp1=$_POST["whatsapp"];
$whatsapp=str_replace("'", "\'", $whatsapp1);
if($_FILES['lis_img']['name']!=''){
$lis_img = rand().$_FILES['lis_img']['name'];
}
else{
	$lis_img = $roww["img"];
}

$tempname = $_FILES['lis_img']['tmp_name'];
$folder = "images/team/".$lis_img;
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
$insertdata = mysqli_query($con,"INSERT INTO teams(title,designation,img,contact,date,status,fb,insta,linkdin,whatsapp
)VALUES('$title','$designation','$lis_img','$contact','$today','0','$fb','$insta','$linkdin','$whatsapp')");
echo "<script>alert('insertion reussie!!');</script>
	<script>window.location.href = 'view-teams.php'</script>";
}
else{
$insertdata = mysqli_query($con,"UPDATE teams SET title='$title',designation='$designation',img='$lis_img',contact='$contact',date='$today',fb='$fb',insta='$insta',linkdin='$linkdin',whatsapp='$whatsapp' where id=".$edit."");
echo "<script>alert('Modification reussie!!');</script>
	<script>window.location.href = 'view-teams.php'</script>";
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
            <h1>Ajouter un membre</h1>
          </div>
           <div class="col-sm-6">
          <a href="view-teams.php" class="btn btn-success" style="float: right;"><i class="fa fa-eye" aria-hidden="true"></i>  Voir l'equipe</a>
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
                 <input name="title" value="<?php echo $roww["title"]; ?>" type="text" class="form-control" placeholder="Entrer le nom complet...">
                </div>
            </div>
            <div class="card-header">
             <div class="form-group">
                  <label>Entrer le post occupé</label>
                 <input name="designation" value="<?php echo $roww["designation"]; ?>" type="text" class="form-control" placeholder="Entrer son poste ...">
                </div>
            </div>
             <div class="card-header">
             <div class="form-group">
                  <label>Entrer le contact</label>
                 <input name="contact" value="<?php echo $roww["contact"]; ?>" type="text" class="form-control" placeholder="Entrer son contact ...">
                </div>
            </div>
            
            <div class="card-header">
             <div class="form-group">
                  <label>Entrer le profil FB</label>
                 <input name="fb" value="<?php echo $roww["fb"]; ?>" type="text" class="form-control" placeholder="Entrer son profil facebook ...">
                </div>
            </div>
            <div class="card-header">
             <div class="form-group">
                  <label>Entrer le profil Instagramm</label>
                 <input name="insta" value="<?php echo $roww["insta"]; ?>" type="text" class="form-control" placeholder="Entrer son profil instagramm ...">
                </div>
            </div>
            <div class="card-header">
             <div class="form-group">
                  <label>Entrer le profil linkdin</label>
                 <input name="linkdin" value="<?php echo $roww["linkdin"]; ?>" type="text" class="form-control" placeholder="Entrer son profil linkdin...">
                </div>
            </div>
            <div class="card-header">
             <div class="form-group">
                  <label>Entrer le numero whatsapp</label>
                 <input name="whatsapp" value="<?php echo $roww["whatsapp"]; ?>" type="text" class="form-control" placeholder="Entrer son numero whatsapp ...">
                </div>
            </div>
            
			<div class="card-header">
			<div class="form-group">
                    <label for="exampleInputFile">prendre une photo<span style="color:red;">(only compresed)</span></label>
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
