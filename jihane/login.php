<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databaseproject";

$conn =mysqli_connect($servername, $username, $password, "$dbname");


if(!$conn) {
    die('Could not Connect MySql Server:' .mysql_error());
} else {
    echo 'connected';
}


if (isset($_POST['submit'])) {
 
    
    $firstname = $_POST['nom'];
    $lastname = $_POST['prenom'];
    $phonenumber = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];
    $company = $_POST['Company'];
    $terms = isset($_POST['terms']) ? 1 : 0;
    $registrationType = $_POST['registration-type'];
   
    if ($password != $confirm_password) {
        echo "passwords don't match.";
        exit();
    }
}
    
    if ($registrationType === 'candidat') {
        
        $sql = "INSERT INTO candidat (prenom, nom,phone, email, motdepasse) 
                VALUES ('$firstname','$lastname' '$phoneNumber', '$email', '$password')";
    } elseif ($registrationType === 'recruteur') {
        
        $sql = "INSERT INTO recruteur (prenom,nom, phone, email, motdepasse, entreprise) 
                VALUES ('$firstname','$lastname', '$phoneNumber', '$email', '$password', '$company')";
    } else {
        echo "Type d'enregistrement non valide.";
        exit();
    }


if ($conn->query($sql) === TRUE) {
    echo "Enregistrement réussi !";
} else {
    echo "Erreur lors de l'enregistrement : " . $conn->error;
}


$conn->close();

?>