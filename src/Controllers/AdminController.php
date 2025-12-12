<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure only admins can access this controller
        if (!Session::isAdmin()) {
            Session::flash('error', 'You are not authorized to access this page.');
            redirect('/');
        }
    }

    /**
     * Display the admin dashboard.
     */
    public function index(): void
    {
        $this->render('admin/dashboard', [
            'pageTitle' => 'Admin Dashboard'
        ]);
    }

    /**
     * Placeholder for managing users.
     */
    public function users(): void
    {
        // In a real application, you would fetch users from the database.
        $this->render('admin/users', [
            'pageTitle' => 'Manage Users'
        ]);
    }

    /**
     * Placeholder for managing ads.
     */
    public function ads(): void
    {
        // In a real application, you would fetch ads from the database.
        $this->render('admin/ads', [
            'pageTitle' => 'Manage Ads'
        ]);
    }
}
