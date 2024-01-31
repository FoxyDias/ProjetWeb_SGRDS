<?php
namespace App\Controllers;
use App\Models\EnseignantModel;
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
        $email = $this->request->getVar('email');
        $modele_enseignant = new EnseignantModel();
        $idmdp = $modele_enseignant->getIdMdpByEmail( $email );
        $data = $modele_enseignant->getMdpById( $idmdp );

        if ($data) {
            // Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
            $token = bin2hex(random_bytes(16));
            $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $data->set('reset_token', $token)
                ->set('reset_token_expiration', $expiration)
                ->update($user['id']);

            // Envoyer l'e-mail avec le lien de réinitialisation
            $resetLink = site_url("./pageResetMdp/$token");
            $message = "Cliquez sur le lien suivant pour réinitialiser MDP: $resetLink";

            // Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
            $emailService = \Config\Services::email();

            //paramètres du mail
            $from = 'foliotheway@gmail.com';
            $to = $this->request->getPost('to');
            $subject = $this->request->getPost('subject');

            //envoi du mail
            $emailService->setTo($email);
            $emailService->setFrom($from);
            $emailService->setSubject('Réinitialisation de mot de passe');
            $emailService->setMessage($message);
            if ($emailService->send()) {
                echo 'E-mail envoyé avec succès.';
            } else {
                echo $emailService->printDebugger();
            }
        } else {
            echo 'Adresse e-mail non valide.';
        }
    }
}