<?php
namespace App\Controllers;
use App\Models\RattrapageModel;
use App\Models\DevoirModel;
use CodeIgniter\Controller;

class AjoutRattrapagesController extends BaseController
{
    public function index()
    {
        helper(['form']);



        echo view('communs/enTete');

        echo view('communs/basDePage');
    }
}