<?php
function setDB() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        return null; // Retourne null en cas d'échec
    }
}
?>