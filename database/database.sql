
-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes-- Active: 1683713238466@@127.0.0.1@3306@gestionnotes

CREATE TABLE AnneeScolaire (
  id INT PRIMARY KEY AUTO_INCREMENT,
  libelle VARCHAR(255) not null,
  statut BOOLEAN not null DEFAULT 0
);
 

SELECT * FROM AnneeScolaire WHERE statut = 1;
 SELECT * FROM anneescolaire;
 drop TABLE anneescolaire;

CREATE TABLE Cycle (
  id INT PRIMARY KEY AUTO_INCREMENT,
  libelle VARCHAR(255), 
  id_annee INT , FOREIGN KEY (id_annee) REFERENCES AnneeScolaire(id)
);

SELECT * from Cycle;
drop TABLE Cycle;


SELECT * from Cycle;


CREATE TABLE Classe (
  id INT PRIMARY KEY AUTO_INCREMENT,
  libelle VARCHAR(255),
  id_cycle INT,
  FOREIGN KEY (id_cycle) REFERENCES Cycle(id), 
  id_annee INT , FOREIGN KEY (id_annee) REFERENCES AnneeScolaire(id)
);



INSERT INTO Classe (libelle, id_cycle, id_annee)
VALUES 
('CI A', 1, GetActiveAnneeId()),
('CI B', 1, GetActiveAnneeId()),
('CP A', 1, GetActiveAnneeId()),
('CP B', 1, GetActiveAnneeId()),
('2nd', 3, GetActiveAnneeId());

INSERT INTO Classe (libelle, id_cycle, id_annee)
VALUES 
('CM1 ', 1, GetActiveAnneeId());

SELECT c.id, c.libelle
FROM Classe c
JOIN Cycle cy ON c.id_cycle = cy.id
JOIN AnneeScolaire a ON c.id_annee = a.id
WHERE cy.id = 1 AND a.statut = 1;


SELECT id_cycle from  classe where id =1;



TRUNCATE classe;
TRUNCATE cycle;




drop TABLE Classe;

SELECT * from Classe;
 SELECT * FROM anneescolaire;
INSERT INTO Classe (libelle, id_cycle, id_annee)
VALUES ('CIA', 1, GetActiveAnneeScolaireId());







CREATE TABLE Eleve (
  id INT PRIMARY KEY AUTO_INCREMENT,
  prenom_eleve VARCHAR(255) NOT NULL,
  nom_eleve VARCHAR(255) NOT NULL,
  date_de_naissance varchar(25), 
  profil VARCHAR(255) NOT NULL,
  id_classe INT,
  numero_eleve_interne INT DEFAULT NULL,
  FOREIGN KEY (id_classe) REFERENCES Classe(id_classe)
);
drop Table Eleve;


DELIMITER //

CREATE TRIGGER GenererNumeroEleveInterne
BEFORE INSERT ON Eleve
FOR EACH ROW
BEGIN
  DECLARE dernier_numero INT;
  
  IF NEW.profil = 'interne' THEN
    -- Récupérer le dernier numéro d'élève interne
    SELECT MAX(numero_eleve_interne) INTO dernier_numero
      FROM Eleve WHERE profil = 'interne';
    -- Générer un nouveau numéro d'élève interne
    SET NEW.numero_eleve_interne = COALESCE(dernier_numero, 0) + 1;
  END IF;
END;

DELIMITER ;



CREATE TABLE Discipline (
  id_discipline INT PRIMARY KEY AUTO_INCREMENT,
  code_discipline VARCHAR(255),
  description_discipline VARCHAR(255)
);


CREATE TABLE GroupeDiscipline (
  id_groupe INT PRIMARY KEY AUTO_INCREMENT,
  nom_groupe VARCHAR(255)
);

CREATE TABLE MappingGroupeDiscipline (
  id_groupe INT,
  id_discipline INT,
  FOREIGN KEY (id_groupe) REFERENCES GroupeDiscipline(id_groupe),
  FOREIGN KEY (id_discipline) REFERENCES Discipline(id_discipline)
);
CREATE TABLE Note (
  id_note INT PRIMARY KEY AUTO_INCREMENT,
  type_note VARCHAR(255),
  valeur_note DECIMAL(5,2),
  coefficient DECIMAL(5,2),
  id_eleve INT,
  id_discipline INT,
  FOREIGN KEY (id_eleve) REFERENCES Eleve(id_eleve),
  FOREIGN KEY (id_discipline) REFERENCES Discipline(id_discipline)
);




CREATE TABLE Utilisateur (
  id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
  telephone VARCHAR(25),
  mot_de_passe VARCHAR(32),
  roles VARCHAR(25)
);
drop TABLE Utilisateur;


CREATE TABLE Coefficient (
  id_coefficient INT PRIMARY KEY AUTO_INCREMENT,
  valeur_coefficient DECIMAL(5,2),
  type_coefficient VARCHAR(255),
  id_discipline INT,
  id_classe INT,
  FOREIGN KEY (id_discipline) REFERENCES Discipline(id_discipline),
  FOREIGN KEY (id_classe) REFERENCES Classe(id_classe)
);



drop table cycleniveaumapping;

-- Insertion des données dans la table "Cycle"
INSERT INTO Cycle (libelle) VALUES
('Primaire'),
('Moyen'),
('Secondaire');

SELECT * FROM cycle;


-- Insertion des données dans la table "NiveauEnseignement"
INSERT INTO Classe (libelle, id_cycle) VALUES
('CI', 1),
('CP', 1),
('CE1', 1),
('CE2', 1),
('CM1', 1),
('CM2', 1),
('6ème', 2),
('5ème', 2),
('4ème', 2),
('3ème', 2),
('2nde', 3);

