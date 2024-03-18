<?php

include 'connect.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $motdepasse = md5($_POST['motdepasse']);
   echo $motdepasse;
   $motdepasse = filter_var($motdepasse, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $select = $conn->prepare("SELECT * FROM `user` WHERE email = ? AND motdepasse = ?");
   $select->execute([$email, $motdepasse]);
   $row = $select->fetch(PDO::FETCH_ASSOC);

   if($select->rowCount() > 0){

      if($row['role'] == 'recruteur'){

         $_SESSION['recruteur_id'] = $row['iduser'];
         header('location:recruteur_home.php');

      }elseif($row['role'] == 'candidat'){

         $_SESSION['candidat_id'] = $row['iduser'];
         header('location:candidat_home.php');

      }else{
         $message[] = 'no user found!';
      }
      
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .input-fields-container {
  display: flex;
  justify-content: space-between;
}
    </style>
</head>
<body>


    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="undraw_Team_up_re_84ok (1).png" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form action="login.php" method="post" id="booking-form">

                        <h2>SIGN IN</h2>
                        <?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
                        <div class="form-group form-input">
                            <input type="email" name="email" id="email" value="" required/>
                            <label  class="form-label">EMAIL</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="password" name="motdepasse" id="motdepasse" value="" required />
                            <label for="motdepasse" class="form-label">PASSWORD</label>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="SIGN IN" class="submit" id="submit" name="submit" />
                            <a href="register.php" class="vertify-booking">YOU D'ONT HAVE ACCOUNT? SIGN UP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="js/main.js"></script>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var companyField = document.getElementById('entreprise');
            var roleSelect = document.getElementById('role');
    
            roleSelect.addEventListener('change', function() {
                if (roleSelect.value === 'recruteur') {
                    companyField.style.display = 'block';
                } else {
                    companyField.style.display = 'none';
                }
            });
        });
    </script> -->
</body>
</html>