<?php

namespace Tests\HW\Managers\Route;


use PHPUnit\Framework\TestCase;
use HW\Managers\Route\RouteManagerInterface;
use HW\Managers\Route\RouteManager;


class RouteManagerTest extends TestCase
{
    public function testInterface()
    {
        $manager = new RouteManager(null, null);
        $this->assertTrue($manager instanceof RouteManagerInterface);
    }

    public function testGetRoutes()
    {
        // this test is dependent on "./all.php", "./api.php" and "./http.php"
        // if you're wondering how we're asserting the paths and values
        $manager = new RouteManager(null, __DIR__);
        
        $routes = $manager->getRoutes();

        $this->assertEquals($routes["GET"]["api/user/{id}"]["name"], "user.show");
        $this->assertEquals($routes["GET"]["/"]["name"], "root");
        $this->assertEquals($routes["POST"]["api/user"]["target"], ["api.users.controller", "store"]);
    }
}