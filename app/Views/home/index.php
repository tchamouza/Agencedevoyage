<?php require_once 'app/Views/layouts/header.php'; ?>

<!-- Section Accueil -->
<section class="bg-light py-5 text-center titre">
    <div class="container">
        <h2 class="display-5">Bienvenue sur <span class="text-primary">airlineTRAVEL</span></h2>
        <p class="lead">Vous voulez voyager en toute sécurité et aisance ? Vous êtes à la bonne adresse.</p>
    </div>
</section>

<!-- Section Destinations Populaires -->
<section id="popular-destination" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center text-primary mb-5">Certains destinations populaires</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="./pages/image/jamaique.jpg" class="card-img-top" alt="Jamaïque">
                    <div class="card-body">
                        <h5 class="card-title">Jamaïque</h5>
                        <p class="card-text">Découvrez la Jamaïque avec nous. Réservez moins cher ici.</p>
                        <a href="/Agencedevoyage/destinations" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="./pages/image/paris-france.jpeg" class="card-img-top" alt="France">
                    <div class="card-body">
                        <h5 class="card-title">France</h5>
                        <p class="card-text">Visitez Paris, la ville lumière. Offres exclusives disponibles.</p>
                        <a href="/Agencedevoyage/destinations" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="./pages/image/japon.jpg" class="card-img-top" alt="Japon">
                    <div class="card-body">
                        <h5 class="card-title">Japon</h5>
                        <p class="card-text">Explorez Tokyo et ses merveilles. Expérience culturelle garantie.</p>
                        <a href="/Agencedevoyage/destinations" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<?php require_once 'app/Views/home/about.php'; ?>

<?php require_once 'app/Views/layouts/footer.php'; ?>