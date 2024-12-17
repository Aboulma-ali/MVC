<?php
require_once("models/db.php");
function getAllUsers($bdd) {
    $stmt = $bdd->prepare("SELECT * FROM users");
    $stmt->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function addUser($nom, $prenom, $email, $mot_de_passe) {
    $bdd = setDB(); 
    if ($bdd) { 
        $req = $bdd->prepare("INSERT INTO users(nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
        $req->execute([$nom, $prenom, $email, $mot_de_passe]);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}

function deletes( $id) {
    $bdd = setDB();
    try {
        $req = $bdd->prepare("DELETE FROM users WHERE id=?");
        $req->execute([$id]);
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }
}

function getById($id) {
    $bdd = setDB();
    $stmt = $bdd->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($bdd, $id, $nom, $prenom, $email) {
        $req = $bdd->prepare("UPDATE users SET nom=?, prenom=?, email=? WHERE id=?");
        $result = $req->execute([$nom, $prenom, $email, $id]);
}
?>

