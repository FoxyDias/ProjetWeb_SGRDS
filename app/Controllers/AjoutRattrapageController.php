<?php
namespace App\Controllers;
use App\Models\RattrapageModel;
use App\Models\DevoirModel;
use CodeIgniter\Controller;

class AjoutRattrapageController extends BaseController
{



    public function index($iddevoir)
    {
        helper(['form']);



        echo view('communs/enTete', $data = ['titre' => 'Création rattrapage'] );
        echo view('rattrapages/ajoutRattrapage');
        echo view('communs/basDePage');
    }
}