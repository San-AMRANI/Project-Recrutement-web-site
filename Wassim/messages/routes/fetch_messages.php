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

$userId = 1;
$user_role = "recruiter"; // User role
$url = $_SERVER['HTTP_REFERER'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$conversationId = isset($params['chat']) ? $params['chat'] : 0;

// Fonction pour récupérer les messages de conversation
function fetchMessagesByConversation($conn, $conversationId)
{
    $messages = array();

    $query = "SELECT id, sender, content, created_at FROM Messages WHERE conversation = ? ORDER BY created_at ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute([$conversationId]);

    $messages = $stmt->fetchAll();

    return $messages;
}

$conversationMessages = fetchMessagesByConversation($conn, $conversationId);

foreach ($conversationMessages as $message) {
    if ($userId == $message["sender"]) {
        echo "
            <div class='message own'>" . $message['content'] . "<span>" . $message['created_at'] . "</span>
            </div>";
    } else {
        echo "
            <div class='message not-own'>" . $message['content'] . "<span>" . $message['created_at'] . "</span>
            </div>";
    }
}

// Fermer la connexion
$conn = null;
?>
