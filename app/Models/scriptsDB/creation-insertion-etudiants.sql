/* Script creation-insertion-etudiants.sql */

-- creation de la table des etudiants

CREATE TABLE etudiants_sgrds (
    idEtu serial primary key,
    nomEtu varchar(50) NOT NULL,
    prenomEtu varchar(50) NOT NULL,
    adrEtu varchar(255) NOT NULL,
    absEtu text

);

-- insertion des etudiants

INSERT INTO etudiants_sgrds (nomEtu, prenomEtu, adrEtu, absEtu) VALUES
-- etudiants BUT 1
('HERAMBERT', 'Ted','ted.herambert@etu.univ-lehavre.fr', 'justifie'),
('NOTERIS', 'Arthur', 'arthur.noteris@etu.univ-lehavre.fr', 'justifie'),
('RAVENEL','Martin','martin.ravenel@etu.univ-lehavre.fr','non-justifie'),
('VIEZ','Remi', 'remi.viez@etu.univ-lehavre.fr','non-justifie'),
-- etudiant BUT 2
('CHAMPVILLARD','Sebastien','sebastien.champvillard@etu.univ-lehavre.fr','justifie'),
('GALMANT','Maxime','maxime.galmant@etu.univ-lehavre.fr','justifie'),
('DUNET','Tom','tom.dunet@etu.univ-lehavre.fr','non-justifie'),
('LECOMTE','Arthur','arthur.lecompte@etu.univ-lehavre.fr','non-justifie'),
-- etudiant BUT 3
('ROCHA','Anthony','anthony.rocha@etu.univ-lehavre.fr','justifie'),
('CLACCIN','Noemie','noemie.claccin@etu.univ-lehavre.fr','justifie'),
('LECLEACH','Louis','louis.le-cleach@etu.univ-lehavre.fr','non-justifie'),
('LEMAGNEN','Bryan', 'bryan.lemagnen@etu.univ-lehavre.fr','non-justifie');









