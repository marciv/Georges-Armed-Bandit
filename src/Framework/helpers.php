<?php

if (!function_exists('_getHostUrl')) {
    function _getHostUrl()
    {
        return (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST'];
    }
}
if (!function_exists('_getSchemeRequest')) {
    function _getSchemeRequest()
    {
        $requestScheme = "https://";
        if ($_SERVER['HTTP_X_FORWARDED_HOST'] == "localhost") {
            $requestScheme = "http://";
        } else if ($_SERVER['HTTP_HOST'] == "localhost") {
            $requestScheme = "http://";
        }
        return $requestScheme;
    }
}

if (!function_exists('redirect')) {
    function redirect($path, $method = null, array $params)
    {
        $hostURL = _getHostUrl();
        $requestScheme = _getSchemeRequest();
        if (!headers_sent()) {
            // echo 'php redirection';
            header('Location: ' . $requestScheme . $hostURL . "/" . $path . "?" . http_build_query($params), false);
        } else {
            // echo 'js redirection';
            echo '<script>window.location="' . $requestScheme . $hostURL . "/" . $path . "?" . http_build_query($params) . '"</script>';
        }
        exit;
    }
}
