<h2>Gestion des categories</h2>
<?php

     $lesCategories = $unControleur->selectAllCategories();
     $laCategorie = null;
     if (isset($_GET['idcategorie'])&&isset($_GET['action']))
     {
         $idcategorie=$_GET['idcategorie'];
         $action=$_GET['action'];
         switch($action)
         {
            
         case "supprimer": $unControleur->deleteCategorie($idcategorie); 
         break;
         case "modifier": $laCategorie=$unControleur->selectWhereCategorie($idcategorie); 
         break;
         }
     }
     

     require_once("vue/vue_insert_categorie.php");
     require_once("vue/vue_les_categories.php");
     if (isset($_POST['Valider'])) {
        $unControleur->insertCategorie($_POST);
        
    }
    if(isset($_POST['Modifier'])){
        $unControleur->updateCategorie($_POST);
        //header("Location: index.php?page=9");
        echo "<script>document.location.href='index.php?page=9';</script>";

    }


?>