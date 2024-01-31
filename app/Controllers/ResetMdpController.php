<?php
namespace App\Controllers;
use App\Models\EnseignantModel;
use App\Models\MdpModel;
use CodeIgniter\Controller;
class ResetMdpController extends Controller
{
    public function index($token)
    {
        helper(['form']);
        $modele_mdp = new MdpModel();
        $user = $modele_mdp->getByToken($token);
        if ($user) {
            echo view('communs/enTete', $data = ['titre' => 'Réinitialisation du mot de passe']);
            echo view('./connexion/pageResetMdp', ['token' => $token]);
            echo view('communs/basDePage');
        } else {
            echo view('communs/enTete', $data = ['titre' => 'Réinitialisation du mot de passe']);
            echo view('./connexion/pageResetMdpError404', ['token' => $token]);
            echo view('communs/basDePage');
        }
    }
    public function resetMdp($token)
    {
        $session = session();

        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        // Valider et traiter les données du formulaire
        $modele_mdp = new MdpModel();
        $user = $modele_mdp->where('reset_token', $token)
            ->where('expiration_token>', date('Y-m-d H:i:s'))
            ->first();
        if ($user && $password === $confirmPassword) {

            // Mettre à jour le mot de passe et réinitialiser le jeton
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $modele_mdp
                ->set('reset_token', null)
                ->set('expiration_token', null)
                ->update($modele_mdp->getIdByIdens($user['idens']));

            $modele_enseignant = new EnseignantModel();

            $modele_enseignant->set('mdpens', $hashedPassword)
                ->update($user['idens']);

            $session->setFlashdata('mdpmodifie', 'Mot de passe modifié avec succès');
            return redirect()->to('./connexion');
        }
        elseif ($password !== $confirmPassword) {
            $session->setFlashdata('errorMDP', 'Les mots de passe ne correspondent pas.');
            return redirect()->to('./resetmdp/'.$token);
        }
        else {
            $session->setFlashdata('errorMDP', 'Une erreur est survenue.');
            return redirect()->to('./resetmdp/'.$token);
        }
    }
}