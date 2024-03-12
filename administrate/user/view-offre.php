<?php
error_reporting(0);
include 'conn.php';
include 'auth.php';

$a=8;
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
@$_GET['delete_id'];
if(isset($_GET['delete_id']))
{
	$del = $_GET['delete_id'];
	$selectdelete = mysqli_query($con,"SELECT * FROM offre where id_offre=".$del."");
	$selectimg = mysqli_fetch_array($selectdelete);
	$path = 'images/offre/';
	$now_delete = unlink($path.$selectimg['img']);
	if($now_delete){
		$query_delete="DELETE FROM offre WHERE id_offre='".$_GET['delete_id']."'";
		$p = mysqli_query($con, $query_delete);
		echo "<script>alert('suppression effectuée avec succès!!');</script>
		<script>window.location.href = 'view-offre.php'</script>";
	}
}


$limit = 10;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$serial = ($page-1) * $limit; 

  
    $resultt = mysqli_query($con,"SELECT * FROM offre ORDER BY id_offre DESC LIMIT $serial, $limit");


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Toutes nos offres</h1>
             </br>
            <button type="button" class="btn btn-block bg-gradient-primary btn-sm" style="width: 100px;"> <a href="add-offre.php" style="color: white;"><i class="fas fa-plus"> </i> Ajouter</a></button>
          </div>
          

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Voir</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
					<th>Date publication</th>
          <th>Auteur</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php  
			while ($roww = mysqli_fetch_array($resultt)) { 	
			?> 
				  <tr>
					<td><img style="width:100px;" src="images/offre/<?php echo $roww["img"]; ?>"></td>
                    <td><?php echo $roww["titre"]; ?></td>
                    
					<td><?php $dec = $roww['detail'];
								$removetag = strip_tags($dec);
								$trim = $string = substr($removetag,0,600);
								echo $trim ; ?>..</td>
                <td><?php echo $roww["date_pub"]; ?></td>
                <td><?php echo $roww["auteur"]; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
						<a href="add-offre.php?edit=<?php echo $roww["id_offre"]; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="view-offre.php?delete_id=<?php echo $roww["id_offre"]; ?>" onclick="return confirm('êtes-vous sûre de vouloir supprimer?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                </tr>
			<?php 
			$serial++;
			} 
			?>
				</tbody>
              </table>
            </div>
			 <?php  
                          
			$result_db = mysqli_query($con,"SELECT COUNT(id_offre) FROM offre");
		
		$row_db = mysqli_fetch_row($result_db);  
		$total_records = $row_db[0];  
		$total_pages = ceil($total_records / $limit); 
		/* echo  $total_pages; */
		$pagLink = "<ul class='pagination'>";  
		for ($i=1; $i<=$total_pages; $i++) {
					  $pagLink .= "<li class='page-item'><a class='page-link' href='view-offre.php?page=".$i."'>".$i."</a></li>";	
		}
		echo $pagLink . "</ul>";  
		?>
            <!-- /.card-body -->
          </div>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
