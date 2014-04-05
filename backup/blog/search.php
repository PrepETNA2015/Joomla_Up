<?php
include ('db.php');

$x_t = $bdd->query("SELECT name_post,id_post FROM post");

$q=$_GET["q"];
if (strlen($q)>0)
{
$hint="";
while ($x = $x_t->fetch())
  {    
    if (stristr($x['name_post'],$q))
      {
      if ($hint=="")
        {
        $hint="<a href='one_post.php?id_post=" .$x['id_post']  . "'>" . $x['name_post'] . "</a>";
        }
      else
        {
        $hint=$hint . "<br /><a href='one_post.php?id_post=" . $x['id_post'] . "'>" . $x['name_post']  . "</a>";
        }
      }
    }
  }
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  
  }
echo $response;
?>