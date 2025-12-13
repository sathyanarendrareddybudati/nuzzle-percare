<?php require __DIR__ . '/../layouts/main.php'; ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">My Ads</h1>
        <a href="/my-ads/create" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Create Ad
        </a>
    </div>

    <?php if (empty($ads)): ?>
        <div class="text-center py-5">
            <p class="lead">You haven't posted any ads yet.</p>
            <a href="/my-ads/create" class="btn btn-lg btn-success">Post Your First Ad</a>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($ads as $ad): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= e($ad['title']) ?></h5>
                            <p class="card-text"><?= e(substr($ad['description'], 0, 100)) ?>...</p>
                            <ul class="list-unstyled text-muted">
                                <li><strong>Service:</strong> <?= e($ad['service_name']) ?></li>
                                <li><strong>Location:</strong> <?= e($ad['location_name']) ?></li>
                                <li><strong>Cost:</strong> $<?= e($ad['cost']) ?></li>
                            </ul>
                            <a href="/my-ads/show?id=<?= e($ad['id']) ?>" class="btn btn-info">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
