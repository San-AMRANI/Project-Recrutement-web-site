<?php

include('connect.model.php');
function insertOffre()
{


    try {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["titre-offre00"])) {

            // var_dump($_POST);
            // Retrieve form data
            $titre = htmlspecialchars($_POST['titre-offre00']);
            $typeContrat = htmlspecialchars($_POST['type-de-contrat']);
            $specialite = htmlspecialchars($_POST['specialite']);
            $salaireMin = htmlspecialchars($_POST['salairemin']);
            $salaireMax = htmlspecialchars($_POST['salairemax']);
            $deadline = htmlspecialchars($_POST['dateDebut']);
            $ville = htmlspecialchars($_POST['ville']);
            $description = htmlspecialchars_decode($_POST['discriptionoff']);
            // $idrecruteur = htmlspecialchars($_POST['idrecruteur']); // Assuming you have an input field for idrecruteur

            // Prepare the SQL statement
            $sql = "INSERT INTO offre (titre, typecontrat, slairemin, slairemax, delai, ville, descriptionoffre, specialite) 
                VALUES (:titre, :typeContrat, :salaireMin, :salaireMax, :deadline, :ville, :description, :specialite)";

            global $pdo;
            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':typeContrat', $typeContrat);
            $stmt->bindParam(':salaireMin', $salaireMin);
            $stmt->bindParam(':salaireMax', $salaireMax);
            $stmt->bindParam(':deadline', $deadline);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':specialite', $specialite);
            // $stmt->bindParam(':idrecruteur', $idrecruteur);

            // Execute the statement
            $stmt->execute();

            // Redirect to a success page or do further processing
            header("Location: ../index.php");
            exit();
        }
    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Erreur d'insertion : " . $e->getMessage();
        // You might want to log this error for debugging purposes
    }
}

insertOffre();

