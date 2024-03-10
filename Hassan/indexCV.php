<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../btsp/css/bootstrap.css" />
    <link rel="stylesheet" href="../btsp/css/bootstrap.min.css" />
    <title>Créer votre CV</title>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link
      href="https://cdn.quilljs.com/1.3.6/quill.snow.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="styleCV.css" />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg container nav-underline">
      <div>
        <img src="../media/logo.jpeg" alt="logo" class="logo" />
        <a class="navbar-brand" href="index.html">Jobido</a>
      </div>
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link"
                aria-current="page"
                href="../Wassim/index.html"
                >Home</a
              >
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
          class="nav-link badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-badge border rounded-pill"
        >
          <img
            class="nav-link profile rounded-circle me-1"
            width="24"
            height="24"
            src="../media/logo.jpeg"
            alt="profile"
          />
          <a class="nav-link" href="../jihane/profilCandidat.html">Username</a>
        </span>
      </div>
    </nav>

    <aside class="side" id="cv-info">
      <div class="form-info-cv">
        <form action="" method="post">
          <div class="form-group">
            <button
              class="btn-collapse"
              type="button"
              data-toggle="collapse"
              data-target="#info-personnel"
              aria-expanded="false"
              aria-controls="info-personnel"
            >
              Informations Personnel <span>&#x2B9F;</span>
            </button>
          </div>

          <div class="form-floating collapse" id="info-personnel">
            <!--add collapse-->

            <div class="x">
              <div class="" type="file" role="button" id="import-user-img">
                <img src="/media/logo.jpeg" id="uploaded-img" alt="" />
              </div>

              <div id="div-name">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control x1"
                    placeholder="First name"
                    id="first-name"
                    aria-label="First name"
                    value="hassan"
                  />
                  <label class="form-label" for="first-name">First name</label>
                </div>
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control x1"
                    placeholder="First name"
                    id="last-name"
                    aria-label="Last name"
                  />
                  <label class="form-label" for="last-name">Last name</label>
                </div>
                <div class="form-floating">
                  <input
                    type="date"
                    class="form-control x1"
                    placeholder="date naissance"
                    id="date-naissance"
                    aria-label="Last name"
                  />
                  <label class="form-label" for="birth-date"
                    >Date de naissance</label
                  >
                </div>
              </div>
            </div>
            <div class="e-a-t input-group">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control x1"
                  id="inputmail"
                  placeholder="Email"
                />
                <label for="inputmail" class="form-label">Email</label>
              </div>
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control x1"
                  id="inputAddress"
                  placeholder="Address"
                />
                <label for="inputAddress" class="form-label">Address</label>
              </div>
              <div class="form-floating">
                <input
                  type="tel"
                  class="form-control x1"
                  id="inputTele"
                  placeholder="Telephone"
                />
                <label for="inputTele" class="form-label">N° Telephone</label>
              </div>
            </div>
            <div class="sexe-check row justify-content-center">
              <div class="form-floating col-auto">
                <input
                  type="tel"
                  class="form-control x1"
                  id="inputSpécialité"
                  placeholder="Spécialité"
                />
                <label for="inputSpécialité" class="form-label"
                  >Spécialité</label
                >
              </div>
              <div class="col-auto" style="margin: 10px">
                <div class="form-check row-auto">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="male"
                    value="male"
                  />
                  <label class="form-check-label" for="male"> Male </label>
                </div>
                <div class="form-check row-auto">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="female"
                    value="female"
                  />
                  <label class="form-check-label" for="female"> Female </label>
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="form-group">
            <button
              class="btn-collapse"
              type="button"
              data-toggle="collapse"
              data-target="#info-formation"
              aria-expanded="false"
              aria-controls="info-formation"
            >
              Formations <span>&#x2B9F;</span>
            </button>
          </div>
          <div class="form-floating collapse" id="info-formation">
            <!--add collapse-->
            <div class="container">
              <div class="card formation0">
                <div class="card-body">
                  <form id="formfor0" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-formation0"
                        name="formation0"
                        class="form-control"
                        placeholder="titre de formation"
                        required
                      />
                      <label for="formation0" class="form-label"
                        >Titre de Formation:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="etablissement0"
                        name="etablissement0"
                        class="form-control x1"
                        placeholder="etablissement"
                        required
                      />
                      <label for="etablissement0" class="form-label"
                        >Établissement:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villefor0"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villefor0" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutfor0"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutfor0" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinfor0"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinfor0" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionfor-input0" />
                      <div type="text" id="descriptionfor0">
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
                  <form id="formfor1" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-formation1"
                        name="formation1"
                        class="form-control"
                        placeholder="titre de formation"
                        required
                      />
                      <label for="formation1" class="form-label"
                        >Titre de Formation:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="etablissement1"
                        name="etablissement1"
                        class="form-control x1"
                        placeholder="etablissement"
                        required
                      />
                      <label for="etablissement1" class="form-label"
                        >Établissement:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villefor1"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villefor1" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutfor1"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutfor1" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinfor1"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinfor1" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionfor-input1" />
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
                  <form id="formfor2" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-formation2"
                        name="formation2"
                        class="form-control"
                        placeholder="titre de formation"
                        required
                      />
                      <label for="formation2" class="form-label"
                        >Titre de Formation:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="etablissement2"
                        name="etablissement2"
                        class="form-control x1"
                        placeholder="etablissement"
                        required
                      />
                      <label for="etablissement2" class="form-label"
                        >Établissement:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villefor2"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villefor2" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutfor2"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutfor2" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinfor2"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinfor2" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionfor-input2" />
                      <div id="descriptionfor2">
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
              <div class="card hidden" id="formation3">
                <div class="card-body">
                  <form id="formfor3" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-formation3"
                        name="formation3"
                        class="form-control"
                        placeholder="titre de formation"
                        required
                      />
                      <label for="formation3" class="form-label"
                        >Titre de Formation:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="etablissement3"
                        name="etablissement3"
                        class="form-control x1"
                        placeholder="etablissement"
                        required
                      />
                      <label for="etablissement3" class="form-label"
                        >Établissement:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villefor3"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villefor3" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutfor3"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutfor3" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinfor3"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinfor3" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionfor-input3" />
                      <div id="descriptionfor3">
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
              <div class="card hidden" id="formation4">
                <div class="card-body">
                  <form id="formfor4" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-formation4"
                        name="formation4"
                        class="form-control"
                        placeholder="titre de formation"
                        required
                      />
                      <label for="formation4" class="form-label"
                        >Titre de Formation:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="etablissement4"
                        name="etablissement4"
                        class="form-control x1"
                        placeholder="etablissement"
                        required
                      />
                      <label for="etablissement4" class="form-label"
                        >Établissement:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villefor4"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villefor4" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutfor4"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutfor4" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinfor4"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinfor4" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionfor-input4" />
                      <div id="descriptionfor4">
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
                <button
                  class="btn-with-icon btn"
                  type="button"
                  id="remove-formation"
                >
                  <span class="icon-span" role="img"
                    ><img src="/media/moins.png" alt="icon"
                  /></span>
                  Suprimer formation
                </button>
                <button
                  class="btn-with-icon btn"
                  type="button"
                  id="add-formation"
                >
                  <span class="icon-span" role="img"
                    ><img src="/media/croix-plus.png" alt="icon"
                  /></span>
                  Ajouter formation
                </button>
              </div>
            </div>
          </div>
          <hr />
          <div class="form-group">
            <button
              class="btn-collapse"
              type="button"
              data-toggle="collapse"
              data-target="#info-experience"
              aria-expanded="false"
              aria-controls="info-experience"
            >
              Experience <span>&#x2B9F;</span>
            </button>
          </div>
          <div class="form-floating collapse" id="info-experience">
            <div class="container">
              <div class="card experience0">
                <div class="card-body">
                  <form id="formexp0" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-experience0"
                        name="experience0"
                        class="form-control"
                        placeholder="Post"
                        required
                      />
                      <label for="experience0" class="form-label">Post:</label>
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="Employeur0"
                        name="Employeur0"
                        class="form-control x1"
                        placeholder="Employeur"
                        required
                      />
                      <label for="Employeur0" class="form-label"
                        >Employeur:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villeexp0"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villeexp0" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutexp0"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutexp0" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinexp0"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinexp0" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionexp-input0" />
                      <div id="descriptionexp0">
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
              <div class="card hidden" id="experience1">
                <div class="card-body">
                  <form id="formexp1" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-experience1"
                        name="experience1"
                        class="form-control"
                        placeholder="Post"
                        required
                      />
                      <label for="experience1" class="form-label">Post:</label>
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="employeur1"
                        name="employeur1"
                        class="form-control x1"
                        placeholder="employeur"
                        required
                      />
                      <label for="employeur1" class="form-label"
                        >Employeur:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villeexp1"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villeexp1" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutexp1"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutexp1" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinexp1"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinexp1" class="form-label"
                          >Date de fin:</label
                        >
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
                      <input
                        type="text"
                        id="titre-experience2"
                        name="experience2"
                        class="form-control"
                        placeholder="Post"
                        required
                      />
                      <label for="experience2" class="form-label">Post:</label>
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="employeur2"
                        name="employeur2"
                        class="form-control x1"
                        placeholder="employeur"
                        required
                      />
                      <label for="employeur2" class="form-label"
                        >Employeur:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villeexp2"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villeexp2" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutexp2"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutexp2" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinexp2"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinexp2" class="form-label"
                          >Date de fin:</label
                        >
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
                      <input
                        type="text"
                        id="titre-experience3"
                        name="experience3"
                        class="form-control"
                        placeholder="Post"
                        required
                      />
                      <label for="experience3" class="form-label">Post:</label>
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="employeur3"
                        name="employeur3"
                        class="form-control x1"
                        placeholder="employeur"
                        required
                      />
                      <label for="employeur3" class="form-label"
                        >Employeur:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villeexp3"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villeexp3" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutexp3"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutexp3" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinexp3"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinexp3" class="form-label"
                          >Date de fin:</label
                        >
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
              <div class="card hidden" id="experience4">
                <div class="card-body">
                  <form id="formexp4" action="#" method="post">
                    <div class="form-floating">
                      <input
                        type="text"
                        id="titre-experience4"
                        name="experience4"
                        class="form-control"
                        placeholder="Post"
                        required
                      />
                      <label for="experience4" class="form-label">Post:</label>
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="employeur4"
                        name="employeur4"
                        class="form-control x1"
                        placeholder="employeur"
                        required
                      />
                      <label for="employeur4" class="form-label"
                        >Employeur:</label
                      >
                    </div>

                    <div class="form-floating">
                      <input
                        type="text"
                        id="villeexp4"
                        name="ville"
                        class="form-control x1"
                        placeholder="ville"
                        required
                      />
                      <label for="villeexp4" class="form-label">Ville:</label>
                    </div>

                    <div class="input-group">
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateDebutexp4"
                          name="dateDebut"
                          class="form-control x1"
                          placeholder="date début"
                        />
                        <label for="dateDebutexp4" class="form-label"
                          >Date de début:</label
                        >
                      </div>
                      <div class="form-floating">
                        <input
                          type="date"
                          id="dateFinexp4"
                          name="dateFin"
                          class="form-control x1"
                          placeholder="date fin"
                        />
                        <label for="dateFinexp4" class="form-label"
                          >Date de fin:</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="" id="descriptionexp-input4" />
                      <div id="descriptionexp4">
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
                <button
                  class="btn-with-icon btn"
                  type="button"
                  id="remove-experience"
                >
                  <span class="icon-span" role="img"
                    ><img src="/media/moins.png" alt="icon"
                  /></span>
                  Suprimer experience
                </button>
                <button
                  class="btn-with-icon btn"
                  type="button"
                  id="add-experience"
                >
                  <span class="icon-span" role="img"
                    ><img src="/media/croix-plus.png" alt="icon"
                  /></span>
                  Ajouter experience
                </button>
              </div>
            </div>
          </div>

          <hr />
          <div class="form-group">
            <button
              class="btn-collapse"
              type="button"
              data-toggle="collapse"
              data-target="#info-language"
              aria-expanded="false"
              aria-controls="info-language"
            >
              Language <span>&#x2B9F;</span>
            </button>
          </div>

          <div class="form-floating collapse" id="info-language">
            <div class="card language">
              <div class="card-body">
                <form action="">
                  <div class="slider form-floating" id="language0">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="Langue"
                      id="title-language0"
                      required
                    />
                    <label for="title-language0" class="form-label"
                      >Langue</label
                    >
                    <select id="level-language0">
                      <option checked>Niveau..</option>
                      <option value="1">Débutant</option>
                      <option value="2">Intermédiaire</option>
                      <option value="3">Avancé</option>
                    </select>
                  </div>
                  <div class="slider form-floating hidden" id="language1">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="Langue"
                      id="title-language0"
                      required
                    />
                    <label for="title-language0" class="form-label"
                      >Langue</label
                    >
                    <select id="level-language0">
                      <option checked>Niveau..</option>
                      <option value="1">Débutant</option>
                      <option value="2">Intermédiaire</option>
                      <option value="3">Avancé</option>
                    </select>
                  </div>

                  <div class="slider form-floating hidden" id="language2">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="Langue"
                      id="title-language2"
                      required
                    />
                    <label for="title-language2" class="form-label"
                      >Langue</label
                    >
                    <select id="level-language2">
                      <option checked>Niveau..</option>
                      <option value="1">Débutant</option>
                      <option value="2">Intermédiaire</option>
                      <option value="3">Avancé</option>
                    </select>
                  </div>
                  <div class="slider form-floating hidden" id="language3">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="Langue"
                      id="title-language3"
                      required
                    />
                    <label for="title-language3" class="form-label"
                      >Langue</label
                    >
                    <select id="level-language3">
                      <option checked>Niveau..</option>
                      <option value="1">Débutant</option>
                      <option value="2">Intermédiaire</option>
                      <option value="3">Avancé</option>
                    </select>
                  </div>
                  <div class="slider form-floating hidden" id="language4">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="Langue"
                      id="title-language4"
                      required
                    />
                    <label for="title-language4" class="form-label"
                      >Langue</label
                    >
                    <select id="level-language4">
                      <option checked>Niveau..</option>
                      <option value="1">Débutant</option>
                      <option value="2">Intermédiaire</option>
                      <option value="3">Avancé</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary">Terminé</button>
                </form>
                <div class="d-md-flex justify-content-md-end">
                  <button
                    class="btn-with-icon btn"
                    type="button"
                    id="remove-langue"
                  >
                    <span class="icon-span" role="img"
                      ><img src="/media/moins.png" alt="icon"
                    /></span>
                  </button>
                  <button
                    class="btn-with-icon btn"
                    type="button"
                    id="add-langue"
                  >
                    <span class="icon-span" role="img"
                      ><img src="/media/croix-plus.png" alt="icon"
                    /></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="form-group">
            <button
              class="btn-collapse"
              type="button"
              data-toggle="collapse"
              data-target="#info-competence"
              aria-expanded="false"
              aria-controls="info-competence"
            >
              Compétence <span>&#x2B9F;</span>
            </button>
          </div>

          <div class="form-floating collapse" id="info-competence">
            <div class="card competence">
              <div class="card-body">
                <form action="">
                  <div class="slider form-floating" id="competence0">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="competence"
                      id="title-competence0"
                      required
                    />
                    <label for="title-competence0" class="form-label"
                      >competence</label
                    >
                    <input
                      type="range"
                      class="form-range"
                      id="level-competence0"
                      min="1"
                      max="4"
                      value="2"
                    />
                  </div>
                  <div class="slider hidden form-floating" id="competence1">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="competence"
                      id="title-competence1"
                      required
                    />
                    <label for="title-competence1" class="form-label"
                      >competence</label
                    >
                    <input
                      type="range"
                      class="form-range"
                      id="level-competence1"
                      min="1"
                      max="4"
                      value="2"
                    />
                  </div>

                  <div class="slider hidden form-floating" id="competence2">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="competence"
                      id="title-competence2"
                      required
                    />
                    <label for="title-competence2" class="form-label"
                      >competence</label
                    >
                    <input
                      type="range"
                      class="form-range"
                      id="level-competence2"
                      min="1"
                      max="4"
                      value="2"
                    />
                  </div>
                  <div class="slider hidden form-floating" id="competence3">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="competence"
                      id="title-competence3"
                      required
                    />
                    <label for="title-competence3" class="form-label"
                      >competence</label
                    >
                    <input
                      type="range"
                      class="form-range"
                      id="level-competence3"
                      min="1"
                      max="4"
                      value="2"
                    />
                  </div>
                  <div class="slider hidden form-floating" id="competence4">
                    <input
                      type="text"
                      class="form-control x1"
                      placeholder="competence"
                      id="title-competence4"
                      required
                    />
                    <label for="title-competence4" class="form-label"
                      >competence</label
                    >
                    <input
                      type="range"
                      class="form-range"
                      id="level-competence4"
                      min="1"
                      max="4"
                      value="2"
                    />
                  </div>

                  <button type="submit" class="btn btn-primary">Terminé</button>
                </form>
                <div class="d-md-flex justify-content-md-end">
                  <button
                    class="btn-with-icon btn"
                    type="button"
                    id="remove-competence"
                  >
                    <span class="icon-span" role="img"
                      ><img src="/media/moins.png" alt="icon"
                    /></span>
                  </button>
                  <button
                    class="btn-with-icon btn"
                    type="button"
                    id="add-competence"
                  >
                    <span class="icon-span" role="img"
                      ><img src="/media/croix-plus.png" alt="icon"
                    /></span>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <hr />
          <div class="d-md-flex justify-content-md-end">
            <input
              type="submit"
              value="Save"
              class="me-md-2 btn btn-outline-primary reset"
            />
            <input
              type="button"
              id="btn-print-this"
              class="btn btn-outline-primary submit"
              value="Save as PDF"
            />
          </div>
        </form>
      </div>
    </aside>

    <aside class="side" id="cv-figure">
      <div class="cv-template">
        <div id="cv-head">
          <div role="img" id="cvImg">
            <img src="/media/logo.jpeg" alt="Photo Personnel" id="user-img" />
          </div>
          <span class="cv-head-info" id="user-name">Hassan AMRANI</span>
          <table class="cv-head-info">
            <tr>
              <td>
                <img src="/media/enveloppe.png" alt="" class="cv-info-icon" />
              </td>
              <td>
                <span class="cv-head-info" id="user-email"
                  >fake.email@gmail.com</span
                >
              </td>
            </tr>
            <tr>
              <td>
                <img src="/media/appel.png" alt="" class="cv-info-icon" />
              </td>
              <td>
                <span class="cv-head-info" id="user-phone">06 123 456 789</span>
              </td>
            </tr>
            <tr>
              <td>
                <img
                  src="/media/cartes-et-drapeaux.png"
                  alt=""
                  class="cv-info-icon"
                />
              </td>
              <td>
                <span class="cv-head-info" id="user-street"
                  >SACJAVSHJ JSCJSHBCJHSLKJSQSCQSCSC SCQSS CBQSJKCBSJKCBSDDV
                  DVSSDFHJC</span
                >
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
                <div class="col-md-6" style="border-right: 3px solid">
                  <div class="card0">
                    <div class="card0-body">
                      <div class="card0-h">
                        <div class="title">
                          <h6>Genie Informatique</h6>
                        </div>
                        <div class="date0">
                          <div class="datede">08/2024 -</div>
                          <div class="datef">11/2025</div>
                        </div>
                      </div>
                      <div class="card0-m">
                        <div
                          class="etab"
                          style="display: inline; margin-left: 10px"
                        >
                          FST
                        </div>
                        <div class="vill">Settat</div>
                      </div>
                      <div class="card0-desc">
                        <div class="desc">
                          Lorem ipsum, dolor sit amet consectetur adipisicing
                          elit. Obcaecati minima aliquam at molestiae eveniet
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card0">
                    <div class="card0-body">
                      <div class="card0-h">
                        <div class="title">
                          <h6>Genie Informatique</h6>
                        </div>
                        <div class="date0">
                          <div class="datede">08/2024 -</div>
                          <div class="datef">11/2025</div>
                        </div>
                      </div>
                      <div class="card0-m">
                        <div
                          class="etab"
                          style="display: inline; margin-left: 10px"
                        >
                          FST
                        </div>
                        <div class="vill">Settat</div>
                      </div>
                      <div class="card0-desc">
                        <div class="desc">
                          Lorem ipsum, dolor sit amet consectetur adipisicing
                          elit. Obcaecati minima aliquam at molestiae eveniet
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card0">
                    <div class="card0-body">
                      <div class="card0-h">
                        <div class="title">
                          <h6>Genie Informatique</h6>
                        </div>
                        <div class="date0">
                          <div class="datede">08/2024 -</div>
                          <div class="datef">11/2025</div>
                        </div>
                      </div>
                      <div class="card0-m">
                        <div
                          class="etab"
                          style="display: inline; margin-left: 10px"
                        >
                          FST
                        </div>
                        <div class="vill">Settat</div>
                      </div>
                      <div class="card0-desc">
                        <div class="desc">
                          Lorem ipsum, dolor sit amet consectetur adipisicing
                          elit. Obcaecati minima aliquam at molestiae eveniet
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card0">
                    <div class="card0-body">
                      <div class="card0-h">
                        <div class="title">
                          <h6>Genie Informatique</h6>
                        </div>
                        <div class="date0">
                          <div class="datede">08/2024 -</div>
                          <div class="datef">11/2025</div>
                        </div>
                      </div>
                      <div class="card0-m">
                        <div
                          class="etab"
                          style="display: inline; margin-left: 10px"
                        >
                          FST
                        </div>
                        <div class="vill">Settat</div>
                      </div>
                      <div class="card0-desc">
                        <div class="desc">
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
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Consequuntur dolores, ut mollitia nisi voluptatem nesciunt
                quisquam beatae earum autem odit quidem perspiciatis quasi id
                ipsa nemo corrupti error cumque tempora. Lorem ipsum dolor, sit
                amet consectetur adipisicing elit. Consequuntur dolores, ut
                mollitia nisi voluptatem nesciunt quisquam beatae earum autem
                odit quidem perspiciatis quasi id ipsa nemo corrupti error
                cumque tempora.
              </div>

              <div class="col-md-6">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Consequuntur dolores, ut mollitia nisi voluptatem nesciunt
                quisquam beatae earum autem odit quidem perspiciatis quasi id
                ipsa nemo corrupti error cumque tempora. Lorem ipsum dolor, sit
                amet consectetur adipisicing elit. Consequuntur dolores, ut
                mollitia nisi voluptatem nesciunt quisquam beatae earum autem
                odit quidem perspiciatis quasi id ipsa nemo corrupti error
                cumque tempora. error cumque tempora.
              </div>
            </div>
          </div>

          <div class="row">
            <div class="section col-md-6">
              <div class="centred">
                <h3 class="section-title">Competence</h3>
              </div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex unde
              explicabo voluptate mollitia reprehenderit quod magni aliquid
              praesentium laudantium iusto saepe assumenda, harum eligendi
              eveniet, at vero ducimus nobis placeat.
            </div>
            <div class="section col-md-6">
              <div class="centred">
                <h3 class="section-title">Languages</h3>
              </div>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum
              perferendis tenetur, molestiae rerum laborum quae corporis
              consequatur nostrum consequuntur eaque sequi facere commodi! Ex
              quasi iste vel excepturi illo. Reprehenderit. Lorem ipsum dolor
              sit amet consectetur, adipisicing elit. Eum perferendis tenetur,
              molestiae rerum laborum quae corporis consequatur nostrum
              consequuntur eaque sequi facere commodi! Ex quasi iste vel
              excepturi illo. Reprehenderit.
            </div>
          </div>
        </div>
      </div>
    </aside>

    <script src="/btsp/js/jquery-3.7.1.min.js"></script>
    <script src="/btsp/js/printThis.js"></script>
    <script src="saveToPdf.js"></script>
    <script src="/btsp/js/bootstrap.min.js"></script>
    <script src="/btsp/js/popper.min.js"></script>
  </body>
</html>