<?php

require_once("models/db.php");


function getAllcategories($bdd) {
    try {
        $stmt = $bdd->prepare("SELECT * FROM categories");
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}

function add($bdd, $libelle) {
    if (empty($libelle)) {
        echo "Le libellé est requis.";
        return false;
    }

    try {
        $req = $bdd->prepare("INSERT INTO categories(libelle) VALUES (?)");
        $req->execute([$libelle]);
        return true;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

function deletes( $id) {
    $bdd = setDB();
    try {
        $req = $bdd->prepare("DELETE FROM categories WHERE id=?");
        $req->execute([$id]);
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }
}

function updateCate($bdd, $id, $libelle) {
    if (!is_numeric($id) || empty($libelle)) {
        echo "Données invalides.";
        return false;
    }

    try {
        $req = $bdd->prepare("UPDATE categories SET libelle=? WHERE id=?");
        $req->execute([$libelle, $id]); 
        return true;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


function getById($bdd, $id) {
    if (!is_numeric($id)) {
        echo "ID invalide.";
        return null;
    }

    try {
        $stmt = $bdd->prepare("SELECT * FROM categories WHERE id=?");
        $stmt->execute([$id]); 
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}
?>