# Simple PHP PDO MVC Template

## Overview

This PHP template is a simple implementation of the Model-View-Controller (MVC) architectural pattern using PDO (PHP Data Objects) for database connectivity. It provides a structured and modular approach to building web applications, making it easier to manage and scale projects.

## Components

### 1. Models

The `models` directory is intended for organizing your data models. Models encapsulate the logic for interacting with the application's data, such as querying the database or performing specific business logic. This separation enhances maintainability and modularity in your PHP-PDO-MVC project.

### 2. Views

The `views` directory holds your HTML templates. Views are rendered by controllers, and data can be passed to them for dynamic content.

### 3. Controllers

The `controllers` directory is where you organize your controller classes. Each controller handles specific routes and user interactions.

### 4. Config

The `Config` file contains constants for configuring your database connection and base URL. Update the values according to your environment.

### 5. Controller

The `Controller` class acts as the base controller for your application. It includes methods for rendering views and redirecting to other URLs. Controllers extend this base class.

### 6. Router

The `Router` class handles the routing of incoming requests to the appropriate controller and action. It allows you to define routes easily and supports different HTTP methods.

### 7. Database

The `Database` class encapsulates the database connection logic using PDO. It provides methods for executing queries, binding parameters, and fetching results.

## Getting Started

1. Define your routes in the `App.php`.
2. Create controller classes in the `controllers` directory, extending the `Controller` base class.
3. Add methods in your controllers to handle different actions.
4. Create corresponding views in the `views` directory.
5. Configure your database connection in the `Config` file.
6. Start building your application by adding more controllers, views, and models.

This template provides a foundation for building PHP web applications using the MVC pattern. It's recommended to expand upon it based on your project requirements, adding models, additional features, and improving security.

---

## Contributions

🎉 **Contributions Welcome!** 🎉

We appreciate and encourage contributions to enhance and expand this PHP-PDO-MVC template. Whether you're fixing bugs, improving documentation, or adding new features, your efforts are valued.

### How to Contribute
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and ensure they align with the coding standards.
4. Write tests for your changes, if applicable.
5. Submit a pull request with a clear description of your changes.

### Contributors
A big thanks to all the contributors who have helped improve this PHP-PDO-MVC template!
