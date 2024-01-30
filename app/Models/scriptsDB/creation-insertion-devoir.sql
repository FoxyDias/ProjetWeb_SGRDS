/* Script creation-insertion-devoir.sql */

-- creation de la table des devoirs

CREATE TABLE devoirs_sgrds (
    idDevoir serial primary key,
    typeDevoir VARCHAR(8) NOT NULL CHECK (typeDevoir IN ('Machine', 'Papier')),
    dureeDevoir TEXT NOT NULL,
    dateDevoir date NOT NULL,
    idEns INTEGER REFERENCES enseignants_sgrds(idEns) NOT NULL,
    idRes varchar(10) REFERENCES ressources_sgrds(idRes) NOT NULL
);