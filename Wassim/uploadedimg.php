<?php

function uploadImageAndInsertIntoDatabase($pdo, $indx)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["imageFile"])) {
        // Récupérez les informations sur l'image téléchargée
        $fileName = $_FILES["imageFile"]["name"];
        $fileTmpName = $_FILES["imageFile"]["tmp_name"];
        $fileError = $_FILES["imageFile"]["error"];

        // Vérifiez s'il n'y a pas d'erreur lors du téléchargement
        if ($fileError === UPLOAD_ERR_OK) {
            // Déplacez le fichier téléchargé vers le dossier "photos" sur le serveur
            $destination = "../photos/" . $fileName;
            move_uploaded_file($fileTmpName, $destination);

            // Maintenant, vous pouvez insérer le nom de l'image dans la base de données
            $iduser = $_SESSION["iduser"]; // Supposons que vous avez déjà démarré une session

            // Préparez la requête SQL pour insérer l'image dans la base de données
            $sql = "INSERT INTO photo (iduser, avatar, indx) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$iduser, $fileName, $indx]);

            // Affichez un message de succès ou effectuez d'autres actions nécessaires
            echo "L'image a été téléchargée avec succès et enregistrée dans la base de données.";
        } else {
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
        }
    }
}