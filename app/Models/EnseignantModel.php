<?php
namespace App\Models;
use CodeIgniter\Model;

class EnseignantModel extends Model
{
    protected $table = 'enseignants_sgrds';
    protected $allowedFields = [
        'idens',
       'nomens',
       'prenomens',
       'adrens',
       'mdpens',
       'estAdmin',
    ];
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
                'idens' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'nomens' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'prenomens' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'adrens' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'mdpens' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'estadmin' => [
                    'type' => 'BOOLEAN',
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('idens', true);
            $this->forge->createTable($this->table);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    public function getEnseignant($idens)
    {
        return $this->where('idens', $idens)->first();
    }

    public function getIdMdpByEmail($adrens)
    {
        $query = $this->db->query("SELECT idens, mdpens FROM enseignants_sgrds WHERE adrens = '$adrens'");
        return $query->getResult();
    }

    public function getMdpById($idens)
    {
        $query = $this->db->query("SELECT mdpens FROM enseignants_sgrds WHERE idens = '$idens'");
        return $query->getResult();
    }

    public function getByEmail($adrens)
    {
        return $this->where('adrens', $adrens)->first();
    }

}