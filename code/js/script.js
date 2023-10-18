class Utilisateur {
    // On initialise notre classe
    constructor(nom, estConnecte) {
        this.nom = nom;
        this.estConnecte = estConnecte;
    }
}

class Bonus {
    // On initialise notre classe
    constructor() {
        this.multiplicateurs = 0;
        this.autoclickers = 0;
        this.clics = 0;
        this.raclement = 0;
        this.perlinpinpin = 0;
        this.notreProjet = 0;
    }

    // On affiche le nombre de clics enregistrés dans clics
    afficher49_3() {
        let balise = document.getElementById("Compteur_clicker");
        balise.textContent = this.clics;
    }

    // On affiche le nombre de clics enregistrés dans clics
    afficherMultiplicateurs() {
        let balise = document.getElementById("Compteur_multi");
        balise.textContent = this.multiplicateurs;
    }

    // On affiche le nombre d'autoclickers enregistrés dans autoclickers
    afficherAutoclickers() {
        let balise = document.getElementById("Compteur_autoclic");
        balise.textContent = this.autoclickers;
    }

    incrementer49_3() {
        let clickerBouton = document.querySelector('.Clicker_bouton');
        clickerBouton.addEventListener('click', () => {
            this.clics = this.clics + 1 + this.raclement * this.multiplicateurs;
        })
    }
}

class Animations {
    // On anime notre clicker lorsqu'on clique dessus
    animerClic() {
        let clickerBouton = document.querySelector('.Clicker_bouton');
        clickerBouton.addEventListener('click', () => {
            clickerBouton.classList.add('clique');
            setTimeout(() => {
                clickerBouton.classList.remove('clique');
            }, 700);
        });
    }
}
