<?php

/**
 * HomeController Class
 *
 * Represents the controller for the home-related functionality.
 */
class HomeController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        // Render the 'home' view.
        $this->view('home');
    }
}
