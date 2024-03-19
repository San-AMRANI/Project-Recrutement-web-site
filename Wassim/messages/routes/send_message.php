<?php
// Connexion à la base de données avec PDO
$dsn = 'mysql:host=localhost;dbname=chatroom';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Générer des exceptions en cas d'erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupérer les résultats sous forme de tableau associatif
];

try {
    $conn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $senderId = $_POST["senderId"];
    $conversationId = $_POST["conversationId"];
    $content = $_POST["content"];

    // Valider et nettoyer les entrées si nécessaire

    // Insérer le nouveau message dans la table Messages
    $insertQuery = "INSERT INTO Messages (sender, conversation, content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $success = $stmt->execute([$senderId, $conversationId, $content]);

    if ($success) {
        echo "success";
    } else {
        echo "error";
    }
}

// Fermer la connexion
$conn = null;
?>
