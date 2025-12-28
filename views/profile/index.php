<?php

use App\Core\Session;

require_once __DIR__ . '/../layouts/main.php';

?>

<div class="container my-5">
    <h1 class="text-center mb-4"><?= $pageTitle ?? 'My Profile' ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Change Password</h5>
                    
                    <?php if (Session::has('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= Session::flash('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (Session::has('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= Session::flash('error') ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="/profile/update-password" method="POST">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
