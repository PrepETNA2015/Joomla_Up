<!DOCTYPE html>
<?php 
 //error_reporting(E_ALL);
 //ini_set("display_errors", 1);
 date_default_timezone_set('UTC');
function gcd($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}
?>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>INTERPOLATION</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">
</head>
<body>
<?php
$handle = 1;
 if(isset($_POST['action']) || isset($_POST['action2']) || isset($_POST['action3']))
	$handle = 0;
	if ($handle == 1)
	{
	?>
	<form class="form" role="form" action="" method="post" >
        <h2 class="form"> Choisissez le nombre 'n' de points </h2>
        <select name="class" class="form-control"style="max-width:75px;">
		 <option selected>n=?</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
		</select>
		<br />
        <button class="btn" type="submit" name="action" value="1" style="max-width:500px;">Envoyer</button>
      </form>
	<?php
	}
	?>
	  <?php
	  if(isset($_POST['action']) && $_POST['action'] == 1 && $_POST['class'] != "n=?")
	  {
		if (!isset($nbr))
			$nbr = $_POST['class'];
		echo '<form class="form" role="form" action="" method="post" name="class2">';
		for ($i=0; $i <= $_POST['class']; $i++)
		{
			echo '<input type="text" class="form-control" placeholder="x'.$i.'" name="xx'.$i.'" style="max-width:200px;" />';
		}
		echo "<br>";
		for ($i=0; $i <= $_POST['class']; $i++)
		{
			echo '<input type="text" class="form-control" placeholder="y'.$i.'" name="yy'.$i.'" style="max-width:200px;" />';
		}
		echo "<br>";
		echo '<button class="btn" type="submit" name="action2" value="'.$nbr.'">Calculer</button>
		</form>';
	  }
	  if (isset($_POST['action2']))
	  {
		$n = $_POST['action2'];
		for ($i=0; $i <= $_POST['action2']; $i++)
		{
			$tx = "xx".$i."";
			$ty = "yy".$i."";
			$x[$i] = $_POST[$tx];
			$y[$i] = $_POST[$ty];
		}
	  }

	if (isset($x) && isset($y))
	{
		for ($i=0; $i <= $n ; $i++) { 
			$L[$i] = 1;
			for ($j=0; $j <= $n; $j++) { 
				if ($j != $i)
					$L[$i] = $L[$i] * ($x[$i] - $x[$j]);
			}
		}
		for ($i=0; $i <= $n ; $i++) { 
		
			if ($L[$i] < 0)
			{
				$L[$i] = $L[$i] * (-1);
				$y[$i] = $y[$i] * (-1);	
				$y[$i] = $y[$i] * 1;		
			}
		}
		for ($i=0; $i <= $n ; $i++) { 
		$ppcm = gcd($y[$i],$L[$i]);
			$L[$i] = $L[$i] / $ppcm;
			$y[$i] = $y[$i] / $ppcm;	
		}
		for ($i=0; $i <= $n ; $i++) 
		{ 
			if (isset($L[$i+1]) && $L[$i] != $L[$i+1])
			{
				if ($L[$i] != $L[$i+1])
				{
					$ppcm = gcd($L[$i+1],$L[$i]);
					$pp = ($L[$i+1] * $L[$i]) / $ppcm;			
					$tmp = $pp / $L[$i+1]; 
					$L[$i+1] = $L[$i+1] * $tmp;
					$y[$i+1] = $y[$i+1] * $tmp;
					$tmp = $pp / $L[$i];
					$L[$i] = $L[$i] * $tmp;
					$y[$i] = $y[$i] * $tmp;
				}
			}
			else 
			{
				$y[$i] = $y[$i] * 1;
			}
			for ($j = $i; $j >= 0; $j--)
			{
				if ($L[$i] != $L[$j])
				{
					$ppcm = gcd($L[$j],$L[$i]);
					$pp = ($L[$j] * $L[$i]) / $ppcm;			
					$tmp = $pp / $L[$j]; 
					$L[$j] = $L[$j] * $tmp;
					$y[$j] = $y[$j] * $tmp;
					$tmp = $pp / $L[$i];
					$L[$i] = $L[$i] * $tmp;
					$y[$i] = $y[$i] * $tmp;
				}
			}
		}
	}
	for ($i = 0; $i <= $n; $i++)
	{
		for ($j=0; $j <= $n; $j++) { 
			if ($j < $i)
			{
			$var[$i][$j][0] = -$x[$j];
			$var[$i][$j][1] = 1;
			}
			else if ($j > $i)
			{
			$var[$i][$j-1][0] = -$x[$j];
			$var[$i][$j-1][1] = 1;
			}
		}
	}
	$j=0;
	for ($i = 0; $i <= $n; $i++)
		{
			$varx1[$i] = (($var[$i][$j+1][0]) + ($var[$i][$j][0]));
			$varx0[$i] = ($var[$i][$j][0] * $var[$i][$j+1][0]);
			$varx2[$i] = 1;
			for ($k = 3; $k <= $n; $k++)
			{
				${'varx'.$k}[$i] = 1;
				for ($l = $k - 1; $l >= 0; $l--)
				{
					$t = $l - 1;
					if ($t >= 0)
					{
					${'varx'.$l}[$i] = ((${'varx'.$l}[$i] * ($var[$i][$k - 1][0])) + (${'varx'.$t}[$i]));
					}
					else
					{
					${'varx'.$l}[$i] = ((${'varx'.$l}[$i] * ($var[$i][$k - 1][0])));
					}
				}
			}
		}
for($j=0; $j <= $n; $j++)
	{
		for ($i=0; $i <= $n; $i++) { 
			${'X'.$i} += (${'varx'.$i}[$j] * $y[$j]);
		}
	}
for ($i=0; $i <= $n; $i++) { 
			${'X'.$i} = (${'X'.$i} / $L[0]);
		}
	echo "<br />";
	if (isset($_POST['action2']))
	{
		$str = "P<sub>".$n."</sub>(X) =";
		for($j=$n; $j >= 0; $j--)
		{
		if ($j == 0 && ${'X'.$j} > 0)
			$str = $str."+".${'X'.$j};
		else if ($j == 0 && ${'X'.$j} < 0)
			$str = $str.${'X'.$j};
		if (${'X'.$j} > 0 && $j != 0)
			$str = $str."+".${'X'.$j}."X<sup>".$j."</sup>";
		else if (${'X'.$j} < 0 && $j != 0)
			$str = $str.${'X'.$j}."X<sup>".$j."</sup>";
		}	
		echo $str;
		echo "<br />";
		echo "Si vous voulez je peux calculez pour vous le polynôme si vous allez me donner la valeur du 'X'";
		echo "<br />";
		echo '<form class="form" role="form" action="" method="post" name="class3">
		<input type="text" class="form-control" placeholder="valeur X" name="valeur_x" style="max-width:200px;" />
		<br />
        <button class="btn" type="submit" name="action3" value="'.$X0.','.$X1.','.$X2.','.$X3.','.$X4.','.$n.'" style="max-width:500px;">Calculer</button>
      </form>';
	}
	if (isset($_POST['action3']))
	{
		$vars = explode(",", $_POST['action3']);
		$user_x = $_POST['valeur_x'];
		$P = $vars[4] * pow($user_x, 4)+($vars[3] * pow($user_x, 3))+($vars[2] * pow($user_x, 2)) + ($vars[1] * $user_x) + $vars[0];
		echo "P<sub>".$vars[5]."</sub>(".$user_x.") = ".$P;
	}
?>
</body>
</html>