<?php

namespace App\Models;

use CodeIgniter\Model;

class EtuDSModel extends Model
{
    protected $table = 'devoirs_sgrds';
    protected $allowedFields = [
        'idetuds',
        'absetu',
        'iddevoir',
        'idetu',


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
                'idetuds' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'absetu' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'iddevoir' => [
                    'type' => 'INT',
                ],
                'idetu' => [
                    'type' => 'INT',
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('idetuds', true);
            $this->forge->addForeignKey('iddevoir','devoirs_sgrds','iddevoir');
            $this->forge->addForeignKey('idetu','etudiants_sgrds','idetu');
            $this->forge->createTable($this->table);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

}