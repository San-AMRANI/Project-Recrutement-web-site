<?php
    $host = 'localhost';
    $dbName = 'jobpply';
    $user = 'root';
    $pwd = '';
    $dsn = 'mysql:host=' . $host .';dbname=' . $dbName;
// $dsn = "mysql:host=${host};dbname=${dbName}";

$sql = 'INSERT INTO candidat (adresse, phone, specialite, datenaissance, img_filename) VALUE (:adresse, :phone, :specialite, :datenaissance, :img_filename)';
var_dump($_POST);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['first-name'])) {
    if ($_FILES['file-upload']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['file-upload']['tmp_name'];
        $filename = basename($_FILES['file-upload']['name']);
        $destination = 'imguploads/' . $filename;  // Change 'uploads/' to your desired folder path

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($tmp_name, $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to move the uploaded file.";
        }
    }
    $adresse = $_POST['inputAddress'];
    $phone = $_POST['inputTele'];
    $specialite = $_POST['inputSpécialité'];
    $datenaissance = $_POST['date-naissance'];
    try {
        // $iduser = $_POST['userid']; // Assuming you have a way to get the user ID
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':specialite', $specialite);
        $stmt->bindParam(':datenaissance', $datenaissance);
        $stmt->bindParam(':img_filename', $filename);

        // $stmt->bindParam(':iduser', $iduser);
        $stmt->execute();
        // header("Location: ../index.php");
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}
?>