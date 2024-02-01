<?php
namespace App\Models;
use CodeIgniter\Model;

class EnseignantModel extends Model
{
    protected $table = 'enseignants_sgrds';
    protected $primaryKey = 'idens';
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

    public function getNomPrenomEnseignant(): array
    {
        return $this->select('idens,prenomens, nomens')->orderBy('nomens')->findAll();
    }

    public function getNomPrenomEnseignantById($idens)
    {
        return $this->select('prenomens, nomens')->where('idens', $idens)->first();
    }

    public function getEnseignant($idens)
    {
        return $this->where('idens', $idens)->first();
    }

    public function getIdByEmail($adrens)
    {
        return $this->select('idens')->where('adrens', $adrens)->first();
    }

    public function getByEmail($adrens)
    {
        return $this->where('adrens', $adrens)->first();
    }
  
    public function getByIdens($idens)
    {
        return $this->where('idens', $idens)->first();
    }

}