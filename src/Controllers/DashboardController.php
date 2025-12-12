<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // It's better to handle auth checks in the methods themselves or via middleware,
        // but for now, let's fix the immediate error.
        if (!Session::get('user_id')) {
            Session::flash('error', 'You must be logged in to view the dashboard.');
            $this->redirect('/login');
        }
    }

    public function index(): void
    {
        $role = Session::get('user_role');

        switch ($role) {
            case 'admin':
                $this->redirect('/admin');
                break;
            case 'owner':
                $this->render('dashboard/owner', ['pageTitle' => 'Owner Dashboard']);
                break;
            case 'caretaker':
                $this->render('dashboard/caretaker', ['pageTitle' => 'Caretaker Dashboard']);
                break;
            default:
                Session::flash('error', 'Invalid user role.');
                $this->redirect('/');
                break;
        }
    }
}
