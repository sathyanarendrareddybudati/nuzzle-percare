<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Pet;
use App\Services\FirebaseStorageService;

class PetsController extends Controller
{
    public function index(): void
    {
        $pets = (new Pet())->all();
        $this->render('pets/index', ['pets' => $pets, 'pageTitle' => 'Browse Pets']);
    }

    public function show($id): void
    {
        $id = (int)$id;
        $petModel = new Pet();
        $pet = $petModel->find($id);
        if (!$pet) {
            $this->redirect('/pets');
        }
        $related = $petModel->related($pet['species'], $id, 3);
        $this->render('pets/show', ['pet' => $pet, 'relatedPets' => $related, 'pageTitle' => $pet['name']]);
    }

    public function create(): void
    {
        $this->render('pets/create', ['pageTitle' => 'List a Pet']);
    }

    public function store(): void
    {
        Session::start();

        $errors = [];
        if (empty($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'An image file is required.';
        }

        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'species' => trim($_POST['species'] ?? ''),
            'breed' => trim($_POST['breed'] ?? ''),
            'age' => (int)($_POST['age'] ?? 0),
            'gender' => trim($_POST['gender'] ?? ''),
            'price' => (float)($_POST['price'] ?? 0),
            'description' => trim($_POST['description'] ?? ''),
            'location' => trim($_POST['location'] ?? ''),
            'contact_phone' => trim($_POST['contact_phone'] ?? ''),
            'contact_email' => filter_var($_POST['contact_email'] ?? '', FILTER_VALIDATE_EMAIL) ?: null,
        ];

        foreach (['name','species','gender','location'] as $field) {
            if (empty($data[$field])) $errors[] = ucfirst($field) . ' is required.';
        }
        if ($data['price'] <= 0) $errors[] = 'Price must be greater than 0.';

        if ($errors) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/pets/create');
            return;
        }

        try {
            $firebaseService = new FirebaseStorageService();
            $imageUrl = $firebaseService->uploadImage($_FILES['image']['tmp_name'], $_FILES['image']['name']);
            $data['image_url'] = $imageUrl;
        } catch (\Exception $e) {
            Session::flash('error', 'There was an error uploading the image: ' . $e->getMessage());
            $this->redirect('/pets/create');
            return;
        }

        (new Pet())->create($data);
        Session::flash('success', 'Your pet has been listed successfully!');
        $this->redirect('/pets');
    }
}
