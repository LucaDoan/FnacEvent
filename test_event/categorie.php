<h2>Gestion des categories</h2>
<?php
     $lesCategories = $unControleur->selectAllCategories();
     require_once("vue/vue_insert_categorie.php");
     require_once("vue/vue_les_categories.php");
     if (isset($_POST['Valider'])) {
        $unControleur->insertCategorie($_POST);
    }


?>