<?php
session_start(); // démarrer la session 
// Récupérer l'ID de l'utilisateur à partir de la session
//$userId = $_SESSION['user_id'];
$userId=1;

// Vérifier le rôle de l'utilisateur à partir de la session
//$userRole = $_SESSION['user_role']; // Assurez-vous que vous stockez le rôle de l'utilisateur dans la session lors de la connexion
$userRole="recruteur";














?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../btsp/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid" >
              <!-- Logo -->
              <a class="navbar-brand" href="acceuil.php" style="color: black; font-size: larger; font-weight:900;">Jobpply</a>

          
              <!-- Toggler button for mobile view -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
              <!-- Navbar links and buttons -->
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 listt">
                  <!-- Navigation Links -->
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="acceuil.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="homelink" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Hassan/index.html">Offers</a>
                  </li>
                 <!-- la page des candidats reste confidentiel seul les recruteurs peuvent la voir-->
                 <?php if($userRole == "recruteur") {?>
                  <li class="nav-item">
                  <a class="nav-link" href="../jihane/recruteurHome.php">Candidate</a>
                  </li> 
                  <?php }?>
                  <li class="nav-item">
                    <a class="nav-link" id="contactlink" href="../Wassim/contact.php" style="margin-right: 10px;">Contact us</a>
                  </li>
                </ul>
                <!-- Login and Sign Up buttons for mobile view -->
                <?php if( isset($_SESSION["userId"])){ ?>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="../../cp/ayaa/test/login.php" class="btn btn-outline-primary me-2" type="button" style="padding: 8px 20px; background-color: #6c63ff;border: none; color: white;">Login</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../cp/ayaa/test/register.php" class="btn btn-primary" type="button" style="padding: 8px 20px;background-color: #ff6347;border: none;">Sign Up</a>
                  </li>
                  <?php }else { ?> 
                  <li style="list-style: none;">
                  <span
                class="nav-link badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-badge border rounded-pill">
                <img class="nav-link profile rounded-circle me-1" width="24" height="24" src="../media/logoo.jpeg"
                    alt="profile" />
                <a class="nav-link" href="../ayaa/test/logout.php">logout</a>
            </span>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </nav>
          
    </div>


    
    <section class="ftco-section img" style="background-image: url(../media/bg_1.jpg.webp); background-position: top center; height: 700px;">
        <div class="container" style="padding-top: 500px;margin-left: 30px !important; ">
            <div class="col-md-8 ftco-animate  text-md-left mb-5 fadeInUp ftco-animated">
                <p class="breadcrumbs mb-0" style="font-weight: 600;"><span class="mr-3"><a style="color: black; font-family: 'nunito',arial,sans-serif;" href="index.html" >Home <img src="../media/right.png" style="width: 40px;"   > </a></span> <span style="color: rgb(0,0,0, 0.7);">Contact</span></p>
                <h1 class="mb-3 bread" style="    font-size: 60px;
                color: #000000;
                line-height: 1.2;
                font-weight: 900;">Contact Us</h1>
                </div>
        </div>
        </section>
        <div class="container-fluid" style=" padding:100px 112px;">
            <div class="heaad"  style="color: black; margin-bottom: 30px;">
                <h2>Contact Information</h2>
            </div>
            <div class="row" >
                <div class="col-md-3">
                    <p ><span style="font-weight: 600;color: black;">Address</span>:   198 rue Zerktouni , Faculté des sciences et techniques ,  Settat/Casablanca</p>
                </div>
                <div class="col-md-3">
                    <p ><span style="font-weight: 600;color: black;">Phone: </span> +212 664025605</p>
                </div>
                <div class="col-md-3">
                    <p><span style="font-weight: 600;color: black;">Email:</span> WassimBoutrasseyt@gmail.com</p>
                </div>
                <div class="col-md-3">
                   <p> <span style="font-weight: 600;color: black;">Website :</span>Jobpply.com</p>
                </div>

            </div>


        <div class="row block-9" style="margin-top: 100px;">
            <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
            <div class="form-group">
            <input type="text" class="form-control" style="margin-bottom:  10px;" placeholder="Your Name">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" style="margin-bottom:  10px;" placeholder="Your Email">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" style="margin-bottom:  10px;" placeholder="Subject">
            </div>
            <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message" style="height: 89px; margin-bottom: 10px;"></textarea>
            </div>
            <div class="form-group">
            <input type="submit" style="margin: 20px 20px;" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
            </form>
            </div>
            <div class="col-md-6 d-flex">
                <div id="map" style="height:400px; width:100%;">
                    <script>
                        var map = L.map('map').setView([33.030736138345574, -7.616614513907288], 18); // Ajustez le niveau de zoom selon le besoin
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                      </script>
                      
                </div>

            </div>
            </div>



            <style>

.contact-form {
    width: 100%; /* Utilisez toute la largeur disponible */
    /* Ajoutez des marges si nécessaire */
}
            </style>

    </div>       
<footer class="ftco-footer ftco-bg-dark ftco-section">
  <div class="container">
  <div class="row mb-5">
  <div class="col-md">
  <div class="ftco-footer-widget mb-4">
  <h2 class="ftco-heading-2">About</h2>
  <p>At Jobpply, we're revolutionizing the way people connect with their next great opportunity.
     Our mission is simple: to bridge the gap between talented individuals seeking meaningful careers and innovative companies looking for dynamic talent.
    Join us, and let's shape the future of work together.</p>
  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
  <li class="ftco-animate"><a style="padding-right: 30px;" href="https://twitter.com" target="_blank"><img style="width: 25px;" src="../media/twitter.png" alt=""></a></li>
  <li class="ftco-animate"><a style="padding-right: 30px;" href="https://facebook.com" target="_blank"><img style="width: 25px;" src="../media/facebook-app-symbol.png" alt=""></a></li>
  <li class="ftco-animate"><a href="https://instagram.com" target="_blank"><img style="width: 25px;" src="../media/instagram.png" alt=""></a></li>
  
  </ul>
  </div>
  </div>
  <div class="col-md">
  <div class="ftco-footer-widget mb-4">
  <h2 class="ftco-heading-2">Employers</h2>
  <ul class="list-unstyled" >
  <ul class="list-unstyled" >
  <li><a href="#" class="py-2 d-block">How it works</a></li>
  <li><a href="#" class="py-2 d-block">Register</a></li>
  <li><a href="#" class="py-2 d-block">Post a Job</a></li>
  <li><a href="#" class="py-2 d-block">Advance Skill Search</a></li>
  <li><a href="#" class="py-2 d-block">Recruiting Service</a></li>
  <li><a href="#" class="py-2 d-block">Blog</a></li>
  <li><a href="#" class="py-2 d-block">Faq</a></li>
  </ul>
  </div>
  </div>
  <div class="col-md">
  <div class="ftco-footer-widget mb-4 ml-md-4">
  <h2 class="ftco-heading-2">Workers</h2>
  <ul class="list-unstyled">
  <li><a href="#" class="py-2 d-block">How it works</a></li>
  <li><a href="#" class="py-2 d-block">Register</a></li>
  <li><a href="#" class="py-2 d-block">Post Your Skills</a></li>
  <li><a href="#" class="py-2 d-block">Job Search</a></li>
  <li><a href="#" class="py-2 d-block">Employer Search</a></li>
  </ul>
  </div>
  </div>
  <div class="col-md">
  <div class="ftco-footer-widget mb-4">
  <h2 class="ftco-heading-2">Have a Questions?</h2>
  <div class="block-23 mb-3">
  <ul>
  <li><span class="icon icon-map-marker"></span><span class="text">103 Faculté des Sciences et Techniques, Casablanca Settat ,Morocco  </span></li>
  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+212 664025605</span></a></li>
  <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="b6dfd8d0d9f6cfd9c3c4d2d9dbd7dfd898d5d9db">BoutrasseytWassim @gmail.com</span></span></a></li>
  </ul>
  </div>
  </div>
  </div>
  </div>
  </div>
  </footer>
        
  

<script src="main.js"></script>
<script src="../btsp/js/bootstrap.js"></script>

</body>
</html>