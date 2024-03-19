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
$sql = "SELECT nom, prenom, email, phone, adresse, phone,specialite, descandidat, datenaissance, img_filename, nomcv, linkedin, insta, github, discord, candidat.iduser FROM candidat, user WHERE candidat.iduser = user.iduser";
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
$img_filename = $resault[0]['img_filename'];
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

// Assuming this code block is inside a file processing form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pdfdb'])) {
    // Decode the base64-encoded file data
    $fileData = $_POST['pdfdb'];
    $decodedFileData = base64_decode($fileData);

    // Define the directory where you want to store the uploaded files
    $uploadDirectory = '../../uploads/';

    // Get the original file name from the request (assuming it's sent along with the base64-encoded data)
    $originalFileName = $_POST['originalFileName']; // Adjust this according to your form input name

    // Specify the file path
    $filePath = $uploadDirectory . $originalFileName;

    // Save the file to the specified directory
    if (file_put_contents($filePath, $decodedFileData) !== false) {
        try {
            // Prepare SQL statement
            $stmt = $pdo->prepare("UPDATE candidat SET nomcv = :nomcv WHERE idcandidat = :idcandidat");

            // Bind parameters
            $stmt->bindParam(':nomcv', $originalFileName);

            // Assuming you have the idcandidat stored in a session variable named $_SESSION['idcandidat']
            // $idcandidat = $_SESSION['idcandidat'];
            $stmt->bindParam(':idcandidat', $candida_id);

            // Execute the statement
            $stmt->execute();

            // Redirect to the desired page after successful upload and database update
            header("Location: ../indexprofil.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Failed to save the uploaded file.";
    }
}

?>