<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;


class ExampleHome extends Controller
{
    public function home($params)
    {
        var_dump($params);
        $params['name'] = 'Marc';
        $params['age'] = '12 ans';
        $params['civ'] = 'Mr';
        self::setDirName("Home");
        self::view('index', $params);
    }
}
