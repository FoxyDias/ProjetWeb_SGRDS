<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\DevoirModel;

class AjoutElevesAbsents extends BaseController
{
    public function index()
    {
        $devoirDB = new DevoirModel();
        $dernierDevoir = $devoirDB->getLastIdDS();


        echo view('communs/enTete', $data = ['titre' => 'Ajout DS']);
        echo view('DS/ajout_eleves_absent');
        echo view('communs/basDePage');
    }

}