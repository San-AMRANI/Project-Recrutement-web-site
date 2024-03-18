<?php

include 'connect.php';

session_start();

$recruteur_id = $_SESSION['recruteur_id'];

if(!isset($recruteur_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>RECRUTEUR page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<h1 class="title"> <span>RECRUTEUR</span> profile page </h1>

<section class="profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `user` WHERE id = ?");
      $select_profile->execute([$recruteur_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

   <div class="profile">
      
     
      <a href="#" class="btn">update profile</a>
      <a href="logout.php" class="delete-btn">logout</a>

   </div>

</section>

</body>
</html>