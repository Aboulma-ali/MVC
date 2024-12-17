<?php
require_once("models/modelCategorie.php");

function liste() {
    $bdd = setDB(); 
    $categories = getAllcategories($bdd); 
    $datas_page = [
        "description" => "Liste des catégories",
        "title" => "Liste des catégories",
        "categories" => $categories, 
        "view" => "views/categorie/list.php",
        "layout" => "views/component/layout.php",
    ];
    drawPage($datas_page);
}

function save() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bdd = setDB();
        $libelle = isset($_POST['libelle']) ? trim($_POST['libelle']) : null;

        if (!empty($libelle)) {
            if (add($bdd, $libelle)) {
                header('Location: index.php?controller=categorie&page=list');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        } else {
            echo "Veuillez remplir le champ libellé.";
        }
    } else {
        $datas_page = [
            "description" => "Ajouter une catégorie",
            "title" => "Ajouter une catégorie",
            "view" => "views/categorie/add.php",
            "layout" => "views/component/layout.php",
        ];
        drawPage($datas_page);
    }
}



function deleteProduct()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deletes($id);
        header('Location: index.php?controller=categorie&page=list');
        exit();
    } else {
        throw new Exception('ID non précisé');
    }
}

function get() {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $bdd = setDB();
        $id = intval($_GET['id']);
        $categorie = getById($bdd, $id);

        if ($categorie) {
            $datas_page = [
                "description" => "Modifier une catégorie",
                "title" => "Modifier une catégorie",
                "categories" => $categorie, 
                "view" => "views/categorie/edit.php",
                "layout" => "views/component/layout.php",
            ];
            drawPage($datas_page);
        } else {
            echo "Catégorie introuvable.";
        }
    } 
}

function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bdd = setDB();
        $id = isset($_POST['id']) ? intval($_POST['id']) : null;
        $libelle = isset($_POST['libelle']) ? trim($_POST['libelle']) : null;

        if ($id && !empty($libelle)) {
            if (updateCate($bdd, $id, $libelle)) {
                header('Location: index.php?controller=categorie&page=list');
                exit();
            } else {
                echo "Erreur lors de la mise à jour.";
            }
        } else {
            echo "ID ou libellé invalide.";
        }
    } else {
        echo "Méthode non autorisée.";
    }
}
function getcategorie()
{
    $bdd = setDB();
    $categories = getAllcategories($bdd);
    return $categories;
}

