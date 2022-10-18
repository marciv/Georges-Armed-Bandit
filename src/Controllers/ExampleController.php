<?php

namespace  Georges\Controllers;

use Georges\Framework\Controller;


class ExampleController extends Controller
{
    public function exampleAction($params)
    {
        $params['example'] = "This is example";
        $example = "This is example";

        self::setDirName("Example");
        return self::view('exampleIndex', $params);
    }
}
