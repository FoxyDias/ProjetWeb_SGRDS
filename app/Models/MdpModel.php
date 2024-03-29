<?php
namespace App\Models;
use CodeIgniter\Model;
class MdpModel extends Model
{
    protected $table = 'mdp_sgrds';
    protected $primaryKey = 'idmdp';
    protected $allowedFields =
        [
        'idmdp',
        'reset_token',
        'expiration_token',
        'idens',
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
                'idmdp' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'reset_token' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'expiration_token' => [
                    'type' => 'DATETIME',
                ],
                'idens' => [
                    'type' => 'INT',
                ],
                ];
            $this->forge->addField($fields);
            $this->forge->addKey('idmdp', true);
            $this->forge->addForeignKey('idens','enseignants_sgrds','idens');
            $this->forge->createTable($this->table);

        }
        // charger les données
        $this->db = \Config\Database::connect();
    }

    public function getById($idens)
    {
        return $this->where('idens', $idens)->first();
    }

    public function getIdByIdens($idens)
    {
        $mdp = $this->where('idens', $idens)->first();
        return $mdp['idmdp'];
    }

    public function getByToken($token)
    {
        return $this->where('reset_token', $token)->first();
    }


}