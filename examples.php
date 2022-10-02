<?php

use Compleo\Georges\Models\Test;

use Illuminate\Http\Request;

$request = Request::capture();

require __DIR__ . '/vendor/autoload.php';

$BanditTest = new Test();

// $BanditTest->startDate = new \DateTime();
// $BanditTest->name = "test5";
// $BanditTest->description = "new Test 5";
// $BanditTest->uriRegex = "/fen/lan/05/";





var_dump($BanditTest->Get(6));






// $BanditTest->description = "alooooooooooooooooooo";
// $BanditTest->Save();
// var_dump($BanditTest->description);
