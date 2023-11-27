<?php

namespace MyApp;

/**
 * Controller Class
 *
 * A base class for controllers in the MVC pattern, providing common methods.
 */
class Controller
{
    /**
     * @var Database The database instance.
     */
    protected $db;

    /**
     * Constructor.
     * Initializes a new instance of the Controller class.
     */
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Render a view file with optional data.
     *
     * @param string $viewName The name of the view file to render.
     * @param array $data (Optional) Data to be passed to the view.
     */
    public function view($viewName, $data = [])
    {
        $viewFile = "../app/views/" . $viewName . ".php";

        if (file_exists($viewFile)) {
            extract($data);
            require_once $viewFile;
        } else {
            echo "Error: view file not found";
        }
    }

    /**
     * Render a template file with optional data.
     *
     * @param string $viewName The name of the template file to render.
     * @param array $data (Optional) Data to be passed to the template.
     */
    public function template($viewName, $data = [])
    {
        $viewFile = "../app/views/templates/" . $viewName . ".php";

        if (file_exists($viewFile)) {
            extract($data);
            require_once $viewFile;
        } else {
            echo "Error: template file not found";
        }
    }

    /**
     * Load and instantiate a model.
     *
     * @param string $model The name of the model to load.
     * @return object An instance of the specified model.
     */
    public function model($model)
    {
        require_once '../app/Models/' . $model . '.php';
        return new $model($this->db);
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
