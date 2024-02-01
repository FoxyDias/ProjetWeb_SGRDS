<?php
namespace App\Controllers;
use App\Models\EnseignantModel;
use App\Models\EtudiantModel;
use App\Models\EtuDSModel;
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
                'idDS' => $ds['iddevoir'] ?? null,
                'typeDS' => $ds['typedevoir'] ?? null,
                'dureeDS' => $ds['dureedevoir'] ?? null,
                'dateDS' => $ds['datedevoir'] ?? null,
                'nomEns' => $ens['nomens']  ?? null,
                'prenomEns' => $ens['prenomens'] ?? null,
                'nomRes' => $res['nomres'] ?? null,
                'semRes' => $res['semres'] ?? null,
                'etatRat' => $rat['etatrat']    ?? null,
                'dateRat' => $rat['daterat']   ?? null,
                'salleRat' => $rat['sallerat'] ?? null,
                'typeRat' => $rat['typerat']     ?? null,
                'dureeRat' => $rat['dureerat'] ?? null,
                'commentaireRat' => $rat['commrat'] ?? null,
            ];
        }

        echo view('communs/enTete', $data = ['titre' => 'Liste Rattrapages']);
        echo view('rattrapages/listeRattrapages', ['lstDS' => $lstDS]);
        echo view('communs/basDePage');
    }

    public function supprimerDs($idDS)
    {
        $modele_Rattrapage = new RattrapageModel();
        $modele_EtuDs = new EtuDSModel();
        $modele_DS = new DevoirModel();

        $idRat = $modele_Rattrapage->getByIdDs($idDS)['idrat'] ?? null;
        $lst = $modele_EtuDs->getByIdDs($idDS);

        if ( $idRat != null)
            $modele_Rattrapage->delete($idRat);

        foreach ( $lst as $etu)
        {
            if ( $etu['idetuds'] != null)
                $modele_EtuDs->delete($etu['idetuds']);
        }

        $modele_DS->delete($idDS);

        return redirect()->to(site_url('listerattrapages'));
    }
}