<h2> Gestion des guests</h2>

<div style="display: flex; align-items: center; justify-content: center;">
		<div>
			<img src="images/guest.png" alt="Logo" height="200" width="200">
		</div>
</div>
<?php
    
        //Edit et Suppression
        $leGuest=null;
        if (isset($_GET['id_user'])&&isset($_GET['action']))
        {
            $id_user=$_GET['id_user'];
            $action=$_GET['action'];
            switch($action)
            {
            case "supprimer": $unControleur->deleteGuest($id_user); 
            break;
            case "modifier": $leGuest=$unControleur->selectWhereGuest($id_user); 
            break;
            }
        }
        
        require_once("vue/vue_insert_guest.php");
        //Rentrer donner
        if(isset($_POST['Valider'])){
            $unControleur->insertGuest($_POST);
            var_dump($_POST);
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateGuest($_POST);
            header("Location: index.php?page=10");
        }
   
        $lesGuests=$unControleur->selectAllGuests();
    
    
    require_once("vue/vue_guest.php");
?>