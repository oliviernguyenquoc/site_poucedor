<?php
	include('options1.php');
	mysql_connect($hote , $utilisateur, $motDePasse);
	mysql_select_db($baseDeDonnees);
	$page='login';
	include("header.php");
	include("helper.php");
?>

<h1>Le classement</h1>

<?php 
	$resultsql1 = mysql_query ("SELECT * FROM teams WHERE distance IS NOT NULL AND yearOfCompetition=2014 ORDER BY distance ") OR die(mysql_error());
	$team = mysql_fetch_array($resultsql1);
?>

<table>
	<tr>
	  <th>Classement</th>
	  <th>Equipe</th> 
	  <th>Prénoms</th>
	  <th>Destination</th>
	  <th>km</th>
	  <th>Ville de départ</th>
	</tr>

<?php 
	if(mysql_num_rows($resultsql1) > 0)
	{
		$rang=0;
		$rangAdd=0;
		while ($team)
			{
				$idPage=$team['id'];
				$resultsql2 = mysql_query ("SELECT prenom FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id INNER JOIN teams AS T ON T.id = A.teams_id WHERE T.id = '$idPage' LIMIT 1 ") OR die(mysql_error());
				$person1 = mysql_fetch_array($resultsql2);
				$resultsql3 = mysql_query ("SELECT prenom FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id INNER JOIN teams AS T ON T.id = A.teams_id WHERE T.id = '$idPage' LIMIT 1, 1 ") OR die(mysql_error());
				$person2 = mysql_fetch_array($resultsql3);
				if($team['distance']!=$ancienneDistance)
				{
					$rang+=1;
					$rang+=$rangAdd;
					$rangAdd=0;
				}
				else
				{
					$rangAdd+=1;
				}
				$ancienneDistance=$team['distance'];
?>
	<tr>
		<td><?php echo($rang); ?></td>
		<td><?php 
		if($team['is_modified']=1)
		{
			echo('<a href="/page_perso.php?id='.$team['id'].'">'.$team['nomBinome'].'</a>');   
		}
		else
		{
			echo($team['nomBinome']);
		}
			?></td>
		<td><?php echo($person1['prenom']." & ".$person2['prenom']); ?></td>
		<td><?php echo($team['ville'].", ".$team['pays']); ?></td>
		<td><?php echo($team['distance']); ?></td>
		<td><?php
	  			$x = $team['ecole'];
				switch($x) {
					case CN:
						echo "Nantes";
						break;
					case CLi:
						echo "Lille";
						break;		
				}
		?></td>
	</tr>
<?php
		$team= mysql_fetch_array($resultsql1);
		}
	}
?>
</table>

							
<?php include("footer.php");?>