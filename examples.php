<?php

use Compleo\Georges\Models\Test;
use Compleo\Georges\Models\Visit;
use Compleo\Georges\Models\Goal;



require __DIR__ . '/vendor/autoload.php';

$BanditTest = new Test();
$BanditVisit = new Visit();
$BanditGoal = new Goal();

// $BanditTest->Get(2);

var_dump($BanditGoal->Get(1));



// $BanditTest->description = "alooooooooooooooooooo";
// $BanditTest->Save();
// var_dump($BanditTest->description);
