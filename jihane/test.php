<?php function fetchrecruteurcard($pdo )
{
    // Prepare the SQL query with LIMIT clause to fetch only the first 6 rows
    $cardQuery = "SELECT candidat.idcandidat,specialite,nomFormation, nomlangue, nomcompetence, sum(extract(year FROM experience.datefin)-extract(year FROM experience.datedebut))
    FROM candidat,formation,experience,langue,competence
    where candidat.idcandidat = formation.idcandidat
    and  candidat.idcandidat =experience.idcandidat
    and candidat.idcandidat = competence.idcandidat
    and candidat.idcandidat = langue.idcandidat";
    

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
?>

<?php foreach ($cards as $card) {
                            
                            echo $card;
                          }?>