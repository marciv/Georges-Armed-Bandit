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
$router = new Router();
$findRoute = $router->findRoute($httpRequest);
// print_r($findRoute);
$httpRequest->setRoute($findRoute);
$return = $httpRequest->run();