TRUNCATE classe;

SELECT id, libelle
FROM Classe 
where id_cycle= 1;

INSERT INTO Utilisateur (telephone, mot_de_passe, roles)
VALUES ('785830319', 'motdepasse', 'admin');

INSERT INTO AnneeScolaire (nom_annee)
VALUES ('2021-2022' ),
       ('2022-2023'),
       ('2023-2024');
SELECT * from anneescolaire;
INSERT INTO AnneeScolaire (nom_annee , statut)
VALUES ( '2024-2025',1 );
UPDATE AnneeScolaire SET statut = 0 WHERE id_annee = 3 ;

TRUNCATE AnneeScolaire;
INSERT INTO Classe (libelle, id_cycle) VALUES
('CI A', 1),
('CI B',  1),
('CP A',  1),
('CP B',  1),
('CP C',  1),
('CE1 A', 1),
('CE2 B', 1),
('CE2 A', 1),
('CM1 A', 1),
('CM2 A', 1),
('6e A', 2),
('6e B', 2),
('6e C', 2),
('5e A', 2),
('5e B', 2),
('4e A', 2),
('4e B', 2),
('3e A', 2),
('2nd', 3);


SELECT * from Classe;

-- Insertion des données dans la table Eleve
-- Insertion des données dans la table Eleve
INSERT INTO Eleve (prenom_eleve, nom_eleve, date_de_naissance, profil, id_classe)
VALUES
    ('Mamadou', 'Diallo', '2008-03-15', 'interne', 1),
    ('Fatoumata', 'Sylla', '2009-07-21', 'externe', 1),
    ('Abdoulaye', 'Cissé', '2007-05-10', 'interne', 2),
    ('Aminata', 'Fall', '2008-11-02', 'externe', 2),
    ('Moussa', 'Traoré', '2006-09-18', 'interne', 3),
    ('Aïcha', 'Gueye', '2007-12-05', 'externe', 3),
    ('Ousmane', 'Thiam', '2009-02-28', 'interne', 4),
    ('Kadiatou', 'Sow', '2008-06-11', 'externe', 4),
    ('Mamadou', 'Touré', '2007-01-07', 'interne', 1),
    ('Mariam', 'Diop', '2008-04-19', 'externe', 1),
    ('Boubacar', 'Ndiaye', '2006-12-03', 'interne', 2),
    ('Aïssatou', 'Kane', '2007-09-26', 'externe', 2),
    -- Ajoutez plus de lignes de données ici
    ('Ibrahim', 'Sow', '2009-10-09', 'interne', 3),
    ('Aïssatou', 'Diouf', '2008-02-14', 'externe', 3),
    ('Mamadou', 'Sylla', '2007-07-30', 'interne', 4),
    ('Fatou', 'Diallo', '2008-12-16', 'externe', 4),
    ('Mamadou', 'Bah', '2006-05-22', 'interne', 1),
    ('Aïssatou', 'Sane', '2007-08-13', 'externe', 1),
    ('Boubacar', 'Diallo', '2006-11-27', 'interne', 2),
    ('Aminata', 'Sylla', '2007-10-04', 'externe', 2);

INSERT INTO Eleve (prenom_eleve, nom_eleve, date_de_naissance, profil, id_classe)
VALUES
    ('Moussa', 'Sow', '2009-03-27', 'interne', 3),
    ('Mariama', 'Camara', '2008-06-02', 'externe', 3),
    ('Mamadou', 'Diallo', '2007-09-19', 'interne', 5),
    ('Aïssatou', 'Sylla', '2008-12-14', 'externe', 9),
    ('Abdoulaye', 'Bah', '2006-07-10', 'interne', 10),
    ('Fatou', 'Diallo', '2007-04-25', 'externe', 11);
-- Vous pouvez ajouter plus de lignes de données selon vos besoins

SELECT * FROM Eleve;


-- Les données insérées déclencheront le trigger pour générer les numéros d'élève interne automatiquement

SELECT Classe.nom_classe, NiveauEnseignement.nom_niveau, AnneeScolaire.nom_annee, COUNT(Eleve.id_eleve) AS effectif_classe
FROM Classe
INNER JOIN NiveauEnseignement ON Classe.id_niveau = NiveauEnseignement.id_niveau
INNER JOIN AnneeScolaire ON Classe.annee_scolaire = AnneeScolaire.id_annee
LEFT JOIN Eleve ON Classe.id_classe = Eleve.id_classe
GROUP BY Classe.nom_classe, NiveauEnseignement.nom_niveau, AnneeScolaire.nom_annee;


SELECT Classe.nom_classe, NiveauEnseignement.nom_niveau, AnneeScolaire.nom_annee, COUNT(Eleve.id_eleve) AS effectif_classe, AnneeScolaire.statut
FROM Classe
INNER JOIN NiveauEnseignement ON Classe.id_niveau = NiveauEnseignement.id_niveau
INNER JOIN AnneeScolaire ON Classe.annee_scolaire = AnneeScolaire.id_annee
INNER JOIN Cycle ON NiveauEnseignement.id_cycle = Cycle.id_cycle
LEFT JOIN Eleve ON Classe.id_classe = Eleve.id_classe
GROUP BY Classe.nom_classe, NiveauEnseignement.nom_niveau, AnneeScolaire.nom_annee, AnneeScolaire.statut;



select * from classe;