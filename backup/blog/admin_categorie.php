<!DOCTYPE html>
<?php
include ('db.php');
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1)
header('location: index.php');
$reponse = $bdd->query("SELECT * FROM post WHERE id_categ = '".$_GET['param1']."' ORDER BY date DESC");
$count = 0;
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
    <div class="container">
        <div class="row">
            <div class="col-lg-8"> 
                <h1> A Sample Blog Pour My-Drupal </h1>
				<?php
				while ($donnees = $reponse->fetch())
{
?>
                <div class="my_style">
                <p> <span class="glyphicon glyphicon-time"> </span> Date du publication <?php echo $donnees['date'];?> </p>
                <hr>
				<a class="btn btn-danger" href="delete_post_cat.php?action=delete_p&id_post=<?php echo (string) $donnees['id_post'];?>&par=<?php echo $_GET['param1']?>" > <i class="icon-trash icon-white"></i> Delete </a>
                <img alt="pas d'image" src="<?php echo $donnees['img'];?>" class="img-responsive">
                <hr>
                <p class="lead"> <?php echo $donnees['name_post'];?> </p>
				<p> <?php echo $donnees['post'];?> </p>
                <button type="button" class="btn btn-info btn-large" style="margin-left:600px;" onclick="<?php echo "display_comm".(string) $count."()" ;?>;return false">Comments</button>   
                    <script type="text/javascript">
                        function <?php echo "display_comm".(string) $count."()";?>{
                            var div = document.getElementById(<?php echo "'".(string) $count."'";?>);
                            if (div.className == "well comm_class_hide")
                                div.className = " well comm_class_show";
                            else
                                 div.className = "well comm_class_hide";
                        }
                    </script>
                    <div class="well comm_class_hide" id="<?php echo (string) $count;?>">
                        <h4>Laisser un commentaire:</h4>
                        <form role="form" method="post" action="admin_categorie.php?param1=<?php echo $_GET['param1']?>" id="form">
                        <div class="form-group">
							<input class="form-control" type="text" value="" placeholder="pseudo" name="pseudo" required>
                            <textarea class="form-control" rows="3" style="max-width:660px;min-width:660px;" placeholder="Votre commentaire" name="com" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" value="<?php echo (string) $donnees['id_post']?>" name="sub">Submit</button>
                        </form>
                        <hr>
						<?php 
						$show_comm = $bdd->query("SELECT * FROM commentaire WHERE id_post = '".(string) $donnees['id_post']."'");
						while ($show = $show_comm->fetch())
						{
						?>
                        <h3>
						<a class="btn btn-danger" href="delete_post_cat.php?action=delete_c&id_com=<?php echo (string) $show['id_com']?>&par=<?php echo $_GET['param1']?>"> <i class="icon-trash icon-white"></i> Delete </a>						
						<?php echo $show['pseudo'];?> <small> <?php echo $show['date'];?> </small> </h3>
                        <p> <?php echo $show['com'];?> </p>
						<?php
						}
						?>
                    </div>
                </div>
<?php
$count++;
}
?>
						<?php 
						if (isset($_POST['com']) && $_POST['com'] != "")
						{
						$add_com = $bdd->exec("INSERT INTO commentaire (id_post, pseudo, com) VALUES ('".$_POST['sub']."','".$_POST['pseudo']."','".$_POST['com']."')");
						header('location: admin_categorie.php?param1='.$_GET['param1']);
						}
						?>
            </div>

            <div class="col-lg-4" style="position:fixed; margin-left:800px;">
                <div class="well">
                    <h4>Blog Search <span class="glyphicon glyphicon-search"></span></h4>
                    <div class="input-group">
                        <input type="text" class="form-control"  value ="" onkeyup="showResult(this.value)" style="max-width:500px;">
						<div id="livesearch"></div>		
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /well -->
                <div class="well">
                    <h4>Popular Blog Categories</h4>
                    <div class="row">
					<?php 
					$counter = 1;
					$show_categories = $bdd->query("SELECT * FROM categorie");
					while ($show_cat = $show_categories->fetch()) { ?>
                        
							<?php if ($counter == 1) {?>
							<div class="col-lg-6">
                            <ul class="list-unstyled">
							<?php } ?>
                                <li><a href="<?php echo "admin_categorie.php?param1=".(string)$show_cat['id_categ'];?>"> <?php echo $show_cat['name_categ'];?> </a>
                                </li>
                                <?php if ($counter == 4) {?>
                            </ul>
                        </div>
						<?php 
						$counter = 0;
						} ?>
					<?php
					$counter++;
					}
					if ($counter != 1)
					{
					?>
					   </ul>
                        </div>
					<?php } ?>	
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="script.js"></script>
</body>

</html>