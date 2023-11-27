<?php

use MyApp\Controller;
use MyApp\Router;

/**
 * App Class
 *
 * The main application class responsible for initializing and running the MVC application.
 */
class App {
    protected $router;

    /**
     * App constructor.
     * Initializes the router and defines application routes.
     */
    public function __construct() {
        $this->initRouter();
    }

    /**
     * Initializes and configures the router.
     */
    protected function initRouter() {
        // Initialize and configure your router
        $this->router = new Router();
        $this->defineRoutes();
    }

    /**
     * Defines application routes.
     */
    protected function defineRoutes() {
        // Define your application routes
        $this->router->addRoute('', 'HomeController@index');
        $this->router->addRoute('home', 'HomeController@index');
        // Add more routes as needed
    }

    /**
     * Runs the application.
     */
    public function run() {
        // Run the application
        $path = trim($_SERVER['REQUEST_URI'], '/');
        $controllerAction = $this->router->route($path);

        if ($controllerAction) {
            list($controllerName, $action) = explode('@', $controllerAction);
            require_once '../app/controllers/' . ucfirst($controllerName) . '.php';

            $controllerClassName = ucfirst($controllerName);
            $controllerInstance = new $controllerClassName();

            $controllerInstance->$action();
        } else {
            // Handle 404 or redirect to a default page
            $this->handle404();
        }
    }

    /**
     * Handles 404 errors.
     */
    protected function handle404() {
        // Handle 404 - You can show a custom 404 page or redirect to a default page
        $controller = new Controller();
        $controller->view('404');
    }
}
