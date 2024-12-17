<?php
require_once("controller/utilities.php");


$controller = $_GET["controller"] ?? 'produit';

switch ($controller) {
   case 'categorie':
      require_once("controller/controllerCategorie.php");
      break;
   case 'produit':
      require_once("controller/controllerProduit.php");
      break;
   case 'user':
      require_once("controller/controllerUser.php");
      break;
   default:
      require_once("controller/controllerProduit.php");
      throw new Exception('Le controller n\'existe pas');
}

try {
   $page = $_GET['page'] ?? 'list';

   switch ($page) {
      case 'home':
         home();
         break;
      case 'list':
         liste();
         break;
      case 'update':
         update();
         break;
      case 'edite':
         get();
         break;
      case 'add':
         $categories = getcategorie();
         $datas_page = [
            "description" => "Page de création",
            "title" => "Ajout de produit",
            "categories" =>  $categories,
            "view" => "views/produit/add.php",
            "layout" => "views/component/layout.php",
         ];
         drawPage($datas_page);
         break;
      case 'addcat':
         $datas_page = [
            "description" => "Page de création",
            "title" => "Ajout de catégorie",
            "view" => "views/categorie/add.php",
            "layout" => "views/component/layout.php",
         ];
         drawPage($datas_page);
         break;
      case 'adduser':
         $datas_page = [
            "description" => "Page de création",
            "title" => "Ajout de catégorie",
            "view" => "views/users/add.php",
            "layout" => "views/component/layout.php",
         ];
         drawPage($datas_page);
         break;
      case 'delete':
         deleteProduct();
         break;
      case 'save':
         save();
         break;
      default:
         throw new Exception('Page non trouvée');
   }
} catch (Exception $e) {
   echo $e->getMessage();
}
?>