<?php
class ConnectionBdd {
    private $dbh;

    public function __construct() {
        // On inclue le fichier .env contenant les identifiants
        require '../../.env';
        require 'vendor/autoload.php';

        // On configure PDO
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // On enregistre les identifiants dans des constantes
        define("HOTE", $_ENV['DB_HOST']);
        define("BDD", $_ENV['DB_DATABASE']);
        define("UTILISATEUR", $_ENV['DB_USERNAME']);
        define("MDP", $_ENV['DB_PASSWORD']);

        $dsn = "mysql:host=" . HOTE . ";dbname=" . BDD;

        try {
            $this->dbh = new PDO($dsn, UTILISATEUR, MDP, $options);
        } catch (PDOException $erreur) {
            echo "Erreur de connexion : " . $erreur->getMessage();
        }
    }

    public function recupDbh() {
        return $this->dbh;
    }
}

// On utilise la classe
$bdd = new ConnectionBdd();
$dbh = $bdd->recupDbh();
?>