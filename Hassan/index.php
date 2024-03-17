<?php

/*
function executeQuery($sql){
    //database connection
    $host = 'locathost';
    $dbName = 'jobpply';
    $user = 'root';
    $pwd = '';
    $dsn = 'mysql:host=' . $host .';dbname=' . $dbName;
    // $dsn = "mysql:host=${host};dbname=${dbName}";
    
    try{

        $pdo = new PDO($dsn, $user, $pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }catch(PDOException $e){
        echo "<h2> Somthing went wrong, ERROR: {$e->getMessage()} </h2>";
        return false;
    }
}
function insererOffre($pdo, $titre, $typeContrat, $salaireMin, $salaireMax, $deadline, $ville, $description, $IDrecruteur) {
    try {
        // Préparer la requête SQL d'insertion
        $sql = "INSERT INTO offre (titre, typecontrat, slairemin, slairemax, delai, ville, descriptionoffre, idrecruteur ) 
                VALUES (:titre, :typeContrat, :salaireMin, :salaireMax, :deadline, :ville, :description , :idrecruteur)";
        
        // Préparer la déclaration
        $stmt = $pdo->prepare($sql);

        // Définir les paramètres
        $params = array(
            ':titre' => $titre,
            ':typeContrat' => $typeContrat,
            ':salaireMin' => $salaireMin,
            ':salaireMax' => $salaireMax,
            ':deadline' => $deadline,
            ':ville' => $ville,
            ':description' => $description,
            ':idrecruteur' => $IDrecruteur
        );

        // Exécuter la déclaration avec les paramètres
        $stmt->execute($params);

        // Renvoyer true si l'insertion réussit
        return true;
    } catch (PDOException $e) {
        // Gérer les exceptions
        echo "Erreur d'insertion : " . $e->getMessage();
        return false;
    }
}
*/

include('../Hassan/includes/offrepage.inc.php');


?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres d'emplois</title>
    <link rel="stylesheet" href="../btsp/css/bootstrap.css">
    <link rel="stylesheet" href="styleee.css">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>

