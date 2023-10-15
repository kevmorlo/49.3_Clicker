class RedirectionMonCompte {
    constructor() {
        this.bouton = document.getElementsById("Navbar_Bouton_compte");
        this.bouton.addEventListener("click", this.redirect.bind(this));
    }

    redirection() {
        window.location.href = "../../pages/profil.php"
    }
}

class RedirectionMesParties {
    constructor() {
        this.bouton = document.getElementsById("Navbar_Bouton_parties");
        this.bouton.addEventListener("click", this.redirect.bind(this));
    }

    redirection() {
        window.location.href = "../../pages/profil.php"
    }
}

class RedirectionDeconnexion {
    constructor() {
        this.bouton = document.getElementsById("Navbar_Bouton_deconnexion");
        this.bouton.addEventListener("click", this.redirect.bind(this));
    }

    redirection() {
        window.location.href = "../../pages/profil.php"
    }
}

class RedirectionConnexion {
    constructor() {
        this.bouton = document.getElementsById("Navbar_Bouton_connexion");
        this.bouton.addEventListener("click", this.redirect.bind(this));
    }

    redirection() {
        window.location.href = "../../pages/profil.php"
    }
}