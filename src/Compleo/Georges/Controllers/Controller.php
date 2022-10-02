<?php

namespace  Compleo\Georges\Controllers;

use  Compleo\Georges\Models\View;


class Controller
{
    public static $dirName = "";

    public static function setDirName(string $dirName)
    {
        self::$dirName = $dirName;
    }

    public static function createView(string $viewName, array $arg = [])
    {
        View::renderTemplate(self::$dirName . "/$viewName.php.twig", $arg);
    }
}
