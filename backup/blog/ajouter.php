<!DOCTYPE html>
<?php
include ('db.php');
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1)
header('location: index.php');
$class = $bdd->query("SELECT * FROM categorie");
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

      <form class="form-signin" role="form" action="add_post.php" method="post">
        <h2 class="form-signin-heading"> Ajouter un post </h2>
        <input type="text" class="form-control" placeholder="Titre" name="titre" required autofocus>
		<input type="text" class="form-control" placeholder="URL image" name="image" >
		<textarea class="form-control" rows="3" placeholder="Votre poste" name="post" required></textarea>
		<br />
		<select name="class" class="form-control">
		 <option selected>choissisez une categorie</option>
			<?php while($class2 = $class->fetch()) { ?>
			<option><?php echo $class2['name_categ']; ?></option>
			<?php } ?>
		</select>
		<input type="text" class="form-control" placeholder="Ou cr&eacute;e une categorie" name="categorie">
		<br />
		<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" > Envoyer </button>
      </form>

    </div> <!-- /container -->
	
</body>
</html>