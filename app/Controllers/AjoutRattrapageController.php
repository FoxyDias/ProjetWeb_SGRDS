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
        echo view('rattrapages/ajoutRattrapage');
        echo view('communs/basDePage');

    }


    public function traitement($iddevoir)
    {

        $date => $request->getPost('date');
        $duree => $request->getPost('duree');
        $type => $request->getPost('');    //????
        $salle => $request->getPost('salle');
        $comm => $request->getPost('commentaire');


        $request = \Config\Services::request();

        $modele_rattrapage = new RattrapageModel();


        $modele_rattrapage->set('idrat', $)
        ->set('etatrat', $etat) //??????
        ->set('daterat', $date)
        ->set('sallerat', $salle)
        ->set('typerat', $type) //????????
        ->set('commrat', $comm)
        ->set('sallerat', $salle)
        ->set('dureerat', $duree)
        ->set('iddevoir', $iddevoir)
        ->update($user['id']);



        echo view('listeRattrapages');



    }



}