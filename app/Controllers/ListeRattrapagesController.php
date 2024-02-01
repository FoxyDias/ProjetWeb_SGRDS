<?php
namespace App\Controllers;
use App\Models\RattrapageModel;
use App\Models\DevoirModel;
use CodeIgniter\Controller;

class ListeRattrapagesController extends BaseController
{
    public function index()
    {
        helper(['form']);

        $modele_Rattrapage = new RattrapageModel();
        $modele_DS = new DevoirModel();

        $allDS = $modele_DS -> findAll();
        $allRattrapages = $modele_Rattrapage -> findAll();


        $lstDS = [];

        foreach ( $allDS as $ds )
        {

            foreach ( $allRattrapages as $rattrapage )
            {
                if ( $rattrapage['iddevoir'] == $ds['iddevoir'] )
                {
                    $rat = $rattrapage;
                    break;
                }
            }

            $nomEns = $modele_DS->getNomEnseignant( $ds['iddevoir'] );
            $prenomEns = $modele_DS->getPrenomEnseignant( $ds['iddevoir'] );
            $nomRes = $modele_DS->getNomRessource( $ds['idres'] );
            $semRes = $modele_DS->getSemRessource( $ds['idres'] );

            $lstDS[] = [
                'idDS' => $ds['iddevoir'],
                'typeDS' => $ds['typedevoir'],
                'dureeDS' => $ds['dureedevoir'],
                'dateDS' => $ds['datedevoir'],
                'nomEns' => $nomEns,
                'prenomEns' => $prenomEns,
                'nomRes' => $nomRes,
                'semRes' => $semRes,
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