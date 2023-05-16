<?php
    extract($_POST);
    include('../config/config.php');
    $req = $db->prepare("INSERT INTO enseigner(Idens,Idclasse,IdUE,datecours,debutcours,fincours,volcours, contenucours)
    values(:Idens,:Idclasse,:IdUE,:datecours,:debutcours,:fincours,:volcours,:contenucours) 
     WHERE ");
    $req->execute(array(
        'Idens'=>$Idens,
        'Idclasse'=>$Idclasse,
        'IdUE'=>$IdUE,
        'datecours'=>$datecours,
        'debutcours'=>$debutcours,
        'fincours'=>$fincours,
        'volcours'=>$volcours,
        'contenucours'=>$contenucours,
    ));
    $req->closeCursor();
    header('location:saisiecours.html');
?>