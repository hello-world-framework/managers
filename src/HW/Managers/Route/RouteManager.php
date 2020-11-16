<?php

namespace HW\Managers\Route;


class RouteManager implements RouteManagerInterface
{
    private $app;
    private $routesBase;
    private $routes;

    public function __construct($app, $routesBase="")
    {
        $this->app = $app;
        if($routesBase === "") {
            $routesBase = $this->app->base() . "/routes";
        }
        $this->routesBase = $routesBase;
    }

    public function getRoutes()
    {
        if($this->routes === null) {
            $this->routes = [];
            $all = require $this->routesBase . "/all.php";
            foreach($all as $type => $info) {
                $routesOfType = require $this->routesBase . "/" . $info["path"];
                $prefix = "";
                if($type !== "http") {
                    $prefix = $info["prefix"];
                    $len = strlen($prefix);
                    if($prefix[$len - 1] === "/") {
                        $prefix = substr($prefix, 0, $len - 1);
                    }
                }
                foreach($routesOfType as $method => $list) {
                    if(!isset($this->routes[$method])) {
                        $this->routes[$method] = [];
                    }
                    foreach($list as $uri => $details) {
                        if(strlen($uri) > 0 && $uri[0] === "/") {
                            $uri = $prefix . $uri; 
                        } else {
                            $uri = $prefix . "/" . $uri;
                        }
                        $this->routes[$method][$uri] = $details;
                    }
                }
            }
        }
        return $this->routes;
    }
}