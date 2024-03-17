CREATE TABLE user (
    iduser INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(250) NOT NULL,
    motdepasse VARCHAR(100) NOT NULL,
    datesignup TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    role VARCHAR(50) NOT NULL
);

CREATE TABLE candidat (
    idcandidat INT AUTO_INCREMENT PRIMARY KEY, 
    adresse VARCHAR(255),
    phone VARCHAR(20),
    nomcv VARCHAR(512),
    specialite VARCHAR(100),
    datenaissance DATE,
    insta VARCHAR(512),
    linkedin VARCHAR(512),
    github VARCHAR(512),
    discord VARCHAR(512),
    datesignup DATETIME,
    iduser INT,
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);

CREATE TABLE recruteur (
    idrecruteur INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255),
    phone VARCHAR(20),
    entreprise VARCHAR(100),
    about TEXT,
    insta VARCHAR(512),
    linkedin VARCHAR(512),
    facebook VARCHAR(512),
    datesignup DATETIME,
    iduser INT,
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);

CREATE TABLE offre (
    idoffre INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(500) NOT NULL ,
    datepub TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    delai DATE,
    typecontrat VARCHAR(100),
    slairemin INT,
    slairemax INT,
    ville VARCHAR(100),
    descriptionoffre TEXT,
    nomentreprise VARCHAR(100),
    idrecruteur INT,
    FOREIGN KEY (idrecruteur) REFERENCES recruteur(idrecruteur)
);

CREATE TABLE postulation (
    idpos INT AUTO_INCREMENT PRIMARY KEY,
    idcandidat INT,
    idoffre INT,
    datepub DATE,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat),
    FOREIGN KEY (idoffre) REFERENCES offre(idoffre)
);

CREATE TABLE formation (
    idformation INT AUTO_INCREMENT PRIMARY KEY,
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
    idexperience INT AUTO_INCREMENT PRIMARY KEY,
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
    idlangue INT AUTO_INCREMENT PRIMARY KEY,
    nomlangue VARCHAR(50),
    niveau VARCHAR(50),
    idcandidat INT,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

CREATE TABLE competence (
    idcompetence INT AUTO_INCREMENT PRIMARY KEY,
    nomcompetence VARCHAR(100),
    idcandidat INT,
    niveau VARCHAR(50),
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat)
);

CREATE TABLE conversation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idrecruteur INT NOT NULL,
    idcandidat INT NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat),
    FOREIGN KEY (idrecruteur) REFERENCES recruteur(idrecruteur)
);

CREATE TABLE message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender INT NOT NULL,
    content TEXT , 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    idconversation INT ,
    FOREIGN KEY (idconversation) REFERENCES conversation(id),
    FOREIGN KEY (sender) REFERENCES user(iduser)
);

CREATE TABLE photo(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    iduser INT NOT NULL,
    avatar TEXT , 
    indx INT , 
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);
