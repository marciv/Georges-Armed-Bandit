<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;


class Home extends Controller
{
    public function home($params)
    {
        $params['name'] = 'Marc';
        $params['age'] = '12 ans';
        $params['civ'] = 'M';
        self::setDirName("Home");
        self::view('index', $params);
    }
}
