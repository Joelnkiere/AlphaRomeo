
<?php

    error_reporting(0);
    include "administrate/admin/conn.php";
   
  
    //fetch blogs 
    //fetch blog
    $blog = mysqli_query($con,"SELECT * FROM blog ORDER BY id DESC");

    //fetch category

    $cat = mysqli_query($con,"SELECT * FROM category ORDER BY id DESC");


    //fetch recent post
    $recent = mysqli_query($con,"SELECT * FROM blog ORDER BY id DESC LIMIT 3");
    
     //fetch settings
    $settings = mysqli_query($con,"SELECT * FROM settings");
    $setting  = mysqli_fetch_array($settings);


?>

<?php
include 'securite.php';
date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");
if (isset ($_POST['envoyer'])) {
    $nom1=$_POST['nom'];
    $nom=securite(str_replace("'", "\'",$nom1));
    $telephone1=$_POST['telephone'];
    $telephone=securite(str_replace("'","\'",$telephone1));
    $service1=$_POST['service'];
    $service=securite(str_replace("'","\'",$service1));
    $detail1=$_POST['detail'];
    $detail=securite(str_replace("'","\'",$detail1));


    $req=$con->prepare("INSERT INTO commande (nomcli,telephone,service,detail,date_com,etat) VALUES(?,?,?,?,?,?)");
    $req->bind_param("ssssss",$name,$phone,$service,$detaille,$date,$etat);
    $name=$nom;
    $phone=$telephone;
    $service=$service;
    $detaille=$detail;
    $date=$today;
    $etat='non lu';

    if ($req->execute()) {

        echo("<script>alert('Votre commande a été envoyée!!');</script>");
        // code...
    }else{
        echo"<script>alert('la commane a échoué!!');</script>";
            $req->error;
    }




}
//$con->close();

?>


<!DOCTYPE html>
<html lang="fr">

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
  <!--   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php include("header.php");?>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
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
                    <a href="#" class="nav-item nav-link active">Accueil</a>
                    <a href="about.php" class="nav-item nav-link">A propos</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="blog.php" class="nav-item nav-link">Publication</a>
                    <!--  <a href="evennement.php" class="nav-item nav-link">Evennement</a> -->
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
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="#" class="btn btn-primary py-2 px-4 ms-3">Nos offres</a>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">La Startup innovante</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">La technologie à votre service avec<br/> Alpha-Romeo</h1>
                            <a href="quote.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Commander un service</a>
                            <a href="contact.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Nous contacter</a>
                            <div id="horloge" style="font-size: 36px;"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/photo21.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">La Startup innovante</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Osez Aller plus loin avec notre expertise informatique</h1>
                            <a href="quote.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">commander un service</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Nous contacter</a>
                            <div id="horloge1" style="font-size: 36px;"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/photo.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">La Startup innovante</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">La startup idéal en Rdc</h1>
                            <a href="quote.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">commander un service</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Nous contacter</a>
                            <div id="horloge2" style="font-size: 36px;"></div>
                        </div>

                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


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
    
    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">A propos de Nous</h5>
                        <h1 class="mb-0">Améliorez votre expérience numérique avec Alpha-Romeo.</h1>
                    </div>
                    <p class="mb-4">Alpha-Romeo est une startup informatique basée à Kinshasa en République Démocratique du Congo. Elle se spécialise dans la création de solutions numériques, le marketing digital ainsi que la dispense des formations professionnelles en programmation informatique.<br/> 
                    La mission d'Alpha-Romeo est de fournir des solutions innovantes et adaptées aux besoins de ses clients afin d'améliorer leur expérience numérique et leur permettre d'atteindre leurs objectifs de manière efficace.<br/> 
                    La startup est composée d'une équipe de professionnels passionnés et expérimentés dans le domaine de la technologie de l'information et de la communication.</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Des services de qualité</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Un personnel Professionnel</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Assistance 24h/24 et 7j/7</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Des prix équitables</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Contactez-nous pour toutes vos questions.</h5>
                            <h4 class="text-primary mb-0"><a href="tel:<?php echo($setting['phone2']); ?>"><?php echo $setting['phone2']; ?></a></h4>
                        </div>
                    </div>
                    <a href="quote.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Commander un service</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/alpharomeo.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pourquoi nous choisir</h5>
                <h1 class="mb-0">Nous sommes Leader en solutions numériques pour vos entreprise.</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Fiabilité</h4>
                            <p class="mb-0">nous sommes fiables et nous respectons les échéances de livraison des projets que nous entreprenons. Nous nous engageons à fournir des services de qualité à nos clients.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Prix compétitifs</h4>
                            <p class="mb-0">nous offrons des tarifs compétitifs pour les services que nous fournissons, tout en assurant une qualité de travail inégalée.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="img/feature.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Professionalisme</h4>
                            <p class="mb-0">nous avons une équipe de professionnels qualifiés avec une expérience avérée dans le domaine de la technologie de l'information et de la communication. Nous sommes passionnés et fiers de fournir des solutions innovantes à nos clients pour répondre à leurs besoins et dépasser leurs attentes.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>24/7 Service Client</h4>
                            <p class="mb-0">notre équipe est disponible pour répondre à toutes vos questions ou préoccupations à tout moment. Notre objectif est de fournir un service client exceptionnel et de vous permettre d'atteindre vos objectifs numériques.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Nos Services</h5>
                <h1 class="mb-0">Alpha-Romeo vous propose des services suivants:</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-3">Graphisme</h4>
                        <p class="m-0">Vous cherchez à donner vie à vos idées créatives?</br> notre équipe des graphistes talentueux est prête à transformer vos concepts en designs visuellement époustouflants.</p>
                        <a class="btn btn-lg btn-primary rounded" href="service.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-chart-pie text-white"></i>
                        </div>
                        <h4 class="mb-3">Marketing Digital</h4>
                        <p class="m-0">Vous voulez augmenter votre visibilité en ligne et atteindre votre public cible ?</br>
