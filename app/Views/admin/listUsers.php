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
            <h1 class="mb-4 text-primary text-center">Utilisateurs</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  table-hover text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Telephone</th>
                            <th>Date d'inscription</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($users as $user): ?>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $user['nom'] ?></td>
                                <td><?= $user['prenoms'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['age'] ?></td>
                                <td><?= $user['telephone'] ?></td>
                                <td><?= $user['created_at'] ?></td>
                                <td>
                                <a href="/Agencedevoyage/admin-supprimer?id=<?= $user ['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur?')" class="btn btn-danger btn-sm">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>