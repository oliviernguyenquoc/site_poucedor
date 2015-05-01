<?php
	session_start();	
	include('options1.php');
	mysql_connect($hote , $utilisateur, $motDePasse);
	mysql_select_db($baseDeDonnees);
	$page='login';
	include("header.php");
	include("helper.php");
?>

<h1>Page perso</h1>

<!-- Récupération de toutes les données des candidats, de leur binome et de tout ce qui est associés -->
<?php 
	$mail=$_SESSION['mail'];

	// Re-vérificaition du mail et du mot de passe
	// isset(SESSION[]) et corélation avec la base de donnée -> Regarder les méthodes sur internet

	if(isset($mail))
	{
		$resultsql1 = mysql_query ("SELECT * FROM teams AS T INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id INNER JOIN ecole E ON E.id=T.ecole_id WHERE P.mail = '$mail' ") OR die(mysql_error());
		$data1 = mysql_fetch_array($resultsql1);
		$resultsql2 = mysql_query ("SELECT * FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id  INNER JOIN teams AS T ON T.id = A.teams_id WHERE P.mail = '$mail' LIMIT 1 ") OR die(mysql_error());
		$data2 = mysql_fetch_array($resultsql2);
		$teamTemp=$data2['teams_id'];
		$resultsql3 = mysql_query ("SELECT * FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id  INNER JOIN teams AS T ON T.id = A.teams_id WHERE P.mail != '$mail' AND A.teams_id='$teamTemp'") OR die(mysql_error());
		$data3 = mysql_fetch_array($resultsql3);
		$resultsql4 = mysql_query ("SELECT * FROM actionRemarquable AS AR INNER JOIN teams AS T ON AR.teams_id = T.id INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id WHERE P.mail = '$mail' ") OR die(mysql_error());
		$actions= mysql_fetch_array($resultsql4);
?>
	
	<div id="title">
		<h3><?php echo humanize($data1['nomBinome']); ?> (Edition <?php echo $data1['yearOfCompetition']; ?>)</h3>
		<h4>
			<?php 
				$x = $data1['sigle'];
				switch($x) {
					case CN:
						echo "Ecole Centrale de Nantes";
						$departurePoint="Ecole+Centrale+de+Nantes,Nantes";
						break;
					case CLi:
						echo "Ecole Centrale Lille";
						$departurePoint="Ecole+Centrale+de+Lille,Villeneuve-d'Ascq";
						break;
					case CLy:
						echo "Ecole Centrale Lyon";
						$departurePoint="Ecole+Centrale+de+Lyon,Écully";
						break;	
					case CM:
						echo "Ecole Centrale Marseille";
						$departurePoint="Ecole+Centrale+de+Marseille,Marseille";
						break;			
					case COE:
						echo "College d’osthéopathie européen de Cergy Pontoise";
						$departurePoint="College+d+osthéopathie+européen+de+Cergy+Pontoise,Cergy+Pontoise";
						break;
					case ESTP:
						echo "ESTP";
						$departurePoint="ESTP,Cachan";
						break;
					case FDL:
						echo "Faculté de Droit de Lille";
						$departurePoint="Faculte+de+Droit+de+Lille,Lille";
						break;
					case EL:
						echo "L’estaca Laval";
						$departurePoint="L’estaca+Laval,Laval";
						break;
					case EN:
						echo "Ensica";
						$departurePoint="Ensica,Toulouse";
						break;
					case MDN:
						echo "Mines de Nantes";
						$departurePoint="Mines+de+Nantes,Nantes";
						break;	
					case SupRen:
						echo "Supelec Rennes";
						$departurePoint="Supelec+Rennes,Rennes";
						break;			
					case SupGif:
						echo "Supelec Gif";
						$departurePoint="Supelec+Gif,Gif-sur-Yvette";
						break;
					case SupOpt:
						echo "Supoptique";
						$departurePoint="Supoptique,Palaiseau";
						break;
					case MSE:
						echo "Mines de St Etienne";
						$departurePoint="Mines+de+St+Etienne,Saint-Étienne";
						break;
					case INP:
						echo "INP Grenoble";
						$departurePoint="INP+Grenoble,Grenoble";
						break;
					case TSE:
						echo "Télécom St Etienne";
						$departurePoint="Télécom+St+Etienne,Saint-Étienne";
						break;
				}
			?>
		</h4>
	</div>

	<div id="blocPouceux1">
		Pouceux 1<br/>
		Nom : <?php echo humanize($data2['nom']); ?> <br/>
		Prenom : <?php echo humanize($data2['prenom']); ?> <br/>
	</div>
	<div id="blocPouceux2">
		Pouceux 2</br>
		Nom : <?php echo humanize($data3['nom']); ?> <br/>
		Prenom : <?php echo humanize($data3['prenom']); ?> <br/>
	</div>
	<br/>

	<!-- Toutes les informations sur le trajet du binome -->
	<?php include("page_perso_edition_trajet.php"); ?>

	<!-- Tout le récit du trajet du binome -->
	<?php include("page_perso_edition_recit.php"); ?>

<!-- Photo -->

<!-- Restriction de l'accès (peut être surement mieux fait) -->
<?php	
}
else
{ 
	echo "<strong> Vous n'avez pas accès à cette page </strong>";
	?>
	<meta http-equiv="refresh" content="0; url=/login.php ">
	<?php
}
?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  	<script>
  		function editFonction(idVisible,idInvisible){
	    	$("#" + idVisible).hide();
	    	$("#" + idInvisible).show();
	    }
  	</script> 

<?php include("footer.php");?>