<?php
include ('db.php');
		$id = $bdd->query("SELECT * FROM categorie WHERE name_categ='".$_POST['class']."'");
		$id_c = $id->fetch();
		$sup_post = $bdd->query("SELECT * FROM post WHERE id_categ='".$id_c['id_categ']."'");
		while($sup = $sup_post->fetch())
		{
		$sup_com = $bdd->exec("DELETE FROM commentaire WHERE id_post='".$sup['id_post']."'");
		
		}
		$sup_p = $bdd->exec("DELETE FROM post WHERE id_categ='".$id_c['id_categ']."'");
		$sup_cat =  $bdd->exec("DELETE FROM categorie WHERE id_categ='".$id_c['id_categ']."'");
header('location: index.php');
?>