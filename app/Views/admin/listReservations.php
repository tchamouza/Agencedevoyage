<?php require_once 'app/Views/layouts/header.php'
    ?>
<main class="container-fluid ">
    <div class="row">
        <!-- Barre latérale -->
        <div class="col-md-3">
            <?php require_once 'app/Views/layouts/slide-bar.php'; ?>
        </div>

        <!-- Contenu principal -->
        <div class="col-md-9 mt-4">
            <div class="col-10-md-9 mt-4">
                <h1 class="mb-4 text-primary text-center">Vols Reserves</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped  table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Numero du vol</th>
                                <th>Nom & Prenoms</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Lieu de depart</th>
                                <th>Lieu d'arrivee</th>
                                <th>Date de voyage</th>
                                <th>Montant du voyage</th>
                            </tr>
                            <?php foreach ($reservations as $reservation): ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $reservation['numerodevol'] ?></td>
                                    <td><?= $reservation['name'] ?></td>
                                    <td><?= $reservation['email'] ?></td>
                                    <td><?= $reservation['phone'] ?></td>
                                    <td><?= $reservation['depart'] ?></td>
                                    <td><?= $reservation['arrive'] ?></td>
                                    <td><?= $reservation['date'] ?></td>
                                    <td><?= $reservation['tarif'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>