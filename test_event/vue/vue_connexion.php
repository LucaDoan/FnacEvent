

<div style="display: flex; align-items: center; justify-content: center;">
  <div>
    <img src="images/logo.png" alt="Logo" alt="Logo">
  </div>
</div>

<form method="POST" action="index.php">
  <h3 style="text-align: center;">Veuillez vous connecter</h3>

  <p><strong>Vous n'êtes pas connecté(e), veuillez entrer vos identifiants.</strong></p>

  <div style="width: 60%; margin: 0 auto; font-family: Arial, sans-serif;">
    <table style="border: 1px solid lightgray; border-radius: 10px; padding: 20px;">
      <tr>
        <td style="text-align: right; padding-right: 10px;">Email</td>
        <td>
          <input type="text" placeholder="Entrez un email..." name="email" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" />
        </td>
      </tr>
      <tr>
        <td style="text-align: right; padding-right: 10px;">Mdp</td>
        <td>
          <input type="password" placeholder="Entrez un mot de passe..." name="mdp" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid lightgray;" />
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center;">
          <input type="reset" name="Annuler" value="Annuler" style="float: left; margin-right: 10px;" />
          <input type="submit" name="seConnecter" value="Connexion" style="float: right;" />
        </td>
      </tr>
    </table>
  </div>
</form>