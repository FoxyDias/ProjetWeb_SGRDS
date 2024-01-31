<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RessourceModel;
use App\Models\EnseignantModel;
use App\Models\DevoirModel;

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

        $enseignantsDB = new EnseignantModel();
        $ressourcesDB  = new RessourceModel();

        $idens       = $this->request->getVar('idEnseignant');
        $idRessource = $this->request->getVar('idRessource');
        $numSemestre = $ressourcesDB->getNumSemestreById($idRessource);

        $dataForm = [
            'idRessource'  => $idRessource,
            'numSemestre'  => $numSemestre,
            'nomRessource' => $ressourcesDB->getNomRessourceById($idRessource),
            'typedevoir'   => $this->request->getVar('type'),
            'dureedevoir'  => $this->request->getVar('duree'),
            'datedevoir'   => $this->request->getVar('date'),
            'idens' => $idens,
            'nomPrenomEnseignant' => $enseignantsDB->getNomPrenomEnseignantById($idens)
        ];

        echo view('communs/enTete', $data = ['titre' => 'Infos DS']);
        echo view('DS/confirmerInfosDs', ['dataForm' => $dataForm]);
        echo view('communs/basDePage');
    }

    public function confirmerInfosDs()
    {

        $devoirDB = new DevoirModel();

        $datas = $this->request->getPost('dataForm');

        $dataForm = json_decode($datas, true);

        $datasInsertion = [
            'typedevoir' => $dataForm['typedevoir'],
            'dureedevoir' => $dataForm['dureedevoir'],
            'datedevoir' => $dataForm['datedevoir'],
            'idens' => $dataForm['idens'],
            'idres' => $dataForm['idRessource'],
        ];

        $devoirDB->insert($datasInsertion);

    }
}