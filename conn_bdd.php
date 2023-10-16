<?php
class ConnectionBdd {
    private $dbh;

    public function __construct() {
        // On initialise les dépendances
        require "../vendor/autoload.php";

        $dotenv = \Dotenv\Dotenv::createMutable(__DIR__);
        $dotenv->load();

        // On configure PDO
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // On enregistre les identifiants dans des variables
        $hote = $_ENV['DB_HOST'];
        $bdd = $_ENV['DB_DATABASE'];
        $utilisateur = $_ENV['DB_USERNAME'];
        // On échappe les guillemets simples et doubles pour éviter 
        // de faire rater la requête
        $mdp = htmlspecialchars($_ENV['DB_PASSWORD'], ENT_QUOTES, 'UTF-8'); 
        $dsn = "mysql:host=$hote;dbname=$bdd";

        try {
            $this->dbh = new PDO($dsn, $utilisateur, $mdp, $options);
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