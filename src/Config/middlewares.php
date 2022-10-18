<?php
return
    array(
        [
            'path' => "/example",
            'middleware' => \Georges\Middlewares\ExampleMiddleware::class
        ],
        [
            'path' => "/exampleHome",
            'middleware' => \Georges\Middlewares\ExampleAuthMiddleware::class
        ]
    );
