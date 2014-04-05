<!DOCTYPE html>
<?php
include ('db.php');
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
					<li> <a href="conection_admin.php">Admin</a> </li>
                </ul>	
            </div>
        </div>
    </nav>
	
	<div class="container" style="max-width:300px">

      <form class="form-signin" role="form" action="verif_adm.php" method="post">
        <h2 class="form-signin-heading"> Connexion </h2>
        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" required autofocus>
        <input type="password" class="form-control" placeholder="Mot de Passe" name="mdp" required>
		<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" > Envoyer </button>
      </form>

    </div> <!-- /container -->
	
</body>
</html>