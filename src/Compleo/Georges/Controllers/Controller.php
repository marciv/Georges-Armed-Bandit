<?php

namespace  Compleo\Georges\Controllers;

use  Compleo\Georges\Models\View;


class Controller
{

    public static function createView($viewName)
    {
        View::renderTemplate("$viewName/$viewName.php", []);
    }
}
