<?php
function participerEvenement($id_event) {
    // Vérifier si l'e-mail et la confirmation de l'e-mail sont identiques
    if ($_POST['email'] != $_POST['confirmation_email']) {
        echo "Erreur : l'e-mail et la confirmation de l'e-mail ne correspondent pas.";
        return;
    }

    echo "Vous avez participé à l'événement avec succès !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participer à un Événement</title>
</head>
<body>
    <h3 style="text-align:center;">Participer à un Événement</h3>
    <form method="post" style="display:flex; flex-direction:column; align-items:center;">
        <div style="width:50%; text-align:left;">
            <label>Identifiant de l'événement :</label>
            <input type="text" name="id_event" value="<?= $id_event ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />

            <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />

            <label>Nom et prénom de l'utilisateur: </label>
            <input type="text" name="statut" value="<?= $_SESSION['nom'] . " - " . $_SESSION['prenom'] ?>" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />

            <label>Email :</label>
            <input type="text" name="email"  value="<?= $_SESSION['email'] ?>"style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" required />

            <label>Confirmation Email :</label>
            <input type="text" name="confirmation_email"  value="<?= $_SESSION['email'] ?>"style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" required />


            <label for="dateinscription">Date d'inscription:</label>
            <input type="date" id="dateinscription" name="dateinscription" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" required />

            <input type="hidden" name="statut" value="visiteur" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
            
            <label>Montant :</label>
            <input type="text" id="montant" name="billet_prix" value="10"  style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:none; box-shadow: 0px 0px 5px 0px gray;" readonly />
        </div>
        <div style="margin-top:20px;">
            <input type="reset" name="Annuler" value="Annuler" style="padding:10px 20px; margin-right:20px; border-radius:5px; border:none; background-color:red; color:white; cursor:pointer;" />
            <input type="submit" name="Participer" value="Participer" style="padding:10px 20px; border-radius:5px; border:none; background-color:green; color:white; cursor:pointer;" />
        </div>
    </form>

    <?php
    if (isset($_POST['Participer'])) {
        participerEvenement($_POST['id_event']);
    }
    ?>
</body>
</html>
