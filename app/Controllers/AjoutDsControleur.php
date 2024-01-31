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
        $dataForm = [
            'idRessource' => $this->request->getVar('idRessource'),
            'typedevoir' => $this->request->getVar('type'),
            'dureedevoir' => $this->request->getVar('duree'),
            'datedevoir' => $this->request->getVar('date'),
            'idens' => $this->request->getVar('idEnseignant'),

        ];

        print_r($dataForm);

        echo view('communs/enTete', $data = ['titre' => 'Infos DS']);
        echo view('DS/confirmerInfosDs');
        echo view('communs/basDePage');




    }



}