<?php
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
	$idPage=$_GET['id'];
	$resultsql1 = mysql_query ("SELECT * FROM teams WHERE id = '$idPage' ") OR die(mysql_error());
	$data1 = mysql_fetch_array($resultsql1);

	if($data1['is_modified']=1 && $idPage >0 && $idPage <10000000)
	{
		$resultsql2 = mysql_query ("SELECT * FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id INNER JOIN teams AS T ON T.id = A.teams_id WHERE T.id = '$idPage' LIMIT 1") OR die(mysql_error());
		$data2 = mysql_fetch_array($resultsql2);
		$resultsql3 = mysql_query ("SELECT * FROM person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id INNER JOIN teams AS T ON T.id = A.teams_id WHERE T.id = '$idPage' LIMIT 1, 1") OR die(mysql_error());
		$data3 = mysql_fetch_array($resultsql3);
		$resultsql4 = mysql_query ("SELECT * FROM actionRemarquable AS AR INNER JOIN teams AS T ON AR.teams_id=T.id WHERE T.id = '$idPage' ") OR die(mysql_error());
		$actions= mysql_fetch_array($resultsql4);
?>

	<img id="imgBinome1" src="images/binome_'$data2['nom']'_'$data2['create_time']'" onerror="this.src='images/binomeDefault1.png'" alt="Photo du binome">
	<img id="imgBinome2" src="images/binome_'$data3['nom']'_'$data3['create_time']'" onerror="this.src='images/binomeDefault2.png'" alt="Photo du binome">
	<div id="title">
		<h3><?php echo humanize($data1['nomBinome']); ?> (Edition <?php echo $data1['yearOfCompetition']; ?>)</h3>
		<h4>
			<?php 
				$x = $data1['ecole_id'];
				switch($x) {
					case 1:
						echo "Ecole Centrale de Nantes";
						$departurePoint="Ecole+Centrale+de+Nantes,Nantes";
						break;
					case 2:
						echo "Ecole Centrale Lille";
						$departurePoint="Ecole+Centrale+de+Lille,Lille";
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
	<?php include("page_perso_trajet.php"); ?>

<?php if(!empty($data1['comment'])) 
{
	// Tout le récit du trajet du binome
	include("page_perso_recit.php"); 
}
?>



<!-- Photo -->

<!-- Restriction de l'accès (peut être surement mieux fait) -->
<?php	
}
else
{ 
	echo "<strong> Vous n'avez pas accès à cette page </strong>";
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