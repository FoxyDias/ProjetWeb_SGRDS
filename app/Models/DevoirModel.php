<?php

namespace App\Models;

use CodeIgniter\Model;

class DevoirModel extends Model
{
    protected $table = 'devoirs_sgrds';
    protected $allowedFields = [
        'iddevoir',
        'typedevoir',
        'dureedevoir',
        'datedevoir',
        'idens',
        'idres',
    ];

    // constructeur
    public function __construct()
    {
        // super()
        parent::__construct();
        // création de la table si elle n'existe pas déjà
        $this->forge = \Config\Database::forge();
        $this->db = \Config\Database::connect();
        if (!$this->db->tableExists($this->table))
        {
            $fields = [
                'iddevoir' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'typedevoir' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'dureedevoir' => [
                    'type' => 'VARCHAR',
                    'constraint' => '8',
                ],
                'datedevoir' => [
                    'type' => 'DATE',
                ],
                'idens' => [
                    'type' => 'INT',
                ],
                'idres' => [
                    'type' => 'INT',
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('iddevoir', true);
            $this->forge->addForeignKey('idens','enseignants_sgrds','idens');
            $this->forge->addForeignKey('idres','ressources_sgrds','idres');
            $this->forge->createTable($this->table);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    public function getAllIdDS()
    {
        $query = $this->db->query("SELECT iddevoir FROM devoirs_sgrds");
        $row = $query->getResultArray();
        return $row;
    }

    public function getNomEnseignant($idens)
    {
        $query = $this->db->query("SELECT nomens FROM enseignants_sgrds WHERE idens = $idens");
        $row = $query->getRow();
        return $row->nomens;
    }

    public function getPrenomEnseignant($idens)
    {
        $query = $this->db->query("SELECT prenomens FROM enseignants_sgrds WHERE idens = $idens");
        $row = $query->getRow();
        return $row->prenomens;
    }

    public function getNomRessource($idres)
    {
        $query = $this->db->query("SELECT nomres FROM ressources_sgrds WHERE idres = '$idres'");
        $row = $query->getRow();
        return $row->nomres;
    }

    public function getSemRessource($idres)
    {
        $query = $this->db->query("SELECT semres FROM ressources_sgrds WHERE idres = '$idres'");
        $row = $query->getRow();
        return $row->semres;
    }

    public function getLastIdDS()
    {
        $query = $this->db->query("SELECT iddevoir FROM devoirs_sgrds ORDER BY iddevoir DESC LIMIT 1");
        $row = $query->getRow();
        return $row->iddevoir;
    }

    public function getInfoDevoir($iddevoir) : array
    {
        return $this->where('iddevoir', $iddevoir)->first();
    }

    public function getDevoirById($iddevoir)
    {
        $query = $this->db->query("SELECT * FROM devoirs_sgrds WHERE iddevoir = $iddevoir");
        $row = $query->getRow();
        return $row;
    }

    public function getIdDevoir($typedevoir, $dureedevoir, $datedevoir, $idens, $idres)
    {
        return $this->select('iddevoir')->where('typedevoir', $typedevoir)->where('dureedevoir', $dureedevoir)->where('datedevoir', $datedevoir)->where('idens', $idens)->where('idres', $idres)->first();

    }

}