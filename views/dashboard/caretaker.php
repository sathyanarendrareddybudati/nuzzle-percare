<div class="container py-5">
    <h1 class="mb-4">Service Provider Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Recent Pet Ads</h5>

                    <?php if (empty($recentAds)): ?>
                        <p>No pet ads posted recently.</p>
                    <?php else: ?>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($recentAds as $ad): ?>
                                <li class="list-group-item">
                                    <a href="/pets/<?= e($ad['id']) ?>">
                                        <?= e($ad['title']) ?>
                                    </a>
                                    <small class="text-muted">
                                        for <?= e($ad['service_name']) ?> in <?= e($ad['location_name']) ?>
                                    </small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Caretaker Profile</h5>

                    <?php if ($profile): ?>
                        <p class="card-text">
                            <strong class="text-primary">
                                <?= e($profile['title']) ?>
                            </strong>
                        </p>
                        <p class="text-muted">
                            Manage your public profile and attract pet owners.
                        </p>
                        <a href="/caretaker/profile"
                           class="btn btn-outline-primary btn-sm">
                            Edit Profile
                        </a>
                    <?php else: ?>
                        <p>You haven't created a caretaker profile yet.</p>
                        <a href="/caretaker/profile"
                           class="btn btn-primary">
                            Create Profile
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Profile</h5>
                    <p class="card-text text-center fs-1 fw-bold"><i class="fas fa-user-cog"></i></p>
                    <a href="/profile" class.="btn btn-info">My Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
