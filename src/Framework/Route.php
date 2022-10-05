<?php

namespace Georges\Framework;

	class Route
	{
		private $path;
		private $controller;
		private $action;
		private $method;
		private $param;
		
		public function __construct($route)
		{
			$this->path = $route->path;
			$this->controller = $route->controller;
			$this->action = $route->action;
			$this->method = $route->method;
			$this->param = $route->param;
		}
		
		public function getPath()
		{
			return $this->path;
		}
		
		public function getController()
		{
			return $this->controller;
		}
		
		public function getAction()
		{
			return $this->action;
		}
		
		public function getMethod()
		{
			return $this->method;
		}
		
		public function getParam()
		{
			return $this->param;
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