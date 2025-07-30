<!DOCTYPE html>
<html lang="fr/en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="avion (1).png">
    <title><?= $title ?? 'Airline Travel' ?></title>
    <link rel="stylesheet" href="/Agencedevoyage/app/Views/public/style.css">
    <script src='/Agencedevoyage/app/Views/public/scripts.js' defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light py-3 shadow-sm">
        <div class="container">
            <!-- Brand / Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/Agencedevoyage">
                <img src="avion (1).png" alt="Logo" width="30" height="30" class="me-2">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <span class="fw-bold">Admin&nbsp;Pannel</span>
                <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user'): ?>
                    <span class="fw-bold">User&nbsp;Pannel</span>
                <?php else: ?>
                    airline<span class="text-primary fw-bold">TRAVEL</span>
                <?php endif; ?>
            </a>

            <!-- Mobile burger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user'): ?>

                        <!-- User dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if (!empty($user['image']) && file_exists('uploads/' . $user['image'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($user['image']) ?>" alt="Profile"
                                        class="rounded-circle me-2 profile-image" width="40" height="40">
                                <?php else: ?>
                                    <img src="images/default-profile.png" alt="Default profile"
                                        class="rounded-circle me-2 profile-image" width="40" height="40">
                                <?php endif; ?>
                                <span><?= htmlspecialchars($user['nom']) . ' ' .
                                    htmlspecialchars($user['prenoms']) ?></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="/Agencedevoyage/dashboard"><i
                                            class="bi bi-speedometer2"></i>&nbsp;Tableau de bord</a></li>
                                <li><a class="dropdown-item" href="/Agencedevoyage/profile"><i
                                            class="bi bi-person-circle"></i>&nbsp;Profil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="/Agencedevoyage/logout"><i
                                            class="bi bi-box-arrow-right"></i>&nbsp;Deconnexion</a></li>
                            </ul>
                        </li>
                    <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>

                        <!-- User dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if (!empty($user['image']) && file_exists('uploads/' . $user['image'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($user['image']) ?>" alt="Profile"
                                        class="rounded-circle me-2 profile-image" width="40" height="40">
                                <?php else: ?>
                                    <img src="images/default-profile.png" alt="Default profile"
                                        class="rounded-circle me-2 profile-image" width="40" height="40">
                                <?php endif; ?>
                                <span><?= htmlspecialchars($user['nom']) . ' ' .
                                    htmlspecialchars($user['prenoms']) ?></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="/Agencedevoyage/admin-dashboard"><i
                                            class="bi bi-speedometer2"></i>&nbsp;Tableau de bord</a></li>
                                <li><a class="dropdown-item" href="/Agencedevoyage/admin-profile"><i
                                            class="bi bi-person-circle"></i>&nbsp;Profil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="/Agencedevoyage/logout"><i
                                            class="bi bi-box-arrow-right"></i>&nbsp;Deconnexion</a></li>
                            </ul>
                        </li>


                    <?php else: ?>

                        <!-- Public pages -->
                        <li class="nav-item"><a class="nav-link " href="/Agencedevoyage">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link " href="/Agencedevoyage/destinations">Destinations</a></li>
                        <li class="nav-item"><a class="nav-link " href="/Agencedevoyage/services">Services</a></li>
                        <li class="nav-item"><a class="nav-link " href="/Agencedevoyage/contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link " href="/Agencedevoyage/login">Connectez‑vous</a>
                        </li>

                        <!-- CTA button looks better as a real button -->
                        <li class="nav-item">
                            <a class="btn btn-primary ms-lg-2" href="/Agencedevoyage/register">S'inscrire</a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>

    <body>