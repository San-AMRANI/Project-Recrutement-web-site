<?php

session_start(); // démarrer la session 

 



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
    echo "Connected to the $dbname database successfully.";
} catch(PDOException $e) {
    // Display an error message if unable to connect
    echo "Connection failed: " . $e->getMessage();
}


function fetchCandidatData($pdo) {
    // Prepare the SQL query
    $sql = "SELECT user.nom, prenom, adresse, description, phone, specialite, email
    FROM candidat ,user
    where candidat.idcandidat = user.iduser";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();
    
    
    // Fetch all rows as an associative array
    $candidatData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $candidatData;
}

$candidats = fetchCandidatData($pdo);

function fetchrecruteur($pdo) {
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












if ($_SERVER["REQUEST_METHOD"] == "POST") 

{

$specialite = $_POST['specialite'];
$note0 = $_POST['note0'];
$skill = $_POST['skill'];
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
    $formation = $_POST['formation'];}
$note11 = $_POST['note11'];

$experience= $_POST['experience'];
$note12 = $_POST['note12'];

}

function calculerScore($formulaire, $pdo) {
    // Requête SQL pour récupérer les données pertinentes des candidats
    $sql = "SELECT candidat.idcandidat,specialite,nomFormation, nomlangue, nomcompetence, sum(extract(year FROM experience.datefin)-extract(year FROM experience.datedebut))
    FROM candidat,formation,experience,langue,competence
    where candidat.idcandidat = formation.idcandidat
    and  candidat.idcandidat =experience.idcandidat
    and candidat.idcandidat = competence.idcandidat
    and candidat.idcandidat = langue.idcandidat";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $candidats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $scores = array();
    
    foreach ($candidats as $candidat) {
        $score = 0;

        // Vérifier si la spécialité correspond et ajouter le score
        if (isset($candidat['specialite']) && isset($formulaire['specialite'])) {
            if ($candidat['specialite'] == $formulaire['specialite']) {
                // Faites quelque chose
                $score += $candidat['note0'];
            }
        } 
        
        

        // Vérifier l'expérience et ajouter le score
        if (isset($candidat['experience']) && isset($formulaire['experience'])) {
            if ($candidat['experience'] == $formulaire['experience']) {
            $score += $candidat['note12'];
        }
    }

        // Vérifier chaque compétence et ajouter le score
        for ($i = 0; $i < 5; $i++) {
            $skill = "skill$i";
            $note = "note$i";
            if (isset($formulaire[$skill])) {
                if ($candidat['nomcompetence'] == $formulaire[$skill]) {
                    $score += $candidat[$note.'_comp'];
                }
            }
        }

        // Vérifier chaque langue et ajouter le score
        if (isset($formulaire['LANGUE'])) {
        $langues = explode(", ", $formulaire['LANGUE']);
        foreach ($langues as $langue) {
            $note_langue = "note_" . $langue;
            if ($candidat['nomlangue'] == $langue) {
                $score += $candidat[$note_langue];
            }
        }
    }
        if (isset($candidat['nomFormation']) && isset($formulaire['formation'])) {
            
        // Vérifier la formation et ajouter le score
        if ($candidat['nomFormation'] == $formulaire['formation']) {
            $score += $candidat['note11'];
        }}

        // Ajouter le score calculé pour ce candidat
        $scores[$candidat['idcandidat']] = $score;
    }

    return $scores;
}
$points = calculerScore($_POST, $pdo);








function fetchcandidatcard($pdo)
{
    // Prepare the SQL query with LIMIT clause to fetch only the first 6 rows
    $cardQuery = "SELECT idcandidat, user.nom, prenom, avatar
                  FROM candidat, photo ,user,postulation
        
                  WHERE candidat.idcandidat = photo.iduser
                  and user.iduser = candidat.idcandidat
                  and candidat.idcandidat = postulation.idcandidat
                  LIMIT 6";

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
        $cardAvatar = $card['avatar'];
        $cardabout = $card['about'];
        $cardId = $card["idcandidat"];
        $truncatedabout = strlen($cardabout) > 50 ? substr($cardabout, 0, 50) . '...' : $cardabout;
        // Generate HTML structure for each card
        $cardHTML[] = "
        <div class='d-flex justify-content-between mb-2 pb-2 border-bottom'>
            <div class='d-flex align-items-center hover-pointer'>
                <img class='img-xs rounded-circle' src='photo/$cardAvatar' alt='' />
                <div class='ml-2'>
                    <p> $cardnom $cardprenom</p>
                    <p class='tx-11 text-muted'>$truncatedabout</p>
                </div>
            </div>
        </div>";
    }

    return $cardHTML;
}
$cards =fetchcandidatcard($pdo);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres de Candidat</title>
    <link rel="stylesheet" href="../btsp/css/bootstrap.css">
    
    <link rel="stylesheet" href="recruteurHome.css">

</head>

