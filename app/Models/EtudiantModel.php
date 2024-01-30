<?php
namespace App\Models;
use CodeIgniter\Model;
class EtudiantModel extends Model
{
    protected $table = 'etudiants_sgrds';
    protected $allowedFields = [
        'idetu',
        'nometu',
        'prenometu',
        'adretu',
        'absetu',
        'promoetu',
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
                'idetu' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'nometu' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'prenometu' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'adretu' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'absetu' => [
                    'type' => 'VARCHAR',
                    'constraint' => '500',
                ],
                'promoetu' => [
                    'type' => 'INT',
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('idetu', true);
            $this->forge->createTable($this->table);
        }
    }
}