function getOffresData()
{
    $sql = "SELECT * FROM offre WHERE 1=1";

    // Check if form is submitted via GET and filter criteria is provided
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['filter_submit'])) {
        // Retrieve filter criteria from the form
        $villef = $_GET['villef'];
        $specialitef = $_GET['specialitef'];
        $contratf = $_GET['contratf'];
        global $baseURL;
        $baseURL = "?";
        // Add filter conditions to the SQL query
        if (!empty($_GET['specialitef'])) {
            $sql .= " AND LOWER(specialite) = LOWER('$specialitef') ";
            // $baseURL .= "specialitef=" . urlencode($specialitef) . "&";
        }
        if (!empty($_GET['contratf'])) {
            $sql .= " AND LOWER(typecontrat) = LOWER('$contratf')";
            // $baseURL .= "contratf=" . urlencode($contratf) . "&";
        }
        if (!empty($_GET['villef'])) {
            $sql .= " AND LOWER(ville) = LOWER('$villef')";
            // $baseURL .= "villef=" . urlencode($villef) . "&";
        }
    }

    // Execute the SQL query
    $result = executeQuery($sql);

    return $result;
}
function getOffres()
{
    
    // $result = executeQuery($sql);
    $result = getOffresData();
    if ($result != false) {
        // global $totalPages ;
        // global $currentpage;
        global $totalPages;
        global $currentpage;
        $cardsPerPage = 4;
        $totalCards = count($result);
        $totalPages = ceil($totalCards / $cardsPerPage);


        $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentpage - 1) * $cardsPerPage;
        $currentPageCards = array_slice($result, $offset, $cardsPerPage);

        // Display cards for the current page
        $i = 0;

        foreach ($currentPageCards as $row) {

            // Filter special characters from each field
            $titre = htmlspecialchars($row["titre"]);
            $delai = htmlspecialchars($row["delai"]);
            $ville = htmlspecialchars($row["ville"]);
            $datepub = htmlspecialchars($row["datepub"]);
            $typecontrat = htmlspecialchars($row["typecontrat"]);
            $slairemin = htmlspecialchars($row["slairemin"]);
            $slairemax = htmlspecialchars($row["slairemax"]);
            $specialite = htmlspecialchars($row["specialite"]);
            $descriptionoffre = htmlspecialchars_decode($row["descriptionoffre"]);

            echo '
                <div class="card" id="cardWithCollapse' . $i . '">
                    <div class="card-body" onclick="toggleCollapse' . $i . '(' . $i . ')">
                        <div>
                            <img class="img_recruteur" src="../media/logo.jpeg" alt="">
                        </div>
                        <div class="titre_offre">
                            <h5 class="card-title"> <b>' . $titre . '</b></h5>
                        </div>
                        <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>' . $delai . '</b> </p>
                        <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                            <b>' . $ville . '</b>
                        </p>
                        <span class="badge rounded-pill text-bg-danger specialiste_offre">' . $specialite .'</span>
                        <a href="#" class="btn btn-primary postuler">Postuler</a>
                    </div>
                    <div class="collapse info" id="info' . $i . '">
                        <div id="discriptionplace">
                            <p> <i>Publier le: ' . $datepub . '</i></p>
                            <p> <b>Type Contrat: ' . $typecontrat . '</b> </p>
                            <p> <b>Salaire: ' . $slairemin . ' - ' . $slairemax . '</b> </p>
                            ' . $descriptionoffre . ' 
                        </div>
                    </div>
                </div>
                <script>
                    function toggleCollapse' . $i . '(parm) {
                        var info = document.getElementById("info' . $i++ . '");
                        info.classList.toggle("show");
                    }
                </script>
            ';
        }


        //     foreach ($result as $row) {
        //         // Filter special characters from each field
        //         $titre = htmlspecialchars($row["titre"]);
        //         $delai = htmlspecialchars($row["delai"]);
        //         $ville = htmlspecialchars($row["ville"]);
        //         $datepub = htmlspecialchars($row["datepub"]);
        //         $typecontrat = htmlspecialchars($row["typecontrat"]);
        //         $slairemin = htmlspecialchars($row["slairemin"]);
        //         $slairemax = htmlspecialchars($row["slairemax"]);
        //         $descriptionoffre = htmlspecialchars($row["descriptionoffre"]);

        //         echo '
        //             <div class="card" id="cardWithCollapse'.$i.'">
        //                 <div class="card-body" onclick="toggleCollapse'.$i.'('.$i.')">
        //                     <div>
        //                         <img class="img_recruteur" src="../media/logo.jpeg" alt="">
        //                     </div>
        //                     <div class="titre_offre">
        //                         <h5 class="card-title"> <b>' . $titre . '</b></h5>
        //                     </div>
        //                     <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>' . $delai . '</b> </p>
        //                     <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
        //                         <b>' . $ville . '</b>
        //                     </p>
        //                     <span class="badge rounded-pill text-bg-danger specialiste_offre">Specialité</span>
        //                     <a href="#" class="btn btn-primary postuler">Postuler</a>
        //                 </div>
        //                 <div class="collapse info" id="info'.$i.'">
        //                     <div id="discriptionplace">
        //                         <p> <i>Publier le: ' . $datepub . '</i></p>
        //                         <p> <b>Type Contrat: ' . $typecontrat . '</b> </p>
        //                         <p> <b>Salaire: ' . $slairemin . ' - ' . $slairemax . '</b> </p>
        //                         ' . $descriptionoffre . ' 
        //                     </div>
        //                 </div>
        //             </div>
        //             <script>
        //                 function toggleCollapse'.$i.'(parm) {
        //                     var info = document.getElementById("info'.$i++.'");
        //                     info.classList.toggle("show");
        //                 }
        //             </script>
        //         ';       
        //     }

    } else {
        echo "<h2>Pas d'offre pour l'instant!</h2>
                <img src='../media/search-engine-optimization.png' alt='icon'>
";
    }
}
?>