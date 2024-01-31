<?php
namespace App\Controllers;
use App\Models\EnseignantModel;
use CodeIgniter\Controller;

class ConnexionController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('communs/enTete', $data = ['titre' => 'Connexion']);
        echo view('connexion/pageConnexion');
        echo view('communs/basDePage');
    }
    public function connexionAuthentification()
    {
        $session = session();
        $modele_enseignant = new EnseignantModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $modele_enseignant->getByEmail('email', $email);
        if($data){
            $pass = $data['password'];
            if(crypt($pass, gen_salt('bf')) == $password){

                if($data['estAdmin'] == FALSE)
                {
                    $ses_data = [
                        'idutilisateur' => $data['idens'],
                        'nomUtilisateur' => $data['nomens'],
                        'prenomUtilisateur' => $data['prenomens'],
                        'emailUtilisateur' => $data['adrens'],
                        'estProf' => TRUE,
                        'estAdmin' => FALSE,
                    ];
                }else{
                    $ses_data = [
                        'idutilisateur' => $data['idens'],
                        'nomUtilisateur' => $data['nomens'],
                        'prenomUtilisateur' => $data['prenomens'],
                        'emailUtilisateur' => $data['adrens'],
                        'estProf' => TRUE,
                        'estAdmin' => TRUE,
                    ];
                }

                $session->set($ses_data);
                return redirect()->to('./listerattrapages');
            }else{
                $session->setFlashdata('msg', 'Password incorrect.');
                return redirect()->to('./connexion');
            }
        }else{
            $session->setFlashdata('msg', 'Email exite pas.');
            return redirect()->to('./connexion');
        }
    }
}