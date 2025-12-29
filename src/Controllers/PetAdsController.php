<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\PetAd;
use App\Models\Pet;
use App\Models\Service;
use App\Models\Location;
use App\Core\Session;
use App\Models\PetCategory;

class PetAdsController extends Controller
{
    public function index(): void
    {
        $this->render('pet-ads/index', [
            'pageTitle' => 'Find Pet Care Services'
        ]);
    }

    public function create(): void
    {
        Session::start();
        $user = Session::get('user');

        if (!$user) {
            Session::flash('error', 'You must be logged in to create an ad.');
            $this->redirect('/login');
            return;
        }

        $petModel = new Pet();
        $pets = $petModel->getPetsByUserId($user['id']);
        
        $serviceModel = new Service();
        $services = $serviceModel->all();

        $locationModel = new Location();
        $locations = $locationModel->all();

        $categoryModel = new PetCategory();
        $categories = $categoryModel->all();

        $this->render('pet-ads/create', [
            'pageTitle' => 'Post a New Pet Ad',
            'pets' => $pets,
            'services' => $services,
            'locations' => $locations,
            'categories' => $categories
        ]);
    }

    public function store(): void
    {
        Session::start();
        $user = Session::get('user');
        if (!$user) {
            $this->json(['success' => false, 'message' => 'Authentication required.']);
            return;
        }

        $data = [
            'user_id' => $user['id'],
            'ad_type' => $_POST['ad_type'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'pet_id' => $_POST['pet_id'] ?? null,
            'service_id' => $_POST['service_id'] ?? null,
            'price' => $_POST['price'],
            'location_id' => $_POST['location_id'],
            'start_date' => $_POST['start_date'] ?? null,
            'end_date' => $_POST['end_date'] ?? null,
            'status' => 'open' 
        ];

        $petAdModel = new PetAd();
        $adId = $petAdModel->create($data);

        if ($adId) {
            $this->json(['success' => true, 'ad_id' => $adId]);
        } else {
            $this->json(['success' => false, 'message' => 'Failed to create ad.']);
        }
    }

    public function show(int $id): void
    {
        $petAdModel = new PetAd();
        $ad = $petAdModel->getAdById($id);

        if (!$ad) {
            http_response_code(404);
            $this->render('errors/404', ['pageTitle' => 'Ad Not Found']);
            return;
        }

        $this->render('pet-ads/show', [
            'pageTitle' => $ad['title'],
            'ad' => $ad
        ]);
    }
}
