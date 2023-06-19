<h2>Gestion des lieux</h2>
<?php

     $lesLieux = $unControleur->selectAllLieux();
     $leLieu = null;
     if (isset($_GET['idlieu'])&&isset($_GET['action']))
     {
         $idlieu=$_GET['idlieu'];
         $action=$_GET['action'];
         switch($action)
         {
            
         case "supprimer": $unControleur->deleteLieu($idlieu); 
         break;
         case "modifier": $leLieu=$unControleur->selectWhereLieu($idlieu); 
         break;
         }
     }
     

     require_once("vue/vue_insert_lieux.php");
     require_once("vue/vue_les_lieux.php");
     if (isset($_POST['Valider'])) {
        $unControleur->insertLieu($_POST);
        
    }
    if(isset($_POST['Modifier'])){
        $unControleur->updateLieu($_POST);
        //header("Location: index.php?page=9");
        echo "<script>document.location.href='index.php?page=2';</script>";

    }


?>