<?php
	session_start();
	include('options1.php');
	$page="inscription";
	include("header.php");
	include("helper.php");
?>

<?php
mysql_connect($hote , $utilisateur, $motDePasse);
mysql_select_db($baseDeDonnees);	

$ville = mysql_real_escape_string(htmlspecialchars($_POST['ville']));
$pays = mysql_real_escape_string(htmlspecialchars($_POST['pays']));
$comment=$_POST['comment'];
$nomAction=mysql_real_escape_string(htmlspecialchars($_POST['nomAction']));
$mail=$_SESSION['mail'];
$distance = (isset($_POST["ditanceInKilometre"])) ? $_POST["ditanceInKilometre"] : NULL;

// Cherche le binome pour le calcule de distance
$resultsql1 = mysql_query ("SELECT * FROM teams AS T INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id WHERE P.mail = '$mail' ") OR die(mysql_error());
$data1 = mysql_fetch_array($resultsql1);

// Departure Point
$ecole = $data1['ecole_id'];
switch($ecole) {
	case 1:
		$departurePoint="Ecole+Centrale+de+Nantes,Nantes";
		break;
	case 2:
		$departurePoint="Ecole+Centrale+de+Lille,Lille";
		break;		
}

// Arrival Point
$arrivalPoint=str_replace(" ","+",$ville).",".str_replace(" ","+",$pays);

// Calcule de la distance
$distance = getDistance($departurePoint,$arrivalPoint) / 1000;


// A modifier
// var_dump($nomAction);
//var_dump($data1[0]);

if(!empty($comment))
{
	mysql_query("UPDATE teams AS T INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id SET T.comment='$comment', T.is_modified=1 WHERE P.mail = '$mail' ");
}
if(!empty($ville))
{
	mysql_query("UPDATE teams AS T INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id SET T.distance='$distance',T.ville='$ville', T.pays='$pays', T.is_modified=1 WHERE P.mail = '$mail' ");
}
if(!empty($nomAction))
{
	$teamsId=$data1[0]; //Probleme de diffenrentiation teams.id et person.id
	//var_dump($nomAction);
	//var_dump($teamsId);
	mysql_query("INSERT INTO actionRemarquable SET teams_id=$teamsId, nomAction='$nomAction' ") OR die(mysql_error());
	mysql_query("UPDATE teams AS T INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id SET T.is_modified=1 WHERE P.mail = '$mail' ");

}
mysql_close(); // Déconnexion de MySQL
?>

<meta http-equiv="refresh" content="1; url= page_perso_edition.php ">
<fieldset>
<legend>Envoi en cours - veuillez patienter</legend>
</fieldset>
				
<?php include("footer.php");?>