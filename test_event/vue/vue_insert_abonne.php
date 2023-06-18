<h3 style="text-align: center;"> Ajout d'un abonne</h3>
        <form method="post" style="width: 60%; margin: 0 auto; font-family: Arial, sans-serif;">
        <table style="border: 1px solid lightgray; border-radius: 10px; padding: 20px;">
            <tr>
            <td style="text-align: right; padding-right: 10px;"> Nom: </td>
            <td><input type="text" placeholder="Entrez un nom" name ="nom" value="<?= ($lAbonne!=null)? $lAbonne['nom']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> prenom: </td>
            <td><input type="text" placeholder="Entrez un prenom" name="prenom" value="<?= ($lAbonne!=null)? $lAbonne['prenom']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> email: </td>
            <td><input type="text" placeholder="Entrez un email" name="email" value="<?= ($lAbonne!=null)? $lAbonne['email']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> mdp: </td>
            <td><input type="password" placeholder="Entrez un mdp" name="mdp" value="<?= ($lAbonne!=null)? $lAbonne['mdp']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td><input type="hidden" placeholder="Entrez un nom" name="role" value="abonne" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> age: </td>
            <td><input type="text" placeholder="Entrez un age" name="age" value="<?= ($lAbonne!=null)? $lAbonne['age']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> date debut: </td>
            <td><input type="date"name="date_debut" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;">date_fin: </td>
            <td><input type="date" name="date_fin" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> prix mensuel: </td>
            <td style="text-align: right; padding-right: 10px;"> le prix sera de 15 euros par mois</td> 
            <td><input type="hidden" name="prixMensuel" value="15" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td><input type="hidden" name="id_groupe" value="1" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="reset" name="Annuler" value="Annuler" />
                <input type="submit" 
                <?php 
                if ($lAbonne !=null) {
                    echo 'name = "Modifier" value="Modifier"';
                }else{
                    echo 'name = "Valider" value="Valider"';
                }
                ?>>
                
            </td>
        </tr>
        <?php
             if ($lAbonne !=null) {
                echo'<input type="hidden" name="id_user" value="'.$lAbonne['id_user'].'">';
            }else{
                echo'';
            }
        ?>

    </table>
</form>