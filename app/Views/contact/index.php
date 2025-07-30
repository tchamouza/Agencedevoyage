<?php
//$additionalCSS = '<link rel="stylesheet" href="/Agencedevoyage/contact styles.css">';
include 'app/Views/layouts/header.php';
?>

<section class="py-5 bg-primary text-light text-center ">
    <div class="container">
        <h1 class="display-5 fw-bold">Contactez-nous</h1>
        <p class="lead">
            Vous voulez nous contacter ?<br>
            Remplissez le formulaire ci-dessous, et nous vous répondrons dès que possible.
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Formulaire -->
            <div class="col-md-6">
                <h2 class="text-center">Envoyez-nous un message</h2>

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

                <form action="/Agencedevoyage/contact-submit" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom :</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message :</label>
                        <textarea class="form-control" id="message" name="message" rows="6"
                            required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>

            <!-- Informations -->
            <div class="col-md-6">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h2>Informations de contact</h2>

                    <h5 class="mt-4"><i class="bi bi-telephone-fill me-2"></i>Téléphone</h5>
                    <p>+228 92 58 88 95</p>
                    <p>Lun-Dim : 24h/24</p>

                    <h5 class="mt-4"><i class="bi bi-envelope-fill me-2"></i>Email</h5>
                    <p>contact@airlinetravel.com</p>
                    <p>Réponse sous 24h</p>

                    <h5 class="mt-4"><i class="bi bi-geo-alt-fill me-2"></i>Adresse</h5>
                    <p>123 Boulevard Oti</p>
                    <p>75008 Lomé, Togo</p>

                    <h5 class="mt-4"><i class="bi bi-clock me-2"></i>Horaires</h5>
                    <p>Support 24/7 — Toujours disponible</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'app/Views/layouts/footer.php'; ?>