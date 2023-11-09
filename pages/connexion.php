<?php
// On initialise les dépendances
require './base.php';

// Partie Affichage
?>

<body>
    <form action="" method="post" class="Formulaire">
        <input type="hidden" name="jeton_csrf" value="<?= $_SESSION['jeton_csrf'] ?>">
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

<?php
// Partie logique

// Traitement du formulaire
if (!empty($_POST)) {
    // Vérifie que l'utilisateur possède le bon jeton CSRF
    // if ($_SESSION['jeton_csrf'] !== $_POST['jeton_csrf']) {
    //     var_dump($_SESSION['jeton_csrf']);
    //     var_dump($_POST['jeton_csrf']);
    //     die('Erreur: Jeton CSRF invalide');
    // } else {
        // On récupère les infos du formulaire en hashant avec bCrypt le mot de passe
        $nom = $_POST["Utilisateur"];
        $mdp = $_POST["Mdp"];
    // }
    // Si le nom ne comporte pas de charactères spéciaux
    if (preg_match('/^[a-zA-Z0-9]*$/', $nom)) {
        // On effectue la requête SQL qui recherche le nom d'utilisateur renseigné
        $sth = $dbh->prepare("SELECT nom, mdp FROM Utilisateurs WHERE nom = :nom");
        $traitement = $sth->execute([':nom' => $nom]);
        if($traitement){
            $resultat = $sth->fetchAll();
            // Si on obtien un résultat
            if ($sth->rowCount() == 1) {
                $hash = $resultat[0]["mdp"];
                if (password_verify($mdp, $hash)) {
                    // On enregistre le nom d'utilisateur dans une session et on redirige vers "mes parties"
                    $_SESSION = array();
                    $_SESSION['nom'] = $nom;
                    $_SESSION['utilisateur_est_connecte'] = "true";
                    header('Location: ./parties.php?message=succes');
                } else {
                    header('Location: ./connexion.php?message=utilisateurIncorrect');
                }
            } else {
                header('Location: ./connexion.php?message=utilisateurIncorrect');
            }
        } else {
            // En cas d'erreur on affiche les détails du plantage
            print_r($sth->errorInfo());
        }
    }
}
?>