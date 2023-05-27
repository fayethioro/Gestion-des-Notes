<?php

use Router\Router;

require_once '../vendor/autoload.php';
define( 'VIEWS', dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR );
define( 'SCRIPTS', dirname( $_SERVER[ 'SCRIPT_NAME' ] ) . DIRECTORY_SEPARATOR );

$url = $_SERVER[ 'REQUEST_URI' ];

$router = new Router( $url );

$router->get( '/', 'App\Controllers\AnneeController@showAnnee' );
$router->get( '/delete/:id', 'App\Controllers\AnneeController@destroy' );
$router->get( '/modifier/:id', 'App\Controllers\AnneeController@modifierStatut' );

$router->get( '/niveauPrimaire', 'App\Controllers\NiveauController@show' );
$router->get( '/niveauMoyen', 'App\Controllers\NiveauController@showM' );
$router->get( '/niveauSecondaire', 'App\Controllers\NiveauController@showS' );
$router->get( '/classe', 'App\Controllers\ClasseController@showClass' );

$router->post( '/annee', 'App\Controllers\AnneeController@showAnnee' );
$router->get( '/login', 'App\Controllers\UserController@login' );
$router->post( '/login', 'App\Controllers\UserController@loginPost' );

$router->run();
