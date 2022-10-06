<?php

namespace Georges\Framework;
use Georges\Framework\Exceptions\MultipleRouteFoundException;
use Georges\Framework\Exceptions\NoRouteFoundException;
use Georges\Framework\Route;

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../Config/');
$dotenv->load();

	class Router
	{

		private static $listRoute;
		
		public function __construct()
		{
			$stringRoute = file_get_contents(__DIR__.'/../Config/route.json');
			
			self::$listRoute = json_decode($stringRoute);
		}

        public static function addRoute($route){
            self::$listRoute[] = $route;
        }
		
		public function findRoute($httpRequest)
		{
			$routeFound = array_filter(self::$listRoute,function($route) use ($httpRequest){
				$return = preg_match("#^" . $route->path . "$#", $httpRequest->getPath()) && $route->method == $httpRequest->getMethod();
                return $return;
			});
			$numberRoute = count($routeFound);
            if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException("Path : ".$httpRequest->getPath());
			}
			else if($numberRoute == 0)
			{
				throw new NoRouteFoundException("Path : ".$httpRequest->getPath());
			}
			else
			{       
				return new Route(array_shift($routeFound));	
			}
		}
	}