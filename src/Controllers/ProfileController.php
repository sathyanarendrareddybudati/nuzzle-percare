<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $this->render('profile/index', [
            'pageTitle' => 'My Profile',
        ]);
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profile');
            return;
        }

        $userId = Session::get('user')['id'];
        $userModel = new User();
        $user = $userModel->find($userId);

        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if (!password_verify($currentPassword, $user['password'])) {
            Session::flash('error', 'Incorrect current password.');
            $this->redirect('/profile');
            return;
        }

        if ($newPassword !== $confirmPassword) {
            Session::flash('error', 'New password and confirmation do not match.');
            $this->redirect('/profile');
            return;
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        if ($userModel->update($userId, ['password' => $hashedPassword])) {
            Session::flash('success', 'Password updated successfully.');
        } else {
            Session::flash('error', 'Failed to update password.');
        }

        $this->redirect('/profile');
    }
}