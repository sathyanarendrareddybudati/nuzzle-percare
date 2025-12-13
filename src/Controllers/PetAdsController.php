<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\PetAd;

class PetAdsController extends Controller
{
    public function index(): void
    {
        $petAdModel = new PetAd();
        $ads = $petAdModel->all();
        $this->render('pets/index', ['ads' => $ads, 'pageTitle' => 'Browse Pet Ads']);
    }

    public function show($id): void
    {
        $id = (int)$id;
        $petAdModel = new PetAd();
        $ad = $petAdModel->getAdById($id);
        if (!$ad) {
            $this->redirect('/pets');
        }

        $this->render('pets/show', ['ad' => $ad, 'pageTitle' => $ad['title']]);
    }
}
