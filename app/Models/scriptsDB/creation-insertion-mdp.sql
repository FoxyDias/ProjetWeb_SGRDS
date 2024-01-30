/* Script creation-insertion-mdp.sql */

-- creation de la table des mots de passe

CREATE TABLE mdp_sgrds (
    idMdp serial primary key,
    reset_token varchar(255),
    expiration_token timestamp ,
    idEns INTEGER REFERENCES enseignants_sgrds(idEns) NOT NULL

);

-- insertion des mots de passe

-- Directeur des études
INSERT INTO mdp_sgrds (reset_token, expiration_token, idEns) VALUES
    (null, null, 1);

-- Enseignants

-- Enseignant 1
INSERT INTO mdp_sgrds (reset_token, expiration_token, idEns) VALUES
    (null, null, 2);

-- Enseignant 2
INSERT INTO mdp_sgrds (reset_token, expiration_token, idEns) VALUES
    (null, null, 3);

-- Enseignant 3
INSERT INTO mdp_sgrds (reset_token, expiration_token, idEns) VALUES
    (null, null, 4);

