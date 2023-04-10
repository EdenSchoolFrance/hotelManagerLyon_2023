<?php
class Breadcrumbs
{
    // Propriété pour stocker les éléments du fil d'Ariane
    private $breadcrumbs = [];

    public function add($title, $url)
    {
        $this->breadcrumbs[] = ["title" => $title, "url" => $url];
    }

    public function display()
    {
        echo "<ul class=\"breadcrumb\">";
        foreach ($this->breadcrumbs as $breadcrumb) {
            echo '<li><a href="' . $breadcrumb["url"] . '">' . $breadcrumb["title"] . '</a></li><li>/</li>';
        }
        echo "</ul>";
    }
}
