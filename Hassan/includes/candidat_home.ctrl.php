<?php
include('connect.model.php');
session_start();
// $_SESSION['candidat_id'] = $row['iduser'];
global $candida_id;
$candida_id = $_SESSION['candidat_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['getprofile'])) {
   $candida_id = $_POST['getprofile'];
   header("Location: ../indexprofil.php");
}
$sql = "SELECT nom, prenom, email, phone, adresse, phone,specialite, descandidat, datenaissance, nomcv, linkedin, insta, github, discord, candidat.iduser FROM candidat, user WHERE candidat.iduser = user.iduser";
$resault = executeQuery($sql);
print_r($resault);
echo $candida_id;
echo '||||||||||' . $resault[0]['iduser'];
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
$specialite = $resault[0]['specialite'];
$nomcv= $resault[0]['nomcv'];
//links
$linkedin = $resault[0]['linkedin'];
$insta = $resault[0]['insta'];
$github = $resault[0]['github'];
$discord = $resault[0]['discord'];

function updateCandidatLinks($insta, $linkedin, $github, $discord, $idcandidat, $idescandidat, $pdo) {
    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("UPDATE candidat SET insta = :insta, linkedin = :linkedin, github = :github, discord = :discord, descandidat = :descandidat WHERE idcandidat = :idcandidat");
        
        // Bind parameters
        $stmt->bindParam(':insta', $insta);
        $stmt->bindParam(':linkedin', $linkedin);
        $stmt->bindParam(':github', $github);
        $stmt->bindParam(':discord', $discord);
        $stmt->bindParam(':idcandidat', $idcandidat);
        $stmt->bindParam(':descandidat', $idescandidat);
        
        // Execute the statement
        $stmt->execute();
        
        return "Data updated successfully!";
    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['instagraminputp'])) {
    $insta = $_POST['instagraminputp'];
    $linkedin = $_POST['linkedininputp'];
    $github = $_POST['githubinputp'];
    $discord = $_POST['discorinputp'];
    $idescandidat = htmlspecialchars_decode($_POST['discriptioncandidat']);
    global $candida_id;
    
    $result = updateCandidatLinks($insta, $linkedin, $github, $discord, $candida_id, $idescandidat, $pdo);
   header("Location: ../indexprofil.php");
}

?>