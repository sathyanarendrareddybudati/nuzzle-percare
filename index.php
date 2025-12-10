<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

// Load .env here (no bootstrap/app.php file needed)
if (class_exists(\Dotenv\Dotenv::class) && is_file(__DIR__.'/.env')) {
    \Dotenv\Dotenv::createImmutable(__DIR__)->load();
}

use App\Core\Router;

$router = new Router();

// Load routes
require __DIR__ . '/routes/web.php';

// Dispatch
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$router->dispatch($_SERVER['REQUEST_METHOD'], rtrim($path, '/') ?: '/');
