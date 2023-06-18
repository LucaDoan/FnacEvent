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
	

	<?php
	?>

	<h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des Abonnes</h3>
	<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
	    <tr style="background-color: #C8BC25;">
	        <td style="padding: 10px; border: 1px solid black;">Nom</td>
	        <td style="padding: 10px; border: 1px solid black;">prenom</td>
	        <td style="padding: 10px; border: 1px solid black;">email</td>
	        <td style="padding: 10px; border: 1px solid black;">role</td>
			<td style="padding: 10px; border: 1px solid black;">age</td>
	        <td style="padding: 10px; border: 1px solid black;">date_debut</td>
			<td style="padding: 10px; border: 1px solid black;">date_fin</td>
			<td style="padding: 10px; border: 1px solid black;">Prix_mensuel</td>
			<td style="padding: 10px; border: 1px solid black;">id_groupe</td>
			<td style="padding: 10px; border: 1px solid black;">Operation</td>


	    </tr>
	    <?php
	        foreach($lesAbonnes as $unAbonne){
	            echo "<tr style='border: 1px solid black;'>";
	            echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['nom']."</td>";
	            echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['prenom']."</td>";
	            echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['email']."</td>";
	            echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['role']."</td>";
				echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['age']."</td>";
				echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['date_debut']."</td>";
	            echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['date_fin']."</td>";
				echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['prixMensuel']."</td>";
	            echo "<td style='padding: 10px; border: 1px solid black;'>".$unAbonne['id_groupe']."</td>";
				echo "<td style='padding: 10px;'> 
				<a href='index.php?page=10&action=supprimer&id_user=".$unAbonne['id_user']."'>
					<img src='images/supprimer.png' height='30' width='30'></a>
				<a href='index.php?page=10&action=modifier&id_user=".$unAbonne['id_user']."'>
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
