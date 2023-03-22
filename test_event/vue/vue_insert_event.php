        <h3 style="text-align: center;"> Ajout d'un event </h3>
        <form method="post" style="width: 60%; margin: 0 auto; font-family: Arial, sans-serif;">
        <table style="border: 1px solid lightgray; border-radius: 10px; padding: 20px;">
            <tr>
            <td style="text-align: right; padding-right: 10px;"> Designation: </td>
            <td><input type="text" placeholder="Entrez un nom..." name="designation" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;">Date début</td>
            <td><input type="date" name="date_debut" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;">Date fin</td>
            <td><input type="date" name="date_fin" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;">Capacite</td>
            <td><input type="text" name="capacite" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;">Id Categorie</td>
            <td>
                <select name="idcategorie" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;">
                <?php
                foreach ($lesCategories as $uneCategorie){
                echo "<option value='".$uneCategorie['idcategorie']."'>".$uneCategorie['libelle']."</option>";
                }
                ?>
                </select>
            </td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;">Id Lieux</td>
            <td>
                <select name="idlieu" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;">
                <?php
                foreach ($lesLieux as $unLieu){
                echo "<option value='".$unLieu['idlieu']."'>".$unLieu['adresse']."</option>";
                }
                ?>

                    </select></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="reset" name="Annuler" value="Annuler" />
                <input type="submit" name="Valider" value="Valider"/>
            </td>
        </tr>
    </table>
</form>