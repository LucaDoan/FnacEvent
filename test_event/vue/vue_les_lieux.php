<!DOCTYPE html>
<html>
<head>
	<title>Ma page</title>
	<style type="text/css">
		/* styles pour le footer */
		footer {
			position: absolute;
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

    <h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des lieux</h3>
    <table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
        <tr style="background-color: #C8BC25;">
            <td style="padding: 10px; border: 1px solid black;">Id lieu</td>
            <td style="padding: 10px; border: 1px solid black;">Libelle</td>
            <td style="padding: 10px; border: 1px solid black;">Adresse</td>
            <td style="padding: 10px; border: 1px solid black;">Operation</td>

        </tr>
        <?php
            foreach($lesLieux as $unLieu){
                echo "<tr style='border: 1px solid black;'>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unLieu['idlieu']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unLieu['libelle']."</td>";
                echo "<td style='padding: 10px; border: 1px solid black;'>".$unLieu['adresse']."</td>";
                echo "<td style='padding: 10px;'> 
				<a href='index.php?page=2&action=supprimer&idlieu=".$unLieu['idlieu']."'>
					<img src='images/supprimer.png' height='30' width='30'></a>
				<a href='index.php?page=2&action=modifier&idlieu=".$unLieu['idlieu']."'>
					<img src='images/modifier.jpg' height='30' width='30'></a>";
                echo "</tr>";
            }
        ?>
    </table>
    <footer>
    doanluca.an@gmail.com
	</footer>
</body>
</html>
