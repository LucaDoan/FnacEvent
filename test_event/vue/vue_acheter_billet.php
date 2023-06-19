



<h3 style="text-align:center;">Participer à un Événement</h3>
<form method="post" style="display:flex; flex-direction:column; align-items:center;">
  <div style="width:50%; text-align:left;">

    <label>Identifiant de l'événement :</label>

    <input type="text" name="id_event" value="<?= $id_event ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    
    <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    
    <label>Nom et prénom de l'utilisateur: </label>
    <input type="text" name="statut" value="<?= $_SESSION['nom'] . " - " . $_SESSION['prenom'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />

    <td><label for="dateinscription">Date d'inscription:</label></td>
    <td><input type="date" id="dateinscription" name="dateinscription" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" required /></td>
    </tr>
    <input type="hidden" name="statut" value="visiteur" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
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