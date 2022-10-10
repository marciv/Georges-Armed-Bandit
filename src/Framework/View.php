<?php

namespace Georges\Framework;
use Georges\Framework\Exceptions\ViewNotFoundException;

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
        $filePath = __DIR__ . "/../Views/" . $template;
        if(file_exists($filePath)){
            ob_start();
            include(__DIR__ . "/../Views/" . $template);
            $content = ob_get_clean();
            return self::replace_params($content, $args);
        } else {
            throw new ViewNotFoundException();
        }        
    }

    public static function replace_params(string $text, array $params)
    {
        foreach ($params as $key => $value) {
            $paramSearch = self::$startSearch . $key . self::$endSearch;
            $text = str_replace($paramSearch, $value, $text);
        }

        return $text;
    }

}
