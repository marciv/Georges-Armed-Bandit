<?php

use Compleo\Georges\Models\Test;
use Compleo\Georges\Models\Goal;



require __DIR__ . '/vendor/autoload.php';

$BanditTest = new Test();
$BanditGoal = new Goal();

var_dump($BanditTest->delete(5));






// $BanditTest->description = "alooooooooooooooooooo";
// $BanditTest->Save();
// var_dump($BanditTest->description);
