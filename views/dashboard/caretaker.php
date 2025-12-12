<?php
// Caretaker Dashboard View
$pageTitle = 'Caretaker Dashboard';

// Mock data for the caretaker's dashboard
$availableJobs = 15;
$pendingOffers = 4;
$confirmedJobs = 2;

?>

<div class="container my-5">
    <h1 class="mb-4"><i class="fas fa-tachometer-alt me-2"></i>Caretaker Dashboard</h1>

    <!-- Dashboard Widgets -->
    <div class="row g-4">
        <!-- Available Jobs -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Available Jobs</h5>
                    <p class="display-4 fw-bold"><?= $availableJobs ?></p>
                    <a href="/pets" class="btn btn-outline-primary">Browse Jobs</a>
                </div>
            </div>
        </div>

        <!-- Pending Offers -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Pending Offers</h5>
                    <p class="display-4 fw-bold text-warning"><?= $pendingOffers ?></p>
                    <a href="/my-offers" class="btn btn-warning">View Offers</a>
                </div>
            </div>
        </div>

        <!-- Confirmed Jobs -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Confirmed Jobs</h5>
                    <p class="display-4 fw-bold text-success"><?= $confirmedJobs ?></p>
                    <a href="/my-schedule" class="btn btn-success">View Schedule</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Schedule -->
    <div class="mt-5">
        <h3 class="mb-3">Upcoming Schedule</h3>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Dog walking for 'Buddy' at 10:00 AM.</a>
            <a href="#" class="list-group-item list-group-item-action">Cat sitting for 'Misty' starting tomorrow.</a>
        </div>
    </div>
</div>
