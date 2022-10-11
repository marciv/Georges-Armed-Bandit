<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;
use Georges\Models\Test as ModelsTest;
use Georges\Framework\View;
use Georges\Models\Variation;

class Test extends Controller
{
    public function home($params)
    {
        $params['name'] = "test5";
        $ModelsTest = new ModelsTest();
        $testList = $ModelsTest->getList(10000, null, null, "");
        $params['testList'] = $testList;

        //Edit header/css/js
        $view = new View();
        $view::setNameHeader("Tests List");
        $view::addCss("test/style.css");
        $view::addJs("main_test.js");

        self::setDirName("Test");
        self::view('index', $params);
    }

    public function show($params)
    {
        $ModelsTest = new ModelsTest();
        $Variation = new Variation();

        $params['test'] = $ModelsTest->get($params['test_id']);

        $sqlParameters =   ['name' => "test_id", 'agrega' => '=', 'value' => $params['test_id']];
        $params['variations'] = $Variation->getList(10000, $sqlParameters);

        //Edit header/css/js
        $view = new View();
        $view::setNameHeader("Test Id " . $params['test_id']);
        $view::addCss("test/style.css");
        $view::addJs("main_test.js");

        self::setDirName("Test");
        self::view('show', $params);
    }
}
