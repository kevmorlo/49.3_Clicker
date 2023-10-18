<?php
include './base.php';
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
              <button type="button" class="Bonus_bouton">
                <img src="../../media/img/2x.svg" alt="Multiplicateur" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Multiplicateur</p>
              </button>
              <button type="button" class="Bonus_bouton">
                <img src="../../media/img/parametres.svg" alt="Autoclicker" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Autoclicker</p>
              </button>
            </div>
          </div>
          <div class="Bonus_spécifiques">
            <p class="Bonus_titre">Bonus spécifiques</p>
            <div class="Bonus_boutons_conteneur">
              <button type="button" class="Bonus_bouton" class="Bonus_bouton_img">
                <img src="../../media/img/virus.svg" alt="Autoclicker">
                <p class="Bonus_bouton_titre">Râclement</p>
              </button>
              <button type="button" class="Bonus_bouton">
                <img src="../../media/img/person.svg" alt="Autoclicker" class="Bonus_bouton_img">
                <p class="Bonus_bouton_titre">Perlinpinpin</p>
              </button>
              <button type="button" class="Bonus_bouton">
                <img src="../../media/img/accessibilite.svg" alt="Autoclicker">
                <p class="Bonus_bouton_titre" class="Bonus_bouton_img">Notre projet</p>
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
</script>