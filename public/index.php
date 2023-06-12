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
$router->get('/cycles', 'App\Controllers\NiveauController@getCycles');


$router->get('/niveau/classe/:id', 'App\Controllers\ClasseController@allClasse');
$router->get('/niveau/classe/delete/:id', 'App\Controllers\ClasseController@destroyClasse');
$router->get('/niveau/classe/ajouter', 'App\Controllers\ClasseController@ajouterClasse');
$router->post('/niveau/classe/ajouter', 'App\Controllers\ClasseController@ajouterClasse');
$router->get('/classes/:id', 'App\Controllers\ClasseController@getClasses');
$router->get('/classes/:id/disciplines', 'App\Controllers\ClasseController@getDisciplines');
$router->get('/classe/coef/:id', 'App\Controllers\ClasseController@getponderation');
$router->post('/classe/update', 'App\Controllers\ClasseController@updateDisciplines');
$router->post('/disciplines/delete', 'App\Controllers\ClasseController@deleteDiscipline');



$router->get('/classe/liste/:id', 'App\Controllers\EleveController@allEleve');
$router->get('/classe/liste/ajouter', 'App\Controllers\EleveController@ajouterEleve');
$router->post('/classe/liste/ajouter', 'App\Controllers\EleveController@ajouterEleve');


$router->get('/discipline/gestion', 'App\Controllers\DisciplineController@showAddGestionDisciplineForm');

$router->post('/disciplines/add', 'App\Controllers\DisciplineController@addDiscipline');
$router->get('/disciplines', 'App\Controllers\DisciplineController@getAllDisciplines');


$router->post('/disciplines/supprimer', 'App\Controllers\DisciplineController@deleteDisciplines');




$router->get('/groupes', 'App\Controllers\GroupeDisciplineController@getGroupes');
$router->post('/groupes/add', 'App\Controllers\GroupeDisciplineController@addDisciplineGroupes');

$router->get('/', 'App\Controllers\UserController@login');
$router->post('/', 'App\Controllers\UserController@loginPost');

$router->run();