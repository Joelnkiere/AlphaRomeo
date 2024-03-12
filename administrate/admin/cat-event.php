<?php
error_reporting(0);
include 'conn.php';
include 'auth.php';

$a=6;
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Navbar -->
   <?php include"topbar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include"config/menu.php"; ?>

<?php
if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM categorie WHERE id_cat='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Suppression effectuée avec succès!!');</script>
	<script>window.location.href = 'cat-event.php'</script>";
}

$edit = $_GET['edit'];

 $resultt = mysqli_query($con,"SELECT * FROM categorie where id_cat=".$edit."");
 $roww = mysqli_fetch_array($resultt);
$location = mysqli_query($con,"SELECT * FROM categorie");


if(isset($_POST['add'])){
	
$name = $_POST['cat_name'];

if($edit==''){

$insertdata = mysqli_query($con,"INSERT INTO categorie(libelle)VALUES('$name')");
echo "<script>alert('Insertion reussi!!);</script>
	<script>window.location.href = 'cat-event.php'</script>";
}
else{

$insertdata = mysqli_query($con,"UPDATE categorie SET libelle='$name' where id_cat=".$edit."");
echo "<script>alert('La categorie ajoutée avec succès!!');</script>
	<script>window.location.href = 'cat-event.php'</script>";
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
            <h1>Ajouter une Categorie d'evennement</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-5">
		<form action="" method="post" enctype="multipart/form-data">
          <div class="card card-outline card-info">
           
			
			<div class="card-header">
             <div class="form-group">
                  <label>Entrer le nom de la categorie</label>
                 <input type="text" name="cat_name" value="<?php echo $roww["libelle"]; ?>" class="form-control" placeholder="Entrer la categorie ...">
                </div>
            </div>
			<button type="submit" name="add" class="btn btn-block btn-primary btn-lg">Ajouter</button>
			
          </div>
		   </form>
        </div>
		<div class="col-md-7">
		<form action="" method="post" enctype="multipart/form-data">
          <div class="card card-outline card-info">
            <div class="card-header">
             <div class="form-group">
                  <label>Toutes les categories</label>
                 
                </div>
            </div>
			
			<div class="card-header">
             <table class="table">
                <thead>
                  <tr>
                    <th>categorie</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
		<?php  
		while ($location_ft = mysqli_fetch_array($location)) { 
		?>
				  <tr>
					
                    <td><?php echo $location_ft["libelle"]; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
						<a href="cat-event.php?edit=<?php echo $location_ft["id_cat"]; ?>"class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="cat-event.php?delete_id=<?php echo $location_ft["id_cat"]; ?>" onclick="return confirm('êtes-vous sûre de vouloir supprimer?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                </tr>
		<?php
		}
		?>
				</tbody>
              </table>
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
