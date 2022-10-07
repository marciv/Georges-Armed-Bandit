<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;


class Home extends Controller
{
    public function home()
    {
        $_param['name'] = 'Marc';
        self::setDirName("Home");
        self::view('index', $_param);
    }
}
