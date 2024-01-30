<?php
namespace App\Models;
use CodeIgniter\Model;

class RessourceModel extends Model
{
    protected $table = 'ressources_sgrds';
    protected $allowedFields = [
         'idres',
       'nomres',
       'semres',
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
                'idres' => [
                    'type' => 'INT',
                    'constraint' => '10',
                ],
                'nomres' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'semres' => [
                    'type' => 'INT',
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('idres', true);
            $this->forge->createTable($this->table);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    public function getRessourcesBySem($semres)
    {
        return $this->select('nomres')->where('semres', $semres)->findAll();
    }
}