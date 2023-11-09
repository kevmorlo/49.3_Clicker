<?php
// On initialise les dépendances
require './base.php';

// ---=== Partie Affichage ===---
?>

<body>
    <div action="" class="Formulaire" id="Formulaire_parties">
        <h1 class="Formulaire_h1">Mes parties</h1>
        <form method="post" class="Conteneur">
            <input type="hidden" name="numero_partie" value="1">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 1</p>
                <input type="text" name="Partie_1" placeholder="Cliquez sur jouer pour créer une partie" <?php if (defined('SCORE_PARTIE_1')) { ?> value="Score : <?= SCORE_PARTIE_1 ?> Multiplicateurs : <?= MULTI_PARTIE_1 ?> Autoclickers : <?= AUTO_PARTIE_1 ?>"  <?php } ?> class="Champ_de_saisie_input" disabled>
            </div>
            <div class="Valider">
                <input type="submit" value="Jouer" name="bouton_jouer_1" class="Valider_bouton">
            </div>
            <button type="button" name="supp_1" class="Formulaire_supprimer">
                <img src="../../media/img/supprimer.svg" alt="supprimer la partie 1">
            </button>
        </form>
        <form method="post" class="Conteneur">
            <input type="hidden" name="numero_partie" value="2">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 2</p>
                <input type="text" name="Partie_2" placeholder="Cliquez sur jouer pour créer une partie" <?php if (defined('SCORE_PARTIE_1')) { ?> value="Score : <?= SCORE_PARTIE_2 ?> Multiplicateurs : <?= MULTI_PARTIE_2 ?> Autoclickers : <?= AUTO_PARTIE_2 ?>"  <?php } ?> class="Champ_de_saisie_input" disabled>
            </div>
            <div class="Valider">
                <input type="submit" value="Jouer" name="bouton_jouer_2" class="Valider_bouton">
            </div>
            <button type="button" name="supp_2" class="Formulaire_supprimer">
                <img src="../../media/img/supprimer.svg" alt="supprimer la partie 2">
            </button>
        </form>
        <form method="post" class="Conteneur">
            <input type="hidden" name="numero_partie" value="3">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 3</p>
                <input type="text" name="Partie_3" placeholder="Cliquez sur jouer pour créer une partie" <?php if (defined('SCORE_PARTIE_1')) { ?> value="Score : <?= SCORE_PARTIE_3 ?> Multiplicateurs : <?= MULTI_PARTIE_3 ?> Autoclickers : <?= AUTO_PARTIE_3 ?>"  <?php } ?> class="Champ_de_saisie_input" disabled>
            </div>
            <div class="Valider">
                <input type="submit" value="Jouer" name="bouton_jouer_3" class="Valider_bouton">
            </div>
            <button type="button" name="supp_3" class="Formulaire_supprimer">
                <img src="../../media/img/supprimer.svg" alt="supprimer la partie 3">
            </button>
        </form>
    </div>
</body>

<?php 
// Partie logique

// On prends les infos des parties de l'utilisateur connecté
define('NOM_UTILISATEUR', $_SESSION['nom']);
$sth = $dbh->prepare("SELECT u.id, u.nom FROM `utilisateurs` u WHERE u.nom = :nom;");
$traitement = $sth->execute([':nom' => NOM_UTILISATEUR]);
$resultat = $sth->fetchAll();
$_SESSION['id_utilisateur'] = $resultat[0]["id"];
define('ID_UTILISATEUR', $_SESSION['id_utilisateur']);

// On charge les données des parties enregistrées
$sth = $dbh->prepare("SELECT p.id, p.score, p.multiplicateurs, p.autoclickers FROM `parties` p JOIN parties_utilisateur p_u ON p.id = p_u.parties_id WHERE p_u.id = :id_utilisateur;");
$traitement = $sth->execute([':id_utilisateur' => ID_UTILISATEUR]);
$resultat = $sth->fetchAll();

// Si la requête nous retourne un résultat,
if ($sth->rowCount() > 0) {
    // On enregistre le résultat de notre requête dans des constantes en fonction du nombre de parties créées
    define('SCORE_PARTIE_1', $resultat[0]["score"]);
    define('MULTI_PARTIE_1', $resultat[0]["multiplicateurs"]);
    define('AUTO_PARTIE_1', $resultat[0]["autoclickers"]);
    if ($sth->rowCount() > 1) {
        define('SCORE_PARTIE_2', $resultat[1]["score"]);
        define('MULTI_PARTIE_2', $resultat[1]["multiplicateurs"]);
        define('AUTO_PARTIE_2', $resultat[1]["autoclickers"]);
        if ($sth->rowCount() > 2) {
            define('SCORE_PARTIE_3', $resultat[2]["score"]);
            define('MULTI_PARTIE_3', $resultat[2]["multiplicateurs"]);
            define('AUTO_PARTIE_3', $resultat[2]["autoclickers"]);
        }
    }
}

// On attends que le joueur clique sur le bouton jouer
if (!empty($_POST)) {
    $sth = $dbh->prepare("SELECT p.id, p.score, p.multiplicateurs, p.autoclickers FROM `parties` p JOIN parties_utilisateur p_u ON p.id = p_u.parties_id WHERE p_u.id = :numero_partie;");
    $sth->execute([':numero_partie' => $_POST['numero_partie']]);
    $resultat = $sth->fetchAll();
    if ($sth->rowCount() > 0) {
        // On récupère les valeurs de la partie
        $_SESSION['numero_partie'] = $_POST['numero_partie'];
        $_SESSION['id_partie'] = $resultat[0]["id"];
        $_SESSION['score'] = $resultat[0]["score"];
        $_SESSION['multiplicateurs'] = $resultat[0]["multiplicateurs"];
        $_SESSION['autoclickers'] = $resultat[0]["autoclickers"];
        header('Location: ./clicker.php?message=succes');
    } else {
        // On crée une nouvelle partie
        $sth = $dbh->prepare("INSERT INTO `parties` (score, multiplicateurs, autoclickers) VALUES(0, 0, 0);");
        $traitement = $sth->execute();
        if (!$traitement) {
            header('Location: ./parties.php?message=erreur');
        } else {
            $id_partie = $dbh->lastInsertId();
            $sth = $dbh->prepare("INSERT INTO `parties_utilisateur` (parties_id, utilisateurs_id) VALUES(:id_partie, :id_utilisateur);");
            $traitement = $sth->execute([':id_partie' => $id_partie, ':id_utilisateur' => ID_UTILISATEUR]);
            if ($traitement) {
            $_SESSION['numero_partie'] = $_POST['numero_partie'];
            $_SESSION['id_partie'] = $id_partie;
            $_SESSION['score'] = 0;
            $_SESSION['multiplicateurs'] = 0;
            $_SESSION['autoclickers'] = 0;
            header('Location: ./clicker.php?message=succes');
            } else {
                header('Location: ./parties.php?message=erreur');
            }
        }
    }
}
?>