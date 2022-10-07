<?php

namespace Georges\Models;

class View
{
    protected static $startSearch = "{{";
    protected static $endSearch = "}}";


    public static function renderTemplate(string $template, array $args = [])
    {
        echo static::getTemplate($template, $args);
    }


    public static function getTemplate(string $template, array $args = [])
    {
        ob_start();
        include(__DIR__ . "/../Views/" . $template);
        $content = ob_get_clean();
        return self::replace_params($content, $args);
    }

    public static function replace_params(string $text, array $params)
    {
        foreach ($params as $key => $value) {
            $paramSearch = self::$startSearch . $key . self::$endSearch;
            $text = str_replace($paramSearch, $value, $text);
        }

        return $text;
    }

    // static $twig = null;

    // if ($twig === null) {
    //     $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../Views/");
    //     $twig = new \Twig\Environment($loader);
    // }

    // return $twig->render($template, $args);
}
