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
                <h1 class="mb-4 text-primary text-center">Messages</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped  table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Messages</th>
                                <th>Date d'envoi</th>
                            </tr>
                            <?php foreach ($messages as $message): ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $message['nom'] ?></td>
                                    <td><?= $message['email'] ?></td>
                                    <td><?= $message['message'] ?></td>
                                    <td><?= $message['date_envoi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>