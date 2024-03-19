<?php

session_start(); // démarrer la session 

$userId = $_SESSION['user_id'];

// Vérifier le rôle de l'utilisateur à partir de la session
$userRole = $_SESSION['user_role'];



$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "jobapply"; // Replace with your database name

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Display a success message if connected successfully
    // echo "Connected to the $dbname database successfully.";
} catch (PDOException $e) {
    // Display an error message if unable to connect
    echo "Connection failed: " . $e->getMessage();
}


function fetchCandidatData($pdo)
{
    // Prepare the SQL query
    $sql = "SELECT candidat.idcandidat, user.nom, prenom, adresse, img_filename,descandidat, phone, specialite, email
    FROM candidat ,user
    where candidat.idcandidat = user.iduser";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();


    // Fetch all rows as an associative array
    $candidatData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($candidatData);
    $id_candi=$candidatData[0]['idcandidat'];
    echo $id_candi;
    return $candidatData;
    
}



$candidats = fetchCandidatData($pdo);

function fetchrecruteur($pdo)
{
    // Prepare the SQL query
    $sql = "SELECT user.nom, prenom
    FROM recruteur ,user
    where recruteur.idrecruteur = user.iduser
    and recruteur.idrecruteur=:id_recruteur";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();


    // Fetch all rows as an associative array
    $nomrecruteur = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $nomrecruteur;
}

$nomrecruteur = fetchCandidatData($pdo);












if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $specialite = $_POST['specialite'];
    $note0 = $_POST['note0'];
    $skill = $_POST['skill0'];
    $note1 = $_POST['note1'];
    $skill1 = $_POST['skill1'];
    $note2 = $_POST['note2'];
    $skill2 = $_POST['skill2'];
    $note3 = $_POST['note3'];
    $skill3 = $_POST['skill3'];
    $note4 = $_POST['note4'];
    $note6 = $_POST['note6'];
    $note7 = $_POST['note7'];
    $note8 = $_POST['note8'];
    $skill4 = $_POST['skill4'];
    $note9 = $_POST['note9'];
    $note10 = $_POST['note10'];
    $skill4 = $_POST['skill4'];
    $LANGUE = '';
    if (isset($_POST['langue']) && is_array($_POST['langue'])) {
        $LANGUE = implode(", ", $_POST['langue']);
    }
    if (isset($_POST['formation'])) {
        $formation = $_POST['formation'];
    }
    $note11 = $_POST['note11'];

    $experience = $_POST['experience'];
    $note12 = $_POST['note12'];
}

$points=array();


function calculerScore($formulaire, $pdo)
{
    // Requête SQL pour récupérer les données pertinentes des candidats
    $sql = "SELECT candidat.idcandidat,specialite,nomFormation, nomlangue, nomcompetence, sum(extract(year FROM experience.datefin)-extract(year FROM experience.datedebut)) AS experience
    FROM candidat,formation,experience,langue,competence
    where candidat.idcandidat = formation.idcandidat
    and  candidat.idcandidat =experience.idcandidat
    and candidat.idcandidat = competence.idcandidat
    and candidat.idcandidat = langue.idcandidat";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $candidats = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($candidats as $candidat) {
        $score = 0;

        // Vérifier si la spécialité correspond et ajouter le score
        if (isset($candidat['specialite']) && isset($_POST['specialite'])) {
            if ($candidat['specialite'] == $_POST['specialite']) {
                // Faites quelque chose
                $score += $_POST["note0"];
            }
        }



        // Vérifier l'expérience et ajouter le score
        if (isset($candidat['experience']) && isset($_POST['experience'])) {
            if ($candidat['experience'] == $_POST['experience']) {
                $score += $_POST['note12'];
            }else if($_POST['experience'] == '6'){
                if($candidat['experience'] > '5'){
                    $score += $_POST['note12'];
                }
            }
        }

        // Vérifier chaque compétence et ajouter le score
        for ($i = 1; $i <= 5; $i++) {
            $j = $i - 1;
            $skill = 'skill' . $j;
            $note = "note$i";
            if (isset($_POST[$skill])) {
                if ($candidat['nomcompetence'] == $_POST[$skill]) {
                    $score += $_POST[$note];
                }
            }
        }

        // Vérifier chaque langue et ajouter le score

        for($i=6; $i<=10; $i++){
            if(isset($_POST["langue".$i]) && $_POST["langue".$i] === $candidat['nomlangue']){
                $score+= $_POST["note".$i];
            }
        }


        
        if (isset($candidat['nomFormation']) && isset($_POST['formation'])) {

            // Vérifier la formation et ajouter le score
            if ($candidat['nomFormation'] == $_POST['formation']) {
                $score += $_POST['note11'];
            }
        }

        // Ajouter le score calculé pour ce candidat
        $scores[$candidat['idcandidat']] = $score;
    }

    return $scores;
}
$points = calculerScore($_POST, $pdo);








