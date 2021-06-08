<?php declare(strict_types=1);

include_once "Route.php";
include_once "Models/Base.php";

class Server extends Models\BaseModel
{
    protected string $root = "";
    protected string $templatesRoot = "";
    protected array $routes = [];

    public function __construct(string $root, string $templatesRoot)
    {
        $this->root = $root;
        $this->templatesRoot = $templatesRoot;
    }

    public function registerRoute(object $route)
    {
        array_push($this->routes, $route);
    }

    public function run()
    {
        $requested = rtrim($_SERVER['REQUEST_URI'], "/");
        $requestParts = explode("/", $requested);

        foreach($this->routes as $route)
        {
            $routesSize = sizeof($route->urlParts);
            if(sizeof($requestParts) == $routesSize)
            {
                $isSame = true;
                for($i = 0; $i < $routesSize; $i++)
                {
                    echo $route->urlParts[$i] . " - " . $requestParts[$i] . "<br>";
                    if($route->urlParts[$i] != $requestParts[$i])
                    {
                        $isSame = false;
                    }
                }

                if($isSame)
                {
                    echo file_get_contents($this->templatesRoot . "/" . $route->template);
                    return;
                }
            }
        }

        echo file_get_contents($this->templatesRoot . "/" . "404.html");
    }
}
