## Projet airlineTravel

## 1-Architecture MVC du Projet
l'architecture de ce projet airlinetravel a une structure comme suit:

Agencedevoyage
    app
        Controllers
            AdminController.php
            AuthController.php
            ContactController.php
            HomeController.php
            ReservationController.php
            UserController.php
        Core
           Controller.php
           Database.php
           Model.php
           Router.php
        Models
            Contact.php
            Reservation.php
            User.php
        Views
            admin
                dashboard.php
                listReservations.php
                listUsers.php
                messages.php
                profile.php

            auth
                login.php
                register.php
            contact
                index.php
            errors
                404.php
            home
                about.php
                destinations.php
                index.php
                services.php
            layouts
                footer.php
                header.php
                scripts.js
                slide-bar.php
            reservation
                confirmation.php
                create.php
                index.php
            user
                dashboard.php
                profile.php
    config
        app.php
        database.php
    pages
        image
    uploads
    vendor
        composer
            autoload_classmap.php
            autoload_namespaces.php
            autoload_psr4.php
            autoload_real.php
            autoload_static.php
            ClassLoader.php
            installed.json
            installed.php
            InstalledVersions.php 
            LICENSE
        autoload.php
    gitignore
    .htaccess
    composer.json
    composer.lock
    index.php
    README.md
    styles.css
    travel.sql

## 2-Presentation des fonctionnalites:
        **Cote client:
 le client ou l'utilisateur simple a à sa portée la page d'accueil, de destination, de service, de contact, de connexion et d'incription.
    La page d'acceuil pour presenter airlinetravel 
    la page de destination pour presenter les destinations possible du voyageur lors de sont voyage
    la page service pour presenter les services de notre plateforme sans anbiguté
    la page de contact pour pouvoir permettre aux clients de poser des questions et recevoir des reponses
    la page de connexion pour je connecter et demander des services
    la page d'inscription pour s'inscrtire
        **Cote administrateur
 l'administrateur à accès à tous les requetes envoyer par le client pour le servir selon ses besoins