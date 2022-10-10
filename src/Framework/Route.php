<?php

namespace Georges\Framework;

use Georges\Framework\Exceptions\ActionNotFoundException;
use Georges\Framework\Exceptions\ControllerNotFoundException;

class Route
{
    private $_path;
    private $_controller;
    private $_action;
    private $_method;
    private $_param;


    public function __construct($route = null)
    {
        $this->_path = $route->path;
        $this->_controller = $route->controller;
        $this->_action = $route->action;
        $this->_method = $route->method;
        $this->_param = $route->param ?? [];
    }

    public function getPath()
    {
        return $this->_path;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getParam()
    {
        return $this->_param;
    }

    public function run($httpRequest)
    {
        $controller = null;
        $controllerName = 'Georges\\Controllers\\' . $this->_controller;
        if (class_exists($controllerName)) {
            $controller = new $controllerName($httpRequest);
            if (method_exists($controller, $this->_action)) {
                $controller->{$this->_action}(array_merge($httpRequest->getParams(),$this->getParam()));
            } else {
                throw new ActionNotFoundException();
            }
        } else {
            throw new ControllerNotFoundException();
        }
    }
}





// namespace Georges\Framework;

// use Illuminate\Http\Request;

// // $uri = $request->path();
// // var_dump("URI : " . $uri);

// // $ipAddress = $request->ip();
// // var_dump($ipAddress);

// // $input = $request->all();
// // var_dump($input);

// class Route
// {
//     public static $validRoutes;

//     public static function set($route, $function)
//     {
//         self::$validRoutes[] = [$route, $function];
//     }

//     private static function getRequest()
//     {
//         return Request::capture();
//     }

//     public static function getAllRoutes()
//     {
//         return  self::$validRoutes;
//     }

//     public static function run()
//     {
//         $request = self::getRequest();
//         foreach (self::$validRoutes as $key => [$route, $function]) {
//             if ($request->path() == $route) {
//                 $function->__invoke($request);
//                 break;
//             }
//         }
//         return;
//     }
// }
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