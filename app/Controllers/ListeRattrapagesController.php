<?php
namespace App\Controllers;
use App\Models\RattrapageModel;
use CodeIgniter\Controller;

class ListeRattrapagesController extends BaseController
{
    public function index()
    {
        helper(['form']);

        $modele_Rattrapage = new RattrapageModel();
        $rattrapages = $modele_Rattrapage->findAll();

        echo view('communs/enTete', $data = ['titre' => 'Connexion']);
        echo view('rattrapages/listeRattrapages', ['rattrapages' => $rattrapages]);
        echo view('communs/basDePage');
    }
}