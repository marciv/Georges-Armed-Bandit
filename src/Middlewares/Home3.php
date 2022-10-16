<?php
namespace Georges\Middlewares;


class Home3 extends \Georges\Framework\Middleware{

    function handle($httpRequest){

        // echo  "middleware 3 run";
        return parent::next($httpRequest);

    }

    
}



?>