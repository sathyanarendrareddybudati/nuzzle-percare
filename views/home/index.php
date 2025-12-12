<?php
$pageTitle = 'Welcome to Nuzzle - Your Trusted Pet Care Connection';
?>

<style>
    .hero-section {
        background: url('https://images.unsplash.com/photo-1556955112-28cde3817b0a?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 100px 0;
        text-align: center;
    }
    .hero-section h1 {
        font-weight: 800;
        font-size: 3.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    .hero-section p {
        font-size: 1.25rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }
    .feature-icon {
        font-size: 3rem;
        color: var(--primary-color);
    }
    .card.feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
        transition: transform 0.3s, box-shadow 0.3s;
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="display-4">More Than Care, We Give Love.</h1>
        <p class="lead my-4">Connecting pet owners with a community of trusted and passionate caretakers. <br> Find the perfect match for your furry friend.</p>
        <a href="/register" class="btn btn-primary btn-lg me-2"><i class="fas fa-user-plus me-2"></i>Join as a Caretaker</a>
        <a href="/pets/create" class="btn btn-secondary btn-lg"><i class="fas fa-paw me-2"></i>Post a Pet Ad</a>
    </div>
</div>

<!-- How It Works Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">How It Works</h2>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 feature-card">
                    <i class="fas fa-bullhorn feature-icon mb-3"></i>
                    <h5>1. Post an Ad</h5>
                    <p>Pet owners post ads detailing their pet's needs, from daily walks to long-term boarding.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 feature-card">
                    <i class="fas fa-search-location feature-icon mb-3"></i>
                    <h5>2. Find a Match</h5>
                    <p>Caretakers browse ads and apply for jobs. Owners can also search for and invite local caretakers.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 feature-card">
                    <i class="fas fa-handshake feature-icon mb-3"></i>
                    <h5>3. Connect & Relax</h5>
                    <p>Connect securely, arrange details, and relax knowing your pet is in great hands.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">What Our Users Say</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>"Nuzzle made it so easy to find a reliable dog walker for Buddy. The platform is user-friendly and I love the peace of mind it gives me."
                            </p>
                            <footer class="blockquote-footer">Sarah J., <cite title="Source Title">Pet Owner</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>"As a part-time student, becoming a pet caretaker on Nuzzle has been a joy. I get to spend time with animals and earn money on my own schedule."
                            </p>
                            <footer class="blockquote-footer">Mike R., <cite title="Source Title">Caretaker</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
