<br>
<br>
<h3 style="font-family: Arial, sans-serif; text-align: center;">Evenements inscrits</h3>
<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
    <tr style="background-color: #C8BC25;">
        <td style="padding: 10px; border: 1px solid black;">Id User</td>
        <td style="padding: 10px; border: 1px solid black;">Id Event</td>
        <td style="padding: 10px; border: 1px solid black;">Date Inscription</td>
        <td style="padding: 10px; border: 1px solid black;">Nom</td>
        <td style="padding: 10px;border: 1px solid black;">Prénom</td>
        <td style="padding: 10px;border: 1px solid black;">Designation</td>
    </tr>
    <?php
function afficherEvenementsInscrits($lesEventsUsers) {
    $aujourdHui = date("Y-m-d");

    echo "<h3 style='font-family: Arial, sans-serif; text-align: center;'>Evenements inscrits</h3>";
    echo "<table style='margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;'>";
    echo "<tr style='background-color: #C8BC25;'>";
    echo "<td style='padding: 10px; border: 1px solid black;'>Id User</td>";
    echo "<td style='padding: 10px; border: 1px solid black;'>Id Event</td>";
    echo "<td style='padding: 10px; border: 1px solid black;'>Date Inscription</td>";
    echo "<td style='padding: 10px; border: 1px solid black;'>Nom</td>";
    echo "<td style='padding: 10px;border: 1px solid black;'>Prénom</td>";
    echo "<td style='padding: 10px;border: 1px solid black;'>Designation</td>";
    echo "</tr>";

    foreach($lesEventsUsers as $unEventUser) {
        $dateInscription = $unEventUser['dateinscription'];

        if ($dateInscription == $aujourdHui) {
            echo "<tr>";
            echo "<td style='padding: 10px;'>".$unEventUser['id_user']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['id_event']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['dateinscription']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['nom']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['prenom']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['designation']."</td>";
            echo "</tr>";
        }    
    }

    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FNAC Event</title>
</head>
<body>

    <?php
    // Utilisation de la fonction pour afficher les événements inscrits
    afficherEvenementsInscrits($lesEventsUsers);
    ?>

</body>
</html>
