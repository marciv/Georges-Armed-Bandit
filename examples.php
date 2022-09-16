<?php

use Compleo\Georges\Models\Test;

require __DIR__ . '/vendor/autoload.php';

$BanditTest = new Test();
// $BanditTest->Get(2);

var_dump($BanditTest->getList());


// $BanditTest->description = "alooooooooooooooooooo";
// $BanditTest->Save();
// var_dump($BanditTest->description);
