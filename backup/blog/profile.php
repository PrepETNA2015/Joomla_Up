<!DOCTYPE html>
<?php include ('db.php'); ?>
<html>
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
	<div class="my_style">
        <hr>
        <img alt="pas d'image" src="https://intra.etna-alternance.net/report/trombi/image/login/wieser_f" class="img-responsive">
        <hr>
        <p class="lead"> WIESER Frank </p>
		<p>Bonjour, je suis responsable sur ce site de la base de donn&eacute;e, ainsi que des requ&ecirc;tes SQL, du PHP, de l'AJAX et un petit peu du design du site
vous pouvez aller voir mon profil linkedin en cliquant sur le lien suivant: <a href="http://www.linkedin.com/pub/frank-wieser/8b/304/180" target="_blank">cliquez ici</a>	vous pouvez aussi me contactez a l'adresse mail:</br>
 wieser_f@etna-alternance.net pour toute question ou remarque sur ce site.</p>                     
    </div>
	<div class="my_style">
        <hr>
        <img alt="pas d'image" src="https://intra.etna-alternance.net/report/trombi/image/login/florea_g" class="img-responsive">
        <hr>
        <p class="lead"> FLOREA Gheorghe </p>
		<p>Bonjour, je suis responsable sur ce site de la base de donn&eacute;e, ainsi que des requ&ecirc;tes SQL, du PHP, de l'AJAX et un petit peu du design du site
vous pouvez aller voir mon profil linkedin en cliquant sur le lien suivant: <a href="http://www.linkedin.com/pub/gheorghe-florea/8b/115/309" target="_blank">cliquez ici</a>
vous pouvez aussi me contactez a l'adresse mail:</br>
 florea_g@etna-alternance.net pour toute question ou remarque sur ce site.</p>                     
    </div>
	<div class="my_style">
        <hr>
        <img alt="pas d'image" src="https://intra.etna-alternance.net/report/trombi/image/login/cuvill_r" class="img-responsive">
        <hr>
        <p class="lead"> CUVILLIER Richard </p>
		<p>Bonjour, je suis responsable sur ce site de la base de donn&eacute;e, ainsi que des requ&ecirc;tes SQL, du PHP, de l'AJAX et un petit peu du design du site
vous pouvez aller voir mon profil linkedin en cliquant sur le lien suivant: <a href="#" >cliquez ici</a>
vous pouvez aussi me contactez a l'adresse mail:</br>
 cuvill_r@etna-alternance.net pour toute question ou remarque sur ce site.</p>                     
    </div>
</body>
</html>