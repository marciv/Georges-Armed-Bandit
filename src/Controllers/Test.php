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

        self::setDirName("Test");
        self::view('index', $params);
    }

    public function show($params)
    {
        // $ModelsTest = new ModelsTest();
        // $Variation = new Variation();

        // $params['test'] = $ModelsTest->get($params['test_id']);

        // $sqlParameters =   ['name' => "test_id", 'agrega' => '=', 'value' => $params['test_id']];
        // $jointure[0] = ['table' => 'goal', 'firstColumn' => 'variation.variation_id', 'agrega' => '=', 'secondColumn' => 'goal.variation_id'];
        // $jointure[1] = ['table' => 'visit_log', 'firstColumn' => 'variation.variation_id', 'agrega' => '=', 'secondColumn' => 'visit_log.variation_id'];
        // $select = "count(goal.goal_id) as goalCount, count(visit_log.visit_log_id) as visitCount, variation.*";
        // $groupBy = "variation.variation_id";

        // $params['variations'] = $Variation->getList(10000, $sqlParameters, $jointure, $select, $groupBy);

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
