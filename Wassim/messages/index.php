<?php
$host = 'localhost';
$dbname = 'chatroom';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// from Auth
$userId = 1;
$user_role = "recruiter"; // User role
$conversationId = isset($_GET['chat']) ? $_GET['chat'] : 0;


function fetchConversationById($conn, $conversationId)
{
    $query = "SELECT c.id, c.recruiter, c.candidate, c.createdAt, 
                     r.name AS recruiter_name, r.avatar AS recruiter_avatar, 
                     d.name AS candidate_name, d.avatar AS candidate_avatar
              FROM conversations c
              INNER JOIN users r ON c.recruiter = r.id
              INNER JOIN users d ON c.candidate = d.id
              WHERE c.id = :conversationId";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':conversationId', $conversationId);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$conversationInfo = fetchConversationById($conn, $conversationId);

if ($conversationId != 0) {
    if ($userId != $conversationInfo['recruiter'] && $userId != $conversationInfo['candidate']) {
        die("Unauthorized Access! ");
    }
}

function fetchUserById($conn, $userId)
{
    $query = "SELECT id, name, role, avatar FROM users WHERE id = :userId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$user = fetchUserById($conn, $userId);

function fetchConversationsRecruiter($conn, $userId, $user_role)
{
    $conversationsQuery = "SELECT conversations.id, users.id as participant_id, users.name, users.avatar
                           FROM conversations
                           INNER JOIN users ON conversations.candidate = users.id
                           WHERE conversations.recruiter = :userId";

    $stmt = $conn->prepare($conversationsQuery);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $conversations = array();

    while ($conversation = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $participantName = $conversation['name'];
        $participantAvatar = $conversation['avatar'];
        $conversationId = $conversation["id"];

        $conversations[] = "
                <li>
                    <a href='?chat=$conversationId'>
                    <div class='infos'>
                    <img src='$participantAvatar' alt='Avatar' /> 
                    <p>$participantName</p>
                    </div>
                    <div class='status online'></div>
                    </a>
                </li>
            ";
    }

    return $conversations;
}

function fetchConversationsCandidate($conn, $userId, $user_role)
{
    $conversationsQuery = "SELECT conversations.id, users.id as participant_id, users.name, users.avatar
                           FROM conversations
                           INNER JOIN users ON conversations.recruiter = users.id
                           WHERE conversations.candidate = :userId";

    $stmt = $conn->prepare($conversationsQuery);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $conversations = array();

    while ($conversation = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $participantName = $conversation['name'];
        $participantAvatar = $conversation['avatar'];
        $conversationId = $conversation["id"];

        $conversations[] = "
                <li>
                    <a href='?chat=$conversationId'>
                    <div class='infos'>
                    <img src='$participantAvatar' alt='Avatar' /> 
                    <p>$participantName</p>
                    </div>
                    <div class='status'></div>
                    </a>
                </li>
            ";
    }

    return $conversations;
}

// Fetch conversations related to the user
$conversations = $user_role === "recruiter" ? fetchConversationsRecruiter($conn, $userId, $user_role) : fetchConversationsCandidate($conn, $userId, $user_role);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>chatroom</title>
  <link rel="stylesheet" href="../btsp/css/bootstrap.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <link rel="stylesheet" href="styles.css" />
</head>

<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light" style="display: flex">
      <div class="container-fluid" style="justify-content: center; margin: 0">
        <!-- Logo -->
        <a class="navbar-brand" href="index.html" style="color: black; font-size: larger; font-weight: 900">Jobpply</a>

        <!-- Toggler button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links and buttons -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 listt">
            <!-- Navigation Links -->
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../Wassim/index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="homelink" href="../Wassim/index.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html" style="color: #6c63ff">Offers</a>
            </li>
            <!-- la page des candidats reste confidentiel seul les recruteurs peuvent la voir-->
            <?php if($userRole == "recruteur") {?>
                  <li class="nav-item">
                  <a class="nav-link" href="../jihane/recruteurHome.html">Candidate</a>
                  </li> 
                  <?php }?>
                  <li class="nav-item">
                    <a class="nav-link" id="contactlink" href="contact.php" style="margin-right: 10px;">Contact us</a>
                  </li>
                </ul>
                <!-- Login and Sign Up buttons for mobile view -->
                <?php if(! isset($_SESSION["userId"])){ ?>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="../ayaa/aya.html" class="btn btn-outline-primary me-2" type="button" style="padding: 8px 20px; background-color: #6c63ff;border: none; color: white;">Login</a>
                  </li>
                  <li class="nav-item">
                    <a href="../ayaa/aya.html" class="btn btn-primary" type="button" style="padding: 8px 20px;background-color: #ff6347;border: none;">Sign Up</a>
                  </li>
                  <?php }else { ?> 
                  <li>
                  <span
                class="nav-link badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-badge border rounded-pill">
                <img class="nav-link profile rounded-circle me-1" width="24" height="24" src="../media/logo.jpeg"
                    alt="profile" />
                <a class="nav-link" href="../jihane/profilCandidat.html">Username</a>
            </span>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </nav>
  </div>
  <style>
    .fas.fa-bars {
      color: white;
      padding: 2px;
      border-radius: 2px;
      margin-top: 3px;
    }

    .listt .nav-link {
      color: black;
      /* This will change the color of the links */
    }

    /* Ensure that the navbar-brand (logo) has adequate spacing */
    .navbar-brand {
      margin-right: 1rem;
      /* Adjust the space as needed */
    }

    /* Style for the navbar links to space them out */
    .navbar-nav .nav-link {
      margin-left: 1rem;
      /* Adjust the space as needed */
    }

    /* Adjust the margin for the buttons on large screens */
    @media (min-width: 992px) {
      .navbar .d-flex {
        margin-left: auto;
        /* This will push the button links to the right */
      }
    }

    .navbar-nav .listt .nav-link {
      color: black !important;
      /* Force override */
    }

    /* Specific overrides for the buttons */
    .navbar-nav .listt .btn-outline-primary {
      background-color: #6c63ff !important;
      /* Login button background */
      color: white !important;
      /* Text color */
    }

    .navbar-nav .listt .btn-outline-primary:hover {
      opacity: 0.8 !important;
      /* Hover effect */
    }

    .navbar-nav .listt .btn-primary {
      background-color: #ff6347 !important;
      /* Sign Up button background */
    }

    .navbar {
      background-color: transparent;
      z-index: 1000;
      /* Any value higher than what .one-8pn might have */
    }
  </style>

  <!-- Start Chat System -->
  <div class="chat-system">
    <div class="container chat-container">
      <!-- Contacts -->
      <div class="contacts">
        <ul id="conversations">

          <?php
          // Output the generated conversation HTML
          foreach ($conversations as $conversation) {
            echo $conversation;
          }
          ?>


        </ul>
      </div>
      <!-- Chat -->
      <div class="chat">
        <!-- No Chat selected -->
        <?php
        if ($conversationId == 0) {
          return;
        }
        ?>
        <div class="chat-selected">
          <div class="nav">
            <img src='<?php echo $conversationInfo['recruiter'] == $userId ? $conversationInfo['candidate_avatar'] : $conversationInfo['recruiter_avatar'] ?>' />
            <p style="text-transform: capitalize;"><?php echo $conversationInfo['recruiter'] == $userId ? $conversationInfo['candidate_name'] : $conversationInfo['recruiter_name'] ?></p>

          </div>
          <div class="messages">
            <div class="messages_wrapper" id="messages_wrapper">


            </div>




            <div class="send-message" id="sendMessageContainer">
              <form id="sendMessageForm">
                <input type="text" id="send-message" name="send-message" placeholder="Your message" />
                <button type="submit">
                  <i class="fa fa-paper-plane"></i>
                </button>
              </form>
              <div id="errorMessage"></div>
            </div>

          </div>
        </div>
        <!-- Chat selected -->

      </div>
    </div>
    <!-- End Chat System -->
    <!-- Send Message Script -->
    <script defer>
      $(document).ready(function() {
        $("#sendMessageForm").submit(function(e) {
          e.preventDefault();

          let messageContent = $("#send-message").val();

          if (messageContent.trim() !== "") {
            $.ajax({
              type: "POST",
              url: "routes/send_message.php", // Replace with the actual path to your PHP script for sending messages
              data: {
                senderId: <?php echo $userId; ?>,
                conversationId: <?php echo $conversationId; ?>,
                content: messageContent
              },
              success: function(response) {
                if (response === "success") {
                  // Clear the input field
                  $("#send-message").val("");

                  // Fetch and display new messages
                  // fetchAndDisplayMessages();
                } else {
                  $("#errorMessage").html("Failed to send message.");
                }
              },
              error: function() {
                $("#errorMessage").html("Error in AJAX request.");
              }
            });
          } else {
            $("#errorMessage").html("Message cannot be empty.");
          }
        });





      });
    </script>

    <!-- Realtime data script -->
    <script defer>
      function loadXMLDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("messages_wrapper").innerHTML =
              this.responseText;
          }
        };
        xhttp.open("GET","routes/fetch_messages.php", true);
        xhttp.send();
        document.querySelector(".chat").scrollTo(0, document.querySelector(".chat").scrollHeight);

      }
      setInterval(function() {
        loadXMLDoc();
        // 1sec
      }, 1000);

      window.onload = loadXMLDoc;
    </script>
</body>

</html>

