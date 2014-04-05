<?php
session_start();
$pass = "troubal";
$user = "drupal";
$server = "localhost";
$db = "drupal";
try
{
    $bdd = new PDO('mysql:host=' . $server . ';dbname=' . $db . ';charset=UTF8', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>