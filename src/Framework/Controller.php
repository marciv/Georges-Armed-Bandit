<?php

namespace  Georges\Framework;
use Georges\Framework\Exceptions\ViewNotFoundException;
use  Georges\Models\View;

class Controller
{

    private $_httpRequest;
    private $_param;    
    public static $dirName = "";

    public function __construct($httpRequest)
    {
        $this->_httpRequest = $httpRequest;
    }    

    public static function setDirName(string $dirName)
    {
        self::$dirName = $dirName;
    }

    public static function view(string $viewName, array $_param = [])
    {
        echo self::$dirName . "/$viewName.php.twig";

        if(file_exists(self::$dirName . "/$viewName.php.twig")){
            View::renderTemplate(self::$dirName . "/$viewName.php.twig", $_param);
        } else {
            throw new ViewNotFoundException();	
        }
        
    }
    
    public function addParam($name,$value)
    {
        $this->_param[$name] = $value;
    }
    
    
}
