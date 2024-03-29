<?php

namespace App\Models;

use CodeIgniter\Model;

class EtuDSModel extends Model
{
    protected $table = 'etuds_sgrds';
    protected $primaryKey = 'idetuds';
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

    public function getEtudiantsJustifies($idDevoir)
    {
        return $this->select('idetu')->where('iddevoir', $idDevoir)->where('absetu', 'justifie')->findAll();
    }

    public function getByIdDs($idDS)
    {
        return $this->where('iddevoir', $idDS)->findAll();
    }

}