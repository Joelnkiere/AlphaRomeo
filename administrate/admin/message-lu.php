<?php
include 'conn.php';
include 'auth.php';

$a=1;

?>
<!DOCTYPE html>
<html lang="en">

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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
   <?php include"topbar.php"; ?>
   
 
  <?php include"config/menu.php"; ?>


<?php
@$_GET['delete_id'];
if(isset($_GET['delete_id']))
{
  $del = $_GET['delete_id'];
  $selectdelete = mysqli_query($con,"SELECT * FROM message where id_mes=".$del."");
  
    $query_delete="DELETE FROM message WHERE id_mes='".$_GET['delete_id']."'";
    $p = mysqli_query($con, $query_delete);
    echo "<script>alert('suppression effectuée avec succès!!');</script>
    <script>window.location.href = 'message.php'</script>";
  }


$limit = 10;  
if (isset($_GET["page"])) {
  $page  = $_GET["page"]; 
  } 
  else{ 
  $page=1;
  };  
$serial = ($page-1) * $limit; 

  
    $resultt = mysqli_query($con,"SELECT * FROM message where etat!='non lu' ORDER BY id_mes DESC LIMIT $serial, $limit");


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Messagerie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item active"><?php echo $_SESSION['nom']?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block mb-3">message déjà lu</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Boites des messages</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="message.php" class="nav-link">
                    <i class="fas fa-inbox"></i> Nouveau Messages
                    <?php
                    $query = "SELECT COUNT(*) AS total FROM message where etat='non lu'";
                    $result = $con->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $count = $row['total'];
                      } else {
                        $count = 0;
                    }


                     
                      
                    ?>
                    <span class="badge bg-primary float-right"><?php echo $count; ?></span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-envelope"></i>messages lus
                     <?php
                    $query = "SELECT COUNT(*) AS total FROM message";
                    $result = $con->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $tout = $row['total'];
                      } else {
                        $tout = 0;
                    }

// Fermer la connexion
                      $con->close();
                      
                    ?>
                    <span class="badge bg-warning float-right"><?php echo $tout; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Supprimer
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Messages</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php  
      while ($roww = mysqli_fetch_array($resultt)) {  
      ?>
                 
                  <tr>
                    
                    <td>

                      <div class="icheck">
                        <input type="checkbox" value="<?php echo $roww['id_mes']; ?>" id="check" name="id_mes">
                        <label for="check1"></label>
                      </div>
                    </td>
                    
                    <td class="mailbox-name"><a href="detail-message-lu?id=<?php echo $roww['id_mes']; ?>"><?php echo $roww['nom_cli']; ?></a></td>
                    <td class="mailbox-subject"><a href="detail-message-lu?id=<?php echo $roww['id_mes']; ?>" style="color:black;"><?php echo $roww['titre']; ?> </a> 
                        
                        <td>
                          
                            <a href="detail-message-lu?id=<?php echo$roww['id_mes'];?>" style="color: black;">
                              - 
                      <?php 
                            $ddesc = $roww['message']; 
                        echo $dec = substr($ddesc,0,40);
                        ?>...
                            </a>
                          
                        </td>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"> <a href="detail-message-lu?id=<?php echo$roww['id_mes']; ?>" style="color: black;"><?php echo $roww['date_envoi'];?></a></td>
                    <td>
                      <div class="btn-group">
                      
                      <a href="message-lu.php?delete_id=<?php echo$roww['id_mes']; ?>" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </a>
                  
                    </div></td>
                  
                  </tr>
                  
                  
                  <?php

                    }
                    ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include'footer.php';?>

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
<!-- Page specific script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
</body>
</html>
