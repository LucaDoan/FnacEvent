<h3 style="text-align: center;"> Ajout d'un visiteur</h3>
        <form method="post" style="width: 60%; margin: 0 auto; font-family: Arial, sans-serif;">
        <table style="border: 1px solid lightgray; border-radius: 10px; padding: 20px;">
            <tr>
            <td style="text-align: right; padding-right: 10px;"> Nom: </td>
            <td><input type="text" placeholder="Entrez un nom" name ="nom" value="<?= ($leVisiteur!=null)? $leVisiteur['nom']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> prenom: </td>
            <td><input type="text" placeholder="Entrez un prenom" name="prenom" value="<?= ($leVisiteur!=null)? $leVisiteur['prenom']:''?>" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> email: </td>
            <td><input type="text" placeholder="Entrez un email" name="email" value="<?= ($leVisiteur!=null)? $leVisiteur['email']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> mdp: </td>
            <td><input type="password" placeholder="Entrez un mdp" name="mdp" value="<?= ($leVisiteur!=null)? $leVisiteur['mdp']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <td><input type="hidden" placeholder="Entrez un nom" name="role" value="visiteur" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> adresse: </td>
            <td><input type="text" placeholder="Entrez une adresse" name="adresse" value="<?= ($leVisiteur!=null)? $leVisiteur['adresse']:''?>"style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            <tr>
            <tr>
            <td style="text-align: right; padding-right: 10px;"> date naissance: </td>
            <td><input type="date"name="datenaissance" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" /></td>
            </tr>
            
            <td></td>
            <td><input type="reset" name="Annuler" value="Annuler" />
                <input type="submit" 
                <?php 
                if ($leVisiteur !=null) {
                    echo 'name = "Modifier" value="Modifier"';
                }else{
                    echo 'name = "Valider" value="Valider"';
                }
                ?>>
                
            </td>
        </tr>
        <?php
             if ($leVisiteur !=null) {
                echo'<input type="hidden" name="id_user" value="'.$leVisiteur['id_user'].'">';
            }else{
                echo'';
            }
        ?>

    </table>
</form>