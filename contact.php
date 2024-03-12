
<?php

    error_reporting(0);
    include "administrate/admin/conn.php";
   
     //fetch settings
    $settings = mysqli_query($con,"SELECT * FROM settings");
    $setting  = mysqli_fetch_array($settings);


?>

<?php
include"securite.php";
if (isset($_POST['envoyer'])) {
    date_default_timezone_set('Asia/Kolkata');
    $date=date("D d M Y");
    $nom1=$_POST['nom'];
    $nom=securite(str_replace("'","\'",$nom1));
    $email1=$_POST['email'];
    $email=securite(str_replace("'","\'",$email1));
    $titre1=$_POST['titre'];
    $titre=securite(str_replace("'", "\'", $titre1));
    $message1=$_POST['message'];
    $message=securite(str_replace("'", "\'", $message1));

    $req=$con->prepare("INSERT INTO message(nom_cli,mail,titre,message,date_envoi,etat)VALUES(?,?,?,?,?,?)");
    $req->bind_param("ssssss",$nom,$email,$titre,$message,$date,$etat);
    $nom=$nom;
    $email=$email;
    $titre=$titre;
    $message=$message;
    $date=$date;
    $etat='non lu';

    if ($req->execute()) {
        echo("<script> alert'votre message a été envoyé avec succès!!'; </script>");
        // code...
    }else{
        echo "<script>alert'échec d\'envoi!!';</script>";
    }

}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Alpha-Romeo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/alpharomeo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- link href="css/all.min.css" rel="stylesheet"> -->

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
   <!--  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php include 'header.php'; ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 style="font-size: 30px;" class="m-0"><img src="img/alpharomeo.png" width="100px"></i>Alpha-Romeo</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Accueil</a>
                    <a href="about.php" class="nav-item nav-link">A propos</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="blog.php" class="nav-item nav-link">Publication</a>
                   
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Publication</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.php" class="dropdown-item">Blog Grid</a>
                            <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            
                            <!-- <a href="feature.php" class="dropdown-item">Our features</a> -->
                            
                            <!-- <a href="testimonial.html" class="dropdown-item">Testimonial</a> -->
                            <a href="quote.php" class="dropdown-item">Commander un service</a>
                            <a href="evennement.php" class="dropdown-item">Evennement</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link active">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="#" class="btn btn-primary py-2 px-4 ms-3">Nos offres</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Contactez-nous</h1>
                    <a href="index.php" class="h5 text-white">Accueil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 text-white">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Nous contacter</h5>
                <h1 class="mb-0">Pour toutes vos préoccupations, contactez-nous pour les details.</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Applez-nous</h5>
                            <h4 class="text-primary mb-0"><?php echo $setting['phone2']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Notre adresse Mail</h5>
                            <h5 class="text-primary mb-0"><?php echo $setting['email']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Notre adresse physique</h5>
                            <h4 class="text-primary mb-0"><?php echo $setting['adresse']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="nom" placeholder="Votre Nom" style="height: 55px;" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" name="email" placeholder="Votre adresse mail" style="height: 55px;" required autocomplete="off">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" name="titre" placeholder="Titre" style="height: 55px;" required autocomplete="off">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" name="message" rows="4" placeholder="Message" required autocomplete="off"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" name="envoyer" data-loading-text="Veillez patienter...">Envoyer un message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                   <!--  <iframe class="position-relative rounded w-100 h-100"
                        
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0" src=" --><?php echo $setting['map'];?><!-- </iframe> -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.jpg" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
               <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="about.php" class="navbar-brand">
                            <h1 class="m-0 text-white"><!-- <img src="img/alpharomeo.png" width="50px;"> -->Alpha-Romeo</h1>
                        </a>
                        <p class="mt-3 mb-4">Alpha-Romeo est une startup informatique basée à Kinshasa en République Démocratique du Congo. Elle se spécialise dans la création de solutions numériques, le marketing digital ainsi que la dispense des formations professionnelles en programmation informatique.</p>
                        <form action="" method="POST">
                            <div class="input-group">
                                <input type="email" class="form-control border-white p-3" placeholder="Votre Email" name="mail">
                                <button class="btn btn-dark" type="submit" name="envoyer">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Nous contacter</h3>
                            </div>
                            <!-- <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street, New York, USA</p>
                            </div> -->
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"><a class="text-light" href="mailto:<?php echo $setting['email']; ?>"><?php echo $setting['email']; ?></a></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0"><a href="tel:<?php echo($setting['phone']);?>" class="text-light"><?php echo $setting['phone']; ?></a></p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="<?php echo($setting['twitter']); ?>"target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="<?php echo($setting['facebook']);?>"target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="<?php echo($setting['linkedin']);?>" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="<?php  echo($setting['instagram'])?>" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="<?php  echo("https://api.whathsapp.com/send?phone=".$setting['whatsapp'])?>" target="_blank"><i class="fab fa-whatsapp fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Raccourci</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Accueil</a>
                                <a class="text-light mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>A propos</a>
                                <a class="text-light mb-2" href="service.php"><i class="bi bi-arrow-right text-primary me-2"></i>Nos Services</a>
                                <a class="text-light mb-2" href="team.php"><i class="bi bi-arrow-right text-primary me-2"></i>Notre equipe</a>
                                <a class="text-light mb-2" href="blog.php"><i class="bi bi-arrow-right text-primary me-2"></i>Publications</a>
                                <a class="text-light" href="contact"><i class="bi bi-arrow-right text-primary me-2"></i>Contact</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Liens Populaires</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Accueil</a>
                                <a class="text-light mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>A propos</a>
                                <a class="text-light mb-2" href="service.php"><i class="bi bi-arrow-right text-primary me-2"></i>Nos Services</a>
                                <a class="text-light mb-2" href="team.php"><i class="bi bi-arrow-right text-primary me-2"></i>Notre equipe</a>
                                <a class="text-light mb-2" href="blog.php"><i class="bi bi-arrow-right text-primary me-2"></i>Publications</a>
                                <a class="text-light" href="contact"><i class="bi bi-arrow-right text-primary me-2"></i>Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Alpha-Romeo. </a> Tout droit réservé. 
                        
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Développé par: <a class="text-white border-bottom" href="https://www.linkedin.com/in/jo%C3%ABl-nkiere-613787234/"> Joël Nkiere</a></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>