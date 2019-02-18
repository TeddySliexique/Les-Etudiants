<?php
function allEtudiants(){
    $connec = new PDO('mysql:dbname=LesEtudiants', 'root', '0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare('SELECT * FROM etudiants;');
    $request->execute();
    return $request->fetchAll();
}

$etudiants = allEtudiants();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Classe</title>
  </head>
  <body>
    <table>
      <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Prenom</th>
      </tr>
      <?php foreach($etudiants as $key => $etudiant) :?>
        <tr>
          <td><?php echo $etudiant['id'] ?></td>
          <td><?php echo $etudiant['nom'] ?></td>
          <td><?php echo $etudiant['prenom'] ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </body>
</html>
