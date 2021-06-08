<?php declare(strict_types=1);

namespace Models;

include "Base.php";

class Post extends BaseModel
{
    private string $title = "";
    private string $text = "";
    private string $author = "";

    public function greetCustom(string $message)
    {
        echo "<p>" . $message . "</p>";
    }

    public function __construct(string $title, string $text, string $author)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }
}