<style>
    .browse-hero {
        background-color: #f8f9fa;
        padding: 4rem 0;
    }

    .ad-card {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.07);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .ad-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    }
    .ad-card-img {
        height: 220px;
        object-fit: cover;
    }
</style>

<section class="browse-hero text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Find Pet Care Services</h1>
        <p class="lead text-muted">Browse ads for pet sitting, dog walking, and more.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Search and Filters -->
            <div class="col-12 mb-4">
                <form method="GET" action="/pets">
                    <div class="input-group input-group-lg">
                        <input type="text" name="q" class="form-control" placeholder="Search for services, locations, etc." value="">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                    </div>
                </form>
            </div>

            <!-- Ad Listings -->
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">All Available Ads (<?= count($ads) ?>)</h3>
                </div>

                <div class="row g-4">
                    <?php if (!empty($ads)): ?>
                        <?php foreach ($ads as $ad): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card ad-card h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="card-title fw-bold text-dark mb-0"><?= e($ad['title']) ?></h5>
                                            <span class="badge bg-success-light text-success rounded-pill ms-2"><?= e($ad['service_name']) ?></span>
                                        </div>
                                        <p class="card-text text-muted small mb-3">
                                            <i class="fas fa-user me-2"></i>Posted by <?= e($ad['user_name']) ?>
                                        </p>
                                        <div class="d-flex justify-content-between text-muted small">
                                            <span><i class="fas fa-map-marker-alt me-2"></i><?= e($ad['location_name']) ?></span>
                                            <span><i class="fas fa-dollar-sign me-2"></i><?= e(number_format($ad['cost'], 2)) ?></span>
                                        </div>
                                         <a href="/pets/<?= (int)$ad['id'] ?>" class="btn btn-primary stretched-link mt-auto">View Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="text-center p-5 bg-light rounded">
                                <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                                <h4 class="fw-bold">No Ads Found</h4>
                                <p class="text-muted">There are currently no pet service ads available. Please check back later.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
