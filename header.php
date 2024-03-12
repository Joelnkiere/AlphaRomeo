<?php
 error_reporting(0);
    include "administrate/admin/conn.php";
 $settings = mysqli_query($con,"SELECT * FROM settings");
    $setting  = mysqli_fetch_array($settings);
?>

<div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <!-- <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i></small> -->
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><a href="tel:<?php echo($setting['phone'])?>"target="_blank" class="text-light"><?php echo $setting['phone']; ?></a></a></small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i><a href="mailto:<?php echo($setting['email'])?>" target="_blank" class="text-light"><?php echo $setting['email']; ?></a></small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo($setting['twitter']); ?>" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo($setting['fb']);?>" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo($setting['linkedin']);?>" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo($setting['instagram']); ?>" target="_blank"><i class="fab fa-instagram fw-normal" target="_blank"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo($setting['youtube']);?>" target="_blank"><i class="fab fa-youtube fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://wa.me/<?php echo($setting['whatsapp']);?>" target="_blank"><i class="fab fa-whatsapp fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    