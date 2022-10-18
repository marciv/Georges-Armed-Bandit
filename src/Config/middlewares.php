<?php
return
    array(
        [
            'path' => "/",
            'middleware' => [\Georges\Middlewares\Home1::class, \Georges\Middlewares\Home2::class]
        ],
        [
            'path' => "/login",
            'middleware' => \Georges\Middlewares\Home3::class
        ],
        [
            'path' => "/example",
            'middleware' => \Georges\Middlewares\ExampleMiddleware::class
        ]
    );
