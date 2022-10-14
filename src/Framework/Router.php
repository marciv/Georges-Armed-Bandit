<?php

namespace Georges\Framework;

use Georges\Framework\Exceptions\MultipleRouteFoundException;
use Georges\Framework\Exceptions\NoRouteFoundException;
use Georges\Framework\Exceptions\MiddlewareNotFoundException;
use Georges\Framework\Route;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../Config/');
$dotenv->load();

class Router
{

    public static $listRoute;
    private $_httpRequest;
    private $_httpResponse;

    private $_route;


    public function __construct($httpRequest, $httpResponse)
    {
        $routeFilePath = __DIR__ . '/../Config/route.json';
        if (file_exists($routeFilePath)) {
            $stringRoute = file_get_contents($routeFilePath);
            self::$listRoute = json_decode($stringRoute);
        }

        $this->_httpRequest = $httpRequest;
        $this->_httpResponse = $httpResponse;
    }

    public static function addRoute($method, $args)
    {
        $routeArray['path']            = $args[0];
        $routeArray['controller']    = $args[1];
        $routeArray['action']        = $args[2];
        $routeArray['param']        = $args[3] ?? [];
        $routeArray['method']        = $method;
        self::$listRoute[] = (object)($routeArray);
    }

    public static function get(...$args)
    {
        Router::addRoute('GET', $args);
    }
    public static function post(...$args)
    {
        Router::addRoute('POST', $args);
    }
    public static function put(...$args)
    {
        Router::addRoute('PUT', $args);
    }
    public static function delete(...$args)
    {
        Router::addRoute('DELETE', $args);
    }
    public static function all(...$args)
    {
        Router::addRoute('ALL', $args);
    }

    public function use($path, ...$middlewares)
    {
        $httpRequest = $this->_httpRequest;
        if (preg_match("#^" . $path . "$#", $httpRequest->getPath())) {
            foreach ($middlewares as $middleware) {
                if (is_callable($middleware)) {
                    $return = $middleware($this->_httpRequest);
                    if (is_string($middleware)) {
                        $this->_httpRequest->{$middleware} = $return;
                    } else {
                        $this->_httpRequest->closure[] = $return;
                    }
                    if (!$return or empty($return)) {
                        break;
                    }
                } else {
                    throw new MiddlewareNotFoundException('function ' . $middleware . ' not found');
                }
                // }
            }
        }
    }

    public function setRoute($route)
    {
        $this->_route = $route;
    }

    public function getRoute()
    {
        return $this->_route;
    }

    public function getListRoute()
    {
        return self::$listRoute;
    }

    public function findRoute()
    {
        $httpRequest = $this->_httpRequest;
        $routeFound = array_filter(self::$listRoute, function ($route) use ($httpRequest) {
            $return = preg_match("#^" . $route->path . "$#", $httpRequest->getPath()) && ($route->method == $httpRequest->getMethod() || $route->method == "ALL");
            return $return;
        });
        $numberRoute = count($routeFound);
        if ($numberRoute > 1) {
            throw new MultipleRouteFoundException("Path : " . $httpRequest->getPath());
        } else if ($numberRoute == 0) {
            throw new NoRouteFoundException("Path : " . $httpRequest->getPath());
        } else {
            $route = new Route(array_shift($routeFound));
            $this->setRoute($route);
        }
    }

    public function run()
    {
        $this->findRoute();
        $this->_httpRequest->bindParam($this->_route->getMethod());
        $this->_route->run($this->_httpRequest, $this->_httpResponse);
    }
}
