<br>
<br>
<h3 style="font-family: Arial, sans-serif; text-align: center;">Evenements inscrits</h3>
<table style="margin: 0 auto; border: 1px solid black; border-collapse: collapse; width: 80%;">
    <tr style="background-color: #C8BC25;">
        <td style="padding: 10px; border: 1px solid black;">Id User</td>
        <td style="padding: 10px; border: 1px solid black;">Id Event</td>
        <td style="padding: 10px; border: 1px solid black;">Date Invitation</td>
        <td style="padding: 10px; border: 1px solid black;">Date Depart</td>
        <td style="padding: 10px; border: 1px solid black;">Nom</td>
        <td style="padding: 10px;border: 1px solid black;">Prénom</td>
        <td style="padding: 10px;border: 1px solid black;">Designation</td>
    </tr>
    <?php
        foreach($lesEventsUsers as $unEventUser){
            echo "<tr>";
            echo "<td style='padding: 10px;'>".$unEventUser['id_user']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['id_event']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['dateinvitation']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['datedepart']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['nom']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['prenom']."</td>";
            echo "<td style='padding: 10px;'>".$unEventUser['designation']."</td>";
        }
        
    ?>
</table>