class Utilisateur {
    // On initialise notre classe
    constructor(nom, estConnecte) {
        this.nom = nom;
        this.estConnecte = estConnecte;
    }
}

let sauvegardeMultiplicateurs;

class Bonus {
    // On initialise notre classe
    constructor() {
        this.multiplicateurs = 1
        this.autoclickers = 0;
        this.clics = 0;
        this.raclement = 0;
        this.perlinpinpin = 0;
        this.notreProjet = 0;
        this.operation = "echec";
        this.nbDeClics = 1;
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
            this.clics = this.clics + this.nbDeClics * this.multiplicateurs;
            this.afficher49_3();
        });
    }

    logiqueAutoclic() {
        this.clics = this.clics + 1;
        this.afficher49_3();
    }

    // On gère l'autoclick 
    autoclick() {
        setInterval(this.logiqueAutoclic.bind(this), 1000/this.autoclickers);
    }

    // On gère l'autoclick 
    Raclement() {
        this.nbDeClics = 200;
        setTimeout(() => {
            this.nbDeClics = 1;
        }, 30000);
    }

    Perlinpinpin() {
        sauvegardeMultiplicateurs = this.multiplicateurs;
        this.multiplicateurs = this.multiplicateurs + 3;
        this.afficherMultiplicateurs();
        setTimeout(() => {
            this.multiplicateurs = sauvegardeMultiplicateurs;
        }, 30000);
    }

    NotreProjet() {
        sauvegardeMultiplicateurs = this.multiplicateurs;
        this.multiplicateurs = this.multiplicateurs + 6;
        this.afficherMultiplicateurs();
        setTimeout(() => {
            this.multiplicateurs = sauvegardeMultiplicateurs;
        }, 30000);
    }

    // On gère l'achat d'un bonus
    achat(montant) {
        if (montant <= this.clics) {
            this.clics -= montant;
            this.operation = "reussie";
        } else {
            this.operation = "echec";
        }
    }

    // On définit le montant et les effets du bonus Multiplicateur
    achatMultiplicateur() {
        let montant;
        montant = 50 * this.multiplicateurs;
        this.achat(montant);
        if (this.operation === "reussie") {
            this.multiplicateurs += 1;
            alert("Vous doublez votre nombre de clics, mme Borne serait très heureuse de posséder un tel bonus !");
            this.afficher49_3();
            this.afficherMultiplicateurs();
            this.operation = "echec";
        } else {
            alert("Vous n'avez pas assez \"engagé la responsabilité de votre gouvernement\" pour acheter cela !");
        }
    }

    // On définit le montant et les effets du bonus Autoclicker
    achatAutoclicker() {
        let montant = 200;
        if (this.autoclickers >= 1) {
            montant = 200 * this.autoclickers;
        }
        this.achat(montant);
        if (this.operation === "reussie") {
            this.autoclickers += 1;
            alert("Vous générez +1 clic par seconde, j'en connais qui seraient ravis que les 49.3 se génèrent tout seuls !");
            this.autoclick();
            this.afficher49_3();
            this.afficherAutoclickers();
            let son = new Audio('../../media/sfx/E.borne.ogg');
            son.play();
            son.addEventListener('ended', () => {
                son.pause();
                son.currentTime = 0;
            });
            this.operation = "echec";
        } else {
            alert("Vous n'avez pas assez \"engagé la responsabilité de votre gouvernement\" pour acheter cela");
        }
    }

    // On définit le montant et les effets du bonus Raclement
    achatRaclement() {
        let montant;
        montant = 18000;
        this.achat(montant);
        if (this.operation === "reussie") {
            this.raclement += 1;
            this.clics = this.clics + this.raclement;
            alert("Eric Zemmour se racle la gorge, cela booste votre productivité, chaque clic entrainera 200 49.3, la gauche n'a qu'a bien se tenir !");
            this.Raclement();
            this.afficher49_3();
            let son = new Audio('../../media/sfx/zemmourTousse.ogg');
            son.play();
            son.addEventListener('ended', () => {
                son.pause();
                son.currentTime = 0;
            });
            this.operation = "echec";
        } else {
            alert("Vous n'avez pas assez \"engagé la responsabilité de votre gouvernement\" pour acheter cela");
        }
    }

    // On définit le montant et les effets du bonus Perlinpinpin
    achatPerlinpinpin() {
        let montant = 100000;
        this.achat(montant);
        if (this.operation === "reussie") {
            this.perlinpinpin += 1;
            this.clics = this.clics * this.perlinpinpin;
            alert("La bêtise de vos opposants politiques vous débècte, pour parer à cela vous multipliez par 3 votre nombre de 49.3 pendant 30 secondes, Un rapport du GIEC? Ce ne sont même pas de vrais scientifiques !");
            this.Perlinpinpin();
            this.afficher49_3();
            let son = new Audio('../../media/sfx/perlin.ogg');
            son.play();
            son.addEventListener('ended', () => {
                son.pause();
                son.currentTime = 0;
            });
            this.operation = "echec";
        } else {
            alert("Vous n'avez pas assez \"engagé la responsabilité de votre gouvernement\" pour acheter cela");
        }
    }

    // On définit le montant et les effets du bonus Multiplicateur
    achatNotreProjet() {
        let montant = 350000;
        this.achat(montant);
        if (this.operation === "reussie") {
            this.notreProjet += 1;
            this.clics = this.clics * this.notreProjet;
            alert("\"PARCE QUE C'EST NOTRE PROJET\". Le discours d'E. Macron vous inspire, votre nombre total de 49.3 est multiplié par 6 pendant 30 secondes, les entreprises du CAC-40 vous remercient !");
            this.NotreProjet();
            this.afficher49_3();
            let son = new Audio('../../media/sfx/notreProjet.ogg');
            son.play();
            son.addEventListener('ended', () => {
                son.pause();
                son.currentTime = 0;
            });
            this.operation = "echec";
        } else {
            alert("Vous n'avez pas assez \"engagé la responsabilité de votre gouvernement\" pour acheter cela");
        }
    }

    // Lorsque l'utilisateur clique sur le bouton du multiplicateur, un audio se joue et on appelle la méthode achatMultiplicateur
    clicAutoclicker() {
        let boutonAutoclicker = document.getElementById('Bouton_autoclicker')
        boutonAutoclicker.addEventListener('click', () => {
            this.achatAutoclicker();
        });
    }
}

class Redirections {
    constructor() {
        window.addEventListener("load", () => {
            this.redirection();
        })
        this.params = new URLSearchParams(window.location.search);
        this.message = this.params.get("message");
    }

    redirection() {
        if (this.message === "succes") {
            alert("Opération réussie.");
        } else if (this.message === "erreur") {
            alert("Une erreur s'est produite.");
        } else if (this.message === "utilisateurExisteDeja") {
            alert("Ce nom d'utilisateur existe déjà.");
        } else if (this.message === "utilisateurIncorrect") {
            alert("Le nom d'utilisateur ou le mot de passe est incorrect.");
        }
    }
}
