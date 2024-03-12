<?php
include 'conn.php';
include 'auth.php';

$a=1;

$user=$_SESSION['id'];
$profile=mysqli_query($con,"SELECT * from admin where ad_id='$user'");

?>

<!DOCTYPE html>
<html lang="en">
<?php include"config/head.php";
include 'title.php';
?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include"topbar.php"; ?>
<!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include 'config/menu.php'; ?>
<?php

$resultt = mysqli_query($con,"SELECT ad_password FROM admin where ad_id=".$user."");
 //$ligne=mysql_fetch_array($profile);

if(isset($_POST['modif'])){
  
$nom1 = $_POST['nom'];
$nom = str_replace("'","\'", $nom1);
$mail1 = $_POST['mail'];
$mail=str_replace("'", "\'", $mail1);
$password1=$_POST['password'];
$password1=str_replace("'", "\'",$password1);
$nouveau1=$_POST['nouveau'];
$nouveau=str_replace("'", "\'", $nouveau1);
$confirm1=$_POST['confirme'];
$confirme=str_replace("'", "\'", $confirm1);

if($_FILES['photo']['name']!=''){
$lis_img = rand().$_FILES['photo']['name'];
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
$hash=sha1($password);


if ($hash!=$resultt) {
  echo "<script>
          alert('le mot de passe actuel est incorrect');
          windows.location.href='profi.php'
        </script>
  ";
}

}

// Compress image
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
            while ($row=mysqli_fetch_array($profile)) {
              
            
            ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          	

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="images/user/<?php echo($row['img']); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['nom']; ?></h3>

                <p class="text-muted text-center"><?php echo $row['type']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?php echo $row['ad_email']; ?></b> 
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> 
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b>
                  </li>
                </ul>

                <a href="#modif" class="btn btn-primary btn-block nav-link" data-toggle="tab"><b>Modifier</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                  <li class="nav-item"><a class="nav-link" href="#info" data-toggle="tab">Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#modif" data-toggle="tab">Modification</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
           
                
                  <div class="active tab-pane" id="info">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" disabled value="<?php echo($row['nom']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="<?php echo($row['ad_email']); ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">photo</label>
                        <div class="col-sm-10">
                          <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" disabled="disabled">
                        <label class="custom-file-label" for="exampleInputFile"><?php echo$row['img'];?></label>
                      </div>
                        </div>
                      </div>
                      <!--  -->
                    </form>
                  </div>
                  <div class=" tab-pane" id="modif">
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/ form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="<?php echo($row['nom']); ?>" name="nom" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="<?php echo($row['ad_email']); ?>" name="mail" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">photo</label>
                        <div class="col-sm-10">
                         <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                        <label class="custom-file-label" for="exampleInputFile" required><?php echo$row['img'];?></label>
                      </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">mot de passe</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputExperience" placeholder="Entrer votre mot de passe actuel"required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Nouveau</label>
                        <div class="col-sm-10">
                          <input type="password" name="nouveau" class="form-control" id="inputExperience" placeholder="Entrer le nouveau mot de passe" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Confirmer</label>
                        <div class="col-sm-10">
                          <input type="password" name="confirme" class="form-control" id="inputSkills" placeholder="Confirmer le mot de passe" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required="required"> Je veux vraiment <a href="#">Modifier les information sur mon profile</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="modif" class="btn btn-danger">Modifier</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        <?php
           }
           ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
</body>
</html>