<body class="bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light " style="display: flex;">
            <div class="container-fluid" style="justify-content: center; margin: 0;">
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
                            <a class="nav-link " aria-current="page" href="../Wassim/index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="homelink" href="../Wassim/index.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html" style="color: #6c63ff;">Offers</a>
                        </li>
                        <!--<li class="nav-item">
                <a class="nav-link" href="#">Candidat</a>
              </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="contactlink" href="../Wassim/contact.html" style="margin-right: 10px;">Contact us</a>
                        </li>
                    </ul>
                    <!-- Login and Sign Up buttons for mobile view -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../ayaa/aya.html" class="btn btn-outline-primary me-2" type="button" style="padding: 8px 20px; background-color: #6c63ff;border: none; color: white;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="../ayaa/aya.html" class="btn btn-primary" type="button" style="margin-top: 4px; padding: 8px 20px;background-color: #ff6347;border: none;">Sign Up</a>
                        </li>
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
            background-color: #6C63FF !important;
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
    <!-- <nav class="navbar navbar-expand-lg container nav-underline">

        <div>
            <img src="../media/logo.jpeg" alt="logo" class="logo">
            <a class="navbar-brand" href="index.html">Jobido</a>
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
                    alt="profile"> <a class="nav-link" href="../jihane/profilCandidat.html">Username</a>
            </span>
        </div>
    </nav> -->
    <!-- <aside>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, quidem adipisci fugit nesciunt placeat tempora nam animi blanditiis voluptatum, maiores ratione repellat ipsum voluptas beatae sint soluta odio sunt minima.
    </aside> -->


    <h1 class="text-center"> Débloquez votre potentiel professionnel: <br> Découvrez <?php $nboffre = count(getOffresData());
                                                                                        echo "+$nboffre" ?> opportunités de stage passionnantes au Maroc !"</h1>
    <hr>

    <!-- <button type="button" class="btn btn-primary">Primary</button> -->



    <div class="card-list container">

        <aside class="sidebar-filter container ">
            <form action="#" method="get">
                <p>
                <h5 class="text-center">Filter</h5>
                </p>

                <div class="reset-submit container btn-group">
                    <input type="reset" value="Reset" class="btn btn-outline-primary reset">
                    <input type="submit" name="filter_submit" value="Submit" class="btn btn-outline-primary submit">
                </div>
                <hr>
                <label for="spécialité">Spécialité :</label>
                <select id="spécialité" name="specialitef" class="form-select">
                    <option value="" selected>All..</option>
                    <option value="developpement_web">Développement Web</option>
                    <option value="developpement_logiciel">Développement Logiciel</option>
                    <option value="réseaux_informatique">Réseaux Informatique</option>
                    <option value="administration_système">Administration Système</option>
                    <option value="design_graphique">Design Graphique</option>
                    <option value="marketing">Marketing Digital</option>
                    <option value="finance">Finance</option>
                    <!-- Ajoutez d'autres options selon vos besoins -->
                </select>
                <hr>
                <label for="type_contrat">Type de contrat :</label>
                <select id="type_contrat" name="contratf" class="form-select">
                    <option value="" selected>All..</option>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Stage">Stage</option>
                    <option value="Apprentissage">Apprentissage</option>
                    <option value="Interim">Intérim</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Autre">Autre</option>
                </select>
                <hr>
                <label for="cities">Ville :</label>
                <select id="cities" name="villef" class="form-select" name="cities">
                    <option value="">ALL..</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Fez">Fez</option>
                    <option value="Tangier">Tangier</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Meknes">Meknes</option>
                    <option value="Oujda">Oujda</option>
                    <option value="Kenitra">Kenitra</option>
                    <option value="Tetouan">Tetouan</option>
                    <option value="Laayoune">Laayoune</option>
                    <option value="Khouribga">Khouribga</option>
                    <option value="El Jadida">El Jadida</option>
                    <option value="Nador">Nador</option>
                    <option value="Settat">Settat</option>
                    <option value="Mohammedia">Mohammedia</option>
                    <option value="Taza">Taza</option>
                    <option value="Khenifra">Khenifra</option>
                    <option value="Berrechid">Berrechid</option>

                </select>
                <!-- <hr>
                <div>
                    <input class="form-check-input" type="radio" name="timing" value="temp_plein" id="temp_plein"
                        checked>
                    <label for="temp_plein">Temp plein </label>
                    <br>
                    <input class="form-check-input" type="radio" name="timing" value="temp_partiel" id="temp_partiel">
                    <label for="temp_partiel">Temp partiel </label>
                </div> -->
            </form>

        </aside>




        <?php
        getOffres();
        ?>

        <div class="card-list-nav">
            <div class="card-list-nav navbar navbar-expand-lg bg-body-tertiary">
                <div class="container"> <!-- Move the container-fluid outside of the pagination -->

                    <div class="container-add-offre">
                        <button id="displayoffre" type="button" class="card"> <span class="icon-span" role="img"><img src="../media/croix-plus.png" alt="icon" /></span> Offre</button>
                    </div>
                    <?php
                    echo '<ul class="pagination">';
                    global $totalPages;
                    global $currentpage;
                    $currentURL = $_SERVER['REQUEST_URI'];


                    for ($i = 1; $i <= $totalPages; $i++) {
                        // Add the page number to the current URL
                        $paginationLink = $currentURL . '&page=' . $i;

                        // Add the active class to the current page
                        $activeClass = ($currentpage == $i) ? 'active' : '';

                        echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="' . $paginationLink . '">' . $i . '</a></li>';
                    }
                    echo '</ul>';
                    ?>

                </div>


            </div>
        </div>



        <div class="card cardnewoffre hidden">
            <div class="card-body">
                <form id="formoffre" action="../Hassan/includes/offrepage.inc.php" method="post">
                    <div class="form-floating mrg">
                        <input type="text" id="titre-offre" name="titre-offre00" class="form-control" placeholder="titre-offre" required />
                        <label for="titre-offre" class="form-label">Titre de votre offre:</label>
                    </div>

                    <div class="form-floating mrg">
                        <input type="text" id="type-de-contrat00" name="type-de-contrat" class="form-control x1" placeholder="type-de-contrat" required />
                        <label for="type-de-contrat00" class="form-label">Type de Contrat:</label>
                    </div>
                    <div class="form-floating mrg">
                        <input type="text" id="Spécialite00" name="specialite" class="form-control x1" placeholder="type-de-contrat" required />
                        <label for="Spécialite00" class="form-label">Spécialité:</label>
                    </div>


                    <div class="input-group ">
                        <div class="form-floating mrg">
                            <input type="number" id="salaire-min00" name="salairemin" class="form-control x1" placeholder="salaire" />
                            <label for="salaire-min00" class="form-label">Salaire(min):</label>
                        </div>
                        <div class="form-floating mrg">
                            <input type="number" id="salaire-max00" name="salairemax" class="form-control x1" placeholder="salaire" />
                            <label for="salaire-max00" class="form-label">Salaire(max):</label>
                        </div>
                    </div>
                    <div class="input-group ">
                        <div class="form-floating mrg">
                            <input type="date" id="dateDebutexp2" name="dateDebut" class="form-control x1" placeholder="date début" />
                            <label for="dateDebutexp2" class="form-label">Deadline:</label>
                        </div>
                        <div class="form-floating mrg">
                            <input type="text" id="villeoff00" name="ville" class="form-control x1" placeholder="ville" required />
                            <label for="villeoff00" class="form-label">Ville:</label>
                        </div>
                    </div>
                    <div class="form-group mrg">
                        <div id="descriptionoffre00" class="quill-editor">
                            <p>Description..</p>
                        </div>
                        <textarea hidden type="text" name="discriptionoff" id=""></textarea>
                        <!-- <label for="description" class="form-label">Description:</label> -->
                    </div>
                    <input type="submit" class="btn btn-primary" value="Terminé">


                    <button type="reset" class="btn btn-primary" id="canceloffre">
                        Annuler
                    </button>
                </form>
            </div>
        </div>



        <!-- <script src="/btsp/js/printThis.js"></script> -->
        <script src="mainindexx.js"></script>
        <script src="../btsp/js/popper.min.js"></script>
        <script src="../btsp/js/jquery-3.7.1.min.js"></script>
        <script src="../btsp/js/bootstrap.js"></script>
</body>

</html>