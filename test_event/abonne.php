<h2> Gestion des abonnes</h2>

<div style="display: flex; align-items: center; justify-content: center;">
		<div>
			<img src="images/vip.png" alt="Logo" height="200" width="200">
		</div>
</div>
<?php
    
        //Edit et Suppression
        $lAbonne=null;
        if (isset($_GET['id_user'])&&isset($_GET['action']))
        {
            $id_user=$_GET['id_user'];
            $action=$_GET['action'];
            switch($action)
            {
            case "supprimer": $unControleur->deleteAbonne($id_user); 
            break;
            case "modifier": $lAbonne=$unControleur->selectWhereAbonne($id_user); 
            break;
            }
        }
        
        require_once("vue/vue_insert_abonne.php");
        //Rentrer donner
        if(isset($_POST['Valider'])){
            $unControleur->insertAbonne($_POST);
            
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateAbonne($_POST);
            //header("Location: index.php?page=10");
            //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
            echo "<script>document.location.href='index.php?page=10';</script>";
        }
   
        $lesAbonnes=$unControleur->selectAllAbonnes();
    
    
    require_once("vue/vue_abonne.php");
?>