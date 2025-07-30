<!-- Bouton toggle pour mobile -->
<button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#sidebarMenuMobile" aria-controls="sidebarMenuMobile">
    ☰ Menu
</button>

<!-- Sidebar Offcanvas (mobile uniquement) -->
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMenuMobile"
    aria-labelledby="sidebarMenuMobileLabel" style="width: 250px;">
    <h5 id="sidebarMenuMobileLabel">AirlineTRAVEL</h5>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <?php if ($_SESSION["user"]["role"] == "user"): ?>
            <li class="nav-item">
                <a href="/Agencedevoyage/dashboard" class="nav-link text-dark" aria-current="page"><i class="bi bi-speedometer2"></i>&nbsp;Tableau de bord</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/reservation" class="nav-link text-dark"><i class="bi bi-calendar-check"></i>&nbsp;Réservation</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/reservations" class="nav-link text-dark"><i class="bi bi-airplane-engines"></i>&nbsp;Vols</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/profile" class="nav-link text-dark"><i class="bi bi-person-circle"></i>&nbsp;Profil</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/logout" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i>&nbsp;Déconnexion</a>
            </li>
        <?php elseif ($_SESSION["user"]["role"] == "admin"): ?>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-dashboard" class="nav-link text-dark" aria-current="page"><i class="bi bi-speedometer2"></i>&nbsp;Tableau de bord</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-listUsers" class="nav-link text-dark"><i class="bi bi-person-lines-fill"></i>&nbsp;Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-listReservations" class="nav-link text-dark"><i class="bi bi-airplane-engines"></i>&nbsp;Vols</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-message" class="nav-link text-dark"><i class="bi bi-chat-dots"></i>&nbsp;Messages</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-profile" class="nav-link text-dark"><i class="bi bi-person-circle"></i>&nbsp;Profil</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/logout" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i>&nbsp;Déconnexion</a>
            </li>
        <?php endif; ?>
    </ul>
    <hr>
</div>

<!-- Sidebar fixe desktop -->
<div class="d-none d-md-flex flex-column flex-shrink-0 p-3 bg-light"
    style="width: 250px; height: 100vh; position: fixed;">

    <ul class="nav nav-pills flex-column mb-auto">
        <?php if ($_SESSION["user"]["role"] == "user"): ?>
            <li class="nav-item">
                <a href="/Agencedevoyage/dashboard" class="nav-link text-dark"><i class="bi bi-speedometer2"></i>&nbsp;Tableau de bord</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/reservation" class="nav-link text-dark"><i class="bi bi-person-lines-fill"></i>&nbsp;Réservation</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/reservations" class="nav-link text-dark"><i class="bi bi-airplane-engines"></i>&nbsp;Vols</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/profile" class="nav-link text-dark"><i class="bi bi-person-circle"></i>&nbsp;Profil</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/logout" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i>&nbsp;Déconnexion</a>
            </li>
        <?php elseif ($_SESSION["user"]["role"] == "admin"): ?>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-dashboard" class="nav-link text-dark" aria-current="page"><i class="bi bi-speedometer2"></i>&nbsp;Tableau de bord</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-listUsers" class="nav-link text-dark"><i class="bi bi-person-lines-fill"></i>&nbsp;Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-listReservations" class="nav-link text-dark"><i class="bi bi-airplane-engines"></i>&nbsp;Vols</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-message" class="nav-link text-dark"><i class="bi bi-chat-dots"></i>&nbsp;Messages</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/admin-profile" class="nav-link text-dark"><i class="bi bi-person-circle"></i>&nbsp;Profil</a>
            </li>
            <li class="nav-item">
                <a href="/Agencedevoyage/logout" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i>&nbsp;Déconnexion</a>
            </li>
        <?php endif; ?>
</div>

<!-- Contenu principal -->
<div class="container" style="margin-left: 250px; padding: 20px;">
    <!-- Ton contenu ici -->
</div>