<?php
include ('db.php');
if (isset($_POST['categorie']) && $_POST['categorie'] != "")
{
$add_categ = $bdd->exec("INSERT INTO categorie (name_categ) VALUES ('".$_POST['categorie']."')");
$id_categ = $bdd->query("SELECT * FROM categorie WHERE name_categ = '".$_POST['categorie']."'");
$id = $id_categ->fetch();
$add_post = $bdd->exec("INSERT INTO post (name_post, id_categ, post, img) VALUES ('".$_POST['titre']."','".$id['id_categ']."','".$_POST['post']."','".$_POST['image']."')");
}
else
{
$id_categ = $bdd->query("SELECT * FROM categorie WHERE name_categ = '".$_POST['class']."'");
$id = $id_categ->fetch();
$add_post = $bdd->exec("INSERT INTO post (name_post, id_categ, post, img) VALUES ('".$_POST['titre']."','".$id['id_categ']."','".$_POST['post']."','".$_POST['image']."')");
}
header('location: index.php');
?>