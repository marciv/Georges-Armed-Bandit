<?php

use Compleo\Georges\Models\Test;
use Compleo\Georges\Models\Goal;



require __DIR__ . '/vendor/autoload.php';

$BanditTest = new Test();
$BanditGoal = new Goal();

// $BanditTest->Get(2);

var_dump($BanditTest->getList());



// $BanditTest->description = "alooooooooooooooooooo";
// $BanditTest->Save();
// var_dump($BanditTest->description);
