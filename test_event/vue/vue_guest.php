<div style="display: flex; align-items: center; justify-content: center;">
  <div>
    <img src="images/guest.png" alt="Logo" height ="200" witdh ="200">


    
</div>
</div>




<h3 style="font-family: Arial, sans-serif; text-align: center;">Liste des guests</h3>
<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
    <tr style="background-color: #C8BC25;">
        <td style="padding: 10px; border: 1px solid black;">Nom</td>
        <td style="padding: 10px; border: 1px solid black;">prenom</td>
        <td style="padding: 10px; border: 1px solid black;">email</td>
        <td style="padding: 10px; border: 1px solid black;">role</td>

    </tr>
    <?php
        $lesGuests= $unControleur->selectAllGuests();
        foreach($lesGuests as $unGuest){

        echo "<tr style='border: 1px solid black;'>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unGuest['nom']."</td>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unGuest['prenom']."</td>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unGuest['email']."</td>";
            echo "<td style='padding: 10px; border: 1px solid black;'>".$unGuest['role']."</td>";

            echo "</tr>";
        }
    ?>
</table>