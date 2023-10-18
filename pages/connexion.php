<?php
// On initialise les dépendances
require './base.php';

// Traitement du formulaire
if (!empty($_POST)) {
    // Vérifie que l'utilisateur possède le bon jeton CSRF
    // if ($jeton_csrf !== $_POST['jeton_csrf']) {
    //     die('Erreur: Jeton CSRF invalide');
    // } else {
        // On récupère les infos du formulaire en hashant avec bCrypt le mot de passe
        $nom = $_POST["Utilisateur"];
        $mdp = password_hash($_POST["Mdp"], PASSWORD_DEFAULT);
    // }
    // Si le nom ne comporte pas de charactères spéciaux
    if (preg_match('/^[a-zA-Z0-9]*$/', $nom)) {
        // On effectue la requête SQL qui recherche le nom d'utilisateur associé au mot de passe renseignés
        $sth = $dbh->prepare("SELECT nom, mdp FROM Utilisateurs WHERE nom = :nom AND mdp = :mdp");
        $traitement = $sth->execute(['nom' => $nom, 'mdp' => $mdp]);
        if($traitement){
            $sth->fetchAll();
            // Si on obtien un résultat
            if($sth->rowCount() == 1) {
                // On enregistre le nom d'utilisateur dans une session et on redirige vers "mes parties"
                $_SESSION = array();
                $_SESSION['nom'] = $nom;
                $_SESSION['utilisateur_est_connecte'] = "true";
                header('Location: ./parties.php');
            }
        } else {
            // En cas d'erreur on affiche les détails du plantage
            print_r($sth->errorInfo());
        }
    }
}

?>

<!-- Partie Affichage -->
<body>
    <form action="" method="post" class="Formulaire">
        <input type="hidden" name="jeton_csrf" value="<?= $jeton_csrf ?>">
        <h1 class="Formulaire_h1">Se connecter</h1>
        <div class="Champ_de_saisie" id="Cds_utilisateur">
            <p class="Champ_de_saisie_titre">Nom d'utilisateur</p>
            <input type="text" name="Utilisateur" class="Champ_de_saisie_input" required>
        </div>
        <div class="Champ_de_saisie" id="Cds_mdp">
            <p class="Champ_de_saisie_titre">Mot de passe</p>
            <input type="password" name="Mdp" class="Champ_de_saisie_input" required>
        </div>
        <div class="Valider">
            <input type="submit" value="Se connecter" class="Valider_bouton">
        </div>
        <a href="./creation.php" class="Formulaire_a">Vous n'avez pas de compte ?</a>
    </form>
</body>