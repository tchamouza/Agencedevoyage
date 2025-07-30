<?php require_once 'app/Views/layouts/header.php'; ?>

<main class="container-fluid py-4">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4">
            <?php require_once 'app/Views/layouts/slide-bar.php'; ?>
        </div>

        <!-- Dashboard Content -->
        <div class="col-lg-9 col-md-8">
            <!-- Welcome Card -->
            <div class="card shadow-sm mb-4 text-center">
                <div class="card-body py-4">
                    <h1 class="card-title text-primary mb-3">
                        Bienvenue, <?= htmlspecialchars($user['prenoms']) ?>
                    </h1>
                    <p class="card-text">
                        sur votre espace de travail. <br>
                        <strong>Gérer</strong> vos utilisateurs et Réservations.
                    </p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4">
                <!-- Utilisateurs Card -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 hover-card">
                        <div class="card-header bg-primary text-white text-center py-3 border-0">
                            <i class="bi bi-people-fill fs-4 me-2"></i>
                            <span class="fw-semibold">Utilisateurs</span>
                        </div>
                        <div class="card-body text-center py-4">
                            <div class="mb-4">
                                <p class="text-muted mb-2">Nombre total d'utilisateurs</p>
                                <h2 class="text-primary fw-bold mb-0">
                                    <?= $nbre_users ?? $nbre_user ?>
                                </h2>
                            </div>
                            <a href="/Agencedevoyage/admin-listUsers" 
                               class="btn btn-primary btn-lg px-4 py-2 rounded-pill text-decoration-none">
                                <i class="bi bi-eye me-2"></i>Voir les utilisateurs
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Réservations Card -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 hover-card">
                        <div class="card-header bg-success text-white text-center py-3 border-0">
                            <i class="bi bi-calendar-check-fill fs-4 me-2"></i>
                            <span class="fw-semibold">Réservations</span>
                        </div>
                        <div class="card-body text-center py-4">
                            <div class="mb-4">
                                <p class="text-muted mb-2">Nombre de réservations</p>
                                <h2 class="text-success fw-bold mb-0">
                                    <?= $nbre_reservations ?? $nbre_reservation ?>
                                </h2>
                            </div>
                            <a href="/Agencedevoyage/admin-listReservations" 
                               class="btn btn-success btn-lg px-4 py-2 rounded-pill text-decoration-none">
                                <i class="bi bi-airplane-engines me-2"></i>Voir les réservations
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Messages Card -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 hover-card">
                        <div class="card-header bg-info text-white text-center py-3 border-0">
                            <i class="bi bi-chat-dots-fill fs-4 me-2"></i>
                            <span class="fw-semibold">Messages</span>
                        </div>
                        <div class="card-body text-center py-4">
                            <div class="mb-4">
                                <p class="text-muted mb-2">Nombre de messages</p>
                                <h2 class="text-info fw-bold mb-0">
                                    <?= $nbre_messages ?? $nbre_message ?>
                                </h2>
                            </div>
                            <a href="/Agencedevoyage/admin-message" 
                               class="btn btn-info btn-lg px-4 py-2 rounded-pill text-decoration-none">
                                <i class="bi bi-envelope-open me-2"></i>Voir les messages
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</main>

<!-- CSS personnalisé -->
<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.bg-gradient {
    position: relative;
    overflow: hidden;
}

.bg-gradient::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.1;
}

.btn-lg {
    transition: all 0.3s ease;
}

.btn-lg:hover {
    transform: scale(1.05);
}

.card-header {
    font-weight: 600;
    letter-spacing: 0.5px;
}

@media (max-width: 768px) {
    .col-xl-4 {
        margin-bottom: 1rem;
    }
    
    .card-body {
        padding: 1.5rem 1rem;
    }
}
</style>