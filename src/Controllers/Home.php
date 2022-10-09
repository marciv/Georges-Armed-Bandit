<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;


class Home extends Controller
{
    public function home($input)
    {

        $_param['name'] = 'Marc';
        $_param['age'] = '12 ans';
        $_param['civ'] = 'M';
        self::setDirName("Home");
        self::view('index', $_param);
    }
}
