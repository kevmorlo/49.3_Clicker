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

    // Lors d'un clic, on effectue une animation et on incrémente les 49.3
    clic() {
        let clickerBouton = document.querySelector('.Clicker_bouton');
        clickerBouton.addEventListener('click', () => {
            clickerBouton.classList.add('clique');
            setTimeout(() => {
                clickerBouton.classList.remove('clique');
            }, 700);
            this.clics = this.clics + 1 + this.raclement * this.multiplicateurs * this.perlinpinpin * this.notreProjet;
            this.afficher49_3();
        });
    }

    achat(montant) {
        if(montant > this.clics) {
            console.log("Vous n'avez pas assez \"engagé la responsabilité de votre gouvernement\" pour acheter cela")
        } else {
            this.clics -= montant;
        }
    }

    achatMultiplicateur() {
        let montant = 50 * this.multiplicateurs;
        let operation = this.achat(montant);
        if(operation) {
            this.multiplicateurs += 1;
            console.log("Vous doublez votre nombre de clics, mme Borne serait très heureuse de posséder un tel bonus !")
        }
    }

    achatAutoclicker() {
        let montant = 200 * this.autoclickers;
        let operation = this.achat(montant);
        if(operation) {
            this.autoclickers += 1;
            console.log("Vous générez +1 clic par seconde, j'en connais qui seraient ravis que les 49.3 se génèrent tout seuls !")
        }
    }
}
