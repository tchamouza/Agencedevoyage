<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\ReservationController;
use App\Controllers\ContactController;
use App\Controllers\AdminController;


$router = new Router();

// 🌐 Routes publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/destinations', [HomeController::class, 'destinations']);
$router->get('/services', [HomeController::class, 'services']);
$router->get('/about', [HomeController::class, 'about']);
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact-submit', [ContactController::class, 'index']);

// 🔐 Routes d'authentification
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login-submit', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register-submit', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

// 👤 Routes utilisateur connecté
$router->get('/dashboard', [UserController::class, 'dashboard']);
$router->get('/profile', [UserController::class, 'profile']);
$router->post('/profile-submit', [UserController::class, 'profile']);

// 👤 Routes administrateur connecté
$router->get('/admin-dashboard', [AdminController::class, 'admindashboard']);
$router->get('/admin-supprimer', [AdminController::class, 'delete']);
$router->get('/admin-message', [AdminController::class, 'getAllMessages']);
$router->get('/admin-profile', [AdminController::class, 'adminprofile']);
$router->post('/admin-profile-submit', [AdminController::class, 'adminprofile']);
$router->get('/admin-listUsers', [AdminController::class, 'listUsers']);
$router->get('/admin-listReservations', [AdminController::class, 'listReservations']);


// ✈️ Routes réservation
$router->get('/reservations', [ReservationController::class, 'index']);
$router->get('/reservation', [ReservationController::class, 'create']);
$router->get('/annulerReservation', [ReservationController::class, 'AnnulerReservation']);
$router->post('/reservation-submit', [ReservationController::class, 'store']);
$router->get('/confirmation', [ReservationController::class, 'confirmation']);

// Lancement du routeur
$router->resolve();
