<?php

namespace Georges\Framework;

use Georges\Framework\Exceptions\ViewNotFoundException;

class View
{
    protected static $startSearch = "{{";
    protected static $endSearch = "}}";
    protected static $foreachStart = "{{ for";
    protected static $foreachEnd = "}}";


    public static function renderTemplate(string $template, array $args = [])
    {
        echo static::getTemplate($template, $args);
    }

    public static function getTemplate(string $template, array $args = [])
    {
        $filePath = __DIR__ . "/../Views/" . $template;
        if (file_exists($filePath)) {
            extract($args);
            ob_start();
            include($filePath);
            $content = ob_get_clean();
            $content = self::replace_params($content, $args);
            return $content;
        } else {
            throw new ViewNotFoundException();
        }
    }

    public static function replace_params(string $text, array $params)
    {
        foreach ($params as $key => $value) {
            if (is_array($value)) {
            } else {
                $paramSearch = self::$startSearch . $key . self::$endSearch;
                $text = str_replace($paramSearch, $value, $text);
            }
        }
        return $text;
    }
}
