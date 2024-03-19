<?php
session_start(); // démarrer la session 
// Récupérer l'ID de l'utilisateur à partir de la session
//$userId = $_SESSION['user_id'];
//$recruteurId = $_SESSION['company_id'];
$userId =1;
$recruteurId = 1;
$userRole ='recruteur';

// Vérifier le rôle de l'utilisateur à partir de la session
//$userRole = $_SESSION['user_role'];
 // Assurez-vous que vous stockez le rôle de l'utilisateur dans la session lors de la connexion


$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "jobpply"; // Replace with your database name

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Display a success message if connected successfully
    echo "Connected to the $dbname database successfully.";
} catch(PDOException $e) {
    // Display an error message if unable to connect
    echo "Connection failed: " . $e->getMessage();
}

function getRecruterData ($pdo , $recruteurId) {
// Prepare the SQL query
$sql = "SELECT recruteur.* ,user.* FROM recruteur ,user WHERE idrecruteur = :idrecruteur AND recruteur.iduser = user.iduser";
// Prepare the statement
$stmt = $pdo->prepare($sql);
// Bind the parameter
$stmt->bindParam(':idrecruteur', $recruteurId, PDO::PARAM_INT);
// Execute the statement
$stmt->execute();
// Fetch the data
$recruteurData = $stmt->fetch(PDO::FETCH_ASSOC);
return $recruteurData;
}

$recruteurData =getRecruterData ($pdo , $recruteurId);

// a function that extract all the 
function getImagedata($pdo ,$IDrecruteur){
// Prepare the SQL query
$sql = "SELECT photo.avatar,indx
        FROM recruteur
        JOIN user ON recruteur.iduser = user.iduser
        JOIN photo ON user.iduser = photo.iduser
        WHERE recruteur.idrecruteur = :IDrecruteur
        ORDER BY indx ;
      ";
// Prepare the statement
$stmt = $pdo->prepare($sql);
// Bind the parameter
$stmt->bindParam(':IDrecruteur', $IDrecruteur, PDO::PARAM_INT);
// Execute the statement
$stmt->execute();
// Fetch the data
$Photos = $stmt->fetchALL(PDO::FETCH_ASSOC);
return $Photos;
}

$images = getImagedata($pdo, $recruteurId);
// Initialiser les variables pour stocker les images avec indx égal à 1 et 2
$imageWithIndx1 = null;
$imageWithIndx2 = null;

// Initialiser la variable pour stocker les images avec indx égal à 3
$imageWithIndx3 = array();

// Parcourir les résultats pour trouver les images avec indx égal à 1, 2 ou 3
foreach ($images as $image) {
    if ($image['indx'] == 1) {
        // Stocker l'image avec indx égal à 1
        $imageWithIndx1 = $image['avatar'];
    } elseif ($image['indx'] == 2) {
        // Stocker l'image avec indx égal à 2
        $imageWithIndx2 = $image['avatar'];
    } elseif ($image['indx'] == 3) {
        // Stocker l'image avec indx égal à 3
            $imageWithIndx3[] = $image['avatar'];
        
    }
}
print_r($imageWithIndx1) ;
print_r($imageWithIndx2) ;
print_r($imageWithIndx3);





function fetchrecruteurcard($pdo )
{
    // Prepare the SQL query with LIMIT clause to fetch only the first 6 rows
    $cardQuery = "SELECT recruteur.idrecruteur, user.nom, user.prenom, photo.avatar, recruteur.about
                FROM recruteur
                INNER JOIN photo ON recruteur.iduser = photo.iduser
                INNER JOIN user ON recruteur.iduser = user.iduser"
    ;

    // Prepare the statement
    $stmt = $pdo->prepare($cardQuery);

    // Execute the query
    $stmt->execute();

    // Fetch all rows
    $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Initialize array to store card HTML
    $cardHTML = array();

    // Loop through rows to generate HTML structure
    foreach ($cards as $card) {
        $cardnom = $card['nom'];
        $cardprenom = $card['prenom'];
        $cardAvatar = $card['avatar'];
        $cardabout = $card['about'];
        $cardId = $card["idrecruteur"];
        $truncatedabout = strlen($cardabout) > 50 ? substr($cardabout, 0, 50) . '...' : $cardabout;
        // Generate HTML structure for each card
        
        $cardHTML[] = "
        <div class='d-flex justify-content-between mb-2 pb-2 border-bottom'>
            <div class='d-flex align-items-center hover-pointer'>
                <img class='img-xs rounded-circle' src='../photos/$cardAvatar' alt='' />
                <div class='ml-2'>
                    <p> $cardnom $cardprenom</p>
                    <p class='tx-11 text-muted'>$truncatedabout</p>
                </div>
            </div>
        </div>";
    }

    return $cardHTML;
}
$cards =fetchrecruteurcard($pdo);




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

