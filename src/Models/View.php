<?php

namespace Georges\Models;

class View
{

    public static function renderTemplate(string $template, array $args = [])
    {
        echo static::getTemplate($template, $args);
    }


    public static function getTemplate(string $template, array $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../Views/");
            $twig = new \Twig\Environment($loader);
        }

        return $twig->render($template, $args);
    }
}