Notre équipe de marketing digital est là pour vous aider à développer des stratégies efficaces pour promouvoir votre entreprise. </p>
                        <a class="btn btn-lg btn-primary rounded" href="service.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-code text-white"></i>
                        </div>
                        <h4 class="mb-3">Formations Professionnelles</h4>
                        <p class="m-0">Nous vous offrons l'opportunité d'acquérir les compétences nécessaires en programmation pour réussir dans le monde numérique d'aujourd'hui.</p>
                        <a class="btn btn-lg btn-primary rounded" href="service.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fab fa-android text-white"></i>
                        </div>
                        <h4 class="mb-3">Création sites web et App </h4>
                        <p class="m-0">Notre équipe de développeurs compétents est spécialisée dans la création de sites web et d'applications sur mesure.</p>
                        <a class="btn btn-lg btn-primary rounded" href="service.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">Optimisation & referencement</h4>
                        <p class="m-0">De la gestion des réseaux sociaux à l'optimisation du référencement, nous vous apportons les outils et les connaissances nécessaires pour accroître votre présence en ligne et générer des résultats concrets</p>
                        <a class="btn btn-lg btn-primary rounded" href="service.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                        <h3 class="text-white mb-3">Appelez-nous</h3>
                        <p class="text-white mb-3">Contactez-nous dès aujourd'hui pour discuter de vos besoins et découvrir comment nous pouvons vous aider à atteindre vos objectifs digitaux. </p>
                        <h2 class="text-white mb-0"><a href="tel:<?php echo($setting['phone']); ?>" class="text-light"><?php echo $setting['phone']; ?></a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Commander un service</h5>
                        <h1 class="mb-0">Besoin d'un service numerique ?<br/>N'hésitez pas à nous contacter</h1>
                    </div>
                    <div class="row gx-2">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Réponse sous 24h</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h6 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>Assistance téléphonique 24h/24</h6>
                        </div>
                    </div>
                    <p class="mb-4">Chez Alpha-Romeo, nous sommes passionnés par la création de solutions digitales innovantes et sur mesure pour nos clients en RDC. Faites confiance à notre expertise pour développer votre présence en ligne, attirer de nouveaux clients et développer votre entreprise.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">contactez-nous pour vos préocccupations</h5>
                            <h4 class="text-primary mb-0"><a href="tel:<?php echo($setting['phone']);?>"><?php echo $setting['phone'];?></a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="nom" class="form-control bg-light border-0" placeholder="Votre nom" style="height: 55px;" required autocomplete="off">
                                </div>
                                <div class="col-12">
                                    <input type="tel" name="telephone" class="form-control bg-light border-0" placeholder="votre numero de telephone" style="height: 55px;" required autocomplete="off">
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" name="service" style="height: 55px;" required>
                                        <option value="aucun serfvice selectionné" selected>Selectionner un service</option>
                                        <option value="marketing Digital">marketing Digital</option>
                                        <option value="Graphisme">Graphisme</option>
                                        <option value="Formation">Formation</option>
                                        <option value="site web ou App">site web ou App</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" name="detail" rows="3" placeholder="Donnez les details" required autocomplete="off"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" name="envoyer" type="submit">Commander</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Publications recentes</h5>
                <h1 class="mb-0">Lisez nos publications les plus recentes</h1>
            </div>
            <div class="row g-5">

                        <?php   
                        while ($row=mysqli_fetch_array($recent)){
                       
                        ?>
                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">

                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="administrate/admin/images/blog/<?php echo $row['img']; ?>" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="#"><?php echo $row['category']; ?></a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i><?php echo $row['auteur']?></small>
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $row['date']; ?></small>
                                    </div>
                                    <h4 class="mb-3"><a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                                    <p><?php 
                            $ddesc = $row['descrip']; 
                        echo $dec = substr($ddesc,0,180);
                        ?>...</p>
                                    <a class="text-uppercase" href="detail.php?id=<?php echo $row['id']; ?>">Voir plus <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                     
                        <?php  } ?>
                    </div>
        </div>
    </div>
    <!-- Blog Start -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="about.php" class="navbar-brand">
                            <h1 class="m-0 text-white"><!-- <img src="img/alpharomeo.png" width="50px;"> -->Alpha-Romeo</h1>
                        </a>
                        <p class="mt-3 mb-4">Alpha-Romeo est une startup informatique basée à Kinshasa en République Démocratique du Congo. Elle se spécialise dans la création de solutions numériques. le marketing digital ainsi que la dispense des formations professionnelles en programmation informatique.</p>
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

    <script>
        function afficherHeure() {
            var date = new Date();
            var heures = date.getHours();
            var minutes = date.getMinutes();
            var secondes = date.getSeconds();

            heures = (heures < 10) ? "0" + heures : heures;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            secondes = (secondes < 10) ? "0" + secondes : secondes;

            var horloge = heures + ":" + minutes + ":" + secondes;
            document.getElementById("horloge").textContent = horloge;
        }

        setInterval(afficherHeure, 1000); // Met à jour l'heure toutes les secondes
    </script>
    <script>
        function afficherHeure() {
            var date = new Date();
            var heures = date.getHours();
            var minutes = date.getMinutes();
            var secondes = date.getSeconds();

            heures = (heures < 10) ? "0" + heures : heures;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            secondes = (secondes < 10) ? "0" + secondes : secondes;

            var horloge = heures + ":" + minutes + ":" + secondes;
            document.getElementById("horloge1").textContent = horloge;
        }

        setInterval(afficherHeure, 1000); // Met à jour l'heure toutes les secondes
    </script>
    <script>
        function afficherHeure() {
            var date = new Date();
            var heures = date.getHours();
            var minutes = date.getMinutes();
            var secondes = date.getSeconds();

            heures = (heures < 10) ? "0" + heures : heures;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            secondes = (secondes < 10) ? "0" + secondes : secondes;

            var horloge = heures + ":" + minutes + ":" + secondes;
            document.getElementById("horloge2").textContent = horloge;
        }

        setInterval(afficherHeure, 1000); // Met à jour l'heure toutes les secondes
    </script>
</body>

</html>