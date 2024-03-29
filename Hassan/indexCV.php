<?php
// session_start();
include('../Hassan/includes/candidatinfo.ctrl.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../btsp/css/bootstrap.css" />
    <link rel="stylesheet" href="../btsp/css/bootstrap.min.css" />
    <title>Créer votre CV</title>
    <script src="../btsp/quill/quill.js"></script>
    <link href="../btsp/quill/quill.snow.css" rel="stylesheet" />

    <link rel="stylesheet" href="styleCV.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg container nav-underline">
        <div>
            <img src="../media/logo.jpeg" alt="logo" class="logo" />
            <a class="navbar-brand" href="index.html">Jobido</a>
        </div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <span class="nav-link badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-badge border rounded-pill">
                <img class="nav-link profile rounded-circle me-1" width="24" height="24" src="../media/logo.jpeg" alt="profile" />
                <a class="nav-link" href="../jihane/profilCandidat.html">Username</a>
            </span>
        </div>
    </nav>

    <aside class="side" id="cv-info">
        <div class="form-info-cv">
            <div class="form-group">
                <button class="btn-collapse" type="button" data-toggle="collapse" data-target="#info-personnel" aria-expanded="false" aria-controls="info-personnel">
                    Informations Personnel <span>&#x2B9F;</span>
                </button>
            </div>

            <div class="form-floating collapse" id="info-personnel">
                <!--add collapse-->
                <form id="forminfoper" name="form" action="../Hassan/includes/candidatinfo.ctrl.php" method="post">
                    <div class="x">
                        <div class="thumb-up">
                            <div class="profile-box ">
                                <img class="profile-pic" ty src="..img/picture1.png">
                            </div>
                            <div class="p-image">
                                <button type="button" value="login" class="btn upload-button">Upload</button>
                                <input type="file" accept="/Hassan/includes/uploads/*" class="file-upload" name=" file-upload">
                                <input type="hidden" name="fileData" id="fileData">
                            </div>
                        </div>

                        <div id="div-name">
                            <div class="form-floating">
                                <input type="text" name="first-name" class="form-control x1 name" placeholder="First name" id="first-name" aria-label="First name" value="hassan" required />
                                <label class="form-label" for="first-name">First name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="last-name" class="form-control x1 name" placeholder="First name" id="last-name" aria-label="Last name" />
                                <label class="form-label" for="last-name">Last name</label>
                            </div>
                            <div class="form-floating">
                                <input type="date" name="date-naissance" class="form-control x1" placeholder="date naissance" id="date-naissance" aria-label="Last name" />
                                <label class="form-label" for="birth-date">Date de naissance</label>
                            </div>
                        </div>
                    </div>
                    <div class="e-a-t input-group">
                        <div class="form-floating">
                            <input type="text" name="inputmail" class="form-control x1" id="inputmail" placeholder="Email" />
                            <label for="inputmail" class="form-label">Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="inputAddress" class="form-control x1" id="inputAddress" placeholder="Address" />
                            <label for="inputAddress" class="form-label">Address</label>
                        </div>
                        <div class="form-floating">
                            <input type="tel" name="inputTele" class="form-control x1" id="inputTele" placeholder="Telephone" />
                            <label for="inputTele" class="form-label">N° Telephone</label>
                        </div>
                    </div>
                    <div class="sexe-check row justify-content-center">
                        <div class="form-floating col-auto">
                            <input type="tel" name="inputSpécialité" class="form-control x1" id="inputSpécialité" placeholder="Spécialité" />
                            <label for="inputSpécialité" class="form-label">Spécialité</label>
                        </div>

                    </div>
                    <input type="submit" name="Submit" class="btn btn-primary" value="Terminé">

                </form>
            </div>
            <hr />
            <div class="form-group">
                <button class="btn-collapse" type="button" data-toggle="collapse" data-target="#info-formation" aria-expanded="false" aria-controls="info-formation">
                    Formations <span>&#x2B9F;</span>
                </button>
            </div>
            <div class="form-floating collapse" id="info-formation">
                <form id="forminfoper">
                    <div class="container">
                        <!--
                    <div class="card formation0">
                        <div class="card-body">
                            <form id="formfor0" class="formation-form" data-index="0" action="../Hassan/includes/candidatinfo.ctrl.php" method="POST" <?php preFillFormFields(0); ?>>
                                <div class="form-floating">
                                    <input type="text" id="titre-formation0" name="formation0" class="form-control" placeholder="titre de formation" required />
                                    <label for="formation0" class="form-label">Titre de Formation:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="etablissement0" name="etablissement0" class="form-control x1" placeholder="etablissement" required />
                                    <label for="etablissement0" class="form-label">Établissement:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villefor0" name="ville0" class="form-control x1" placeholder="ville" required />
                                    <label for="villefor0" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutfor0" name="dateDebut0" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutfor0" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinfor0" name="dateFin0" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinfor0" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="descriptionfor0">
                                        <p>Description</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card hidden" id="formation1">
                        <div class="card-body">
                            <form id="formfor1" action="../Hassan/includes/candidatinfo.ctrl.php" method="POST">
                                <div class="form-floating">
                                    <input type="text" id="titre-formation1" name="formation1" class="form-control" placeholder="titre de formation" required />
                                    <label for="formation1" class="form-label">Titre de Formation:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="etablissement1" name="etablissement1" class="form-control x1" placeholder="etablissement" required />
                                    <label for="etablissement1" class="form-label">Établissement:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villefor1" name="ville1" class="form-control x1" placeholder="ville" required />
                                    <label for="villefor1" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutfor1" name="dateDebut1" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutfor1" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinfor1" name="dateFin1" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinfor1" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="descriptionfor1">
                                        <p>Description..</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card hidden" id="formation2">
                        <div class="card-body">
                            <form id="formfor2" action="../Hassan/includes/candidatinfo.ctrl.php" method="GET">
                                <div class="form-floating">
                                    <input type="text" id="titre-formation2" name="formation2" class="form-control" placeholder="titre de formation" required />
                                    <label for="formation2" class="form-label">Titre de Formation:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="etablissement2" name="etablissement2" class="form-control x1" placeholder="etablissement" required />
                                    <label for="etablissement2" class="form-label">Établissement:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villefor2" name="ville2" class="form-control x1" placeholder="ville" required />
                                    <label for="villefor2" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutfor2" name="dateDebut2" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutfor2" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinfor2" name="dateFin2" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinfor2" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="descriptionfor2">
                                        <p>Description..</p>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card hidden" id="formation3">
                        <div class="card-body">
                            <form id="formfor3" action="../Hassan/includes/candidatinfo.ctrl.php" method="GET">
                                <div class="form-floating">
                                    <input type="text" id="titre-formation3" name="formation3" class="form-control" placeholder="titre de formation" required />
                                    <label for="formation3" class="form-label">Titre de Formation:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="etablissement3" name="etablissement3" class="form-control x1" placeholder="etablissement" required />
                                    <label for="etablissement3" class="form-label">Établissement:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villefor3" name="ville" class="form-control x1" placeholder="ville" required />
                                    <label for="villefor3" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutfor3" name="dateDebut" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutfor3" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinfor3" name="dateFin" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinfor3" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="descriptionfor3">
                                        <p>Description..</p>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                            <script>

                            </script>
                        </div>
                    </div>
-->
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                            $hiddenClass = ($i > 0) ? 'hidden' : ''; // Add 'hidden' class to elements from 1 to 3
                            echo <<<HTML
    <div class="card {$hiddenClass}" id="formation{$i}">
        <div class="card-body">
            <form id="formfor{$i}" class="formation-form" data-index="{$i}" action="../Hassan/includes/candidatinfo.ctrl.php" method="POST" >
                <div class="form-floating">
                    <input type="text" id="titre-formation{$i}" name="formation{$i}" class="form-control" placeholder="titre de formation" required />
                    <label for="formation{$i}" class="form-label">Titre de Formation:</label>
                </div>
                <div class="form-floating">
                    <input type="text" id="etablissement{$i}" name="etablissement{$i}" class="form-control x1" placeholder="etablissement" required />
                    <label for="etablissement{$i}" class="form-label">Établissement:</label>
                </div>
                <div class="form-floating">
                    <input type="text" id="villefor{$i}" name="ville{$i}" class="form-control x1" placeholder="ville" required />
                    <label for="villefor{$i}" class="form-label">Ville:</label>
                </div>
                <div class="input-group">
                    <div class="form-floating">
                        <input type="date" id="dateDebutfor{$i}" name="dateDebut{$i}" class="form-control x1" placeholder="date début" />
                        <label for="dateDebutfor{$i}" class="form-label">Date de début:</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" id="dateFinfor{$i}" name="dateFin{$i}" class="form-control x1" placeholder="date fin" />
                        <label for="dateFinfor{$i}" class="form-label">Date de fin:</label>
                    </div>
                </div>
                <div class="form-group">
                    <div id="descriptionfor{$i}">
                        <p>Description</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Terminé</button>
            </form>
        </div>
    </div>
HTML;
                        }
                        ?>


                        <div class="d-md-flex justify-content-md-end">
                            <button class="btn-with-icon btn" type="button" id="remove-formation">
                                <span class="icon-span" role="img"><img src="../media/moins.png" alt="icon" /></span>
                                Suprimer formation
                            </button>
                            <button class="btn-with-icon btn" type="button" id="add-formation">
                                <span class="icon-span" role="img"><img src="../media/croix-plus.png" alt="icon" /></span>
                                Ajouter formation
                            </button>
                        </div>
                    </div>
            </div>
            <hr />
            <div class="form-group">
                <button class="btn-collapse" type="button" data-toggle="collapse" data-target="#info-experience" aria-expanded="false" aria-controls="info-experience">
                    Experience <span>&#x2B9F;</span>
                </button>
            </div>
            <div class="form-floating collapse" id="info-experience">
                <div class="container">
                    <div class="card experience0">
                        <div class="card-body">
                            <form id="formexp0" action="#" method="post">
                                <div class="form-floating">
                                    <input type="text" id="titre-experience0" name="experience0" class="form-control" placeholder="Post" required />
                                    <label for="experience0" class="form-label">Post:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="Employeur0" name="Employeur0" class="form-control x1" placeholder="Employeur" required />
                                    <label for="Employeur0" class="form-label">Employeur:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villeexp0" name="ville" class="form-control x1" placeholder="ville" required />
                                    <label for="villeexp0" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutexp0" name="dateDebut" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutexp0" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinexp0" name="dateFin" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinexp0" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="" id="descriptionexp-input0" />
                                    <div id="descriptionexp0">
                                        <p>Description..</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card hidden" id="experience1">
                        <div class="card-body">
                            <form id="formexp1" action="#" method="post">
                                <div class="form-floating">
                                    <input type="text" id="titre-experience1" name="experience1" class="form-control" placeholder="Post" required />
                                    <label for="experience1" class="form-label">Post:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="Employeur1" name="employeur1" class="form-control x1" placeholder="employeur" required />
                                    <label for="employeur1" class="form-label">Employeur:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villeexp1" name="ville" class="form-control x1" placeholder="ville" required />
                                    <label for="villeexp1" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutexp1" name="dateDebut" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutexp1" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinexp1" name="dateFin" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinexp1" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="" id="descriptionexp-input1" />
                                    <div id="descriptionexp1">
                                        <p>Description..</p>
                                    </div>
                                    <!-- <label for="description" class="form-label">Description:</label> -->
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card hidden" id="experience2">
                        <div class="card-body">
                            <form id="formexp2" action="#" method="post">
                                <div class="form-floating">
                                    <input type="text" id="titre-experience2" name="experience2" class="form-control" placeholder="Post" required />
                                    <label for="experience2" class="form-label">Post:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="Employeur2" name="employeur2" class="form-control x1" placeholder="employeur" required />
                                    <label for="employeur2" class="form-label">Employeur:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villeexp2" name="ville" class="form-control x1" placeholder="ville" required />
                                    <label for="villeexp2" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutexp2" name="dateDebut" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutexp2" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinexp2" name="dateFin" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinexp2" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="" id="descriptionexp-input2" />
                                    <div id="descriptionexp2">
                                        <p>Description..</p>
                                    </div>
                                    <!-- <label for="description" class="form-label">Description:</label> -->
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card hidden" id="experience3">
                        <div class="card-body">
                            <form id="formexp3" action="#" method="post">
                                <div class="form-floating">
                                    <input type="text" id="titre-experience3" name="experience3" class="form-control" placeholder="Post" required />
                                    <label for="experience3" class="form-label">Post:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="Employeur3" name="employeur3" class="form-control x1" placeholder="employeur" required />
                                    <label for="employeur3" class="form-label">Employeur:</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" id="villeexp3" name="ville" class="form-control x1" placeholder="ville" required />
                                    <label for="villeexp3" class="form-label">Ville:</label>
                                </div>

                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="date" id="dateDebutexp3" name="dateDebut" class="form-control x1" placeholder="date début" />
                                        <label for="dateDebutexp3" class="form-label">Date de début:</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" id="dateFinexp3" name="dateFin" class="form-control x1" placeholder="date fin" />
                                        <label for="dateFinexp3" class="form-label">Date de fin:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="" id="descriptionexp-input3" />
                                    <div id="descriptionexp3">
                                        <p>Description..</p>
                                    </div>
                                    <!-- <label for="description" class="form-label">Description:</label> -->
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Terminé
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="d-md-flex justify-content-md-end">
                        <button class="btn-with-icon btn" type="button" id="remove-experience">
                            <span class="icon-span" role="img"><img src="../media/moins.png" alt="icon" /></span>
                            Suprimer experience
                        </button>
                        <button class="btn-with-icon btn" type="button" id="add-experience">
                            <span class="icon-span" role="img"><img src="../media/croix-plus.png" alt="icon" /></span>
                            Ajouter experience
                        </button>
                    </div>
                </div>
            </div>

            <hr />
            <div class="form-group">
                <button class="btn-collapse" type="button" data-toggle="collapse" data-target="#info-language" aria-expanded="false" aria-controls="info-language">
                    Language <span>&#x2B9F;</span>
                </button>
            </div>

            <div class="form-floating collapse" id="info-language">
                <div class="card language">
                    <div class="card-body">
                        <form action="">
                            <div class="slider form-floating" id="language0">
                                <input type="text" class="form-control x1" placeholder="Langue" id="title-language0" required />
                                <label for="title-language0" class="form-label">Langue</label>
                                <select id="level-language0">
                                    <option checked>Niveau..</option>
                                    <option value="1">Débutant</option>
                                    <option value="2">Intermédiaire</option>
                                    <option value="3">Avancé</option>
                                </select>
                            </div>
                            <div class="slider form-floating hidden" id="language1">
                                <input type="text" class="form-control x1" placeholder="Langue" id="title-language1" required />
                                <label for="title-language0" class="form-label">Langue</label>
                                <select id="level-language1">
                                    <option checked>Niveau..</option>
                                    <option value="1">Débutant</option>
                                    <option value="2">Intermédiaire</option>
                                    <option value="3">Avancé</option>
                                </select>
                            </div>

                            <div class="slider form-floating hidden" id="language2">
                                <input type="text" class="form-control x1" placeholder="Langue" id="title-language2" required />
                                <label for="title-language2" class="form-label">Langue</label>
                                <select id="level-language2">
                                    <option checked>Niveau..</option>
                                    <option value="1">Débutant</option>
                                    <option value="2">Intermédiaire</option>
                                    <option value="3">Avancé</option>
                                </select>
                            </div>
                            <div class="slider form-floating hidden" id="language3">
                                <input type="text" class="form-control x1" placeholder="Langue" id="title-language3" required />
                                <label for="title-language3" class="form-label">Langue</label>
                                <select id="level-language3">
                                    <option checked>Niveau..</option>
                                    <option value="1">Débutant</option>
                                    <option value="2">Intermédiaire</option>
                                    <option value="3">Avancé</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Terminé</button>
                        </form>
                        <div class="d-md-flex justify-content-md-end">
                            <button class="btn-with-icon btn" type="button" id="remove-langue">
                                <span class="icon-span" role="img"><img src="../media/moins.png" alt="icon" /></span>
                            </button>
                            <button class="btn-with-icon btn" type="button" id="add-langue">
                                <span class="icon-span" role="img"><img src="../media/croix-plus.png" alt="icon" /></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="form-group">
                <button class="btn-collapse" type="button" data-toggle="collapse" data-target="#info-competence" aria-expanded="false" aria-controls="info-competence">
                    Compétence <span>&#x2B9F;</span>
                </button>
            </div>

            <div class="form-floating collapse" id="info-competence">
                <div class="card competence">
                    <div class="card-body">
                        <form action="">
                            <div class="slider form-floating" id="competence0">
                                <input type="text" class="form-control x1" placeholder="competence" id="title-competence0" required />
                                <label for="title-competence0" class="form-label">competence</label>
                                <input type="range" class="form-range" id="level-competence0" min="1" max="3" value="2" />
                            </div>
                            <div class="slider hidden form-floating" id="competence1">
                                <input type="text" class="form-control x1" placeholder="competence" id="title-competence1" required />
                                <label for="title-competence1" class="form-label">competence</label>
                                <input type="range" class="form-range" id="level-competence1" min="1" max="3" value="2" />
                            </div>

                            <div class="slider hidden form-floating" id="competence2">
                                <input type="text" class="form-control x1" placeholder="competence" id="title-competence2" required />
                                <label for="title-competence2" class="form-label">competence</label>
                                <input type="range" class="form-range" id="level-competence2" min="1" max="3" value="2" />
                            </div>
                            <div class="slider hidden form-floating" id="competence3">
                                <input type="text" class="form-control x1" placeholder="competence" id="title-competence3" required />
                                <label for="title-competence3" class="form-label">competence</label>
                                <input type="range" class="form-range" id="level-competence3" min="1" max="3" value="2" />
                            </div>

                            <button type="submit" class="btn btn-primary">Terminé</button>
                        </form>
                        <div class="d-md-flex justify-content-md-end">
                            <button class="btn-with-icon btn" type="button" id="remove-competence">
                                <span class="icon-span" role="img"><img src="../media/moins.png" alt="icon" /></span>
                            </button>
                            <button class="btn-with-icon btn" type="button" id="add-competence">
                                <span class="icon-span" role="img"><img src="../media/croix-plus.png" alt="icon" /></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <iframe src="../media/AMRANI_HASSAN_CV.pdf" frameborder="0"></iframe> -->
            <hr />
            <div class="d-md-flex justify-content-md-end">
                <input type="submit" value="Save" class="me-md-2 btn btn-outline-primary reset" />
                <input type="button" id="btn-print-this" class="btn btn-outline-primary submit" value="Save as PDF" />
            </div>
            </form>
        </div>
    </aside>

    <aside class="side" id="cv-figure">
        <div class="cv-template">
            <div id="cv-head">
                <div role="img" id="cvImg">
                    <img src="..img/picture1.png" alt="Photo Personnel" class="profile-pic" id="user-img" />
                </div>
                <span class="cv-head-info" id="user-name">Hassan AMRANI</span>
                <table class="cv-head-info">
                    <tr>
                        <td>
                            <img src="../media/enveloppe.png" alt="" class="cv-info-icon" />
                        </td>
                        <td>
                            <span class="cv-head-info" id="user-email">fake.email@gmail.com</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="../media/appel.png" alt="" class="cv-info-icon" />
                        </td>
                        <td>
                            <span class="cv-head-info" id="user-phone">06 123 456 789</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="../media/cartes-et-drapeaux.png" alt="" class="cv-info-icon" />
                        </td>
                        <td>
                            <span class="cv-head-info" id="user-street">SACJAVSHJ JSCJSHBCJHSLKJSQSCQSCSC SCQSS
                                CBQSJKCBSJKCBSDDV
                                DVSSDFHJC</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="../media/date-de-naissance.png" alt="icon" class="cv-info-icon" />
                        </td>
                        <td>
                            <span class="cv-head-info" id="user-age"> 12:32":1332</span>
                        </td>
                    </tr>
                </table>
                <span class="cv-head-info" id="user-title">Développer</span>
            </div>

            <div id="cv-body">
                <div class="section">
                    <div class="centred">
                        <h3 class="section-title">Formation</h3>
                    </div>
                    <div class="grid-container">
                        <div class="row">
                            <div class="col-md-6" id="column1" style="border-right: 3px solid">
                                <div class="card0" id="formation00">
                                    <div class="card0-body">
                                        <div class="card0-h">
                                            <div class="title">
                                                <h6 id="titre-formation00">Genie Informatique</h6>
                                            </div>
                                            <div class="date00">
                                                <div class="datede" id="dateDebutfor00">
                                                    08/2024 -
                                                </div>
                                                <div class="datef" id="dateFinfor00">11/2025</div>
                                            </div>
                                        </div>
                                        <div class="card0-m">
                                            <div class="etab" style="display: inline; margin-left: 10px" id="etablissement00">
                                                FST
                                            </div>
                                            <div class="vill" id="villefor00">Settat</div>
                                        </div>
                                        <div class="card0-desc">
                                            <div class="desc" id="descriptionfor00">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Obcaecati minima aliquam at molestiae eveniet
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card0" id="formation11">
                                    <div class="card0-body">
                                        <div class="card0-h">
                                            <div class="title">
                                                <h6 id="titre-formation11">Genie Informatique</h6>
                                            </div>
                                            <div class="date11">
                                                <div class="datede" id="dateDebutfor11">
                                                    08/2024 -
                                                </div>
                                                <div class="datef" id="dateFinfor11">11/2025</div>
                                            </div>
                                        </div>
                                        <div class="card0-m">
                                            <div class="etab" style="display: inline; margin-left: 10px" id="etablissement11">
                                                FST
                                            </div>
                                            <div class="vill" id="villefor11">Settat</div>
                                        </div>
                                        <div class="card0-desc">
                                            <div class="desc" id="descriptionfor11">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Obcaecati minima aliquam at molestiae eveniet
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card0" id="formation22">
                                    <div class="card0-body">
                                        <div class="card0-h">
                                            <div class="title">
                                                <h6 id="titre-formation22">Genie Informatique</h6>
                                            </div>
                                            <div class="date22">
                                                <div class="datede" id="dateDebutfor22">
                                                    08/2024 -
                                                </div>
                                                <div class="datef" id="dateFinfor22">11/2025</div>
                                            </div>
                                        </div>
                                        <div class="card0-m">
                                            <div class="etab" style="display: inline; margin-left: 10px" id="etablissement22">
                                                FST
                                            </div>
                                            <div class="vill" id="villefor22">Settat</div>
                                        </div>
                                        <div class="card0-desc">
                                            <div class="desc" id="descriptionfor22">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Obcaecati minima aliquam at molestiae eveniet
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card0" id="formation33">
                                    <div class="card0-body">
                                        <div class="card0-h">
                                            <div class="title">
                                                <h6 id="titre-formation33">Genie Informatique</h6>
                                            </div>
                                            <div class="date33">
                                                <div class="datede" id="dateDebutfor33">
                                                    08/2024 -
                                                </div>
                                                <div class="datef" id="dateFinfor33">11/2025</div>
                                            </div>
                                        </div>
                                        <div class="card0-m">
                                            <div class="etab" style="display: inline; margin-left: 10px" id="etablissement33">
                                                FST
                                            </div>
                                            <div class="vill" id="villefor33">Settat</div>
                                        </div>
                                        <div class="card0-desc">
                                            <div class="desc" id="descriptionfor33">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Obcaecati minima aliquam at molestiae eveniet
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="centred">
                        <h3 class="section-title">Experience</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="border-right: 3px solid">
                            <div class="card1" id="experience00">
                                <div class="card1-body">
                                    <div class="card0-h">
                                        <div class="title">
                                            <h6 id="titre-experience00">Developpeur Java</h6>
                                        </div>
                                        <div class="date1">
                                            <div class="datede" id="dateDebutexp00">08/2024 - </div>
                                            <div class="datef" id="dateFinexp00">11/2025</div>
                                        </div>
                                    </div>
                                    <div class="card1-m">
                                        <div class="etab" style="display: inline; margin-left: 10px" id="Employeur00">
                                            Capgimini
                                        </div>
                                        <div class="vill" id="villeexp00">Casablnca</div>
                                    </div>
                                    <div class="card1-desc">
                                        <div class="desc" id="descriptionexp00">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing
                                            elit. Obcaecati minima aliquam at molestiae eveniet
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card1" id="experience11">
                                <div class="card1-body">
                                    <div class="card0-h">
                                        <div class="title">
                                            <h6 id="titre-experience11">Developpeur Java</h6>
                                        </div>
                                        <div class="date1">
                                            <div class="datede" id="dateDebutexp11">08/2024 -</div>
                                            <div class="datef" id="dateFinexp11">11/2025</div>
                                        </div>
                                    </div>
                                    <div class="card1-m">
                                        <div class="etab" style="display: inline; margin-left: 10px" id="Employeur11">
                                            Capgimini
                                        </div>
                                        <div class="vill" id="villeexp11">Casablnca</div>
                                    </div>
                                    <div class="card1-desc">
                                        <div class="desc" id="descriptionexp11">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing
                                            elit. Obcaecati minima aliquam at molestiae eveniet
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card1" id="experience22">
                                <div class="card1-body">
                                    <div class="card0-h">
                                        <div class="title">
                                            <h6 id="titre-experience22">Developpeur Java</h6>
                                        </div>
                                        <div class="date1">
                                            <div class="datede" id="dateDebutexp22">08/2024 -</div>
                                            <div class="datef" id="dateFinexp22">11/2025</div>
                                        </div>
                                    </div>
                                    <div class="card1-m">
                                        <div class="etab" style="display: inline; margin-left: 10px" id="Employeur22">
                                            Capgimini
                                        </div>
                                        <div class="vill" id="villeexp22">Casablnca</div>
                                    </div>
                                    <div class="card1-desc">
                                        <div class="desc" id="descriptionexp22">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing
                                            elit. Obcaecati minima aliquam at molestiae eveniet
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card1" id="experience33">
                                <div class="card1-body">
                                    <div class="card0-h">
                                        <div class="title">
                                            <h6 id="titre-experience33">Developpeur Java</h6>
                                        </div>
                                        <div class="date1">
                                            <div class="datede" id="dateDebutexp33">08/2024 -</div>
                                            <div class="datef" id="dateFinexp33">11/2025</div>
                                        </div>
                                    </div>
                                    <div class="card1-m">
                                        <div class="etab" style="display: inline; margin-left: 10px" id="Employeur33">
                                            Capgimini
                                        </div>
                                        <div class="vill" id="villeexp33">Casablnca</div>
                                    </div>
                                    <div class="card1-desc">
                                        <div class="desc" id="descriptionexp33">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing
                                            elit. Obcaecati minima aliquam at molestiae eveniet
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="section col-md-6">
                        <div class="centred">
                            <h3 class="section-title">Compétence</h3>
                        </div>
                        <div class="competence-container">
                            <div class="competence-item">
                                <div class="cmp" id="title-competence00">HTML :</div>
                                <div class="nvcp" id="level-competence00">Avancé</div>
                            </div>
                            <div class="competence-item">
                                <div class="cmp" id="title-competence11">CSS :</div>
                                <div class="nvcp" id="level-competence11">Avancé</div>
                            </div>
                            <div class="competence-item">
                                <div class="cmp" id="title-competence22">JavaScript :</div>
                                <div class="nvcp" id="level-competence22">Intermédiaire</div>
                            </div>
                            <div class="competence-item">
                                <div class="cmp" id="title-competence33">Python :</div>
                                <div class="nvcp" id="level-competence33">Avancé</div>
                            </div>
                        </div>
                    </div>

                    <div class="section col-md-6">
                        <div class="centred">
                            <h3 class="section-title">Languages</h3>
                        </div>
                        <div class="language-container">
                            <div class="language-item">
                                <div class="lng" id="title-language00">Français :</div>
                                <div class="nvLg" id="level-language00">Intermédiaire</div>
                            </div>
                            <div class="language-item">
                                <div class="lng" id="title-language11">English :</div>
                                <div class="nvLg" id="level-language11">Advanced</div>
                            </div>
                            <div class="language-item">
                                <div class="lng" id="title-language22">Español :</div>
                                <div class="nvLg" id="level-language22">Intermedio</div>
                            </div>
                            <div class="language-item">
                                <div class="lng" id="title-language33">Deutsch :</div>
                                <div class="nvLg" id="level-language33">Fortgeschritten</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <script src="testt.js"></script>
    <script src="../btsp/js/jquery-3.7.1.min.js"></script>
    <script src="../btsp/js/printThis.js"></script>
    <script src="typer&Pdf.js"></script>
    <script src="../btsp/js/bootstrap.min.js"></script>
    <script src="../btsp/js/popper.min.js"></script>
</body>

</html>