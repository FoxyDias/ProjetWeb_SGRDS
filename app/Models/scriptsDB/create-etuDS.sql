/* Script creation-etuDS.sql */

-- creation de la table d'association des étudiants et des devoirs

CREATE TABLE etuDS_sgrds (
    idEtuDS serial primary key,
    idEtu INTEGER REFERENCES etudiants_sgrds(idEtu) NOT NULL,
    idDevoir INTEGER REFERENCES devoirs_sgrds(idDevoir) NOT NULL
);

