<?php

require_once './config/Config.php';

// Include the Router class
require_once './core/Router.php';

// Include the Controller class
require_once './core/Controller.php';

// Initialize the router
$router = new Router();
$defualtController = new Controller();

// Define your routes
$router->addRoute('', 'HomeController@index');
$router->addRoute('home', 'HomeController@index');

// Get the URL path
$path = trim($_SERVER['REQUEST_URI'], '/');

// Route the request
if ($controllerAction = $router->route($path)) {
    list($controllerName, $action) = explode('@', $controllerAction);
    $controllerFile = './controllers/' . ucfirst($controllerName) . '.php';

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        $controllerClassName = ucfirst($controllerName);

        if (class_exists($controllerClassName)) {
            $controllerInstance = new $controllerClassName();

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            } else {
                // Action not found, show 404
                $defualtController->view('404');
            }
        } else {
            // Controller class not found, show 404
            $defualtController->view('404');
        }
    } else {
        // Controller file not found, show 404
        $defualtController->view('404');
    }
} else {
    // Route not found, show 404
    $defualtController->view('404');
}
