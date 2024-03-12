
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        Bienvenu au site <?php echo" ".$_SESSION['nom']?>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>">
         <h4>Aller au site</h4>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
         Se deconnecter
        </a>
      </li>
    </ul>
  </nav>