// Utilisation de la fonction avec l'indice approprié
$index = isset($_POST['index']) ? $_POST['index'] :3; 
uploadImageAndInsertIntoDatabase($pdo , $index);



// Initialise le texte par défaut du bouton
$buttonText = "Edit profile";
/*
// Vérifie si le bouton a été soumis avec la valeur "Modify"
if (isset($_POST['editButton']) && $_POST['editButton'] == "Modify") {
    // Change le texte du bouton en "Edit profile"
    $buttonText = "Edit profile";
}*/



// Génère du code JavaScript pour activer ou désactiver les champs de saisie en fonction du texte du bouton
/*$jsCode = `
<script>
document.getElementById("EditButton").addEventListener("click", function() {
  var inputs = document.querySelectorAll("input");
  
  this.addEventListener("click", function() {
    if (this.textContent == "Edit profile") {
      this.textContent = "Modify";
      inputs.forEach(function(input) {
        input.disabled = false;
      });
    } else if (this.textContent == "Modify") {
      this.textContent = "Edit profile";
      inputs.forEach(function(input) {
        input.disabled = true;
      });
    }
  });
});
</script>`;*/



























?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../btsp/css/bootstrap.css" />
  <link rel="stylesheet" href="profRec.css" />
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <title>Company's Profile</title>
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
  <div class="container">
    <div class="profile-page tx-13">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="profile-header">
            <div class="cover">
              <div class="gray-shade"></div>  
              <!--<form action="proflRec.php" method="post" name="recruteurdata">-->
                <input type="hidden" name="index2" value="2"> <!-- Hidden input for index value -->
                <div >
                  <figure type="button" id="addImageFigure1" class="mb-0 upload-button "> test
                    <img src="../photos/<?php print_r($imageWithIndx1) ; ?>" id="addImage2"  alt="profile cover" style="height: 30vw" />
                  </figure>
                  <input type="file" id="imageInput" style="display: none;" accept="photos/*" name="imageFile" >
                  
                </div>
              <div class="cover-body d-flex justify-content-between align-items-center">
                <div style="display: flex;">
                  <input type="hidden" name="index1" value="1"> <!-- Hidden input for index value --> 
                    <img src="../photos/<?php print_r($imageWithIndx2); ?>" id="addImage1" style="height: 9vw" />
                    <input type="file" id="imageInput" style="display: none;" accept="photos/*" name="imageFile" >
                  <span class="profile-name" style="display: flex;align-self: center; "><?php print_r($recruteurData['nom']);echo" ";print_r($recruteurData['prenom']) ?></span>
                </div>
                <div class="d-none d-md-block">
                  <button type="button" class="btn btn-primary btn-icon-text btn-edit-profile" id="EditButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-edit btn-icon-prepend">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <?php echo $buttonText; ?>
                  </button>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
          <div class="card rounded">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="card-title mb-0">About</h6>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                      <circle cx="12" cy="12" r="1"></circle>
                      <circle cx="19" cy="12" r="1"></circle>
                      <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-edit-2 icon-sm mr-2">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                      </svg>
                      <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-git-branch icon-sm mr-2">
                        <line x1="6" y1="3" x2="6" y2="15"></line>
                        <circle cx="18" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                      </svg>
                      <span class="">Update</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-eye icon-sm mr-2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>
                      <span class="">View all</span></a>
                  </div>
                </div>
              </div>
              
                <p class="text-muted">
                  <textarea name="About" id="About" cols="35" rows="6" disabled style="
                        border: none;
                        background-color: white;
                        resize: none;
                      ">
                      <?php print_r($recruteurData['about']) ;?>
                    </textarea>
                </p>
                <div class="mt-3">
                  <label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
                  <p class="text-muted"><?php print_r($recruteurData['datesignup']) ;?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 font-weight-bold mb-0 text-uppercase">Lives:</label>
                  <p class="text-muted">
                    <input type="text" name="Lives" id="Lives" value="New York, USA" disabled
                      style="border: none; background-color: white" />
                  </p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">
                    <input type="text" name="Email" id="email" value ="<?php print_r($recruteurData['email']) ;?>" disabled
                      style="border: none; background-color: white" />
                  </p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 font-weight-bold mb-0 text-uppercase">Website:</label>
                  <p class="text-muted">
                    <input type="text" name="Email" id="Email" value="<?php print_r($recruteurData['email']) ;?>" disabled
                      style="border: none; background-color: white" />
                  </p>
                </div>
                <div class="mt-3 d-flex social-links" style="justify-content: space-around">
                  <a href="https://web.facebook.com/"
                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"
                    style="border: none !important">
                    <img src="../media/facebook.png" style="width: 25px" alt="" />
                  </a>

                  <a href="https://www.instagram.com/"
                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter"
                    style="border: none !important">
                    <img src="../media/instagramblack.png" style="width: 25px" alt="" />
                  </a>
                  <a href="https://twitter.com/"
                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"
                    style="border: none !important">
                    <img src="../media/twitterblack.png" style="width: 25px" alt="" />
                  </a>
                </div>
              
            </div>
          </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-6 middle-wrapper">
          <div class="row offresframe">
            <iframe src="cards.html" id="offresframe" frameborder="0"></iframe>
          </div>
          
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
        <div class="d-none d-xl-block col-xl-3 right-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <!-- partiee li fiha tsawer  -->
              <div class="card rounded">
                <div class="card-body">
                  <h6 class="card-title">latest photos</h6>
                  <div class="latest-photos">
                    <div class="row">
                      <div class="col-md-4" id="col0">
                        <figure>
                          <img class="img-fluid" id="figure-0" src="../photos/" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col1">
                        <figure>
                          <img class="img-fluid" id="figure-1" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col2">
                        <figure>
                          <img class="img-fluid" id="figure-2" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col3">
                        <figure>
                          <img class="img-fluid" id="figure-3" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col4">
                        <figure>
                          <img class="img-fluid" id="figure-4" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col5">
                        <figure>
                          <img class="img-fluid" id="figure-5" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col6">
                        <figure>
                          <img class="img-fluid" id="figure-6" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col7">
                        <figure>
                          <img class="img-fluid" id="figure-7" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col8">
                        <figure>
                          <img class="img-fluid" id="figure-8" src="../photos/" alt="" />
                        </figure>
                      </div>
                      <div class="col-md-4" id="col9">
                        <figure>
                          <img class="img-fluid" id="figure-9" src="../photos/" alt="" />
                        </figure>
                      </div>

                      
                      <input type="hidden" name="index" value="3">
                      <div class="col-md-4" id="coladd">
                        <figure id="addImageFigure" class="mb-0">
                          <img class="img-fluid" src="../media/add-image.png" alt="Add Image" id="addImage" />
                        </figure>
                      <input type="file" id="imageInput" style="display: none;" accept="photos/*" name="imageFile" >
                      </div>
                      <!--</form>-->


                      <!-- hna katsaali parti lifiha tsawer-->
                    </div>
                    <div class="col-md-12 grid-margin">
                      <div class="card rounded">
                        <div class="card-body">
                          <h6 class="card-title">suggestions for you</h6>
                          <style>
                            .d-flex .ml-2 p {
                              margin-bottom: 0.5vw;
                            }
                          </style>
                          
                          

                          <?php foreach ($cards as $card) {
                            
                            echo $card;
                          }?>
                          
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- right wrapper end -->
              </div>
            </div>
          </div>
          <?php
           // Affiche le code JavaScript généré
          //echo $jsCode; ?>
</body>
<script src="recru.js"></script>
<script src="/btsp/js/printThis.js"></script>
<script src="main.js"></script>
<script src="../btsp/js/popper.min.js"></script>
<script src="../btsp/js/jquery-3.7.1.min.js"></script>
<script src="../btsp/js/bootstrap.js"></script>

</html>