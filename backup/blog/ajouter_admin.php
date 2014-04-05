<!DOCTYPE html>
<?php
include ('db.php');
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1)
header('location: index.php');
?>
<html lang='fr'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog my-drupal </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Accueil</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                     <li> <a href="profile.php">Profile </a> </li>
					<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
						{
						?>
					<li> <a href="deconexion_admin.php">Deconexion</a> </li>
					<li> <a href="ajouter.php">Ajouter un post</a> </li>
					<li> <a href="ajouter_admin.php">Ajouter un admin</a> </li>
					<li> <a href="sup_cat.php">Supprimer une categorie </a> </li>
						<?php } 
						else {
						?>
						<li> <a href="conection_admin.php">Admin</a> </li>	
					<?php
						}
						?>
                </ul>	
            </div>
        </div>
    </nav>
	
	<div class="container" style="max-width:300px">

      <form class="form-signin" role="form" action="add_adm.php" method="post">
        <h2 class="form-signin-heading"> Ajouter un admin </h2>
        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" required autofocus>
        <input type="password" class="form-control" placeholder="Mot de Passe" name="mdp" required>
		<input type="password" class="form-control" placeholder="Confirmez mot de passe" name="cmdp" required>
		<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" > Envoyer </button>
      </form>

    </div> <!-- /container -->
	
</body>
</html>