<?php
require_once 'app/Views/layouts/header.php';
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/Agencedevoyage/register-submit" method="POST" enctype="multipart/form-data" autocomplete="off" class="p-4 border rounded shadow-sm">
                <h1 class="mb-4 text-center">Inscrivez-vous ici</h1>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <p class="mb-1"><?= htmlspecialchars($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div class="alert alert-success">
                        <p><?= htmlspecialchars($success) ?></p>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Entrez votre nom" required>
                </div>

                <div class="mb-3">
                    <label for="prenoms" class="form-label">Prénoms <span class="text-danger">*</span></label>
                    <input type="text" id="prenoms" name="prenoms" class="form-control" placeholder="Entrez vos prénoms" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Entrez votre numéro de téléphone" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Photo de profil <span class="text-danger">*</span></label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="motdepasse" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                    <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="mb-3">
                    <label for="confirmemotdepasse" class="form-label">Confirmer mot de passe <span class="text-danger">*</span></label>
                    <input type="password" id="confirmemotdepasse" name="confirmemotdepasse" class="form-control" placeholder="Confirmez votre mot de passe" required>
                </div>

                <p class="text-center" style="font-family: century;">
                    Vous avez fini l'inscription ?
                    <a href="/Agencedevoyage/login" class="text-primary text-decoration-none">Connectez-vous</a>
                </p>

                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
            </form>
        </div>
    </div>
</div>


<?php require_once 'app/Views/layouts/footer.php'; ?>