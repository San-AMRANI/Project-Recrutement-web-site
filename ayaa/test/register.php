<?php

include('../../Hassan/includes/connect.model.php');

if (isset($_POST['submit'])) {

    $nom = $_POST['nom'];
    $phone = $_POST['phone'];
    $nom = filter_var($nom, FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = $_POST['prenom'];
    $prenom = filter_var($prenom, FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = $_POST['phone'];
    $entreprise = $_POST['entreprise'];
    $entreprise = filter_var($entreprise, FILTER_SANITIZE_SPECIAL_CHARS);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $motdepasse = md5($_POST['motdepasse']);
    $motdepasse = filter_var($motdepasse, FILTER_SANITIZE_SPECIAL_CHARS);
    $cpass = md5($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_SPECIAL_CHARS);
    $role = $_POST['role'];



    $select = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
    $select->execute([$email]);

    if ($select->rowCount() > 0) {
        $message[] = 'user already exist!';
    } else {
        if ($motdepasse != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            $insert = $conn->prepare("INSERT INTO `user`(nom,prenom, email, motdepasse, role, phone) VALUES(?,?,?,?,?,?)");
            $insert->execute([$nom, $prenom, $email, $motdepasse, $role, $phone]);
            if ($insert) {
                $message[] = 'registered succesfully!';
                //     $iduser = mysqli_insert_id($conn);
                //     if ($role == "recruteur") {
                //        $insert_recruteur = "INSERT INTO recruteur (iduser, entreprise) VALUES ('$iduser', '$entreprise')";
                //        mysqli_query($conn, $insert_recruteur);
                //    } elseif ($role == "candidat") {
                //        $insert_candidat = "INSERT INTO candidat (iduser) VALUES ('$iduser')";
                //        mysqli_query($conn, $insert_candidat);
                //    }else ECHO 'faild!!';
                header('location:login.php');
            }
        }
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

        .form-error {
            color: #ff0000;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>


    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="undraw_settings_tab_mgiw (1).png" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form action="register.php" method="post" id="booking-form">
                        <div class="form-group">
                            <?php
                            if (isset($message)) {
                                foreach ($message as $message) {
                                    echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
                                }
                            }
                            ?>
                            <div class="select-list">
                                <select name="role" id="role" required>
                                    <option value="">ROLE</option>
                                    <option value="recruteur" style="color: black;">Recruteur</option>
                                    <option value="candidat" style="color: black;">Candidat</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-fields-container">
                            <div class="form-group form-input">
                                <input type="text" name="nom" id="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : ''; ?>" required />
                                <label for="nom" class="form-label">NOM</label>
                            </div>
                            <div class="form-group form-input">
                                <input type="text" name="prenom" id="prenom" value="<?= isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>" required />
                                <label for="prenom" class="form-label">PRENOM</label>
                            </div>
                        </div>
                        <div class="input-fields-container">
                            <div class="form-group form-input">
                                <input type="text" name="entreprise" id="entreprise" value="<?= isset($_POST['entreprise']) ? $_POST['entreprise'] : ''; ?>" />
                                <label for="entreprise" class="form-label">COMPANY</label>
                            </div>
                            <div class="form-group form-input">
                                <input type="number" name="phone" id="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" required />
                                <label for="phone" class="form-label">Phone</label>
                            </div>
                        </div>
                        <div class="form-group form-input">
                            <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" required />
                            <label class="form-label">EMAIL</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="password" name="motdepasse" id="motdepasse" value="" required />
                            <label for="motdepasse" class="form-label">PASSWORD</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="password" name="cpass" id="cpass" value="" required />
                            <label for="cpass" class="form-label">CONFIRM PASSWORD</label>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="SIGN UP" class="submit" id="submit" name="submit" />
                            <a href="login.php" class="vertify-booking">YOU HAVE AN ACCOUNT? SIGN IN</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="js/main.js"></script>
    <script>
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
    </script>
</body>

</html>