<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;
use Georges\Models\Test as ModelsTest;

class Test extends Controller
{
    public function home($params)
    {
        // $params['name'] = "test5";
        $ModelsTest = new ModelsTest();
        // $sqlParameters =   ['name' => $this->tableIndex, 'agrega' => '=', 'value' => $id];
        // $jointure =   ['table' => $this->tableIndex, 'agrega' => '=', 'value' => $id];
        $jointure['table'], $jointure['firstColumn'], $jointure['agrega'], $jointure['secondColumn']
        $testList = $ModelsTest->getList(null, null, $jointure, "");
        $params['testList'] = $testList;

        self::setDirName("Test");
        self::view('index', $params);
    }
}
