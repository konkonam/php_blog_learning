<?php declare(strict_types=1);

include_once "Models/Base.php";

class Route extends Models\BaseModel
{
    protected string $url = "";
    protected string $template = "";
    protected array $urlParts = [];

    public function __construct(string $url, string $template)
    {
        $this->url = $url;
        $this->template = $template;
        $this->urlParts = explode("/", $this->url);
    }
}
