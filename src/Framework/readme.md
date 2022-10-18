# Framework

PHP Framework MVC routing request

## Technologies

- PHP ("^7.1 || ^8.0")

# Documentation

## Start

```
$App = new Framework();
$App::get('/', 'Home', 'home');
$App->run();
```

## Routing

You will **define all of the routes** for your application in the **Config/route.json file**.

```
{
	"path" : "/uri",
	"controller" : "ExampleController",
	"action" : "exampleAction",
	"method" : "GET",
	"param" : []
}
```

Or generate **routes dynamically**. The most basic routes simply accept a **URI**, **Controller**, **Method**

```
$App::get('/', 'ExampleController', 'exampleAction');
```

**Available Router Methods**

```
$App::get($uri, $controller, $action);
$App::post($uri, $controller, $action);
$App::put($uri, $controller, $action);
$App::delete($uri, $controller, $action);
$App::all($uri, $controller, $action);
```

## Controller

Your Controller must extends **Framework\Controller**

```
use Georges\Framework\Controller;


class ExampleController extends Controller
{
    public function exampleAction($params)
    {
		...
    }
}
```

In your controller, you can define **params** and and access them in your views

```
use Georges\Framework\Controller;
class ExampleController extends Controller
{
    public function exampleAction($params)
    {
        $params['example'] = "This is example";
		//Or like this
		$example = "This is example";
		...
    }
}
```

## Middleware

In **Config/middlewares.php file** define your Middleware.

```
return array(
    [
        'path'=>"/",
        'middleware'=>[\Georges\Middlewares\ExampleMiddleWare1::class,\Georges\Middlewares\ExampleMiddleWare2:class]
    ],
    [
        'path'=>"/example",
        'middleware'=>\Georges\Middlewares\ExampleMiddleWare::class
    ]
);
```

All your Middleware must contains **handle function** for call all next middleware

```
class ExampleMiddleWare extends \Georges\Framework\Middleware{
    function handle($httpRequest){
        echo  "ExampleMiddleWare run";
        return parent::next($httpRequest);
    }
}
```

## View

**Create View in Views directory**

```
Views
 ┣ 📂example
 ┃	┣ 📜exampleIndex.php
```

**Rendering View in Controller**

```
class ExampleController extends Controller
{
    public function exampleAction($params)
    {
		$params['example'] = "This is example"
		//Set directory where is your view
        self::setDirName("Example");
        return self::view('exampleIndex', $params);

		//You can also make
		//return self::view('Example/exampleIndex', $params);
    }
}

```

**Use params in your view**

```
<h1>Example</h1>

<p>{{example}}</p>

<p><?= $example ?></p>
```

**Add Custom CSS File in view**

Create directory in **Views/**

```
📦Views
 ┣ 📂css
 ┃ ┣ 📂example
 ┃ ┃ ┣ 📜style.css
```

In your **Controller and in your Action** add

```
$view = new View();
$view::addCss("example/style.css");
```

**Add Custom JS File in view**

Create directory in **Views/**

```
📦Views
 ┣ 📂js
 ┃ ┣ 📂example
 ┃ ┃ ┣ 📜main.js
```

In your **Controller and in your Action** add

```
$view = new View();
$view::addJs("example/main.js");
```
