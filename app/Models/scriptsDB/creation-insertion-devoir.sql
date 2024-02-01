/* Script creation-insertion-devoir.sql */

-- creation de la table des devoirs

CREATE TABLE devoirs_sgrds (
    idDevoir serial primary key,
    typeDevoir VARCHAR(8) NOT NULL CHECK (typeDevoir IN ('Machine', 'Papier')),
    dureeDevoir TEXT NOT NULL,
    dateDevoir timestamp NOT NULL,
    idEns INTEGER REFERENCES enseignants_sgrds(idEns) NOT NULL,
    idRes varchar(10) REFERENCES ressources_sgrds(idRes) NOT NULL
);

-- insertion des DS

INSERT INTO devoirs_sgrds (typeDevoir, dureeDevoir, dateDevoir, idEns, idRes) VALUES
('Machine', '1h30', '2024-01-01 14:30:00', 1, 'R1.01'),
('Machine', '3h00', '2023-09-09 08:00:00', 1, 'R5.02'),
('Papier', '2h00', '2024-02-05 16:00:00', 3, 'R1.01');
