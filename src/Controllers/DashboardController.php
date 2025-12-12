<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;

class DashboardController extends Controller
{
    public function index(): void
    {
        // Perform the authentication check at the beginning of the method.
        if (!Session::get('user_id')) {
            Session::flash('error', 'You must be logged in to view the dashboard.');
            $this->redirect('/login');
            return; // Stop execution after redirecting
        }

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
