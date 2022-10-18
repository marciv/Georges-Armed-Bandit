<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;


class ExampleLogin extends Controller
{
    public function login($params)
    {
        self::setDirName("Login");
        return self::view('exampleLogin', $params);
    }
}
