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
}