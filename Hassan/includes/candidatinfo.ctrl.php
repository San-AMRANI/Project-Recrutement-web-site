<?php
// Start the session
session_start();

include('connect.model.php');

function insertcandida()
{
   global $pdo;
   var_dump($_POST);

   $sql = 'INSERT INTO candidat (adresse, phone, specialite, datenaissance, img_filename) 
            VALUES (:adresse, :phone, :specialite, :datenaissance, :img_filename)';

   try {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inputTele'])) {
         if (isset($_POST['fileData'])) {
            $fileData = $_POST['fileData'];
            // Process the file data as needed
            // For example, save it to a file
            $fileName = 'uploads/' . uniqid() . '.png'; // Generate a unique file path
            file_put_contents($fileName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fileData)));
            echo "File uploaded successfully.";
         } else {
            echo "No file data received.";
         }

         $adresse = $_POST['inputAddress'];
         $phone = $_POST['inputTele'];
         $specialite = $_POST['inputSpécialité'];
         $datenaissance = $_POST['date-naissance'];

         $stmt = $pdo->prepare($sql);

         // Bind parameters
         $stmt->bindParam(':adresse', $adresse);
         $stmt->bindParam(':phone', $phone);
         $stmt->bindParam(':specialite', $specialite);
         $stmt->bindParam(':datenaissance', $datenaissance);
         $stmt->bindParam(':img_filename', $fileName); // Use the file path here

         $stmt->execute();
      }
   } catch (PDOException $e) {
      echo "Erreur d'insertion : " . $e->getMessage();
   }
}
insertcandida();

function insertFormFor($index)
{
   global $pdo;

   // Ensure index is numeric and within range
   if (!is_numeric($index) || $index < 0 || $index >= 4) {
      echo "Invalid form index.";
      return;
   }

   // Retrieve form data
   $nomFormation = $_POST["formation$index"];
   $datedebut = $_POST["dateDebut$index"];
   $datefin = $_POST["dateFin$index"];
   $etablissement = $_POST["etablissement$index"];
   $descriptionfor = isset($_POST["descriptionfor$index"]) ? $_POST["descriptionfor$index"] : "";
   $ville = $_POST["ville$index"];

   // Store form data in session
   $_SESSION["form_data"][$index] = [
      "etablissement$index" => $etablissement,
      "formation$index" => $nomFormation,
      "ville$index" => $ville,
      "dateDebut$index" => $datedebut,
      "dateFin$index" => $datefin,
      "descriptionfor$index" => $descriptionfor
   ];

   // Insert data into the database
   $sql = "INSERT INTO formation (nomFormation, datedebut, datefin, etablissement, descriptionfor, ville, idcandidat) 
            VALUES (:nomFormation, :datedebut, :datefin, :etablissement, :descriptionfor, :ville, :idcandidat)";
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(":nomFormation", $nomFormation);
   $stmt->bindParam(":datedebut", $datedebut);
   $stmt->bindParam(":datefin", $datefin);
   $stmt->bindParam(":etablissement", $etablissement);
   $stmt->bindParam(":descriptionfor", $descriptionfor);
   $stmt->bindParam(":ville", $ville);
   // Set the candidate ID accordingly
   // For example, if the candidate ID is stored in a session variable named 'idcandidat'
   // $idcandidat = $_SESSION["idcandidat"];
   $idcandidat = 2; // Replace '2' with the actual candidate ID
   $stmt->bindParam(":idcandidat", $idcandidat);
   // Execute the SQL statement
   if ($stmt->execute()) {
      echo "Form $index data inserted successfully.<br>";
   } else {
      echo "Error inserting data for Form $index.<br>";
   }
}

function preFillFormFields($index)
{
   if (isset($_SESSION["form_data"][$index])) {
      $formData = $_SESSION["form_data"][$index];

      // Pre-fill the 'etablissement' input field
      echo "value='" . htmlspecialchars($formData["etablissement$index"]) . "'";

      // Pre-fill the 'formation' input field
      echo "value='" . htmlspecialchars($formData["formation$index"]) . "'";

      // Pre-fill the 'ville' input field
      echo "value='" . htmlspecialchars($formData["ville$index"]) . "'";

      // Pre-fill the 'dateDebut' input field
      echo "value='" . htmlspecialchars($formData["dateDebut$index"]) . "'";

      // Pre-fill the 'dateFin' input field
      echo "value='" . htmlspecialchars($formData["dateFin$index"]) . "'";

      // Pre-fill the 'descriptionfor' textarea field
      echo ">" . htmlspecialchars($formData["descriptionfor$index"]);
   }
}

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   for ($i = 0; $i < 4; $i++) {
      if (isset($_POST["formation$i"])) {
         insertFormFor($i);
      }
   }
}
