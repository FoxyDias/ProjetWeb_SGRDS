<?php

namespace App\Models;

use CodeIgniter\Model;

class DevoirModel extends Model
{
    protected $table = 'devoirs_sgrds';
    protected $primaryKey = 'iddevoir';
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
                    'type' => 'timestamp',
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

    public function getLastIdDS()
    {
        $query = $this->db->query("SELECT iddevoir FROM devoirs_sgrds ORDER BY iddevoir DESC LIMIT 1");
        $row = $query->getRow();
        return $row->iddevoir;
    }

    public function getIdDevoir($typedevoir, $dureedevoir, $datedevoir, $idens, $idres)
    {
        return $this->select('iddevoir')->where('typedevoir', $typedevoir)->where('dureedevoir', $dureedevoir)->where('datedevoir', $datedevoir)->where('idens', $idens)->where('idres', $idres)->first();

    }
    public function getInfoDevoir($iddevoir) : array
    {
        return $this->where('iddevoir', $iddevoir)->first();
    }

}