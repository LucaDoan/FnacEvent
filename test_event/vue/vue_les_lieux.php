<h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des lieux</h3>
<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
    <tr style="background-color: #C8BC25;">
        <td style="padding: 10px; border: 1px solid black;">Id lieu</td>
        <td style="padding: 10px; border: 1px solid black;">Libelle</td>
        <td style="padding: 10px; border: 1px solid black;">Adresse</td>
    </tr>
    <?php
        foreach($lesLieux as $unLieu){
            echo "<tr style='border: 1px solid black;'>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unLieu['idlieu']."</td>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unLieu['libelle']."</td>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unLieu['adresse']."</td>";
            echo "</tr>";
        }
    ?>
</table>