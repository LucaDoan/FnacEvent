<h3 style="text-align: center;"> Ajout d'un Guest</h3>
        <form method="post" style="width: 60%; margin: 0 auto; font-family: Arial, sans-serif;">
        <table style="border: 1px solid lightgray; border-radius: 10px; padding: 20px;">
            <tr>
            <td style="text-align: right; padding-right: 10px;"> Nom: </td>
            <td><input type="text" placeholder="Entrez un nom" name ="nom" value="<?= ($leGuest!=null)? $leGuest['nom']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> prenom: </td>
            <td><input type="text" placeholder="Entrez un prenom" name="prenom" value="<?= ($leGuest!=null)? $leGuest['prenom']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> email: </td>
            <td><input type="text" placeholder="Entrez un email" name="email" value="<?= ($leGuest!=null)? $leGuest['email']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> mdp: </td>
            <td><input type="password" placeholder="Entrez un mdp" name="mdp" value="<?= ($leGuest!=null)? $leGuest['mdp']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td><input type="hidden" placeholder="Entrez un nom" name="role" value="abonne" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> pays: </td>
            <td><input type="text" placeholder="Entrez un pays" name="pays" value="<?= ($leGuest!=null)? $leGuest['pays']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> langueOfficielle: </td>
            <td><input type="text" placeholder="Entrez une langueOfficielle" name="langueOfficielle" value="<?= ($leGuest!=null)? $leGuest['langueOfficielle']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> domaineActivite: </td>
            <td><input type="text" placeholder="Entrez un domaineActivite" name="domaineActivite" value="<?= ($leGuest!=null)? $leGuest['domaineActivite']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            >
           
            
            <td></td>
            <td><input type="reset" name="Annuler" value="Annuler" />
                <input type="submit" 
                <?php 
                if ($leGuest !=null) {
                    echo 'name = "Modifier" value="Modifier"';
                }else{
                    echo 'name = "Valider" value="Valider"';
                }
                ?>>
                
            </td>
        </tr>
        <?php
             if ($leGuest !=null) {
                echo'<input type="hidden" name="id_user" value="'.$leGuest['id_user'].'">';
            }else{
                echo'';
            }
        ?>

    </table>
</form>