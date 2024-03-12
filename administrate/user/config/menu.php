 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/alpharomeo.png" alt="Alpha-Romeo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Alpha-Romeo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="add-category.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Catégorie publication
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-blog.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Publication
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="view-services.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Service
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a href="view-teams.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Equipe
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="view-offre.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Offre
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
          </li>
         <li class="nav-item">
            <a href="cat-event.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Catégorie evennement
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-causes.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Evennement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon far fa-envelope"></i>
              <p>
                Commande

                <i class="fas fa-angle-left right"></i>
              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="commande.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  
                  <p>Nouvelle commande</p>
                  
                </a>
              
              <li class="nav-item">
                <a href="commande-lu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commande traitée</p>
                  
                  
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon far fa-envelope"></i>
              <p>
                Messagerie

                <i class="fas fa-angle-left right"></i>
              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="message.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php
                    $req = "SELECT COUNT(*) AS nonlu FROM message where etat='non lu'";
                    
                    $resultat = $con->query($req);

                    if ($resultat->num_rows > 0) {
                        $ligne = $resultat->fetch_assoc();
                        $nonlu = $ligne['nonlu'];
                      } else {
                        $nonlu = 0;

                    }

                    $query="SELECT count(*) as lu FROM message where etat !='non lu'";
                    $exec=$con->query($query);
                    if ($exec->num_rows>0) {
                      $ligne=$exec->fetch_assoc();
                      $lu=$ligne['lu'];
                    }else{
                      $lu=0;
                    }
                    

// Fermer la connexion
                      
                      
                    ?>
                  <p>Nouveau message</p>
                  <span class="badge badge-info right"><?php echo $nonlu;?></span>
                </a>
              
              <li class="nav-item">
                <a href="message-lu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Messages lus</p>
                  <span class="badge badge-warning right"><?php echo $lu; ?></span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">SYSTEME</li>
          <li class="nav-item">
            <a href="view-user.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Utilisateur
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Parametre
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profil.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>