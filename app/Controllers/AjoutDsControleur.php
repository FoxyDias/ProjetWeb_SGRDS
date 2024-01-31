<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RessourceModel;
use App\Models\EnseignantModel;

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
        // recuperer les ressources par semestre
        $ressourcesDB = new RessourceModel();
        $ressources = $ressourcesDB->getRessourcesBySem($semestre);

        // recuperer les enseignants
        $enseignantsDB = new EnseignantModel();
        $enseignants = $enseignantsDB->getNomPrenomEnseignant();

        echo view('communs/enTete', $data = ['titre' => 'Ajout DS']);
        echo view('DS/ajout_Ds', ['ressources' => $ressources, 'enseignants' => $enseignants]);
        echo view('communs/basDePage');
    }

    public function formAjouterDs()
    {
        $data = [
            'idres' => $this->request->getVar('ressource'),
            'typedevoir' => $this->request->getVar('typeDevoir'),
            'dureedevoir' => $this->request->getVar('dureeDevoir'),
            'datedevoir' => $this->request->getVar('dateDevoir'),
            'idens' => $this->request->getVar('enseignant'),
        ];



    }



}