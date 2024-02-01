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

        if(isset($_POST['nonRattrapage']))
        {
            //cas ou c'est un rattrapage

            $request = \Config\Services::request();

            $date = $request->getPost('date');
            $heure = $request->getPost('time');
            var_dump($date);
            var_dump($heure);

            $salle = $request->getPost('salle');
            $type = $request->getPost('type');
            $comm = $request->getPost('commentaire');
            $duree = $request->getPost('duree');

            $modele_rattrapage = new RattrapageModel();

            $modele_rattrapage->set('etatrat', "Programmé")
            ->set('daterat', $date)
            ->set('sallerat', $salle)
            ->set('typerat', $type)
            ->set('commrat', $comm)
            ->set('sallerat', $salle)
            ->set('dureerat', $duree)
            ->set('iddevoir', $iddevoir)
            ->update($user['$iddevoir']);


            // echo view('listeRattrapages');
        }
        else
        {
            //cas ou ce n'est pas un rattrapage

        }

    }
}