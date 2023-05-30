<?php
session_start();
use Router\Router;

require_once '../vendor/autoload.php';
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$url = $_SERVER['REQUEST_URI'];

$router = new Router($url);

$router->get('/annee', 'App\Controllers\AnneeController@showAnnee');
$router->post('/annee', 'App\Controllers\AnneeController@showAnnee');
$router->get('/annee/delete/:id', 'App\Controllers\AnneeController@destroy');
$router->get('/annee/edit/:id', 'App\Controllers\AnneeController@edit');
$router->post('/annee/edit/:id', 'App\Controllers\AnneeController@update');
$router->get('/annee/modifier/:id', 'App\Controllers\AnneeController@modifierStatut');


$router->get('/niveau', 'App\Controllers\NiveauController@showNiveau');
$router->post('/niveau', 'App\Controllers\NiveauController@showNiveau');
$router->get('/niveau/delete/:id', 'App\Controllers\NiveauController@destroyNiveau');

$router->get('/niveau/classe/:id', 'App\Controllers\ClasseController@allClasse');

// Ajouter une nouvelle route pour l'ajout de classe
$router->get('/niveau/classe/ajouter', 'App\Controllers\ClasseController@ajouterClasse');
$router->post('/niveau/classe/ajouter', 'App\Controllers\ClasseController@ajouterClasse');


$router->get('/niveau/classe/delete/:id', 'App\Controllers\ClasseController@destroyClasse');


$router->get('/', 'App\Controllers\UserController@login');
$router->post('/', 'App\Controllers\UserController@loginPost');

$router->run();
// echo $_SERVER['REQUEST_URI'];