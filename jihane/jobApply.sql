CREATE TABLE candidat (
    idcandidat INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    motdepasse VARCHAR(100),
    ville VARCHAR(50),
    phone VARCHAR(20)
);

CREATE TABLE recruteur (
    idrecruteur INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    motdepasse VARCHAR(100),
    ville VARCHAR(50),
    phone VARCHAR(20),
    entreprise VARCHAR(100)
);

CREATE TABLE message (
    idmessage INT PRIMARY KEY,
    contenuemsg TEXT
);

CREATE TABLE offre (
    idoffre INT PRIMARY KEY,
    datepub DATE,
    delai DATE,
    centenue VARCHAR(100),
    nomentreprise VARCHAR(100),
    idrecruteur INT,
    FOREIGN KEY (idrecruteur) REFERENCES recruteur(idrecruteur)
);

CREATE TABLE postulation (
    idpos INT PRIMARY KEY,
    datepub DATE
);

CREATE TABLE cv (
    idcv INT PRIMARY KEY,
    datepub DATE,
    idcandidat INT,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

CREATE TABLE formation (
    nomFormation VARCHAR(100),
    datedebut DATE,
    datefin DATE,
    diplome VARCHAR(100),
    etablissement VARCHAR(100),
    idcv INT,
    FOREIGN KEY (idcv) REFERENCES cv(idcv)
);

CREATE TABLE langue (
    idlangue INT PRIMARY KEY,
    nomlangue VARCHAR(50),
    niveau VARCHAR(50),
    idcv INT,
    FOREIGN KEY (idcv) REFERENCES cv(idcv)
);

CREATE TABLE competence (
    idcompetence INT PRIMARY KEY,
    nomcompetence VARCHAR(100),
    idcv INT,
    FOREIGN KEY (idcv) REFERENCES cv(idcv)
);

CREATE TABLE experience (
    idexperience INT PRIMARY KEY,
    poste VARCHAR(100),
    datedebut DATE,
    datefin DATE,
    description TEXT,
    nomentreprise VARCHAR(100),
    idcv INT,
    FOREIGN KEY (idcv) REFERENCES cv(idcv)
);

CREATE TABLE loisir (
    idloisir INT PRIMARY KEY,
    nomloisir VARCHAR(100),
    idcv INT,
    FOREIGN KEY (idcv) REFERENCES cv(idcv)
);

CREATE TABLE information (
    idinformation INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20),
    adresse VARCHAR(100),
    specialite VARCHAR(100),
    idcv INT,
    FOREIGN KEY (idcv) REFERENCES cv(idcv)
);
