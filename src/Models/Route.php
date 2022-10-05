<?php

namespace Georges\Models;

use Illuminate\Http\Request;

// $uri = $request->path();
// var_dump("URI : " . $uri);

// $ipAddress = $request->ip();
// var_dump($ipAddress);

// $input = $request->all();
// var_dump($input);

class Route
{
    public static $validRoutes;

    public static function set($route, $function)
    {
        self::$validRoutes[] = [$route, $function];
    }

    private static function getRequest()
    {
        return Request::capture();
    }

    public static function getAllRoutes()
    {
        return  self::$validRoutes;
    }

    public static function run()
    {
        $request = self::getRequest();
        foreach (self::$validRoutes as $key => [$route, $function]) {
            if ($request->path() == $route) {
                $function->__invoke($request);
                break;
            }
        }
        return;
    }
}
// $uri = "https://jerenov.net/george/admin/";
// $request->path();


// Route::set("/", function (Request $request) {
//     var_dump("URL : " . $url);
//     return $request;
// });
// Route::set("/dashboard", function () {
//     echo 'dashboard';
// });

// Route::run();
// $allRoutes = Route::getAllRoutes();