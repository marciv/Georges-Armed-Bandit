<?php

require __DIR__ . '/vendor/autoload.php';
$BanditTest = (new Georges\Test())->Get(1);
$BanditTest->Get(1);

$BanditTest-> description = "new";
$BanditTest->Save();
var_dump($BanditTest);



?>