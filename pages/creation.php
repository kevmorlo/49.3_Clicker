<?php
// On inclue les dépendances
require './base.php';

// Traitement du formulaire
if (!empty($_POST)) {
    // Vérifie que l'utilisateur possède le bon jeton CSRF
    // if ($jeton_csrf !== $_POST['jeton_csrf']) {
    //     die('Erreur: Jeton CSRF invalide');
    // } else {
        // On récupère les infos du formulaire en hashant avec bCrypt le mot de passe
        $nom = $_POST["Utilisateur"];
        $mail = $_POST['Mail'];
        $mdp = password_hash($_POST["Mdp"], PASSWORD_DEFAULT);
    // }
    // Si le nom ne comporte pas de charactères spéciaux
    if (preg_match('/^[a-zA-Z0-9]*$/', $nom)) {
        // On effectue la requête SQL qui recherche le nom d'utilisateur associé au mot de passe renseignés
        $sth = $dbh->prepare("SELECT nom, mdp, email FROM Utilisateurs WHERE nom = :nom AND mdp = :mdp AND email = :email");
        $traitement = $sth->execute([':nom' => $nom, ':mdp' => $mdp, ':email' => $mail]);
        if($traitement) {
           $sth->fetchAll();
            // Si on n'obtien aucun résultat
            if($sth->rowCount() == 0) {
                // On effectue la requête SQL qui vient insérer les données dans la table utilisateur
                $sth = $dbh->prepare("INSERT INTO Utilisateurs (nom, email, mdp) VALUES(:nom, :email, :mdp);");
                $traitement = $sth->execute([':nom' => $nom, ':email' => $mail, ':mdp' => $mdp]);
                if(!$traitement) {
                    header('Location: ./connexion.php?message=erreur');
                } else {
                    header('Location: ./connexion.php?message=succes');
                }
            } else {
                header('Location: ./connexion.php?message=utilisateurExisteDeja');
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
        <h1 class="Formulaire_h1">Créer un compte</h1>
        <div class="Champ_de_saisie" id="Cds_utilisateur">
            <p class="Champ_de_saisie_titre">Nom d'utilisateur</p>
            <input type="text" name="Utilisateur" class="Champ_de_saisie_input" required>
        </div>
        <div class="Champ_de_saisie" id="Cds_email">
            <p class="Champ_de_saisie_titre">Adresse mail</p>
            <input type="email" name="Mail" class="Champ_de_saisie_input">
        </div>
        <div class="Champ_de_saisie" id="Cds_mdp">
            <p class="Champ_de_saisie_titre">Mot de passe</p>
            <input type="password" name="Mdp" class="Champ_de_saisie_input" required>
        </div>
        <div class="Valider">
            <input type="submit" value="Créer un compte" class="Valider_bouton">
        </div>
        <a href="./connexion.php" class="Formulaire_a">Vous avez déjà un compte ?</a>
    </form>
</body>