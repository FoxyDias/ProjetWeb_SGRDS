<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('connexion', 'ConnexionController::index');
$routes->post('connexion/traitement', 'ConnexionController::connexionAuthentification');

$routes->get('deconnexion', 'ConnexionController::deconnexion');

$routes->get('mdpoublie', 'MdpOublieController::index');
$routes->post('mdpoublie/traitement', 'MdpOublieController::envoieLienReset');

$routes->get('resetmdp/(:any)', 'ResetMdpController::index/$1');
$routes->post('resetmdp/traitement/(:any)', 'ResetMdpController::resetMdp/$1');

$routes->get('listerattrapages', 'ListeRattrapagesController::index');

$routes->get('ajoutrattrapage/(:any)', 'AjoutRattrapageController::index/$1');
$routes->post('ajoutrattrapage/(:any)/traitement', 'AjoutRattrapageController::traitement/$1');

$routes->get('ajout_etudiants_absents', 'AjoutElevesAbsents::index');

$routes->get('ajoutds', 'AjoutDsControleur::index');

$routes->get('afficherRessourcesParSemestre/(:any)', 'AjoutDsControleur::afficherRessourcesParSemestre/$1');

$routes->get('formAjouterDs', 'AjoutDsControleur::formAjouterDs');
$routes->match(['get', 'post'], 'formAjouterDs', 'AjoutDsControleur::formAjouterDs');

$routes->post('confirmerInfosDs', 'AjoutDsControleur::confirmerInfosDs');

