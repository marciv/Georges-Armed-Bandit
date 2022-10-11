<?php

use Georges\Models\Test;
use Georges\Models\Goal;
use Georges\Framework\HttpRequest;
use Georges\Framework\Route;
use Georges\Framework\Router;
use Georges\Framework\Controller;

require __DIR__ . '/vendor/autoload.php';

// $BanditTest = new Test();
// var_dump($BanditTest->Get(6));

$httpRequest = new HttpRequest();
$router = new Router($httpRequest);

$router::get('/', 'Home', 'home');
$router::get('/tests', 'Test', 'home');



$router::get('/redirect', 'Home', 'redirectPage');
$router::get('/redirected', 'Home', 'redirectedHere');


// echo '<pre>';
// $listRoute = $router->getListRoute();
// print_r($listRoute);
// echo '</pre>';
$router->run();
