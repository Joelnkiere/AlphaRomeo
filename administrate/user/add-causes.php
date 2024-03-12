<?php
include 'conn.php';
include 'auth.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php include"title.php"; ?></title>
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
@$edit = $_GET['edit'];

 $resultt = mysqli_query($con,"SELECT * FROM evenement where id=".$edit."");
 @$roww = mysqli_fetch_array($resultt);

if(isset($_POST['publise'])){
	
$title1 = $_POST['title'];
$title = str_replace("'","\'", $title1);
$categorie = $_POST['categorie'];
$descrip1 = $_POST['descrip'];
$descrip = str_replace("'","\'", $descrip1);

$auteur=$_SESSION['nom'];
if($_FILES['lis_img']['name']!=''){
$lis_img = rand().$_FILES['lis_img']['name'];
}
else{
	$lis_img = $roww["img"];
}

$tempname = $_FILES['lis_img']['tmp_name'];

$folder = "images/evennement/".$lis_img;
if($edit==''){

move_uploaded_file($tempname, $folder);

$insertdata = mysqli_query($con,"INSERT INTO evenement(title,descrip,categorie,img,auteur,date_event)VALUES('$title','$descrip','$categorie','$lis_img','$auteur','$today')");
echo "<script>alert('evennement posté!!');</script>
	<script>window.location.href = 'view-causes.php'</script>";
}
else{
move_uploaded_file($tempname, $folder);

$insertdata = mysqli_query($con,"UPDATE evenement SET title='$title',descrip='$descrip',categorie='$categorie',img='$lis_img',auteur='$auteur',date_event='$today' where id=".$edit."");
echo "<script>alert('modification reussie!!');</script>
	<script>window.location.href = 'view-causes.php'</script>";
}


}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter Un Evennement</h1>
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
                  <label>Entrer le titre de l'événnement</label>
                 <input name="title" value="<?php echo $roww["title"]; ?>" type="text" class="form-control" placeholder="Entrer le titre de l'événnement...">
                </div>
            </div>
            <div class="card-header">
             <div class="form-group">
                  <label>Selectionner une categorie</label>
                  <select name="categorie" class="form-control select2" style="width: 100%;">
                      
                      <?php 
                      $location = mysqli_query($con,"SELECT * FROM categorie"); 
                      while ($location_ft = mysqli_fetch_array($location)) {   
                      ?>
                      <option <?php if($roww["categorie"]==$location_ft["libelle"]){ echo 'selected'; } ?> value="<?php echo $location_ft["libelle"]; ?>"><?php echo $location_ft["libelle"]; ?></option>
                      <?php
                    }
                     ?>
                  </select>
                </div>
            </div>
			
			

			
			<div class="card-body pad">
			<label>Entrer la Description</label>
              <div class="mb-3">
                <textarea name="descrip" class="textarea" placeholder="Ecrire ici"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $roww["descrip"]; ?></textarea>
              </div>
            </div>
			<div class="card-header">
			<div class="form-group">
                    <label for="exampleInputFile">Uploader une image<span style="color:red;">(un fichier compressé)</span></label>
					<p style="color:red;">img size 800px x 800px</p>
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
				<button type="submit" name="publise" class="btn btn-block btn-warning btn-lg">Poster</button>
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
