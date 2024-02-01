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
        $data = $modele_enseignant->getByEmail( $email );

        var_dump($email);
        var_dump($password);

        if($data){
            $pass = $data['mdpens'];
            var_dump($pass);
            if(password_verify($password, $pass)){
                var_dump($data);
                if($data['estadmin'] == FALSE)
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
                $session->setFlashdata('errorMDP', 'Mot de Passe invalide.');
                return redirect()->to('./connexion');
            }
        }else{
            $session->setFlashdata('errorEmail', "Email invalide");
            return redirect()->to('./connexion');
        }
    }

    public function deconnexion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('./listerattrapages');
    }
}