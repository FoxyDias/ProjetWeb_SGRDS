<?php

namespace App\Models;

use CodeIgniter\Model;

class RattrapageModel extends Model
{
    protected $table = 'rattrapages_sgrds';
    protected $primaryKey = 'idrat';
    protected $allowedFields = [
        'idrat',
        'etatrat',
        'daterat',
        'sallerat',
        'typerat',
        'commrat',
        'dureerat',
        'iddevoir',
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
                'idrat' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => true
                ],
                'etatrat' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'daterat' => [
                    'type' => 'timestamp',
                ],
                'sallerat' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'typerat' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'commrat' => [
                    'type' => 'VARCHAR',
                    'constraint' => '500',
                ],
                'dureerat' => [
                    'type' => 'VARCHAR',
                    'constraint' => '8',
                ],
                'iddevoir' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ]
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('idrat', TRUE); // clé primaire
            $this->forge->addForeignKey('iddevoir','devoirs_sgrds','iddevoir');
            $this->forge->createTable($this->table, TRUE);
        }
        // charger les données
        $this->db = \Config\Database::connect();
    }

    public function getIdByIdDevoir($iddevoir)
    {
        $query = $this->db->query("SELECT idrat FROM rattrapages_sgrds WHERE iddevoir = $iddevoir");
        $row = $query->getRow();
        return $row->idrat;
    }

    public function getByIdDs($iddevoir)
    {
        return $this->where('iddevoir', $iddevoir)->first();
    }
}