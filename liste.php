<?php 	
$page='liste';
include("header.php");

include('options1.php');
mysql_connect($hote , $utilisateur, $motDePasse);
mysql_select_db($baseDeDonnees);
?>

<?php
$reponse = mysql_query("SELECT * FROM teams WHERE yearOfCompetition=2014 ORDER BY id") OR die(mysql_error());
$nbBinom=mysql_num_rows($reponse);
echo '<blockquote><h1>'.$nbBinom.' Binômes sont inscrits pour le Pouce d\'Or 2014</h1></blockquote>'; 
?>

<p> <font color="red" <b> Attention votre inscription ne sera définitive qu'à la signature de la décharge, le jour du départ.  </b> </font> </p>

		<?php
			$reponse2 = mysql_query("SELECT * FROM ecole WHERE autoriseInscription=1 ORDER BY nom") OR die(mysql_error());
			while($donnees2=mysql_fetch_array($reponse2)){
				echo'<h3>'.$donnees2['nom'].'</h3>';
			?>
		<table>
			<thead>
				<th>Team</th>
				<th>Prénom</th>
				<th>Sexe</th>
				<th>Promo</th>
				<th>Objectif</th>
				<th>Petit mot pour la route</th> 
			</thead>
			<tbody>
			<?php
				$i=0;
				$nomEcole=$donnees2['sigle'];
				$reponse = mysql_query("SELECT * FROM teams INNER JOIN ecole ON teams.ecole_id=ecole.id WHERE ecole.sigle='$nomEcole' AND yearOfCompetition=2014 ORDER BY teams.id") OR die(mysql_error());
				
				if($reponse === FALSE) {
				    die(mysql_error()); // TODO: better error handling
				}

				while($donnees = mysql_fetch_array($reponse)){
					$idTeam=$donnees['id'];
					$resultsql2 = mysql_query ("SELECT * FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id INNER JOIN teams AS T ON T.id = A.teams_id WHERE T.id = '$idTeam' LIMIT 1 ") OR die(mysql_error());
					$person1 = mysql_fetch_array($resultsql2);
					$resultsql3 = mysql_query ("SELECT * FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id INNER JOIN teams AS T ON T.id = A.teams_id WHERE T.id = '$idTeam' LIMIT 1, 1 ") OR die(mysql_error());
					$person2 = mysql_fetch_array($resultsql3);
					$nomBinome=nl2br(stripslashes($donnees['nomBinome']));
					echo'<tr> <td>'.$nomBinome.'</td>';
					echo'<td>'.$person1['prenom'].'<br/>'.$person2['prenom'].'</td>';
					echo'<td>'.$person1['sexe'].'<br/>'.$person2['sexe'].'</td>';
					echo'<td>'.$person1['promo'].'<br/>'.$person2['promo'].'</td>';
					$estimation=nl2br(stripslashes($donnees['estimation']));
					echo'<td>'.$estimation.'</td>';
					$commentaire=nl2br(stripslashes($donnees['commentaire']));
					echo'<td>'.$commentaire.'</td> </tr>';
				}
			?>
			</tbody>
		</table>
				<?php							
			}
				?>


<?php include("footer.php"); ?>