function fetchcandidatcard($pdo,$userId)
{
    // Prepare the SQL query with LIMIT clause to fetch only the first 6 rows
    $cardQuery = "SELECT candidat.idcandidat, user.nom, user.prenom,titre
    FROM candidat,postulation,recruteur,offre,user
    where candidat.iduser=user.iduser
    and candidat.idcandidat=postulation.idcandidat
    and offre.idoffre=postulation.idoffre
    and offre.idrecruteur=recruteur.idrecruteur
    ";


    // Prepare the statement
    $stmt = $pdo->prepare($cardQuery);

    // Execute the query
    //$stmt->execute();

    // Fetch all rows
    $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Initialize array to store card HTML
    $cardHTML = array();

    // Loop through rows to generate HTML structure
    foreach ($cards as $card) {
        $cardnom = $card['nom'];
        $cardprenom = $card['prenom'];
        $cardabout = $card['titre'];

        // $truncatedabout = strlen($cardabout) > 50 ? substr($cardabout, 0, 50) . '...' : $cardabout;
        // Generate HTML structure for each card
        $cardHTML[] = "
        <div class='d-flex justify-content-between mb-2 pb-2 border-bottom'>
            <div class='d-flex align-items-center hover-pointer'>
                
                <div class='ml-2'>
                    <p> $cardnom $cardprenom</p>
                    <p> $cardnom $cardprenom</p>
                    <p class='tx-11 text-muted'>$cardabout</p>
                </div>
            </div>
        </div>";
    }

    return $cardHTML;
}
$cards = fetchcandidatcard($pdo,$userId);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres de Candidat</title>
    <link rel="stylesheet" href="../btsp/css/bootstrap.css">
    <link rel="stylesheet" href="../Wassim/style.css">
    <link rel="stylesheet" href="recruteurHome.css">

</head>

