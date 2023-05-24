<?php

use Router\Router;

require_once '../vendor/autoload.php';
define( 'VIEWS', dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR );
define( 'SCRIPTS', dirname( $_SERVER[ 'SCRIPT_NAME' ] ) . DIRECTORY_SEPARATOR );

$url = $_SERVER[ 'REQUEST_URI' ];

$router = new Router( $url );

$router->get( '/', 'App\Controllers\HomeController@index' );
$router->get( '/niveau', 'App\Controllers\NiveauController@show' );
$router->get( '/classe', 'App\Controllers\ClasseController@showClass' );
$router->get( '/annee', 'App\Controllers\AnneeController@showAnnee' );
$router->post( '/annee', 'App\Controllers\AnneeController@showAnnee' );
$router->get( '/login', 'App\Controllers\UserController@login' );
$router->post( '/login', 'App\Controllers\UserController@loginPost' );

$router->run();
