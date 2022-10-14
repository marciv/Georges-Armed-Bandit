<?php

namespace  Georges\Framework;

use  Georges\Framework\View;
use Illuminate\Http\Response;

class Controller
{
    private $_httpRequest;
    private $_httpResponse;
    private $_param;
    public static $dirName = "";

    public function __construct($httpRequest, $httpResponse)
    {
        $this->_httpRequest = $httpRequest;
        $this->_httpResponse = $httpResponse;
    }

    public static function setDirName(string $dirName)
    {
        self::$dirName = $dirName;
    }

    public function send()
    {
        return (new Response('New header new response', 403));
    }

    public function view(string $viewName, array $_param = [])
    {
        var_dump($this->send());
        View::renderTemplate(self::$dirName . "/$viewName.php", $_param);
    }

    public function addParam($name, $value)
    {
        $this->_param[$name] = $value;
    }
}
