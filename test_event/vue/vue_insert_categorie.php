<h3 style="text-align: center;"> Ajout d'une categorie</h3>
        <form method="post" style="width: 60%; margin: 0 auto; font-family: Arial, sans-serif;">
        <table style="border: 1px solid lightgray; border-radius: 10px; padding: 20px;">
            <tr>
            <td style="text-align: right; padding-right: 10px;"> libelle: </td>
            <td><input type="text" placeholder="Entrez un libelle" name="libelle" value="<?= ($laCategorie!=null)? $laCategorie['libelle']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="reset" name="Annuler" value="Annuler" />
                <input type="submit" 
                <?php 
                if ($laCategorie !=null) {
                    echo 'name = "Modifier" value="Modifier"';
                }else{
                    echo 'name = "Valider" value="Valider"';
                }
                ?>>
                
            </td>
        </tr>
        <?php
             if ($laCategorie !=null) {
                echo'<input type="hidden" name="idcategorie" value="'.$laCategorie['idcategorie'].'">';
            }else{
                echo'';
            }
        ?>
            
        </tr>
    </table>
</form>