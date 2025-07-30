document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");
    const themeToggleBtn = document.querySelector(".theme-toggle");
    const LIGHT_BG = "#f8f9fa", LIGHT_COLOR = "#0d6efd";

    // 1. Ajoute la classe .active au lien correspondant à l'URL
    const currentURL = window.location.href;
    navLinks.forEach(link => {
        if (link.href === currentURL) {
            link.classList.add("active");
        }
    });

    // 2. Fonction pour appliquer les styles selon le mode
    function styleActiveLinks() {
        navLinks.forEach(link => {
            if (link.classList.contains("active")) {
                if (document.body.classList.contains("dark-mode")) {
                    link.style.backgroundColor = DARK_BG;
                    link.style.color = DARK_COLOR;
                } else {
                    link.style.backgroundColor = LIGHT_BG;
                    link.style.color = LIGHT_COLOR;
                }
                link.style.borderRadius = "0.25rem";
            } else {
                // réinitialise pour les liens non-actifs
                link.style.backgroundColor = "";
                link.style.color = "";
                link.style.borderRadius = "";
            }
        });
    }

    // 3. Applique immédiatement le style au chargement
    styleActiveLinks();

    // 4. Si tu as un bouton .theme-toggle, on gère le dark-mode et on réapplique
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener("click", function () {
            document.body.classList.toggle("dark-mode");
            styleActiveLinks();
        });
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (!form) return;

    const action = form.getAttribute("action");
    const errorBox = document.createElement("div");
    errorBox.classList.add("alert", "alert-danger", "mt-3");
    errorBox.style.display = "none";
    form.prepend(errorBox);

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        errorBox.innerHTML = "";
        errorBox.style.display = "none";
        let errors = [];

        const email = form.email?.value.trim();
        const password = form.motdepasse?.value;

        // Validation email 
        if (form.email && (!email || !email.match(/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/))) {
            errors.push("Adresse e-mail invalide.");
        }

        // Validation mot de passe 
        if (form.motdepasse && (!password || password.length === 0)) {
            errors.push("Le mot de passe est requis.");
        }

        // === INSCRIPTION ===
        const isRegister = action.includes("register") || form.name && form.confirmemotdepasse;
        if (isRegister) {
            const name = form.name?.value.trim();
            const prenoms = form.prenoms?.value.trim();
            const date = form.date?.value;
            const phone = form.phone?.value.trim();
            const image = form.image?.files[0];
            const confirmPassword = form.confirmemotdepasse?.value;

            if (!name || !name.match(/^[A-Z]{2,}$/)) {
                errors.push("Le nom est invalide ou trop court.");
            }

            if (!prenoms || !prenoms.match(/^[a-zÀ-ÿ\s\-']{2,}$/)) {
                errors.push("Les prénoms sont invalides ou trop courts.");
            }

            if (!date) {
                errors.push("Veuillez sélectionner une date de naissance.");
            }

            if (!phone || !phone.match(/^\+?\d{8,15}$/)) {
                errors.push("Numéro de téléphone invalide.");
            }

            if (!image) {
                errors.push("Veuillez choisir une photo de profil.");
            } else if (!image.type.startsWith("image/")) {
                errors.push("Le fichier sélectionné n'est pas une image.");
            }

            const specialChars = /[!@#$%^&*(),.?":{}|<>]/;
            if (password.length < 8) {
                errors.push("Le mot de passe doit contenir au moins 8 caractères.");
            } else if (!specialChars.test(password)) {
                errors.push("Le mot de passe doit contenir au moins un caractère spécial.");
            }

            if (password !== confirmPassword) {
                errors.push("Les mots de passe ne correspondent pas.");
            }
        }

        // === RÉSERVATION ===
        const isReservation = action.includes("reservation") || form.tarif;
        if (isReservation) {
            const name = form.name?.value.trim();
            const phone = form.phone?.value.trim();
            const departure = form.departure?.value.trim();
            const arrival = form.arrival?.value.trim();
            const date = form.date?.value;
            const tarif = form.tarif?.value.trim();

            if (!name || !name.match(/^[a-zA-ZÀ-ÿ\s\-']{2,}$/)) {
                errors.push("Le nom est invalide.");
            }

            if (!phone || !phone.match(/^\+?\d{8,15}$/)) {
                errors.push("Numéro de téléphone invalide.");
            }

            if (!departure) {
                errors.push("Lieu de départ requis.");
            }

            if (!arrival) {
                errors.push("Lieu d'arrivée requis.");
            }

            if (!date) {
                errors.push("Date de départ requise.");
            }

            if (!tarif || isNaN(tarif) || parseFloat(tarif) <= 0) {
                errors.push("Tarif invalide.");
            }
        }

        // === GESTION DES ERREURS ===
        if (errors.length > 0) {
            errors.forEach(msg => {
                const p = document.createElement("p");
                p.classList.add("mb-1");
                p.textContent = msg;
                errorBox.appendChild(p);
            });
            errorBox.style.display = "block";
            form.reset(); // Vide le formulaire
        } else {
            form.submit();
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
        const departure = document.getElementById("departure");
        const arrival = document.getElementById("arrival");
        const tarif = document.getElementById("tarif");

        // Tableau des prix selon les trajets
        const tarifs = {
            "Paris-Allemagne": 1500,
            "Paris-Egypte": 3000,
            "Allemagne-Paris": 1500,
            "Allemagne-Egypte": 2500,
            "Egypte-Paris": 3000,
            "Egypte-Allemagne": 2500
        };

        function updateTarif() {
            const dep = departure.value;
            const arr = arrival.value;

            if (dep && arr && dep !== arr) {
                const key = `${dep}-${arr}`;
                tarif.value = tarifs[key] !== undefined ? tarifs[key] : "Tarif non disponible";
            } else if (dep === arr && dep !== "") {
                tarif.value = "Trajet invalide";
            } else {
                tarif.value = "";
            }
        }

        departure.addEventListener("change", updateTarif);
        arrival.addEventListener("change", updateTarif);
    });
