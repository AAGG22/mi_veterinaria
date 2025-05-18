<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('cargar/rel', 'Home::getCargarRel'); 
$routes->get('cargar/vet', 'Home::getCargarVet'); 
$routes->get('eliminar/rel', 'Home::getEliminarRel'); 
$routes->get('eliminar/vet', 'Home::getEliminarVet'); 

$routes->get('/ver/mascota/(:num)', 'Home::getMascota/$1');
$routes->get('/ver/amo/(:num)', 'Home::getAmo/$1');
$routes->get('/ver/vet/(:num)', 'Home::getVet/$1');

$routes->get('search/pets', 'Home::getSearchPets'); 
$routes->get('search/owners', 'Home::getSearchOwners'); 

$routes->get('/mostrar', 'Home::mostrar'); 

// Formularios
$routes->post('form/crear_rel', 'Home::crearRel');

$routes->post('form/crear_vet', 'Home::crearVet');
$routes->post('form/editar_vet/(:num)', 'Home::editVet/$1');

$routes->post('form/crear_mascota', 'Home::crearPet');
$routes->post('form/editar_mascota/(:num)', 'Home::editPet/$1');

$routes->post('form/crear_amo', 'Home::crearOwner');
$routes->post('form/editar_amo/(:num)', 'Home::editOwner/$1');

$routes->get('cargarm/eliminar/rel', 'Home::getMascotas');
$routes->post('form/baja_rel', 'Home::eliminarRel');
$routes->post('form/baja_vet', 'Home::eliminarVet');

$routes->post('form/searchpets', 'Home::searchPets');
$routes->post('form/searchowners', 'Home::searchOwners');