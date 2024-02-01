<?php
namespace App\Controllers;
use App\Models\EtuDSModel;
use CodeIgniter\Controller;
use App\Models\DevoirModel;
use App\Models\RessourceModel;
use App\Models\EnseignantModel;
use App\Models\EtudiantModel;

class AjoutElevesAbsentsController extends BaseController
{
    public function index($idDevoir)
    {
        $devoirDB = new DevoirModel();

        $dernierDevoir = $idDevoir;
        $infoDevoir = $devoirDB->getInfoDevoir($dernierDevoir);

        $ressourceDB = new RessourceModel();
        $infoRessource = $ressourceDB->getInfoById($infoDevoir['idres']);

        $enseignantDB = new EnseignantModel();
        $infoEnseignant = $enseignantDB->getEnseignant($infoDevoir['idens']);

        $elevesDB = new EtudiantModel();

        switch ($infoRessource[0]['semres']) {
            case 1:
            case 2:
                $promo = 1;
                break;
            case 3:
            case 4:
                $promo = 2;
                break;
            case 5:
            case 6:
                $promo = 3;
                break;
        }
        $eleves = $elevesDB->getNomPrenomEtudiantByPromo($promo);
        $id = $elevesDB->getallId();

        echo view('communs/enTete', $data = ['titre' => 'Ajout DS']);
        echo view('DS/ajout_eleves_absents', ['lastId'=> $dernierDevoir,'infoDevoir' => $infoDevoir, 'infoRessource' => $infoRessource, 'infoEnseignant' => $infoEnseignant, 'eleves' => $eleves, 'id' => $id]);
        echo view('communs/basDePage');
    }

    public function traitement()
    {
        $request = \Config\Services::request();
        $data = json_decode($request->getPost('donnees_js'), true);

        $idDevoir = $data['devoir'];
        $listeAbsent = $data['etudiants_absents'];
        $listeAbsentJustifie = $data['etudiants_absents_justifies'];

        $etuDSDB = new EtuDSModel();

        foreach ($listeAbsentJustifie as $absentJustifie) {
            $donneesInsertion = [
                'absetu' => 'justifie',
                'iddevoir' => $idDevoir,
                'idetu' => $absentJustifie
            ];
            $etuDSDB->insert($donneesInsertion);
        }

        foreach ($listeAbsent as $absent) {
            $donneesInsertion = [
                'absetu' => 'non-justifie',
                'iddevoir' => $idDevoir,
                'idetu' => $absent
            ];
            $etuDSDB->insert($donneesInsertion);
        }

        return redirect()->to('/listerattrapages');
    }
}