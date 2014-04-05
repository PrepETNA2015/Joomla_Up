<?php
include ('db.php');
if ($_POST['mdp'] == $_POST['cmdp'])
$add_adm = $bdd->exec("INSERT INTO admin (pseudo, passwd) VALUES ('".$_POST['pseudo']."', '".$_POST['mdp']."')");
header('location: index.php');
?>