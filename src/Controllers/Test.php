<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;
use Georges\Framework\View;
use Georges\Models\BanditTest;

class Test extends Controller
{
    public function home($params)
    {
        $Tests = new BanditTest();
        $testList = $Tests->searchBanditTest("/", null, "on");
        $params['banditTestList'] = $testList;


        //Edit header/css/js
        $view = new View();
        $view::setNameHeader("Tests List");
        $view::addCss("test/style.css");

        self::setDirName("Test");
        self::view('index', $params);
    }

    public function show($params)
    {
        $ModelBanditTest = new BanditTest();
        $banditTest = $ModelBanditTest->getBanditTestById($params['test_id']);
        $params['banditTest'] = $banditTest;

        // var_dump($banditTest);

        //Edit header/css/js
        $view = new View();
        $view::setNameHeader("Test Id " . $params['test_id']);
        $view::addCss("test/style_abtest.css");

        self::setDirName("Test");
        self::view('show', $params);
    }

    public function add($params)
    {
        $view = new View();
        $view::setNameHeader("Add Abtest");
        $view::addCss("test/style.css");
        $view::addJs("jquery-3.6.0.min.js");
        $view::addJs("main.js");
        self::setDirName("Test");
        self::view('add', $params);
    }
}
