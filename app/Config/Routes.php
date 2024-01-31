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
