<?php
// On initialise les dépendances
require './base.php';

// Si la session est démarée, on déconnecte l'utilisateur
if (isset($_SESSION['utilisateur_est_connecte'])) {
    // Détruire toutes les données de session
    session_destroy();

    // Rediriger vers la page de connexion ou autre destination
    header('Location: ./connexion.php?message=succes');
    exit;
}

?>