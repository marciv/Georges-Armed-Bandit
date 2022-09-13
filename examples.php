<?php

// include('./src/class.georges.php');
// include('./src/class.database.php');
// include('./src/models/class.model.php');
// include('./src/models/class.test.php');
// include('./src/config.php');

require __DIR__ . '/vendor/autoload.php';

// use compleo\Georges\Config;
// use compleo\Models\Models;
use Compleo\Models\Test;

$BanditTest = (new Test());
// $BanditTest->getTest(1);
// var_dump($BanditTest);
// $BanditTest->save();
$BanditTest->get(1);
$BanditTest->get(12);
// $BanditTest = (new Test())->Get(1);
// $BanditTest = (new Test())->Get(12);
unset($BanditTest->schema);
var_dump($BanditTest);
$BanditTest->description = 'nouveau';
var_dump($BanditTest);
// $BanditTest->save();
// $test->Get(1);
// var_dump($test);

?>