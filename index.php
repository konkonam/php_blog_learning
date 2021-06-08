<?php declare(strict_types=1);

include_once "Server.php";
include_once "Route.php";

$app = new Server("/", "Templates");

$app->registerRoute(new Route("/test", "test.html"));
$app->registerRoute(new Route("/abc", "abc.html"));
$app->registerRoute(new Route("/abc/abc/abc", "abc.html"));

$app->run();
