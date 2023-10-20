<?php
// On initialise les dépendances
require './base.php';

// On prends les infos des parties de l'utilisateur connecté
define('NOM_UTILISATEUR', $_SESSION['nom']);
$sth = $dbh->prepare("SELECT u.nom, p.score, p.multiplicateurs, p.autoclickers FROM `parties` p JOIN parties_utilisateur p_u ON p.id = p_u.parties_id JOIN utilisateurs u ON p_u.utilisateurs_id = u.id WHERE u.nom = :nom;");
$sth->execute([':nom' => NOM_UTILISATEUR]);
$resultat = $sth->fetchAll();

// Si la requête nous retourne un résultat,
if ($sth->rowCount() > 0) {
    // On enregistre le résultat de notre requête dans des constantes
    define('SCORE_PARTIE_1', $resultat[0]["p.score"]);
    define('MULTI_PARTIE_1', $resultat[0]["p.multiplicateurs"]);
    define('AUTO_PARTIE_1', $resultat[0]["p.autoclickers"]);
    if ($sth->rowCount() > 1) {
        define('SCORE_PARTIE_2', $resultat[1]["p.score"]);
        define('MULTI_PARTIE_2', $resultat[1]["p.multiplicateurs"]);
        define('AUTO_PARTIE_2', $resultat[1]["p.autoclickers"]);
        if ($sth->rowCount() > 2) {
            define('SCORE_PARTIE_3', $resultat[2]["p.score"]);
            define('MULTI_PARTIE_3', $resultat[2]["p.multiplicateurs"]);
            define('AUTO_PARTIE_3', $resultat[2]["p.autoclickers"]);
        }
    }
}
// ---=== Partie Affichage ===---
?>

<body>
    <form action="" method="post" class="Formulaire" id="Formulaire_parties">
        <h1 class="Formulaire_h1">Mes parties</h1>
        <div class="Conteneur">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 1</p>
                <input type="text" name="Partie_1" placeholder="Cliquez sur jouer pour créer une partie" <?php if (defined('SCORE_PARTIE_1')) { ?> value="Score : <?= SCORE_PARTIE_1 ?> Multiplicateurs : <?= MULTI_PARTIE_1 ?> Autoclickers : <?= AUTO_PARTIE_1 ?>"  <?php } ?> class="Champ_de_saisie_input" id="Desactive">
            </div>
            <div class="Valider">
                <input type="submit" value="Jouer" class="Valider_bouton">
            </div>
            <button type="button" class="Formulaire_supprimer">
                <img src="../../media/img/supprimer.svg" alt="supprimer la partie 1">
            </button>
        </div>
        <div class="Conteneur">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 2</p>
                <input type="text" name="Partie_2" placeholder="Cliquez sur jouer pour créer une partie" <?php if (defined('SCORE_PARTIE_1')) { ?> value="Score : <?= SCORE_PARTIE_2 ?> Multiplicateurs : <?= MULTI_PARTIE_2 ?> Autoclickers : <?= AUTO_PARTIE_2 ?>"  <?php } ?> class="Champ_de_saisie_input" id="Desactive">
            </div>
            <div class="Valider">
                <input type="submit" value="Jouer" class="Valider_bouton">
            </div>
            <button type="button" class="Formulaire_supprimer">
                <img src="../../media/img/supprimer.svg" alt="supprimer la partie 2">
            </button>
        </div>
        <div class="Conteneur">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 3</p>
                <input type="text" name="Partie_3" placeholder="Cliquez sur jouer pour créer une partie" <?php if (defined('SCORE_PARTIE_1')) { ?> value="Score : <?= SCORE_PARTIE_3 ?> Multiplicateurs : <?= MULTI_PARTIE_3 ?> Autoclickers : <?= AUTO_PARTIE_3 ?>"  <?php } ?> class="Champ_de_saisie_input" id="Desactive">
            </div>
            <div class="Valider">
                <input type="submit" value="Jouer" class="Valider_bouton">
            </div>
            <button type="button" class="Formulaire_supprimer">
                <img src="../../media/img/supprimer.svg" alt="supprimer la partie 3">
            </button>
        </div>
    </form>
</body>