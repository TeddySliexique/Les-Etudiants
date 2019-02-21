
<?php

function allEtudiants($param1){

    $connec = new PDO('mysql:dbname=LesEtudiants', 'root', '0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM etudiants WHERE prenom LIKE "$param1%";");
    $request->execute();
    return $request->fetchAll();
}
return allEtudiants();
 ?>
