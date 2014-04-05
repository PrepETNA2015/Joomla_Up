<?php
include ('db.php');
$check = $bdd->query("SELECT * FROM admin WHERE pseudo = '".$_POST['pseudo']."' AND passwd = '".$_POST['mdp']."'");
while ($check2 = $check->fetch())
{
if($check2['pseudo'] != "" )
{
$_SESSION['admin'] = 1;
header('location: admin_accueil.php');
}
}
if (!isset($_SESSION['admin']))
header('location: index.php');
?>