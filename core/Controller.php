<?php

/**
 * Controller Class
 *
 * A base class for controllers in the MVC pattern, providing common methods.
 */
class Controller
{
    /**
     * Render a view file with optional data.
     *
     * @param string $viewName The name of the view file to render.
     * @param array $data (Optional) Data to be passed to the view.
     */
    public function view($viewName, $data = [])
    {
        $viewFile = 'views/' . $viewName . '.php';

        if (file_exists($viewFile)) {
            extract($data);
            require $viewFile;
        } else {
            // If the specified view file doesn't exist, render a 404 view.
            $this->view('404');
        }
    }

    /**
     * Redirect to a specified URL.
     *
     * @param string $url The URL to redirect to.
     */
    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}

