<table border="1">
    <tr>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Email</td>
        <td>Role<td>
    </tr>
    <?php   
        $lesUsers= $unControleur->selectAllUsers();
        foreach($lesUsers as $unUser){
            echo "<tr>";
            echo "<td>".$unUser['nom']."</td>";
            echo "<td>".$unUser['prenom']."</td>";
            echo "<td>".$unUser['email']."</td>";
            echo "<td>".$unUser['role']."</td>";
            echo "<tr>";
        }
    ?>
</table>