<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg container nav-underline">

        <div>
            <img src="../media/logo.jpeg" alt="logo" class="logo">
            <a class="navbar-brand" href="index.html">JobApply</a>
        </div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../Wassim/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Offres</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                </ul>

            </div>
            <span
                class="nav-link badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-badge border  rounded-pill">
                <img class="nav-link profile rounded-circle me-1" width="24" height="24" src="../media/logo.jpeg"
                    alt="profile"> <a class="nav-link" href="">Mike Baydon</a>
            </span>
        </div>
    </nav>
   

    <h1 class="text-center">Professional Profile: Discover the Candidates' CVs</h1>
    <h3 class="text-center">Discover the Profile of Our Talents</h3>
    



    <div class="card-list container">

        <aside class="sidebar-filter container ">
            <form action="" method="post" >
                <p>
                <h5 class="text-center">Filter</h5>
                </p>

                
                <hr>
                <label for="spécialité"><b>Speciality:</b></label>
                <select id="spécialité" class="form-select" name="specialite">
                    <option selected>Choose ..</option>
                    <option value="developpement_web">Développement Web</option>
                    <option value="developpement_logiciel">Développement Logiciel</option>
                    <option value="réseaux_informatique">Réseaux Informatique</option>
                    <option value="administration_système">Administration Système</option>
                    <option value="design_graphique">Design Graphique</option>
                    <option value="marketing">Marketing Digital</option>
                    <option value="finance">Finance</option>
                    
                </select>
                
                <label for="note0"><b>Mark:</b></label>
                <input type="number" min="1" max="5" value="1" name="note0" id="note0">
                <hr>
                <div id="skill">
                    <div class="ligne">
                    <label for="skill"><b>Skill:</b></label>
                    <input type="text" name="skill" id="skill">
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
                
               <input type="checkbox" name="langue" id="langue">
               <label for="language">Arabic</label>
               <br>
               <label for="note6"><b>Mark:</b></label>
                    <input type="number" min="1" max="5" value="1" name="note6" id="note6"><br>
                   
               
               <input type="checkbox" name="language" id="language">
               <label for="language">French</label>
               <br>
               <label for="note7"><b>Mark:</b></label>
               <input type="number" min="1" max="5" value="1" name="note7" id="note7">
               <br>
               <input type="checkbox" name="language" id="language">
               <label for="language">English</label>
               <br>
               <label for="note8"><b>Mark:</b></label>
               <input type="number" min="1" max="5" value="1" name="note8" id="note8"><br>

               <input type="checkbox" name="language" id="language">
               <label for="language">Spanish</label>
                <br>
               <label for="note9"><b>Mark:</b></label>
               <input type="number" min="1" max="5" value="1" name="note9" id="note9"><br>
               
               <input type="checkbox" name="language" id="language">
               <label for="language">German</label>
               <br>
               <label for="note10"><b>Mark:</b></label>
               <input type="number" min="1" max="5" value="1" name="note10" id="note10"><br>
                <hr>
                <label for="formation"><b>Formation:</b></label>
                <select id="Formation" class="form-select">
                    <option selected>Choose ..</option>
                    <option value="licence">Licence</option>
                    <option value="master">Master</option>
                    <option value="Doctorat">Doctorat</option>
                    <option value="Private Certificate">Private Certificate</option>
                    
                    
                </select>
                <label for="note11"><b>Mark:</b></label>
               <input type="number" min="1" max="5" value="1" name="note11" id="note11"><br>
                <hr>
                <label for="experience"><b>Experience:</b></label>
                <select id="experience" class="form-select" name="experience">
                    <option selected>Choose ..</option>
                    <option value="1year">1year</option>
                    <option value="2years">2years</option>
                    <option value="3years">3years</option>
                    <option value="4years">4years</option>
                    <option value="5years">5years</option>
                    <option value="> 5years">> 5years</option>
                    

                    
                    
                </select>
                <label for="note12"><b>Mark:</b></label>
               <input type="number" min="1" max="5" value="1" name="note12" id="note12"><br>
               <div class="reset-submit container btn-group">
                    <button type="reset"  class="btn btn-outline-primary reset">Reset</button>
                    <button  type="submit"class="btn btn-outline-primary submit">Submit</button>
                      
                </div>
                
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
                        <!--<div
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
                        <div
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
                          }?>
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
                if (isset($resultat['idcandidat']) && isset($points[$resultat['idcandidat']])) {
                    $score = $points[$resultat['idcandidat']];
                } else {
                    $score = 0; // Si le score n'est pas défini, définissez-le à zéro
                }
            
            ?>
            
        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/homme1.webp" alt="">
                </div>
                <div class="titre_offre">
                    <h5 id="nom-candidat"> <b><?php echo $resultat['nom']; ?>&nbsp;<?php echo $resultat['prenom']; ?></b></h5></b></h5>
                    <span class="badge rounded-pill text-bg-success">Score:<?php echo $score; ?>/100</span>
                </div>
                
                <p>
                <span class="badge rounded-pill text-bg-danger specialiste_offre"><?php echo $resultat['specialite']; ?></span>
                
                </p>
                <p><span class="badge text-bg-info">Description
                </span> &nbsp;  <?php echo $resultat['description']; ?></p>
                
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b><?php echo $resultat['adresse']; ?></b>
                </p>
                <p class="email"> <img src="../media/@.png" width="20px" alt="">
                    <b><?php echo $resultat['email']; ?></b>
                </p>
                <p class="phone"> <img src="../media/phone.png" width="20px" alt="">
                    <b><?php echo $resultat['phone']; ?></b>
                </p>

                
                <div class="msg-post"><a href="#" class="btn-postuler">View More</a>
                <a href="#" class="btn-msg">Send Message</a></div>
            </div>
        </div>

        <?php } }?>
        
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

        <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">&#11178;</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">&#10149;</a>
            </li>
        </ul>
    </div>

    <script src="btsp/js/popper.min.js"></script>
    <script src="btsp/js/jquery-3.7.1.min.js"></script>
    <script src="../btsp/js/bootstrap.js"></script>
    <script src="recruteurHome.js"></script>
</body>

</html>