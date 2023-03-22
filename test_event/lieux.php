<h2>Gestion des evenements</h2>
<?php
     $lesLieux = $unControleur->selectAllLieux();
     require_once("vue/vue_insert_lieux.php");
     require_once("vue/vue_les_lieux.php");
     if (isset($_POST['Valider'])) {
        $unControleur->insertLieu($_POST);
    }


?>