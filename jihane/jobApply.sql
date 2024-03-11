CREATE TABLE candidat (
    idcandidat INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adresse VARCHAR(255),
    phone VARCHAR(20),
    nomcv VARCHAR(512),
    specialite VARCHAR(100),
    email VARCHAR(100),
    motdepasse VARCHAR(255),
    datenaissance DATE,
    insta VARCHAR(512),
    linkedin VARCHAR(512),
    github VARCHAR(512),
    discord VARCHAR(512),
    datesingup datetime
);


CREATE TABLE recruteur (
    idrecruteur INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    motdepasse VARCHAR(100),
    ville VARCHAR(50),
    phone VARCHAR(20),
    entreprise VARCHAR(100),
    about TEXT,
    insta VARCHAR(512),
    linkedin VARCHAR(512),
    facebook VARCHAR(512),
    datesingup datetime
);

CREATE TABLE message (
    idmessage INT PRIMARY KEY,
    idcandidat INT,
    idrecruteur INT,
    contenuemsg TEXT,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat),
    FOREIGN KEY (idrecruteur) REFERENCES recruteur(idrecruteur)
);

CREATE TABLE offre (
    idoffre INT PRIMARY KEY,
    datepub DATE,
    delai DATE,
    typecontrat VARCHAR(100),
    slairemin INT,
    slairemax INT,
    ville VARCHAR(100),
    descriptionoffre VARCHAR(100),
    nomentreprise VARCHAR(100),
    idrecruteur INT,
    FOREIGN KEY (idrecruteur) REFERENCES recruteur(idrecruteur)
);

CREATE TABLE postulation (
    idpos INT PRIMARY KEY,
    idcandidat INT,
    idoffre INT,
    datepub DATE,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat),
    FOREIGN KEY (idoffre) REFERENCES offre(idoffre)
);

CREATE TABLE formation (
    idformation INT PRIMARY KEY,
    nomFormation VARCHAR(100),
    datedebut DATE,
    datefin DATE,
    etablissement VARCHAR(100),
    descriptionfor TEXT,
    ville VARCHAR(50),
    idcandidat INT,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

CREATE TABLE experience (
    idexperience INT PRIMARY KEY,
    poste VARCHAR(100),
    datedebut DATE,
    datefin DATE,
    descriptionexp TEXT,
    nomentreprise VARCHAR(100),
    ville VARCHAR(50),
    idcandidat INT,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

CREATE TABLE langue (
    idlangue INT PRIMARY KEY,
    nomlangue VARCHAR(50),
    niveau VARCHAR(50),
    idcandidat INT,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

CREATE TABLE competence (
    idcompetence INT PRIMARY KEY,
    nomcompetence VARCHAR(100),
    idcandidat INT,
    niveau VARCHAR(50),
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

