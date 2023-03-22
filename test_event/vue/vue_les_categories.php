

<h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des categories</h3>
<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
    <tr style="background-color: #C8BC25;">
        <td style="padding: 10px; border: 1px solid black;">Id categorie</td>
        <td style="padding: 10px; border: 1px solid black;">Libelle</td>
    </tr>
    <?php
        foreach($lesCategories as $uneCategorie){
            echo "<tr style='border: 1px solid black;'>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$uneCategorie['idcategorie']."</td>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$uneCategorie['libelle']."</td>";
            echo "</tr>";
        }
    ?>
</table>