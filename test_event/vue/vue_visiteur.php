<!DOCTYPE html>
<html>
<head>
	<title>Ma page</title>
	<style type="text/css">
		/* styles pour le footer */
		footer {
			position: static;
			bottom: 0;
			width: 100%;
			height: 50px;
			background-color: #333;
			color: #fff;
			text-align: center;
			padding-top: 20px;
		}
	</style>
</head>
<body>

    <h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des visiteurs</h3>
    <table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
        <tr style="background-color: #C8BC25;">
            <td style="padding: 10px; border: 1px solid black;">Nom</td>
            <td style="padding: 10px; border: 1px solid black;">prenom</td>
            <td style="padding: 10px; border: 1px solid black;">email</td>
            <td style="padding: 10px; border: 1px solid black;">role</td>
            <td style="padding: 10px; border: 1px solid black;">adresse</td>
            <td style="padding: 10px; border: 1px solid black;">datenaissance</td>
            <td style="padding: 10px; border: 1px solid black;">Operation</td>



        </tr>
        <?php
            $lesVisiteurs= $unControleur->selectAllVisiteurs();
            foreach($lesVisiteurs as $unVisiteur){

            echo "<tr style='border: 1px solid black;'>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unVisiteur['nom']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unVisiteur['prenom']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unVisiteur['email']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unVisiteur['role']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unVisiteur['adresse']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unVisiteur['datenaissance']."</td>";
                echo "<td style='padding: 10px;'> 
				<a href='index.php?page=7&action=supprimer&id_user=".$unVisiteur['id_user']."'>
					<img src='images/supprimer.png' height='30' width='30'></a>
				<a href='index.php?page=7&action=modifier&id_user=".$unVisiteur['id_user']."'>
					<img src='images/modifier.jpg' height='30' width='30'></a>";


	            echo "</tr>";
            }
        ?>
    </table>
    <footer>
		Ceci est le footer de ma page.
	</footer>
</body>
</html>
