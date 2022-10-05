<?php

namespace Georges\Framework;
use Georges\Framework\Exceptions\MultipleRouteFoundException;
use Georges\Framework\Exceptions\NoRouteFoundException;

	class Router
	{
		private $listRoute;
		
		public function __construct()
		{
			$stringRoute = file_get_contents(__DIR__.'/../Config/route.json');
			$this->listRoute = json_decode($stringRoute);
		}

        public static function addRoute($route){
            self::$listRoute = $route;
        }
		
		public function findRoute($httpRequest)
		{
			$routeFound = array_filter($this->listRoute,function($route) use ($httpRequest){
                return $httpRequest->request->is($route->path);
			});
			$numberRoute = count($routeFound);
            if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
			}
			else if($numberRoute == 0)
			{
				throw new NoRouteFoundException();
			}
			else
			{       
				return new Route(array_shift($routeFound));	
			}
		}
	}