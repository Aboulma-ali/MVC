<?php

require_once("models/db.php");

function getAllProducts($bdd) {
    $stmt = $bdd->prepare("SELECT p.*, c.libelle AS categories FROM products p LEFT JOIN categories c ON p.idcat = c.id");
    $stmt->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function add($nom, $description, $prix, $quantite,$libelle) {
    $bdd = setDB(); 
    if ($bdd) { 
        $req = $bdd->prepare("INSERT INTO products(nom, description, prix, quantité,idcat) VALUES (?, ?, ?, ?,?)");
        $req->execute([$nom, $description, $prix, $quantite,$libelle]);
    } else {
       
        echo "Erreur de connexion à la base de données.";
    }
}

function updatePro($id, $nom, $description, $prix, $quantite) {
    $bdd = setDB();
        $req = $bdd->prepare("UPDATE products SET nom=?, description=?, prix=?, quantité=? WHERE id=?");
        $req->execute([$nom, $description, $prix, $quantite, $id]);
}

function getById($id) {
    $bdd = setDB();
    $stmt = $bdd->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deletes( $id) {
    $bdd = setDB();
    try {
        $req = $bdd->prepare("DELETE FROM products WHERE id=?");
        $req->execute([$id]);
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }
}
