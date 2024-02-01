<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('connexion', 'ConnexionController::index');

$routes->get('mdpoublie', 'MdpOublieController::index');

$routes->get('mdpoublie', 'ForgotMdpController::index');
$routes->post('mdpoublie', 'ForgotMdpController::envoieLienReset');

$routes->get('resetmdp/(:any)', 'ResetMdpController::index/$1');
$routes->post('resetmdp/(:any)', 'ResetMdpController::resetMdp/$1');

$routes->get('listerattrapages', 'ListeRattrapagesController::index');

$routes->get('ajoutds', 'AjoutDsControleur::index');

$routes->get('afficherRessourcesParSemestre/(:any)', 'AjoutDsControleur::afficherRessourcesParSemestre/$1');

$routes->get('formAjouterDs', 'AjoutDsControleur::formAjouterDs');
$routes->match(['get', 'post'], 'formAjouterDs', 'AjoutDsControleur::formAjouterDs');

$routes->post('confirmerInfosDs', 'AjoutDsControleur::confirmerInfosDs');
