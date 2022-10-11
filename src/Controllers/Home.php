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

    public function redirectPage($params)
    {
        $params['name'] = 'Marc';
        $params['age'] = '12 ans';
        $params['civ'] = 'M';
        redirect("1root/library/Georges-armed-bandit/examples.php/redirected", "", $params);
    }

    public function redirectedHere($params)
    {
        self::setDirName("Home");
        self::view('test', $params);
    }
}
