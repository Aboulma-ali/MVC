<?php
require_once ("models/modelUser.php");
function liste() {
    $bdd = setDB(); 
    $user = getAllusers($bdd); 
    $datas_page = [
        "description" => "Page d'accueil du site",
        "title" => "Liste ",
        "user" => $user, 
        "view" => "views/users/list.php",
        "layout" => "views/component/layout.php",
    ];
    drawPage($datas_page);
}

function save()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? null;
        $prenom = $_POST['prenom'] ?? null;
        $email = $_POST['email'] ?? null;
        $mot_de_passe = $_POST['mot_de_passe'] ?? null;

        if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $mot_de_passe  !== null) {
            $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            addUser($nom, $prenom, $email, $hashed_password);
            header('Location: index.php?controller=user&page=list');
            exit();
        } else {
            echo "Veuillez remplir tous les champs correctement.";
        }
    } else {
        include('views/user/add.php');
    }
}

function deleteProduct()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deletes($id);
        header('Location: index.php?controller=user&page=list');
        exit();
    } else {
        throw new Exception('ID non précisé');
    }
}

function get()
{
    $id = $_GET['id'] ?? null;
        $user = getById($id);
        $datas_page = [
            "description" => "Modifier le produit",
            "title" => "Modifier le produit",
            "user" => $user,
            "view" => "views/users/edit.php",
            "layout" => "views/component/layout.php",
        ];
        drawPage($datas_page);
}

function update() {
    $bdd = setDB();
    $id = $_POST['id'];
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    updateUser($bdd, $id, $nom, $prenom, $email );

    header('Location: index.php?controller=user&page=list');
    exit; // Toujours appeler exit après header
}

