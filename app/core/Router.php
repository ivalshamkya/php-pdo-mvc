<?php

namespace MyApp;

/**
 * Class Router
 *
 * The Router class is responsible for managing routes and mapping
 * URIs to corresponding controllers and HTTP methods.
 */
class Router {
    /**
     * @var array $routes Associative array to store routes, where the key is the URI
     *                   and the value is an array containing the controller and method.
     */
    protected $routes = [];

    /**
     * Add a new route to the router.
     *
     * @param string $uri The URI pattern to match.
     * @param string $controller The controller and method associated with the route (format: Controller@method).
     * @param string $method The HTTP request method associated with the route (default is 'GET').
     */
    public function addRoute($uri, $controller, $method = 'GET') {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    /**
     * Find and return the controller associated with a given URI and HTTP method.
     *
     * @param string $uri The URI to route.
     * @param string $method The HTTP request method (default is 'GET').
     *
     * @return string|null The controller and method associated with the URI, or null if not found.
     */
    public function route($uri, $method = 'GET') {
        if (array_key_exists($uri, $this->routes) && $this->routes[$uri]['method'] == $method) {
            return $this->routes[$uri]['controller'];
        }
        return null;
    }
}
