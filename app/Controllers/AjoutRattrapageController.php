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

        $date = $request->getPost('date');   //??????
        $heure = $request->getPost('time');   //??????

        var_dump($date);
        var_dump($heure);

        $duree = $request->getPost('duree');

       // $type = $request->getPost('');       //??????


        $salle = $request->getPost('salle');
        $comm = $request->getPost('commentaire');




        //$modele_rattrapage = new RattrapageModel();

/*
        $modele_rattrapage->set('idrat', $)  //??????
        ->set('etatrat', $etat)              //??????
        ->set('daterat', $date)
        ->set('sallerat', $salle)
        ->set('typerat', $type)              //??????
        ->set('commrat', $comm)
        ->set('sallerat', $salle)
        ->set('dureerat', $duree)
        ->set('iddevoir', $iddevoir)
        ->update($user['id']);              //dois update where iddevoir de DS = iddevoir de DS rattrapage  //??????
*/

       // echo view('listeRattrapages');


    }


}