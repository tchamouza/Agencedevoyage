<?php include 'app/Views/layouts/header.php'; ?>

<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="display-5 text-success">Confirmation de Réservation</h1>
        <p class="lead">Votre vol a été réservé avec succès !</p>
    </div>

    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <div>
                <h4 class="mb-1">AIRLINE TRAVEL</h4>
                <small class="text-muted">E-ticket</small>
            </div>
            <div class="text-end">
                <p class="mb-1">Émis le : <strong><?= date('d/m/Y') ?></strong></p>
                <p class="mb-0">Statut : <span class="text-success fw-bold">CONFIRMÉ</span></p>
            </div>
        </div>

        <div class="row">
            <!-- Infos passager -->
            <div class="col-md-6 mb-3">
                <h5 class="mb-3 text-primary">Détails du passager</h5>
                <p><strong>Nom :</strong> <?= htmlspecialchars($reservation['name']) ?></p>
                <p><strong>Référence du vol :</strong> <?= htmlspecialchars($reservation['numerodevol']) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($reservation['email']) ?></p>
                <p><strong>Téléphone :</strong> <?= htmlspecialchars($reservation['phone']) ?></p>
            </div>

            <!-- Infos vol -->
            <div class="col-md-6 mb-3">
                <h5 class="mb-3 text-primary">Informations du vol</h5>
                <p><strong>Départ :</strong> <?= htmlspecialchars($reservation['depart']) ?></p>
                <p><strong>Destination :</strong> <?= htmlspecialchars($reservation['arrive']) ?></p>
                <p><strong>Date :</strong> <?= date('d/m/Y', strtotime($reservation['date'])) ?></p>
                <p><strong>Tarif :</strong> <span class="fw-bold text-dark"><?= htmlspecialchars($reservation['tarif']) ?> €</span></p>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="/Agencedevoyage/reservation" class="btn btn-primary me-2">Nouvelle réservation</a>
        <a href="/Agencedevoyage/dashboard" class="btn btn-outline-secondary">Tableau de bord</a>
    </div>
</div>


<?php include 'app/Views/layouts/footer.php'; ?>