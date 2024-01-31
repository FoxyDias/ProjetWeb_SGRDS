<?php
namespace App\Controllers;
use App\Models\EnseignantModel;
use App\Models\MdpModel;
use CodeIgniter\Controller;

class MdpOublieController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('communs/enTete', $data = ['titre' => 'Mot de passe oublié']);
        echo view('connexion/pageMdpOublie');
        echo view('communs/basDePage');
    }
    public function envoieLienReset()
    {
        $session = session();

        $email = $this->request->getVar('email');
        $modele_enseignant = new EnseignantModel();
        $idens = $modele_enseignant->getIdByEmail( $email );

        if ($idens) {

            $modele_mdp = new MdpModel();

            // Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
            $token = bin2hex(random_bytes(16));
            $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $mdp_utilisateur = $modele_mdp->getById( $idens );
            var_dump($mdp_utilisateur);
            $modele_mdp->set('reset_token', $token)
                ->set('expiration_token', $expiration)
                ->update($modele_mdp->getIdByIdens($mdp_utilisateur['idens'] ));

            // Envoyer l'e-mail avec le lien de réinitialisation
            $resetLink = site_url("./resetmdp/$token");
            $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe: $resetLink";

            // Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
            $emailService = \Config\Services::email();

            //paramètres du mail
            $from = 'foliotheway@gmail.com';

            //envoi du mail
            $emailService->setTo($email);
            $emailService->setFrom($from);
            $emailService->setSubject('Réinitialisation de mot de passe');
            $emailService->setMessage($message);
            if ($emailService->send()) {
                return redirect()->to('./connexion');
            } else {
                $session->setFlashdata('errorEmail', "Un problème est survenue lors de l'envoie du mail");
                return redirect()->to('./mdpoublie');
            }
        } else {
            $session->setFlashdata('errorEmail', "Email invalide");
            return redirect()->to('./mdpoublie');
        }
    }
}