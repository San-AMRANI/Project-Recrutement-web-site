<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres d'emplois</title>
    <link rel="stylesheet" href="../btsp/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg container nav-underline">

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
    </nav>
    <!-- <aside>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, quidem adipisci fugit nesciunt placeat tempora nam animi blanditiis voluptatum, maiores ratione repellat ipsum voluptas beatae sint soluta odio sunt minima.
    </aside> -->


    <h1 class="text-center">+13000 OFFRES DE STAGE AU MAROC <br>
        POUR LANCER TA CARRIÈRE</h1>
    <p class="text-center">Trouvez des offres de stage au Maroc pour démarrer votre carrière</p>
    <!-- <button type="button" class="btn btn-primary">Primary</button> -->



    <div class="card-list container">

        <aside class="sidebar-filter container ">
            <form action="">
                <p>
                <h5 class="text-center">Filter</h5>
                </p>

                <div class="reset-submit container btn-group">
                    <input type="reset" value="Reset" class="btn btn-outline-primary reset">
                    <input type="submit" value="Submit" class="btn btn-outline-primary submit">
                </div>
                <hr>
                <label for="spécialité">Spécialité :</label>
                <select id="spécialité" class="form-select">
                    <option selected>Choisir..</option>
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
                <label for="duree">Durée :</label>
                <select id="duree" class="form-select">
                    <option selected>Choisir..</option>
                    <option value="1">1 mois</option>
                    <option value="2">2 mois</option>
                    <option value="3">3 mois</option>
                    <option value="4">4 mois</option>
                    <option value="5">5 mois</option>
                    <option value="6">6 mois</option>
                    <option value="7"> >6 mois</option>

                </select>
                <hr>
                <label for="cities">Ville :</label>
                <select id="cities" class="form-select" name="cities">
                    <option selected>Choisir..</option>
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
                <hr>
                <div>
                    <input class="form-check-input" type="radio" name="timing" value="temp_plein" id="temp_plein"
                        checked>
                    <label for="temp_plein">Temp plein </label>
                    <br>
                    <input class="form-check-input" type="radio" name="timing" value="temp_partiel" id="temp_partiel">
                    <label for="temp_partiel">Temp partiel </label>
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
        </div>


        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/logo.jpeg" alt="">
                </div>
                <div class="titre_offre">
                    <h5 class="card-title"> <b>Special title treatment</b></h5>
                </div>
                <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>2 mois</b> </p>
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <span class="badge rounded-pill text-bg-danger specialiste_offre">Specialité</span>
                <a href="#" class="btn btn-primary postuler">Postuler</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/logo.jpeg" alt="">
                </div>
                <div class="titre_offre">
                    <h5 class="card-title"> <b>Special title treatment</b></h5>
                </div>
                <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>2 mois</b> </p>
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <span class="badge rounded-pill text-bg-danger specialiste_offre">Specialité</span>
                <a href="#" class="btn btn-primary postuler">Postuler</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/logo.jpeg" alt="">
                </div>
                <div class="titre_offre">
                    <h5 class="card-title"> <b>Special title treatment</b></h5>
                </div>
                <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>2 mois</b> </p>
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <span class="badge rounded-pill text-bg-danger specialiste_offre">Specialité</span>
                <a href="#" class="btn btn-primary postuler">Postuler</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/logo.jpeg" alt="">
                </div>
                <div class="titre_offre">
                    <h5 class="card-title"> <b>Special title treatment</b></h5>
                </div>
                <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>2 mois</b> </p>
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <span class="badge rounded-pill text-bg-danger specialiste_offre">Specialité</span>
                <a href="#" class="btn btn-primary postuler">Postuler</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div>
                    <img class="img_recruteur" src="../media/logo.jpeg" alt="">
                </div>
                <div class="titre_offre">
                    <h5 class="card-title"> <b>Special title treatment</b></h5>
                </div>
                <p class="duree_offre"> <img src="../media/horloge.png" width="20px" alt=""> <b>2 mois</b> </p>
                <p class="location_offre"> <img src="../media/maps-and-location.png" width="20px" alt="">
                    <b>Casablanca</b>
                </p>
                <a href="#" class="btn btn-primary postuler">Postuler</a>
            </div>
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
    <script src="btsp/js/bootstrap.js"></script>
</body>

</html>