<?php
// Caretaker Dashboard View
?>

<div class="container py-5">
    <h1 class="fw-bold">Caretaker Dashboard</h1>
    <p class="text-muted">Find new opportunities and manage your schedule.</p>

    <div class="row g-4 mt-4">
        <!-- Quick Stats -->
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Jobs</h5>
                    <p class="fs-1 fw-bold">0</p>
                    <a href="/my-schedule" class="btn btn-secondary disabled">View Schedule</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Applications Sent</h5>
                    <p class="fs-1 fw-bold">0</p>
                    <a href="/my-applications" class="btn btn-secondary disabled">My Applications</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Profile Views</h5>
                    <p class="fs-1 fw-bold">0</p>
                    <a href="/profile" class="btn btn-primary">View/Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Ads from Pet Owners -->
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">New Pet Care Opportunities</h3>
            <a href="/pets" class="btn btn-success">
                <i class="fas fa-search me-2"></i>Browse All Ads
            </a>
        </div>

        <?php if (empty($recentAds)): ?>
            <div class="text-center py-5 bg-light rounded">
                <p class="lead">No new ads have been posted recently. Check back soon!</p>
            </div>
        <?php else: ?>
            <div class="list-group">
                <?php foreach ($recentAds as $ad): ?>
                    <a href="/pets/<?= e($ad['id']) ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1"><?= e($ad['title']) ?></h5>
                            <p class="mb-1 text-muted">
                                <span class="me-3"><i class="fas fa-concierge-bell me-2"></i>Service: <?= e($ad['service_name']) ?></span>
                                <span class="me-3"><i class="fas fa-map-marker-alt me-2"></i>Location: <?= e($ad['location_name']) ?></span>
                                <span><i class="fas fa-dollar-sign me-2"></i>Rate: <?= e($ad['cost']) ?></span>
                            </p>
                        </div>
                        <span class="badge bg-primary rounded-pill">View Details</span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
