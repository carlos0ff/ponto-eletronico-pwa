<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";



use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session(); 
$route = new Router(url(), "@");



$route->namespace("Source\App");
$route->get("/", "TimeController@clockIn");
$route->get("/", "TimeController@clockIn");
$route->get("/settings", "TimeController@settings");


$route->namespace("Source\App")->group("/ops");
$route->get("/{errcode}", "TimeController@error");


// ERRORS 
$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush(); 
