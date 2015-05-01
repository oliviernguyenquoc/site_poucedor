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
	$identifiant=$_SESSION['identifiant'];

	if(isset($identifiant))
	{
		$resultsql1 = mysql_query ("SELECT * FROM teams AS T INNER JOIN teamsAndAdmin AS TAA ON T.id  = TAA.teams_id  INNER JOIN admin AS A ON A.id = TAA.admin_id WHERE TAA.identifiant=$identifiant ") OR die(mysql_error());
		$data1 = mysql_fetch_array($resultsql1);
?>

<h3>Information de vos équipes</h3>

<p>
	Ces informations peuvent vous être utiles avant et pendant la course.
</p>

<table>
	<tr>
	  <th>Nom du binome</th>
	  <th>Nom 1</th>
	  <th>Prénom 1</th>
	  <th>Promo 1</th>
	  <th>Sexe 1</th>
	  <th>Mail 1</th>
	  <th>Teléphone 1</th>
	  <th>Nom 2</th>
	  <th>Prénom 2</th>
	  <th>Promo 2</th>
	  <th>Sexe 2</th>
	  <th>Mail 2</th>
	  <th>Teléphone 2</th>
	</tr>
	<!-- Ajouter boucle sur les équipes et remplir automatiquement le tableau-->
	<tr>
	  <td></td>
	  <td></td> 
	  <td></td>
	  <td></td>
	  <td></td> 
	  <td></td>
	  <td></td>
	  <td></td> 
	  <td></td>
	  <td></td>
	  <td></td> 
	  <td></td>
	  <td></td>
	</tr>
</table>

<h3>Après la course</h3>

<p>
	Ces informations sont là pour la soirée post-Pouce. Vous avez toutes les infos rentrés par vos équipes.
</p>


<table>
	<tr>
	  <th>Nom du binome</th>
	  <th>Nom 1</th>
	  <th>Prénom 1</th>
	  <th>Nom 2</th>
	  <th>Prénom 2</th>
	  <th>Distance</th>
	  <th>Ville, Pays d'arrivé</th>
	  <th>Annecdotes</th>
	</tr>
	<!-- Ajouter boucle sur les équipes et remplir automatiquement le tableau-->
	<tr>
	  <td></td>
	  <td></td> 
	  <td></td>
	  <td></td>
	  <td></td> 
	  <td></td>
	  <td></td>
	  <td></td> 
	</tr>
</table>

<?php include("footer.php");?>