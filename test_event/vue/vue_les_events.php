<h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des Evenements</h3>
<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
    <tr style="background-color: #C8BC25;">
        <td style="padding: 10px; border: 1px solid black;">Id événement</td>
        <td style="padding: 10px; border: 1px solid black;">Désignation</td>
        <td style="padding: 10px; border: 1px solid black;">Date début</td>
        <td style="padding: 10px; border: 1px solid black;">Date fin</td>
        <td style="padding: 10px;border: 1px solid black;">Capacité</td>
        <td style="padding: 10px;border: 1px solid black;">Id catégorie</td>
        <td style="padding: 10px;border: 1px solid black;">Id lieu</td>
        <td style="padding: 10px;border: 1px solid black;">Opération</td>
    </tr>
    <?php
        foreach($lesEvents as $unEvent){
            echo "<tr>";
            echo "<td style='padding: 10px;'>".$unEvent['id_event']."</td>";
            echo "<td style='padding: 10px;'>".$unEvent['designation']."</td>";
            echo "<td style='padding: 10px;'>".$unEvent['date_debut']."</td>";
            echo "<td style='padding: 10px;'>".$unEvent['date_fin']."</td>";
            echo "<td style='padding: 10px;'>".$unEvent['capacite']."</td>";
            echo "<td style='padding: 10px;'>".$unEvent['idcategorie']."</td>";
            echo "<td style='padding: 10px;'>".$unEvent['idlieu']."</td>";
            echo "<td style='padding: 10px;'> 
                    <a href='index.php?page=1&action=participer&id_event=".$unEvent['id_event']."'>
                        <img src='images/participer.png' height='30' width='30'></a>";
            echo "</tr>";
        }
    ?>
</table>