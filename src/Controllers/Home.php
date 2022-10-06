<?php

namespace  Georges\Controllers;
use Georges\Framework\Controller;


class Home extends Controller
{
    function home(){
        $_param['name'] = 'Marc';
        self::setDirName(dirname(__FILE__));
        self::view('index', $_param);
    }


}
