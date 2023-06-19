<h2> Gestion des visiteurs</h2>

<div style="display: flex; align-items: center; justify-content: center;">
		<div>
			<img src="images/visiteur.png" alt="Logo" height="200" width="200">
		</div>
</div>
<?php
    
        //Edit et Suppression
        $leVisiteur=null;
        if (isset($_GET['id_user'])&&isset($_GET['action']))
        {
            $id_user=$_GET['id_user'];
            $action=$_GET['action'];
            switch($action)
            {
            case "supprimer": $unControleur->deleteVisiteur($id_user); 
            break;
            case "modifier": $leVisiteur=$unControleur->selectWhereVisiteur($id_user); 
            break;
            }
        }
        
        require_once("vue/vue_insert_visiteur.php");
        //Rentrer donner
        if(isset($_POST['Valider'])){
            $unControleur->insertVisiteur($_POST);
            var_dump($_POST);
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateVisiteur($_POST);
            header("Location: index.php?page=10");
        }
   
        $lesVisiteurs=$unControleur->selectAllVisiteurs();
    
    
    require_once("vue/vue_visiteur.php");
?>