<?php
// initialisation
require '../conn_bdd.php';

// Si aucune session n'est lancée, on en crée une
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Génère un jeton CSRF pour éviter les attaques CSRF et sécuriser les formulaires
if (!isset($jeton_csrf)) {
  $jeton_csrf = bin2hex(random_bytes(32));
}
?>

<!-- Affichage -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>49.3 Clicker</title>
  <link rel="shortcut icon" href="../media/img/49.3.png" type="image/x-icon">
  <link rel="stylesheet" href="../code/css/style.css">
</head>
<body>
  <input type="hidden" class="utilisateur_est_connecte" value="<?= $_SESSION['utilisateur_est_connecte'] ?>">
  <input type="hidden" class="jeton_csrf" value="<?= $jeton_csrf ?>">
  <nav class="Navbar">
    <img src="../media/img/49.3_clicker_banniere.png" alt="Logo de 49.3 Clicker" class="Banniere_img">
    <ul class="Navbar_boutons">
      <?php  if($_SESSION['utilisateur_est_connecte']) { // Si l'utilisateur est connecté, on affiche ces boutons ?>
      <li class="Navbar_liste">
        <a href="./profil.php" class="Navbar_bouton" id="Navbar_Bouton_compte">Mon compte</a>
      </li>
      <li class="Navbar_liste">
        <a href="./parties.php" class="Navbar_bouton" id="Navbar_Bouton_parties">Mes parties</a>
      </li>
      <li class="Navbar_liste">
       <a href="./deconnexion.php" class="Navbar_bouton" id="Navbar_Bouton_deconnexion">Se déconnecter</a>
      </li>
      <?php } else { // Sinon on affiche le bouton de connexion ?>
      <li class="Navbar_liste">
        <a href="./connexion.php" class="Navbar_bouton" id="Navbar_Bouton_connexion">Se connecter</a>
      </li>
      <?php } ?>
    </ul>
  </nav>
</body>