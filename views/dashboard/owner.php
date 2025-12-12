<?php
// Owner Dashboard View
$pageTitle = 'Owner Dashboard';

// Mock data for the owner's dashboard
$activeAds = 2;
$pendingRequests = 3;
$confirmedBookings = 1;

?>

<div class="container my-5">
    <h1 class="mb-4"><i class="fas fa-tachometer-alt me-2"></i>Owner Dashboard</h1>

    <!-- Dashboard Widgets -->
    <div class="row g-4">
        <!-- Active Ads -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Active Ads</h5>
                    <p class="display-4 fw-bold"><?= $activeAds ?></p>
                    <a href="/my-ads" class="btn btn-outline-primary">Manage Ads</a>
                </div>
            </div>
        </div>

        <!-- Pending Requests -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Pending Requests</h5>
                    <p class="display-4 fw-bold text-warning"><?= $pendingRequests ?></p>
                    <a href="/requests" class="btn btn-warning">View Requests</a>
                </div>
            </div>
        </div>

        <!-- Confirmed Bookings -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Confirmed Bookings</h5>
                    <p class="display-4 fw-bold text-success"><?= $confirmedBookings ?></p>
                    <a href="/bookings" class="btn btn-success">View Bookings</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="mt-5">
        <h3 class="mb-3">Recent Activity</h3>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">A caretaker showed interest in your ad for 'Buddy'.</a>
            <a href="#" class="list-group-item list-group-item-action">You have a new message from a caretaker.</a>
            <a href="#" class="list-group-item list-group-item-action">Your ad 'Walk needed for Max' is now live.</a>
        </div>
    </div>
</div>
