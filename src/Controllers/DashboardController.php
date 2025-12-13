<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\PetAd;

class DashboardController extends Controller
{
    public function index(): void
    {
        Session::start();
        $userId = Session::get('user_id');
        if (!$userId) {
            Session::flash('error', 'You must be logged in to view the dashboard.');
            $this->redirect('/login');
            return;
        }

        $role = Session::get('user_role');
        $petAdModel = new PetAd();

        switch ($role) {
            case "admin":
                $this->redirect('/admin');
                break;
            case "pet_owner":
                $recentAds = $petAdModel->getRecentAdsByUserId($userId);
                $this->render('dashboard/owner', [
                    'pageTitle' => 'Customer Dashboard',
                    'recentAds' => $recentAds
                ]);
                break;
            case "service_provider":
                $recentAds = $petAdModel->getRecentAds(); // Or a more specific method for providers
                $this->render('dashboard/caretaker', [
                    'pageTitle' => 'Service Provider Dashboard',
                    'recentAds' => $recentAds
                ]);
                break;
            default:
                Session::flash('error', 'Invalid user role.');
                $this->redirect('/');
                break;
        }
    }
}
