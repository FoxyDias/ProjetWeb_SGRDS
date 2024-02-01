<?php
namespace App\Controllers;
use App\Models\EnseignantModel;
use App\Models\RattrapageModel;
use App\Models\DevoirModel;
use App\Models\RessourceModel;
use CodeIgniter\Controller;

class ListeRattrapagesController extends BaseController
{
    public function index()
    {
        helper(['form']);

        $modele_Rattrapage = new RattrapageModel();
        $modele_DS = new DevoirModel();
        $modele_enseignant = new EnseignantModel();
        $modele_ressource = new RessourceModel();

        $allDS = $modele_DS -> findAll();

        $lstDS = [];

        foreach ( $allDS as $ds )
        {
            $rat = $modele_Rattrapage->getByIdDs( $ds['iddevoir'] );
            $ens = $modele_enseignant->getByIdEns( $ds['idens'] );
            $res = $modele_ressource->getByIdRes( $ds['idres'] );

            $lstDS[] = [
                'idDS' => $ds['iddevoir'],
                'typeDS' => $ds['typedevoir'],
                'dureeDS' => $ds['dureedevoir'],
                'dateDS' => $ds['datedevoir'],
                'nomEns' => $ens['nomens'],
                'prenomEns' => $ens['prenomens'],
                'nomRes' => $res['nomres'],
                'semRes' => $res['semres'],
                'etatRat' => $rat['etatrat'],
                'dateRat' => $rat['daterat'],
                'salleRat' => $rat['sallerat'],
                'typeRat' => $rat['typerat'],
                'dureeRat' => $rat['dureerat'],
                'commentaireRat' => $rat['commrat'],
            ];
        }

        echo view('communs/enTete', $data = ['titre' => 'Liste Rattrapages']);
        echo view('rattrapages/listeRattrapages', ['lstDS' => $lstDS]);
        echo view('communs/basDePage');
    }
}