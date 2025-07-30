<?php require_once 'app/Views/layouts/header.php'; ?>

<main class="container-fluid ">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <?php require_once 'app/Views/layouts/slide-bar.php'; ?>
        </div>

        <!-- Dashboard Content -->
        <div class="col-md-9 mt-4">
            <div class="card shadow-sm mb-4 text-center">
                <div class="card-body">
                    <h1 class="card-title text-primary">Bienvenue, <?= htmlspecialchars($user['prenoms']) ?></h1>
                    <p class="card-text">
                        sur votre espace de travail. <br>
                        <strong>Lisez attentivement les règles</strong> avant de réserver un vol.
                    </p>
                </div>
            </div>

            <div class="row">
                <!-- Règles -->
                <div class="col-md-6 mb-4">
                    <div class="card border-info h-100">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Règles à suivre</h5>
                        </div>
                        <div class="col-md-11 card-body rules" >
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item">Arriver 2h avant le vol</li>
                                <li class="list-group-item">Aucun remboursement après paiement</li>
                                <li class="list-group-item">Bagage cabine : max 10 kg</li>
                                <li class="list-group-item">Respecter les instructions de sécurité</li>
                                <li class="list-group-item">Assurez-vous que les informations fournies sont exactes.</li>
                                <li class="list-group-item">Les réservations sont définitives une fois validées.</li>
                                <li class="list-group-item">L’annulation n’est possible que 48h avant le départ.</li>
                                <li class="list-group-item">Respectez les conditions d’embarquement précisées.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Trajets -->
                <div class="col-md-6 mb-4">
                    <div class="card border-success h-100">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Trajets disponibles</h5>
                        </div>
                        <div class="col-md-10 card-body tragets ">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Lomé → Paris</li>
                                <li class="list-group-item">Paris → New York</li>
                                <li class="list-group-item">Lomé → Abidjan</li>
                                <li class="list-group-item">Lomé → Dakar</li>
                            </ul>
                            <a href="/Agencedevoyage/reservation" class="btn btn-outline-success mt-3">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>