<?php
session_start();

// Header set Access-Control-Allow-Origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");

//ini_set("display_errors", "On");

require __DIR__. '/../vendor/autoload.php';


$router = new AltoRouter();

$router->setBasePath((function () {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $uri = (string) parse_url('http://a' . $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if (stripos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
        return $_SERVER['SCRIPT_NAME'];
    }
    if ($scriptDir !== '/' && stripos($uri, $scriptDir) === 0) {
        return $scriptDir;
    }
    return '';
})());

/**=====================
 * Routes user
 *=======================*/

$router->map(
    'POST',
    '/login',
    [
        'method' => 'signIn',
        'controller' => 'App\Controllers\LoginController'
    ],
    'login'
);

$router->map(
    'GET',
    '/logout',
    [
        'method' => 'logout',
        'controller' => 'App\Controllers\LoginController'
    ],
    'logout' 
);

$router->map(
    'POST',
    '/register',
    [
        'method' => 'signUp',
        'controller' => 'App\Controllers\RegisterController'
    ],
    'register'
);

/**=====================
 * Routes incomes
 *=======================*/

$router->map(
    'GET',
    '/incomes', 
    [
        'method' => 'list',
        'controller' => 'App\Controllers\IncomeController'
    ],
    'incomes' 
);

$router->map(
    'GET',
    '/incomes/month', 
    [
        'method' => 'month',
        'controller' => 'App\Controllers\IncomeController'
    ],
    'incomes-month' 
);

$router->map(
    'GET',
    '/incomes/year', 
    [
        'method' => 'year',
        'controller' => 'App\Controllers\IncomeController'
    ],
    'incomes-year' 
);

$router->map(
    'POST',
    '/income/add',
    [
        'method' => 'create',
        'controller' => 'App\Controllers\IncomeController'
    ],
    'income-add'
);

$router->map(
    'POST',
    '/income/update/[i:income_id]', 
    [
        'method' => 'update',
        'controller' => 'App\Controllers\IncomeController'
    ],
    'income-update' 
);


$router->map(
    'POST',
    '/income/delete/[i:income_id]', 
    [
        'method' => 'delete',
        'controller' => 'App\Controllers\IncomeController'
    ],
    'income-delete' 
);


$match = $router->match();

// Dispatcher :
if ($match) {
    $controller = $match['target']['controller'];
    $controllerObj = new $controller();
    
    $method = $match['target']['method'];
    $params = $match['params'];
    $controllerObj->$method($params); 
}