<h3 style="text-align:center;">Participer à un Événement</h3>
<form method="post" style="display:flex; flex-direction:column; align-items:center;">
  <div style="width:50%; text-align:left;">
    <label>Identifiant de l'événement :</label>
    <input type="text" name="id_event" value="<?= $id_event ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    <label>Identifiant utilisateur :</label>
    <input type="text" name="id_user" value="<?= $_SESSION['id'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
    <label>Date d'invitation :</label>
    <input type="date" name="dateinvitation" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" />
    <label>Date de départ :</label>
    <input type="date" name="datedepart" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" />
  </div>
  <div style="margin-top:20px;">
    <input type="reset" name="Annuler" value="Annuler" style="padding:10px 20px; margin-right:20px; border-radius:5px; border:none; background-color:red; color:white; cursor:pointer;" />
    <input type="submit" name="Participer_event" value="Participer" style="padding:10px 20px; border-radius:5px; border:none; background-color:green; color:white; cursor:pointer;" />
  </div>
</form>