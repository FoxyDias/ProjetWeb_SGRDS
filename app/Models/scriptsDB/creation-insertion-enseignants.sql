/* Script creation-insertion-enseignants.sql */

-- creation de la table des enseignants

CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE enseignants_sgrds (
    idEns serial primary key,
    nomEns varchar(50) NOT NULL,
    prenomEns varchar(100) NOT NULL,
    adrEns varchar(255) NOT NULL,
    mdpEns varchar(255) NOT NULL
);

-- insertion des enseignants

-- Directeur des études
INSERT INTO enseignants_sgrds (nomEns, prenomEns, adrEns, mdpEns) VALUES
('RODOLPHE', 'Charrier', 'charrier.rodolphe@univ-lehavre.fr', crypt('test1', gen_salt('bf'))),
-- Enseignants
('BOUKACHOUR','Hadhoum','hadhoum.boukachour@univ-lehavre.fr', crypt('test2', gen_salt('bf'))),
('NIVET','Laurence','laurence.nivet@univ-lehavre.fr', crypt('test3', gen_salt('bf'))),
('LAFFEACH','Quentin','quentin.laffeach@univ-lehavre.fr', crypt('test4', gen_salt('bf')));