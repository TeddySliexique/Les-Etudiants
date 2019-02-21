<?php

if(isset($_GET['prenom'])){
  $prenom=$_GET['prenom'];
} else {
  $prenom="";
}

function allEtudiants(){

    $connec = new PDO('mysql:dbname=LesEtudiants', 'root', '0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM etudiants;");
    $request->execute();
    return $request->fetchAll();
}

$students = allEtudiants();

function firstnameEtudiants($param){

    $connec = new PDO('mysql:dbname=LesEtudiants', 'root', '0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM etudiants WHERE prenom LIKE '$param%';");
    $request->execute();
    return $request->fetchAll();
}

$etudiants = firstnameEtudiants($prenom);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <script  src="serv.js"></script>
    <title>Classe</title>
  </head>
  <body>
    <table border="5">
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
    <br><br>
    <table>
      <table border="5">
        <tr>
          <th>id</th>
          <th>Nom</th>
          <th>Prenom</th>
        </tr>
        <?php foreach($students as $key => $student) :?>
          <tr>
            <td><?php echo $student['id'] ?></td>
            <td><?php echo $student['nom'] ?></td>
            <td><?php echo $student['prenom'] ?></td>
          </tr>
        <?php endforeach ?>
    </table>
    <form action="etudiants.php" method="GET">
          <input type="text" onkeydown="Recherche(event)" name="prenom" value="" placeholder="Prénom" required>
          <input type="submit" name="" value="Envoyer">
    </form>
  </body>
</html>
