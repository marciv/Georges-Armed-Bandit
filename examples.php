<?php

use Compleo\Georges\Models\Test;

require __DIR__ . '/vendor/autoload.php';

$BanditTest = new Test();
$BanditTest->Get(1);

$BanditTest->description = "new";
$BanditTest->Save();
var_dump($BanditTest);
