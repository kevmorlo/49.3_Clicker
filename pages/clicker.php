<?php
// On inclue les dépendances
require './base.php';

// ----==== Partie Affichage ====----
?>

<body>
  <div class="Page_conteneur">
    <div class="Bonus_actifs">
      <div class="Bonus_conteneur" title="Multiplicateurs actifs">
        <img src="../../media/img/2x.svg" alt="Multiplicateurs actifs" class="Bonus_actifs_icone">
        <p class="Compteur" id="Compteur_multi">
        </p>
      </div>
      <div class="Bonus_conteneur" title="Autoclickers actifs">
        <img src="../../media/img/parametres.svg" alt="Autoclickers actifs" class="Bonus_actifs_icone">
        <p class="Compteur" id="Compteur_autoclic">
        </p>
      </div>
    </div>
    <div class="Clicker_conteneur">
      <button class="Clicker_bouton">
        <img src="../../media/img/49.3.png" alt="Cliquez ici" class="Clicker_img">
        <p class="Compteur" id="Compteur_clicker">
        </p>
      </button>
      <div class="Boutique">
        <div class="Boutique_titre">
          <img src="../../media/img/boutique.svg" alt="Boutique" class="Boutique_titre_img">
          <p class="Boutique_titre_texte">Boutique</p>
        </div>
        <div class="Boutique_bonus">
          <div class="Bonus_classiques">
            <p class="Bonus_titre">Bonus classiques</p>
            <div class="Bonus_boutons_conteneur">
              <button type="button" class="Bonus_bouton" id="Bouton_multiplicateur">
                <img src="../../media/img/2x.svg" alt="Multiplicateur" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Multiplicateur</p>
              </button>
              <button type="button" class="Bonus_bouton" id="Bouton_autoclicker">
                <img src="../../media/img/parametres.svg" alt="Autoclicker" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Autoclicker</p>
              </button>
            </div>
          </div>
          <div class="Bonus_spécifiques">
            <p class="Bonus_titre">Bonus spécifiques</p>
            <div class="Bonus_boutons_conteneur">
              <button type="button" class="Bonus_bouton" id="Bouton_raclement">
                <img src="../../media/img/virus.svg" alt="Autoclicker" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Râclement</p>
              </button>
              <button type="button" class="Bonus_bouton" id="Bouton_perlinpinpin">
                <img src="../../media/img/person.svg" alt="Autoclicker" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Perlinpinpin</p>
              </button>
              <button type="button" class="Bonus_bouton" id="Bouton_notre_projet">
                <img src="../../media/img/accessibilite.svg" alt="Autoclicker" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Notre projet</p>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  let bonus = new Bonus();
  bonus.clic();
  bonus.afficherMultiplicateurs();
  bonus.afficherAutoclickers();
  bonus.afficher49_3();
  bonus.clicAutoclicker();

  const multiplicateur = document.querySelector("#Bouton_multiplicateur");
  multiplicateur.onclick = () => {
    bonus.achatMultiplicateur();
  }

  const autoclicker = document.querySelector("#Bouton_autoclicker");
  autoclicker.onclick = () => {
    bonus.achatAutoclicker();
  }
  
  const raclement = document.querySelector("#Bouton_raclement");
  raclement.onclick = () => {
    bonus.achatRaclement();
  }

  const perlinpinpin = document.querySelector("#Bouton_perlinpinpin");
  perlinpinpin.onclick = () => {
    bonus.achatPerlinpinpin();
  }

  const notreProjet = document.querySelector("#Bouton_notre_projet");
  notreProjet.onclick = () => {
    bonus.achatNotreProjet();
  }
</script> 

<?php 
// ----==== Partie logique ====----

// On récupère les infos de la partie
if (!empty($_POST)) {
  $score = $_POST['score'];
  $multiplicateurs = $_POST['multiplicateurs'];
  $autoclickers = $_POST['autoclickers'];
} else {
  $score = $_SESSION['score'];
  $multiplicateurs = $_SESSION['multiplicateurs'];
  $autoclickers = $_SESSION['autoclickers'];
}

// Gestion de la sauvegarde
$sth = $dbh->prepare("UPDATE `parties` SET score = :score, multiplicateurs = :multiplicateurs, autoclickers = :autoclickers WHERE id = :id_partie;");
$sth->execute([
  'score' => $score, 
  'multiplicateurs' => $multiplicateurs, 
  'autoclickers' => $autoclickers, 
  'id_partie' => $_SESSION['id_partie']
]);