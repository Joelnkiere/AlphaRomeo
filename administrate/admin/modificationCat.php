<?php
include 'config/head.php';
include 'config/conn.php';
include 'config/session.php';
include 'config/securite.php';

@$edit=$_GET['edit'];
@$categorie=$_POST['categorie'];

if ($_POST['envoyer']) {
  if (!empty($categorie)) {
    $inserer=$bdd->query("UPDATE categorie_pub SET UPDATE categorie SET libelle='$categorie' WHERE id_catPub=".$edit."");
    echo "<script>alert('la categorie a été ajoutée avec succès!');</script>
  <script>window.location.href = 'categorie.php'</script>";
  }

  
}

?>


<!DOCTYPE html>
<html lang="en">


<div class="wrapper">
  <!-- Navbar -->
  <?php
  include 'config/nav.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
include 'config/menu.php';

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categorie de publication</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categorie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <?php  
    $no=1;
    $cat=$bdd->query("SELECT * FROM categorie_pub where id_catPub=$edit");

    while ($ligne = $cat->fetch()) { 
      ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter une categorie</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" value="<?echo $edit;?>" class="form-control" hidden>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categorie</label>
                    <input type="text" class="form-control" name="categorie" value="<?php echo$ligne['libelle'];?>" id="exampleInputEmail1" placeholder="Entrer la categorie" pattern="^[A-Za-zà-ù-0-9-]+$" required="required" alt="veillez inserer le bon caractere">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="envoyer" class="btn btn-primary">Enregister</button>
                </div>
              </form>
            </div>
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-9">
           
             
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Les Categorie des publications</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numero</th>
                    <th>Categorie publication</th>
                    <th>Modifier ------- Supprimer</th>
                    
                  </tr>
                  </thead>
                  <tbody>

   
      
  
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $ligne["libelle"]; ?></td>
                    <td>
                      <button class="btn btn-primary btn-sm"><a href="modificationCat.php?edit=<?php echo($ligne['id_catPub']);?>" class="text-light">Modifier <i class="fas fa-edit"></i></a></button>----<button class="btn btn-danger btn-sm">
                      <a href="categorie.php?delete_id=<?php echo $ligne['id_catPub'];?>" onclick=" return confirm('êtes-vous sûre de Supprimer?')" class="text-light">Supprimer<i class="fas fa-trash"></i></a></button>
                    </td>
                   
                  </tr>
                  
                 
   <?php
   $no++;
    } 
    ?>
                  </tbody>
                  <tfoot>
                    <th>Numero</th>
                    <th>categorie de la publication</th>
                    <th>Modifier ------- Supprimer</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- /.card-body -->
            </div>
            </div> 
            
          </div>
         
        </div>
       
      </div>
    </section>
    
  </div>
  <!-- /.content-wrapper -->
  <?php
  include 'config/footer.php';
  ?>

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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</body>
</html>
