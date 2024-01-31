<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RessourceModel;

class AjoutDsControleur extends BaseController
{
    public function index()
    {
        echo view('communs/enTete', $data = ['titre' => 'Ajout DS']);
        echo view('DS/ajout_Ds');
        echo view('communs/basDePage');
    }

    public function afficherRessourcesParSemestre($semestre)
    {
        $ressourcesDB = new RessourceModel();

        $ressources = $ressourcesDB->getRessourcesBySem($semestre);
        echo view('communs/enTete', $data = ['titre' => 'Ajout DS']);
        echo view('DS/ajout_Ds', ['ressources' => $ressources]);
        echo view('communs/basDePage');


    }



}