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
            <h1 class="mb-4 text-primary text-center">Réservation de Vol</h1>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 

            <form action="/Agencedevoyage/reservation-submit" method="POST" autocomplete="off" class="p-4 shadow bg-light rounded">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom & Prénoms <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Entrez votre nom complet" value="<?php echo htmlspecialchars($user['nom']." ".$user['prenoms']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']) ?>" placeholder="Entrez votre email" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($user['telephone']) ?>" placeholder="Votre numéro" required>
                </div>

                <div class="mb-3">
                    <label for="departure" class="form-label">Lieu de départ <span class="text-danger">*</span></label>
                    <select name="departure" id="departure" class='form-control' required>
                        <option value="">---Choisir---</option>
                        <option value="Paris">Paris</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Egypte">Egypte</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="arrival" class="form-label">Lieu d'arrivée <span class="text-danger">*</span></label>
                    <select name="arrival" id="arrival" class='form-control' required>
                        <option value="">---Choisir---</option>
                        <option value="Paris">Paris</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Egypte">Egypte</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date de départ <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="tarif" class="form-label">Tarif (€) <span class="text-danger">*</span></label>
                    <input type="text" id="tarif" name="tarif" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Réserver</button>
                </div>
            </form>
        </div>
    </div>
</main>



