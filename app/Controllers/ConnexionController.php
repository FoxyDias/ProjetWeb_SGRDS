<?php
namespace App\Controllers;
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
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $identifiant = $this->request->getVar('identifiant');
        $password = $this->request->getVar('password');
        $data = $userModel->where('email', $identifiant)->first();
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            }else{
                $session->setFlashdata('msg', 'Password incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email exite pas.');
            return redirect()->to('/signin');
        }
    }
}