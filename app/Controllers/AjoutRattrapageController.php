<?php
namespace App\Controllers;
use App\Models\EtudiantModel;
use App\Models\EtuDSModel;
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
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $request = \Config\Services::request();

        $nonRattrapage = $this->request->getPost('nonRattrapage');

        // Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
        $emailService = \Config\Services::email();
        //paramètres du mail
        $from = 'iut-lehavre';
        $emailService->setFrom($from);

        if(!$nonRattrapage) {
            //cas ou c'est un rattrapage

            $date = $request->getPost('date');
            $heure = $request->getPost('time');

            $date = $date . " " . $heure;

            $salle = $request->getPost('salle');
            $type = $request->getPost('type');
            $comm = $request->getPost('commentaire');
            $duree = $request->getPost('duree');

            $modele_rattrapage = new RattrapageModel();

            $user = $modele_rattrapage->where('iddevoir', $iddevoir)->first();

            $modele_rattrapage->set('etatrat', "Programmé")
                ->set('daterat', $date)
                ->set('sallerat', $salle)
                ->set('typerat', $type)
                ->set('commrat', $comm)
                ->set('sallerat', $salle)
                ->set('dureerat', $duree)
                ->set('iddevoir', $iddevoir)
                ->update($modele_rattrapage->getIdByIdDevoir($user['iddevoir']));

            $timestampRat = strtotime($date);
            setlocale(LC_TIME, 'fr_FR.utf8');
            date_default_timezone_set('Europe/Paris');
            $formattedDate = strftime('le %A %d %B %Y', $timestampRat);

            $modele_ds = new DevoirModel();
            $modele_EtuDs = new EtuDSModel();
            $modele_etudiant = new EtudiantModel();

            $user = $modele_ds->where('iddevoir', $iddevoir)->first();
            $idDS = $user['iddevoir'];
            $user = $modele_EtuDs->where('iddevoir', $idDS)->findAll();

            $recipients = []; // Tableau pour stocker les adresses e-mail des destinataires

            foreach ($user as $etuDS) {
                if ($etuDS['absetu'] == "justifie") {
                    $idEtu = $etuDS['idetu'];
                    $user = $modele_etudiant->where('idetu', $idEtu)->first();
                    $email = $user['adretu'];

                    // Ajouter l'adresse e-mail au tableau des destinataires
                    $recipients[] = $email;

                    // ...
                }
            }

            // Mettre à jour le code en dehors de la boucle pour envoyer l'e-mail à tous les destinataires
            if (!empty($recipients)) {
                $message = "Votre rattrapage a été programmé pour " . $formattedDate . " en salle " . $salle . " pour une durée de " . $duree . ".\n Votre professeur à ajouté : " . $comm;

                $emailService->setSubject('Rattrapage programmé');
                $emailService->setMessage($message);

                // Ajouter toutes les adresses e-mail à la fois
                $emailService->setTo($recipients);

                // Envoyer l'e-mail
                $emailService->send();
            }
        }
        else
        {
            //cas ou c'est un non rattrapage
            $modele_rattrapage = new RattrapageModel();

            $user = $modele_rattrapage->where('iddevoir', $iddevoir)->first();

            $modele_rattrapage->set('etatrat', "Neutralisé")
            ->set('daterat', null)
            ->set('sallerat', null)
            ->set('typerat', null)
            ->set('commrat', null)
            ->set('sallerat', null)
            ->set('dureerat', null)
            ->set('iddevoir', $iddevoir)
            ->update($modele_rattrapage->getIdByIdDevoir($user['iddevoir']));

            $modele_ds = new DevoirModel();
            $modele_EtuDs = new EtuDSModel();
            $modele_etudiant = new EtudiantModel();

            $user = $modele_ds->where('iddevoir', $iddevoir)->first();
            $idDS = $user['iddevoir'];
            $user = $modele_EtuDs->where('iddevoir', $idDS)->findAll();

            $recipients = []; // Tableau pour stocker les adresses e-mail des destinataires

            foreach ($user as $etuDS) {
                if ($etuDS['absetu'] == "justifie") {
                    $idEtu = $etuDS['idetu'];
                    $user = $modele_etudiant->where('idetu', $idEtu)->first();
                    $email = $user['adretu'];

                    // Ajouter l'adresse e-mail au tableau des destinataires
                    $recipients[] = $email;

                    // ...
                }
            }

            // Mettre à jour le code en dehors de la boucle pour envoyer l'e-mail à tous les destinataires
            if (!empty($recipients)) {
                $message = "Votre rattrapage a été annulé.";

                $emailService->setSubject('Rattrapage annulé');
                $emailService->setMessage($message);

                // Ajouter toutes les adresses e-mail à la fois
                $emailService->setTo($recipients);

                // Envoyer l'e-mail
                $emailService->send();
            }
        }
        return redirect()->to('./listerattrapages');
    }
}