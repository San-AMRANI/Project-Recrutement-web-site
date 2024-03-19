<?php
include('connect.model.php');
session_start();
// $_SESSION['candidat_id'] = $row['iduser'];

$candida_id = $_SESSION['candidat_id'];

$sql = "SELECT nom, prenom, email, phone, adresse, phone, descandidat, datenaissance, nomcv, linkedin, insta, github, discord FROM candidat, user WHERE candidat.iduser = user.iduser";
$resault = executeQuery($sql);

$nom= $resault[0]['nom'];
$prenom = $resault[0]['prenom'];
$fullName = $nom . ' ' . $prenom;
//information personnel
$birthday = $resault[0]['datenaissance'];
$email = $resault[0]['email'];
$phone = $resault[0]['phone'];
$adresse = $resault[0]['adresse'];
$phone = $resault[0]['phone'];
$descandidat = $resault[0]['descandidat'];
$datenaissance = $resault[0]['datenaissance'];
$nomcv= $resault[0]['nomcv'];
//links
$linkedin = $resault[0]['linkedin'];
$insta = $resault[0]['insta'];
$github = $resault[0]['github'];
$discord = $resault[0]['discord'];

var_dump($sql);
print_r($resault);

function updateCandidatLinks($insta, $linkedin, $github, $discord, $idcandidat, $pdo) {
    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("UPDATE candidat SET insta = :insta, linkedin = :linkedin, github = :github, discord = :discord WHERE idcandidat = :idcandidat");
        
        // Bind parameters
        $stmt->bindParam(':insta', $insta);
        $stmt->bindParam(':linkedin', $linkedin);
        $stmt->bindParam(':github', $github);
        $stmt->bindParam(':discord', $discord);
        $stmt->bindParam(':idcandidat', $idcandidat);
        
        // Execute the statement
        $stmt->execute();
        
        return "Data updated successfully!";
    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insta = $_POST['instagraminputp'];
    $linkedin = $_POST['linkedininputp'];
    $github = $_POST['githubinputp'];
    $discord = $_POST['discorinputp'];
    global $candida_id;
    
    $result = updateCandidatLinks($insta, $linkedin, $github, $discord, $candida_id, $pdo);
   header("Location: ../indexprofil.php");
}

?>