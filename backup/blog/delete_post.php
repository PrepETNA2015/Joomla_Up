<?php
include ('db.php');
//sup_com = $bdd->exec("DELETE FROM commentaire WHERE id_com = '".."'");
if ($_GET['action'] == "delete_p")
	{
		$sup_com = $bdd->exec("DELETE FROM commentaire WHERE id_post='".(string) $_GET['id_post']."'");
		$sup_post = $bdd->exec("DELETE FROM post WHERE id_post='".(string) $_GET['id_post']."'");
	}

if ($_GET['action'] == "delete_c")
	{
		$sup_com = $bdd->exec("DELETE FROM commentaire WHERE id_com='".(string) $_GET['id_com']."'");
	}
	
header('location: admin_accueil.php');
?>