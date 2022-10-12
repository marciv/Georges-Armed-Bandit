<?php

use Georges\Framework\HttpRequest;
use Georges\Framework\Router;

require __DIR__ . '/vendor/autoload.php';

// $BanditTest = new Test();
// var_dump($BanditTest->Get(6));

$httpRequest = new HttpRequest();
$router = new Router($httpRequest);

$router::get('/', 'Home', 'home');

//Test
$router::get('/tests', 'Test', 'home');
$router::get('/tests/add', 'Test', 'add');

$router::get('/test', 'Test', 'show');




$router::get('/redirect', 'Home', 'redirectPage');
$router::get('/redirected', 'Home', 'redirectedHere');


// // Declare a custom middleware function
// // if empty return middleware chaining is stopped
// function Home1($httpRequest)
// {
//     return 'middleware1';
// }

// // implement middleware and add closure function as a middleware
// $router->use('/', 'Home1', function () {
//     return 'middleware2';
// });
// // middleware return are store in HttpRequest object, I.E for example bellow in controller $HttpRequest->middleware->home1 = true
// print_r($httpRequest->middleware['Home1']);

// // define a new route as static var in router object
// $router::get('/', 'Home', 'home', ['prenom' => "marc"]);

// exectue route by router found
$router->run();
