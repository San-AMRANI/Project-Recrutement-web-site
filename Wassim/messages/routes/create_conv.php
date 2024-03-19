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

$senderId = 1; // Remplacer par l'identifiant réel de l'expéditeur
$receiverId = 2; // Remplacer par l'identifiant réel du destinataire

function createConversation($senderId, $receiverId, $conn)
{
    // Vérifier si l'expéditeur est un recruteur
    $senderRoleQuery = "SELECT role FROM users WHERE id = ?";
    $senderRoleStmt = $conn->prepare($senderRoleQuery);
    $senderRoleStmt->execute([$senderId]);
    $senderRole = $senderRoleStmt->fetchColumn();

    if ($senderRole !== 'recruiter') {
        return "Unauthorized: Only recruiters can create conversations.";
    }

    // Vérifier si le destinataire est un candidat
    $receiverRoleQuery = "SELECT role FROM users WHERE id = ?";
    $receiverRoleStmt = $conn->prepare($receiverRoleQuery);
    $receiverRoleStmt->execute([$receiverId]);
    $receiverRole = $receiverRoleStmt->fetchColumn();

    if ($receiverRole !== 'candidate') {
        return "Unauthorized: Conversations can only be created with candidates.";
    }

    // Vérifier si une conversation existe déjà
    $conversationQuery = "SELECT id FROM conversations WHERE recruiter = ? AND candidate = ?";
    $conversationStmt = $conn->prepare($conversationQuery);
    $conversationStmt->execute([$senderId, $receiverId]);
    $conversationRow = $conversationStmt->fetch();

    if ($conversationRow) {
        // La conversation existe déjà, récupérer son ID
        $conversationId = $conversationRow['id'];
    } else {
        // La conversation n'existe pas encore, créer une nouvelle conversation
        $createConversationQuery = "INSERT INTO conversations (recruiter, candidate) VALUES (?, ?)";
        $createConversationStmt = $conn->prepare($createConversationQuery);
        $createConversationStmt->execute([$senderId, $receiverId]);

        // Récupérer l'ID de la conversation nouvellement créée
        $conversationId = $conn->lastInsertId();
    }

    return $conversationId;
}

// Vérifier si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senderId = $_POST['senderId'] ?? null;
    $receiverId = $_POST['receiverId'] ?? null;

    if ($senderId !== null && $receiverId !== null) {
        $result = createConversation($senderId, $receiverId, $conn);
        echo $result;
    } else {
        echo "Invalid request parameters.";
    }
}

// Fermer la connexion
$conn = null;
?>