<body class="bg-body-tertiary">
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
              <!-- Logo -->
              <a class="navbar-brand" href="acceuil.php" style="color: black; font-size: larger; font-weight:900;">Jobpply</a>

          
              <!-- Toggler button for mobile view -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
              <!-- Navbar links and buttons -->
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 listt">
                  <!-- Navigation Links -->
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="acceuil.php" style="color: #6c63ff;">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="homelink" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Hassan/index.php">Offers</a>
                  </li>
                  <!-- la page des candidats reste confidentiel seul les recruteurs peuvent la voir-->
                  <?php if($userRole == "recruteur") {?>
                  <li class="nav-item">
                  <a class="nav-link" href="../jihane/recruteurHome.php">Candidate</a>
                  </li> 
                  <?php }?>
                  <li class="nav-item">
                    <a class="nav-link" id="contactlink" href="../Wassim/contact.php" style="margin-right: 10px;">Contact us</a>
                  </li>
                </ul>
                <!-- Login and Sign Up buttons for mobile view -->
                <?php if(isset($_SESSION["userId"])){ ?>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="../../cp/ayaa/test/login.php" class="btn btn-outline-primary me-2" type="button" style="padding: 8px 20px; background-color: #6c63ff;border: none; color: white;">Login</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../cp/ayaa/test/register.php" class="btn btn-primary" type="button" style="padding: 8px 20px;background-color: #ff6347;border: none;">Sign Up</a>
                  </li>
                  <?php }else { ?> 
                  <li style="list-style: none;">
                  <span
                class="nav-link badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-badge border rounded-pill">
                <img class="nav-link profile rounded-circle me-1" width="24" height="24" src="../media/logoo.jpeg"
                    alt="profile" />
                <a class="nav-link" href="../ayaa/test/logout.php">logout</a>
            </span>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </nav>
          
    </div>


    <h1 class="text-center">Professional Profile: Discover the Candidates' CVs</h1>
    <h3 class="text-center">Discover the Profile of Our Talents</h3>




    <div class="card-list container">

        <aside class="sidebar-filter container ">
            <form action="" method="post" enctype="multipart/form-data">
                <p>
                <h5 class="text-center">Filter</h5>
                </p>
                <div class="reset-submit container btn-group">
                    <button type="reset" class="btn btn-outline-primary reset">Reset</button>
                    <button type="submit" class="btn btn-outline-primary submit">Submit</button>

                </div>

                <hr>
                <label for="spécialité"><b>Speciality:</b></label>
                <select id="spécialité" class="form-select" name="specialite">
                    <option selected disabled>Choose ..</option>
                    <option value="developpement web">Développement Web</option>
                    <option value="developpement logiciel">Développement Logiciel</option>
                    <option value="réseaux informatique">Réseaux Informatique</option>
                    <option value="administration système">Administration Système</option>
                    <option value="design graphique">Design Graphique</option>
                    <option value="marketing">Marketing Digital</option>
                    <option value="finance">Finance</option>

                </select>

                <label for="note0"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note0" id="note0">
                <hr>
                <div id="skill">
                    <div class="ligne">
                        <label for="skill0"><b>Skill:</b></label>
                        <input type="text" name="skill0" id="skill">
                        <br>
                        <label for="note1"><b>Mark:</b></label>
                        <input type="number" min="1" max="5" value="1" name="note1" id="note1">
                    </div>

                    <div id="skill1" class="skill">
                        <div class="ligne">
                            <label for="skill1"><b>Skill:</b></label>
                            <input type="text" name="skill1" id="skill1">
                            <br>
                            <label for="note2"><b>Mark:</b></label>
                            <input type="number" min="1" max="5" value="1" name="note2" id="note2">
                        </div>
                    </div>
                    <div id="skill2" class="skill">
                        <div class="ligne">
                            <label for="skill2"><b>Skill:</b></label>
                            <input type="text" name="skill2" id="skill2">
                            <br>
                            <label for="note3"><b>Mark:</b></label>
                            <input type="number" min="1" max="5" value="1" name="note3" id="note3">
                        </div>
                    </div>
                    <div id="skill3" class="skill">
                        <div class="ligne">
                            <label for="skill3"><b>Skill:</b></label>
                            <input type="text" name="skill3" id="skill3">
                            <br>
                            <label for="note4"><b>Mark:</b></label>
                            <input type="number" min="1" max="5" value="1" name="note4" id="note4">
                        </div>
                    </div>
                    <div id="skill4" class="skill">
                        <div class="ligne">
                            <label for="skill4"><b>Skill:</b></label>
                            <input type="text" name="skill4" id="skill4">
                            <br>
                            <label for="note5"><b>Mark:</b></label>
                            <input type="number" min="1" max="5" value="1" name="note5" id="note5">
                        </div>
                    </div>

                    <button type="button" id="add-skill">Add</button>

                </div>

                <hr>
                <label for="langue"><b>Language:</b></label><br>

                <input type="checkbox" value="Arabic" name="langue6" id="langue">
                <label for="langue">Arabic</label>
                <br>
                <label for="note6"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note6" id="note6"><br>


                <input type="checkbox" value="French" name="langue7" id="langue6">
                <label for="langue">French</label>
                <br>
                <label for="note7"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note7" id="note7">
                <br>
                <input type="checkbox" value="English" name="langue8" id="langue">
                <label for="langue">English</label>
                <br>
                <label for="note8"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note8" id="note8"><br>

                <input type="checkbox" value="Spanish" name="langue9" id="langue">
                <label for="langue">Spanish</label>
                <br>
                <label for="note9"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note9" id="note9"><br>

                <input type="checkbox" value="German" name="langue10" id="langue">
                <label for="langue">German</label>
                <br>
                <label for="note10"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note10" id="note10"><br>
                <hr>
                <label for="formation"><b>Formation:</b></label>
                <select id="Formation" name="formation" class="form-select">
                    <option selected disabled>Choose ..</option>
                    <option value="Licence">Licence</option>
                    <option value="Master">Master</option>
                    <option value="Doctorat">Doctorat</option>
                    <option value="Private Certificate">Private Certificate</option>


                </select>
                <label for="note11"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note11" id="note11"><br>
                <hr>
                <label for="experience"><b>Experience:</b></label>
                <select id="experience" class="form-select" name="experience">
                    <option selected disabled>Choose ..</option>
                    <option value="1">1year</option>
                    <option value="2">2years</option>
                    <option value="3">3years</option>
                    <option value="4">4years</option>
                    <option value="5">5years</option>
                    <option value="6">> 5years</option>




                </select>
                <label for="note12"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note12" id="note12"><br>
                

            </form>

        </aside>


        <div class="card-list-nav">
            <div class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid"> <!-- Move the container-fluid outside of the pagination -->

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="reply">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Reply</button>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">People Reply To Your Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">



                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <!--<h6 class="card-title">suggestions for you</h6>-->
                                <div
                          class="d-flex justify-content-between mb-2 pb-2 border-bottom"
                        >
                          <div class="d-flex align-items-center hover-pointer">
                            <img
                              class="img-xs rounded-circle"
                              src="https://bootdey.com/img/Content/avatar/avatar2.png"
                              alt=""
                            />
                            <div class="ml-2">
                              <p>Mike Popescu</p>
                              <p class="tx-11 text-muted">Titre de Post</p>
                            </div>
                          </div>
                          <button class="btn btn-icon">
                             <img src="../media/enveloppe.png" with="20px" height="20px">
                          </button>
                        </div>
                        <!--<div
                          class="d-flex justify-content-between mb-2 pb-2 border-bottom"
                        >
                          <div class="d-flex align-items-center hover-pointer">
                            <img
                              class="img-xs rounded-circle"
                              src="https://bootdey.com/img/Content/avatar/avatar3.png"
                              alt=""
                            />
                            <div class="ml-2">
                              <p>Mike Popescu</p>
                              <p class="tx-11 text-muted">Titre de Post</p>
                            </div>
                          </div>
                          <button class="btn btn-icon">
                            <img src="../media/enveloppe.png" with="20px" height="20px">
                          </button>
                        </div>
                        <div
                          class="d-flex justify-content-between mb-2 pb-2 border-bottom"
                        >
                          <div class="d-flex align-items-center hover-pointer">
                            <img
                              class="img-xs rounded-circle"
                              src="https://bootdey.com/img/Content/avatar/avatar4.png"
                              alt=""
                            />
                            <div class="ml-2">
                              <p>Mike Popescu</p>
                              <p class="tx-11 text-muted">Titre de Post</p>
                            </div>
                          </div>
                          <button class="btn btn-icon">
                             <img src="../media/enveloppe.png" with="20px" height="20px">
                          </button>
                        </div>
                        <div
                          class="d-flex justify-content-between mb-2 pb-2 border-bottom"
                        >
                          <div class="d-flex align-items-center hover-pointer">
                            <img
                              class="img-xs rounded-circle"
                              src="https://bootdey.com/img/Content/avatar/avatar5.png"
                              alt=""
                            />
                            <div class="ml-2">
                              <p>Mike Popescu</p>
                              <p class="tx-11 text-muted">Titre de Post</p>
                            </div>
                          </div>
                          <button class="btn btn-icon">
                             <img src="../media/enveloppe.png" with="20px" height="20px">
                          </button>
                        </div>
                        <div
                          class="d-flex justify-content-between mb-2 pb-2 border-bottom"
                        >
                          <div class="d-flex align-items-center hover-pointer">
                            <img
                              class="img-xs rounded-circle"
                              src="https://bootdey.com/img/Content/avatar/avatar6.png"
                              alt=""
                            />
                            <div class="ml-2">
                              <p>Mike Popescu</p>
                              <p class="tx-11 text-muted">Titre de Post</p>
                            </div>
                          </div>
                          <button class="btn btn-icon">
                             <img src="../media/enveloppe.png" with="20px" height="20px">
                          </button>
                        </div>
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center hover-pointer">
                            <img
                              class="img-xs rounded-circle"
                              src="https://bootdey.com/img/Content/avatar/avatar7.png"
                              alt=""
                            />
                            <div class="ml-2">
                              <p>Mike Popescu</p>
                              <p class="tx-11 text-muted">Titre de Post</p>
                            </div>
                          </div>
                          <button class="btn btn-icon">
                             <img src="../media/enveloppe.png" with="20px" height="20px">
                          </button>
                        </div>-->

                                <?php foreach ($cards as $card) {

                                    echo $cards;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="alignement-card">
            <?php
            // Vérifier si $candidats est un tableau ou un objet
            if (is_array($candidats) || is_object($candidats)) {
                // Boucle pour chaque candidat
                foreach ($candidats as $resultat) {
                    // Assurez-vous que $points contient les scores calculés pour chaque candidat

                    // Vérifier si le score pour ce candidat existe dans $points
                    if (isset($points)) {
                        // $score = $points[$resultat['idcandidat']];
                    } else {
                        $score = 0; // Si le score n'est pas défini, définissez-le à zéro
                    }

            ?>

                    <div class="card">
                        <div class="card-body">
                            <div>
                                <img class="img_recruteur" src="../media/<?php echo $resultat['img_filename']; ?>" alt="">
                            </div>
                            <div class="titre_offre">
                                <h5 id="nom-candidat"> <b><?php echo $resultat['nom']; ?>&nbsp;<?php echo $resultat['prenom']; ?></b></h5></b></h5>
                                <span class="badge rounded-pill text-bg-success">Score:<?php echo $score; ?>/100</span>
                            </div>

                            <p>
                                <span class="badge rounded-pill text-bg-danger specialiste_offre"><?php echo $resultat['specialite']; ?></span>

                            </p>
                            <p><span class="badge text-bg-info">Description
                                </span> &nbsp; <?php echo $resultat['descandidat']; ?></p>

                            <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                                <b><?php echo $resultat['adresse']; ?></b>
                            </p>
                            <p class="email"> <img src="../media/@.png" width="20px" alt="">
                                <b><?php echo $resultat['email']; ?></b>
                            </p>
                            <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                                <b><?php echo $resultat['phone']; ?></b>
                            </p>


                            <div class="msg-post">
                                <form method="post" action="../Hassan/includes/candidat_home.ctrl.php">
                                    <input type="text" hidden value="<?php  echo $id_candi?>">
                                    <input type="submit" value="View Profil" class="btn btn-postuler" name="getprofil">
                            </form>
                                <a href="#" class="btn-msg">Send Message</a>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>

            <!--<div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/pic.png" alt="">
                </div>
                <div class="titre_offre">
                    <h5 id="nom-candidat"> <b>hhh</b></h5>
                    <span class="badge rounded-pill text-bg-success">Score:100/100</span>
                </div>
               
                <p>
                    <span class="badge rounded-pill text-bg-danger specialiste_offre">Developpement Web</span>
                    
                    </p>
                    <p><span class="badge text-bg-info">Description

                    </span> &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et quasi cupiditate voluptas. Omnis, temporibus. Eligendi ipsum, voluptas non numquam laborum sequi quae minima nostrum praesentium voluptatibus doloribus recusandae nihil debitis. ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia ipsam quam totam soluta vitae hic, dolorem reiciendis perspiciatis tempora laudantium, odit fuga nulla atque at, aliquam laboriosam magni id.</p>
                
                    <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                        <b>Casablanca</b>
                    </p>
                    <p class="email"> <img src="../media/@.png" width="20px" alt="">
                        <b>xxx@email.com</b>
                    </p>
                    <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                        <b>0611111111</b>
                    </p>
    
                    
                    <div class="msg-post"><a href="#" class="btn-postuler">View More</a>
                    <a href="#" class="btn-msg">Send Message</a></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/pic.png" alt="">
                </div>
                <div class="titre_offre">
                    <h5 id="nom-candidat"> <b>;;</b></h5>
                    <span class="badge rounded-pill text-bg-success">Score:100/100</span>
                </div>
                
                <p>
                    <span class="badge rounded-pill text-bg-danger specialiste_offre">Developpement Web</span>
                    
                </p>
                <p><span class="badge text-bg-info">Description
                </span> &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et quasi cupiditate voluptas. Omnis, temporibus. Eligendi ipsum, voluptas non numquam laborum sequi quae minima nostrum praesentium voluptatibus doloribus recusandae nihil debitis. ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia ipsam quam totam soluta vitae hic, dolorem reiciendis perspiciatis tempora laudantium, odit fuga nulla atque at, aliquam laboriosam magni id.</p>
                
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <p class="email"> <img src="../media/@.png" width="20px" alt="">
                    <b>xxx@email.com</b>
                </p>
                <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                    <b>0611111111</b>
                </p>

                
                <div class="msg-post"><a href="#" class="btn-postuler">View More</a>
                <a href="#" class="btn-msg">Send Message</a></div>
            </div>
        </div>
        

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/pic.png" alt="">
                </div>
                <div class="titre_offre">
                    <h5 id="nom-candidat"> <b>,,</b></h5>
                    <span class="badge rounded-pill text-bg-success">Score:100/100</span>
                </div>
                
                <p>
                    <span class="badge rounded-pill text-bg-danger specialiste_offre">Developpement Web</span>
                    
                </p>
                <p><span class="badge text-bg-info">Description
                </span> &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et quasi cupiditate voluptas. Omnis, temporibus. Eligendi ipsum, voluptas non numquam laborum sequi quae minima nostrum praesentium voluptatibus doloribus recusandae nihil debitis. ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia ipsam quam totam soluta vitae hic, dolorem reiciendis perspiciatis tempora laudantium, odit fuga nulla atque at, aliquam laboriosam magni id.</p>
                
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <p class="email"> <img src="../media/@.png" width="20px" alt="">
                    <b>xxx@email.com</b>
                </p>
                <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                    <b>0611111111</b>
                </p>

                
                <div class="msg-post"><a href="#" class="btn-postuler">View More</a>
                <a href="#" class="btn-msg">Send Message</a></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/pic.png" alt="">
                </div>
                <div class="titre_offre">
                    <h5 id="nom-candidat"> <b>..</b></h5>
                    <span class="badge rounded-pill text-bg-success">Score:100/100</span>
                </div>
                
                <p>
                    <span class="badge rounded-pill text-bg-danger specialiste_offre">Developpement Web</span>
                    
                </p>
                <p><span class="badge text-bg-info">Description
                </span> &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et quasi cupiditate voluptas. Omnis, temporibus. Eligendi ipsum, voluptas non numquam laborum sequi quae minima nostrum praesentium voluptatibus doloribus recusandae nihil debitis. ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia ipsam quam totam soluta vitae hic, dolorem reiciendis perspiciatis tempora laudantium, odit fuga nulla atque at, aliquam laboriosam magni id.</p>
                
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <p class="email"> <img src="../media/@.png" width="20px" alt="">
                    <b>xxx@email.com</b>
                </p>
                <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                    <b>0611111111</b>
                </p>

                
                <div class="msg-post"><a href="#" class="btn-postuler">View More</a>
                <a href="#" class="btn-msg">Send Message</a></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/pic.png" alt="">
                </div>
                <div class="titre_offre">
                    <h5 id="nom-candidat"> <b>,,</b></h5>
                    
                    <span class="badge rounded-pill text-bg-success">Score:100/100</span>
                </div>
               
                <p> 
                    <span class="badge rounded-pill text-bg-danger specialiste_offre">Developpement Web</span>
                    
                    
                    
                </p>
                <p><span class="badge text-bg-info">Description
                </span> &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et quasi cupiditate voluptas. Omnis, temporibus. Eligendi ipsum, voluptas non numquam laborum sequi quae minima nostrum praesentium voluptatibus doloribus recusandae nihil debitis. ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia ipsam quam totam soluta vitae hic, dolorem reiciendis perspiciatis tempora laudantium, odit fuga nulla atque at, aliquam laboriosam magni id.</p>
                
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <p class="email"> <img src="../media/@.png" width="20px" alt="">
                    <b>xxx@email.com</b>
                </p>
                <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                    <b>0611111111</b>
                </p>

                
                <div class="msg-post"><a href="#" class="btn-postuler">View More</a>
                <a href="#" class="btn-msg">Send Message</a></div>
            </div>
        </div>
        -->

        </div>

       
    </div>

    <script src="btsp/js/popper.min.js"></script>
    <script src="btsp/js/jquery-3.7.1.min.js"></script>
    <script src="../btsp/js/bootstrap.js"></script>
    <script src="recruteurHome.js"></script>
</body>

</html>