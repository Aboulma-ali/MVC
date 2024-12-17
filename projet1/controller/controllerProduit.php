<?php
require_once("models/modelProduit.php");

function home()
{
    $datas_page = [
        "description" => "Page d'accueil du site",
        "title" => "Page d'accueil",
        "view" => "views/home.php",
        "layout" => "views/component/layout.php",
    ];
    drawPage($datas_page);
}

function liste()
{
    $bdd = setDB();
    $produits = getAllProducts($bdd);
    $datas_page = [
        "description" => "Liste des produits",
        "title" => "Liste des produits",
        "produits" => $produits,
        "view" => "views/produit/list.php",
        "layout" => "views/component/layout.php",
    ];
    drawPage($datas_page);
}

function save()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? null;
        $description = $_POST['description'] ?? null;
        $prix = filter_var($_POST['prix'], FILTER_VALIDATE_FLOAT);
        $quantite = filter_var($_POST['quantité'], FILTER_VALIDATE_INT);
        $libelle = $_POST['libelle'];

        if ($nom && $description && $prix !== null && $quantite && $libelle !== null) {
            add($nom, $description, $prix, $quantite,$libelle);
            header('Location: index.php?controller=produit&page=list');
            exit();
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    } else {
        include('views/produit/add.php');
    }
}

function deleteProduct()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deletes($id);
        header('Location: index.php?controller=produit&page=list');
        exit();
    } else {
        throw new Exception('ID non précisé');
    }
}

function get()
{
    $id = $_GET['id'] ;
    if ($id) {
        $produit = getById($id);
        $datas_page = [
            "description" => "Modifier le produit",
            "title" => "Modifier le produit",
            "produit" => $produit,
            "view" => "views/produit/edit.php",
            "layout" => "views/component/layout.php",
        ];
        drawPage($datas_page);
    } else {
        throw new Exception('ID non précisé');
    }
}

function update()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantité'];

        updatePro($id, $nom, $description, $prix, $quantite);
        header('Location: index.php?controller=produit&page=list');
        exit();
    } else {

        include('views/produit/edit.php');
    }
}
function getcategorie()
{
    $bdd = setDB();
    $stmt = $bdd->prepare("SELECT * FROM categories");
    $stmt->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}