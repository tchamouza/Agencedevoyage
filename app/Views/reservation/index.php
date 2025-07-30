<?php
require_once 'app/Views/layouts/header.php';
?>
<main class="container-fluid ">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <?php require_once 'app/Views/layouts/slide-bar.php'; ?>
        </div>

        <!-- Dashboard Content -->
        <div class="col-md-9">
            <h1 class="mb-4 text-primary text-center mt-4">Mes Réservations</h1>

            <?php if (empty($reservations)): ?>
                <div class="alert alert-warning text-center">
                    Vous n'avez aucune réservation pour le moment.
                </div>
            <?php else: ?>
                <?php foreach ($reservations as $reservation): ?>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header d-flex justify-content-between bg-light">
                            <strong>Vol <?= htmlspecialchars($reservation['numerodevol']) ?></strong>
                            <span class="text-muted">Réservé le <?= date('d/m/Y', strtotime($reservation['date'])) ?></span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Trajet :</strong> <?= htmlspecialchars($reservation['depart']) ?> → <?= htmlspecialchars($reservation['arrive']) ?></p>
                                    <p><strong>Date de vol :</strong> <?= date('d/m/Y', strtotime($reservation['date'])) ?></p>
                                    <p><strong>Passager :</strong> <?= htmlspecialchars($reservation['name']) ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Référence :</strong> <?= htmlspecialchars($reservation['numerodevol']) ?></p>
                                    <p><strong>Email :</strong> <?= htmlspecialchars($reservation['email']) ?></p>
                                    <p><strong>Téléphone :</strong> <?= htmlspecialchars($reservation['phone']) ?></p>
                                    <p class="fw-bold text-success">Tarif : <?= htmlspecialchars($reservation['tarif']) ?> €</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="/Agencedevoyage/annulerReservation?id=<?= htmlspecialchars($reservation['id']) ?>" 
                                class="btn btn-warning btn-sm" 
                                onclick="return confirm('Voulez-vous vraiment annuler cette réservation ?')"
                                aria-label="Annuler la réservation <?= htmlspecialchars($reservation['numerodevol']) ?>">
                                    Annuler la Reservation
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="alert alert-info mt-3">
                    Les réservations sont automatiquement supprimées après 30 jours.
                </div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="/Agencedevoyage/reservation" class="btn btn-primary">Faire une nouvelle réservation</a>
            </div>
        </div>
    </div>
</main>