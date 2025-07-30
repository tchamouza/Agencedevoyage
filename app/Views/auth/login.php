<?php require_once 'app/Views/layouts/header.php'; ?>

<main class="container d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Connexion</h2>

        <form action="/Agencedevoyage/login-submit" method="POST" autocomplete="off">
            <!-- Erreurs -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email">
            </div>

            <!-- Mot de passe -->
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Entrez votre mot de passe">
            </div>

            <!-- Lien vers inscription -->
            <div class="mb-3 text-center">
                <p class="mb-0">
                    Pas de compte ? 
                    <a href="/Agencedevoyage/register" class="fw-bold text-decoration-none">Inscrivez-vous</a>
                </p>
            </div>

            <!-- Bouton -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Connexion</button>
            </div>
        </form>
    </div>
</main>

<?php require_once 'app/Views/layouts/footer.php'; ?>