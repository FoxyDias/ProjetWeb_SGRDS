/* Script creation-insertion-ressources.sql */

-- creation de la table des ressources

CREATE TABLE ressources_sgrds (
    idRes  varchar(10) primary key,
    nomRes varchar(100) NOT NULL,
    semRes int NOT NULL
);

-- insertion des ressources

-- Semestre 1
INSERT INTO ressources_sgrds (idRes, nomRes, semRes) VALUES
    ('R1.01', 'Initiation au developpement', 1),
    ('R1.02', 'Developpement interfaces Web', 1),
    ('R1.03', 'Introduction Architecture', 1),
    ('R1.04', 'Introduction Système', 1),
    ('R1.05', 'Introduction Base de donnees', 1),
    ('R1.06', 'Mathematiques discrètes', 1),
    ('R1.07', 'Outils mathematiques fondamentaux', 1),
    ('R1.08', 'Gestion de projet et des organisations', 1),
    ('R1.09', 'Economie durable et numerique', 1),
    ('R1.10', 'Anglais Technique', 1),
    ('R1.11', 'Bases de la communication', 1),
    ('R1.12', 'Projet Professionnel et Personnel', 1),
    ('P1.01', 'Portfolio', 1);

-- Semestre 2
INSERT INTO ressources_sgrds (idRes, nomRes, semRes) VALUES
     ('R2.01', 'Developpement oriente objets', 2),
     ('R2.02', 'Developpement d’applications avec IHM', 2),
     ('R2.03', 'Qualite de developpement', 2),
     ('R2.04', 'Communication et fonctionnement bas niveau', 2),
     ('R2.05', 'Introduction aux services reseaux', 2),
     ('R2.06', 'Exploitation d''une base de donnees', 2),
     ('R2.07', 'Graphes', 2),
     ('R2.08', 'Outils numeriques pour les statistiques', 2),
     ('R2.09', 'Methodes Numeriques', 2),
     ('R2.10', 'Gestion de projet et des organisations', 2),
     ('R2.11', 'Droit', 2),
     ('R2.12', 'Anglais d’entreprise', 2),
     ('R2.13', 'Communication Technique', 2),
     ('R2.14', 'Projet Professionnel et Personnel', 2),
     ('P1.02', 'Portfolio', 2);

-- Semestre 3
INSERT INTO ressources_sgrds (idRes, nomRes, semRes) VALUES
     ('R3.01', 'Developpement WEB', 3),
     ('R3.02', 'Developpement Efficace', 3),
     ('R3.03', 'Analyse', 3),
     ('R3.04', 'Qualite de developpement 3', 3),
     ('R3.05', 'Programmation Système', 3),
     ('R3.06', 'Architecture des reseaux', 3),
     ('R3.07', 'SQL dans un langage de programmation', 3),
     ('R3.08', 'Probabilites', 3),
     ('R3.09', 'Cryptographie et securite', 3),
     ('R3.10', 'Management des systèmes d''information', 3),
     ('R3.11', 'Droits des contrats et du numerique', 3),
     ('R3.12', 'Anglais 3', 3),
     ('R3.13', 'Communication professionnelle', 3),
     ('R3.14', 'PPP 3', 3),
     ('P3.01', 'Portfolio', 3);

-- Semestre 4
INSERT INTO ressources_sgrds (idRes, nomRes, semRes) VALUES
     ('R4.01', 'Architecture logicielle', 4),
     ('R4.02', 'Qualite de developpement 4', 4),
     ('R4.03', 'Qualite et au delà du relationnel', 4),
     ('R4.04', 'Methodes d’optimisation', 4),
     ('R4.05', 'Anglais 4', 4),
     ('R4.06', 'Communication interne', 4),
     ('R4.07', 'PPP 4', 4),
     ('R4.08', 'Virtualisation', 4),
     ('R4.09', 'Management avance des Systèmes d’information', 4),
     ('R4.10', 'Complement web', 4),
     ('R4.11', 'Developpement mobile', 4),
     ('R4.12', 'Automates', 4),
     ('S4.ST', 'Stages', 4),
     ('P3.02', 'Portfolio', 4);

-- Semestre 5
INSERT INTO ressources_sgrds (idRes, nomRes, semRes) VALUES
     ('R5.01', 'Initiation au management d’une equipe de projet informatique', 5),
     ('R5.02', 'Projet Personnel et Professionnel', 5),
     ('R5.03', 'Politique de communication', 5),
     ('R5.04', 'Qualite algorithmique', 5),
     ('R5.05', 'Programmation avancee', 5),
     ('R5.06', 'Programmation multimedia', 5),
     ('R5.07', 'Automatisation de la chaîne de production', 5),
     ('R5.08', 'Qualite de developpement', 5),
     ('R5.09', 'Virtualisation avancee', 5),
     ('R5.10', 'Nouveaux paradigmes de base de donnees', 5),
     ('R5.11', 'Methodes d’optimisation pour l’aide à la decision', 5),
     ('R5.12', 'Modelisations mathematiques', 5),
     ('R5.13', 'Economie durable et numerique', 5),
     ('R5.14', 'Anglais', 5);

-- Semestre 6
INSERT INTO ressources_sgrds (idRes, nomRes, semRes) VALUES
     ('R6.01', 'Initiation à l’entrepreneuriat', 6),
     ('R6.02', 'Droit du numerique et de la propriete intellectuelle', 6),
     ('R6.03', 'Communication : organisation et diffusion de l’information', 6),
     ('R6.04', 'Projet Personnel et Professionnel', 6),
     ('R6.05', 'Developpement avance', 6),
     ('R6.06', 'Maintenance applicative', 6),
     ('S6.01', 'Stage', 6);