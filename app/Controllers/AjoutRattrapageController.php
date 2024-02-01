<?php
namespace App\Controllers;
use App\Models\RattrapageModel;
use App\Models\DevoirModel;
use CodeIgniter\Controller;

class AjoutRattrapageController extends BaseController
{



    public function index($iddevoir)
    {
        helper(['form']);

        echo view('communs/enTete', $data = ['titre' => 'Création rattrapage'] );
        echo view('rattrapages/ajoutRattrapage', ['iddevoir' => $iddevoir ]);
        echo view('communs/basDePage');

    }


    public function traitement($iddevoir)
    {

        $request = \Config\Services::request();

        $nonRattrapage = $this->request->getPost('nonRattrapage');

        if(!$nonRattrapage)
        {
            //cas ou c'est un rattrapage

            $date = $request->getPost('date');
            $heure = $request->getPost('time');

            $date = $date . " " . $heure;

            $salle = $request->getPost('salle');
            $type = $request->getPost('type');
            $comm = $request->getPost('commentaire');
            $duree = $request->getPost('duree');

            $modele_rattrapage = new RattrapageModel();

            $user = $modele_rattrapage->where('iddevoir', $iddevoir)->first();

            $modele_rattrapage->set('etatrat', "Programmé")
            ->set('daterat', $date)
            ->set('sallerat', $salle)
            ->set('typerat', $type)
            ->set('commrat', $comm)
            ->set('sallerat', $salle)
            ->set('dureerat', $duree)
            ->set('iddevoir', $iddevoir)
            ->update($modele_rattrapage->getIdByIdDevoir($user['iddevoir']));

            return redirect()->to('./listerattrapages');
        }
        else
        {
            //cas ou c'est un non rattrapage);

            $modele_rattrapage = new RattrapageModel();

            $user = $modele_rattrapage->where('iddevoir', $iddevoir)->first();

            $modele_rattrapage->set('etatrat', "Neutralisé")
            ->set('daterat', null)
            ->set('sallerat', null)
            ->set('typerat', null)
            ->set('commrat', null)
            ->set('sallerat', null)
            ->set('dureerat', null)
            ->set('iddevoir', $iddevoir)
            ->update($modele_rattrapage->getIdByIdDevoir($user['iddevoir']));

            return redirect()->to('./listerattrapages');
        }
    }
}