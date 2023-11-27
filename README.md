# Simple PHP PDO MVC Boilerplate

## Overview

This PHP boilerplate is a simple implementation of the Model-View-Controller (MVC) architectural pattern using PDO (PHP Data Objects) for database connectivity. It provides a structured and modular approach to building web applications, making it easier to manage and scale projects.

## Components

### 1. Router

The `Router` class handles the routing of incoming requests to the appropriate controller and action. It allows you to define routes easily and supports different HTTP methods.

### 2. Controller

The `Controller` class acts as the base controller for your application. It includes methods for rendering views and redirecting to other URLs. Controllers extend this base class.

### 3. Database

The `Database` class encapsulates the database connection logic using PDO. It provides methods for executing queries, binding parameters, and fetching results.

### 4. Config

The `Config` file contains constants for configuring your database connection and base URL. Update the values according to your environment.

### 5. Views

The `views` directory holds your HTML templates. Views are rendered by controllers, and data can be passed to them for dynamic content.

### 6. Controllers

The `controllers` directory is where you organize your controller classes. Each controller handles specific routes and user interactions.

## Getting Started

1. Define your routes in the `index.php` file using the `Router` class.
2. Create controller classes in the `controllers` directory, extending the `Controller` base class.
3. Add methods in your controllers to handle different actions.
4. Create corresponding views in the `views` directory.
5. Configure your database connection in the `Config` file.
6. Start building your application by adding more controllers, views, and models.

This boilerplate provides a foundation for building PHP web applications using the MVC pattern. It's recommended to expand upon it based on your project requirements, adding models, additional features, and improving security.

---

Feel free to customize this description based on any additional features or considerations specific to your boilerplate.
