<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RessourceModel;
use App\Models\EnseignantModel;
use App\Models\DevoirModel;
use App\Models\RattrapageModel;

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
        $numSemestre = $semestre;

        echo view('communs/enTete', $data = ['titre' => 'Ajout DS']);
        echo view('DS/ajout_Ds', ['ressources' => $ressources, 'enseignants' => $enseignants, 'numSemestre' => $numSemestre]);
        echo view('communs/basDePage');
    }

    public function formAjouterDs()
    {

        $enseignantsDB = new EnseignantModel();
        $ressourcesDB  = new RessourceModel();

        $idens       = $this->request->getPost('idEnseignant');
        $idRessource = $this->request->getPost('idRessource');
        $numSemestre = $ressourcesDB->getNumSemestreById($idRessource);

        $dataForm = [
            'idRessource'  => $idRessource,
            'numSemestre'  => $numSemestre,
            'nomRessource' => $ressourcesDB->getNomRessourceById($idRessource),
            'typedevoir'   => $this->request->getPost('type'),
            'dureedevoir'  => $this->request->getPost('duree'),
            'datedevoir'   => $this->request->getPost('date'),
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

        // recuperer l'id du devoir
        $idDevoir = $devoirDB->getIdDevoir( $datasInsertion['typedevoir'],
                                            $datasInsertion['dureedevoir'],
                                            $datasInsertion['datedevoir'],
                                            $datasInsertion['idens'],
                                            $datasInsertion['idres']);

        $rattrapageDB = new RattrapageModel();

        $insererRattrapage = [
            'etatrat' => 'En attente',
            'daterat' => null,
            'sallerat' => null,
            'typerat' => null ,
            'commrat' => null,
            'dureerat'=> null,
            'iddevoir' => $idDevoir['iddevoir'],

        ];

        $rattrapageDB->insert($insererRattrapage);

        echo view('communs/enTete', $data = ['titre' => 'Liste élèves']);
        echo view('DS/ajout_eleves_absents', ['idDevoir' => $idDevoir['iddevoir']]);
        echo view('communs/basDePage');
    }
}