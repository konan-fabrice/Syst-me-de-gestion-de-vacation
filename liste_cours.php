<table style="width:80%; height:auto; text-align:center; font-size:larger;">
        <tr bgcolor="red" style="color:white">
            <th>Filière</th>
            <th>Description</th>
        </tr>
<?php 
    $aff = $db->prepare("SELECT nomfil, descrifil FROM filiere ORDER BY idfil DESC");
    $aff->execute(array());
    while( $resultat = $aff->fetch() ){
?>
    <tr>
        <td><?php echo $resultat['nomfil']; ?></td>
        <td><?php echo $resultat['descrifil']; ?></td>
    </tr>
<?php
    }
    $aff->closeCursor();
?>
 </table>
