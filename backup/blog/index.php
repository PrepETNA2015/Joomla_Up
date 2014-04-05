<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
header('location: admin_accueil.php');
else
header('location: index_init.php');
?>