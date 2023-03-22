<!---<form method="post">
    <h3>Participer à un événement</h3><table>
    <tr>
        <td><label for="id_event">Identifiant de l'événement:</label></td>
        <td><input type="text" id="id_event" name="id_event" value="<?= $id_event ?>" readonly /></td>
    </tr>
    <tr>
        <td><label for="id_user">Identifiant de l'utilisateur:</label></td>
        <td><input type="text" id="id_user" name="id_user" value="<?= $_SESSION['id'] ?>" readonly /></td>
    </tr>
    <tr>
        <td><label for="nom_prenom">Nom et prénom de l'utilisateur:</label></td>
        <td><input type="text" id="nom_prenom" value="<?= $_SESSION['nom'] . " - " . $_SESSION['prenom'] ?>" readonly /></td>
    </tr>
    <tr>
        <td><label for="date_inscription">Date d'inscription:</label></td>
        <td><input type="date" id="date_inscription" name="date_inscription" required /></td>
    </tr>
    <tr>
        <td><label for="statut">Statut:</label></td>
        <td><input type="text" id="statut" name="statut" value="visiteur" readonly /></td>
    </tr>
    <tr>
        <td><label for="montant">Montant:</label></td>
        <td><input type="text" id="montant" name="billet_prix" value="10" readonly /></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="reset" value="Annuler" />
            <input type="submit" value="Participer" name="Participer" />
        </td>
    </tr>
</table>
</form>
-->



<h3 style="text-align:center;">Participer à un Événement</h3>
<form method="post" style="display:flex; flex-direction:column; align-items:center;">
  <div style="width:50%; text-align:left;">
    <label>Identifiant de l'événement :</label>
    <input type="text" name="id_event" value="<?= $id_event ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    <label>Identifiant utilisateur :</label>
    <input type="text" name="id_user" value="<?= $_SESSION['id'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    
    <label>Nom et prénom de l'utilisateur: </label>
    <input type="text" name="statut" value="<?= $_SESSION['nom'] . " - " . $_SESSION['prenom'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />

    <td><label for="date_inscription">Date d'inscription:</label></td>
    <td><input type="date" id="date_inscription" name="date_inscription" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" required /></td>
    </tr>
    <label>Statut</label>
    <input type="text" name="statut" value="visiteur" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    <tr>

    </tr>
    <label>Montant</label>
    <input type="text"id="montant" name="billet_prix" value="10"  style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    <tr>

  </div>
  <div style="margin-top:20px;">
    <input type="reset" name="Annuler" value="Annuler" style="padding:10px 20px; margin-right:20px; border-radius:5px; border:none; background-color:red; color:white; cursor:pointer;" />
    <input type="submit" name="Participer" value="Participer" style="padding:10px 20px; border-radius:5px; border:none; background-color:green; color:white; cursor:pointer;" />
  </div>
</form>