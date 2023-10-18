<?php
require './base.php';
?>

<body>
    <form action="" method="post" class="Formulaire" id="Formulaire_parties">
        <h1 class="Formulaire_h1">Mes parties</h1>
        <div class="Conteneur">
            <div class="Champ_de_saisie" id="Cds_partie">
                <p class="Champ_de_saisie_titre">Partie 1</p>
                <input type="text" name="Partie_1" class="Champ_de_saisie_input" id="Desactive">
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
                <input type="text" name="Partie_2" class="Champ_de_saisie_input" id="Desactive">
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
                <input type="text" name="Partie_3" class="Champ_de_saisie_input" id="Desactive">
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