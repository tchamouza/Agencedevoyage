<?php
include 'app/Views/layouts/header.php';
?>
<main class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <?php include 'app/Views/layouts/slide-bar.php'; ?>
        </div>

        <!-- Dashboard Content -->
        <div class="col-md-9 mt-4">
            <h1 class="mb-4 text-primary text-center">Modifier mon profil</h1>

            <!-- Messages -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert alert-success">
                    <p><?= htmlspecialchars($success) ?></p>
                </div>
            <?php endif; ?>

            <!-- Formulaires -->
            <div class="row">
                <!-- Formulaire Infos personnelles -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Informations personnelles</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="/Agencedevoyage/profile-submit" autocomplete="off">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                                </div>

                                <div class="mb-3">
                                    <label for="prenoms" class="form-label">Prénoms</label>
                                    <input type="text" class="form-control" id="prenoms" name="prenoms" placeholder="Votre prénom" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date_naissance" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Votre numéro de téléphone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Photo de profil</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>

                                <button type="submit" class="btn btn-info text-white">Enregistrer les modifications</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Formulaire changement mot de passe -->
                <div class="col-md-6 mb-4">
                    <?php if (!empty($passwordErrors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($passwordErrors as $error): ?>
                                <p><?= htmlspecialchars($error) ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($passwordSuccess)): ?>
                        <div class="alert alert-success">
                            <p><?= htmlspecialchars($passwordSuccess) ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Changer le mot de passe</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/Agencedevoyage/profile-submit">
                                <input type="hidden" name="change_password" value="1">

                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Mot de passe actuel</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>

                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Nouveau mot de passe (4-8 caractères)</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirmer le nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>

                                <button type="submit" class="btn btn-secondary">Changer le mot de passe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- Fin row -->
        </div>
    </div>
</main>