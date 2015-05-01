<?php
	include('options1.php');
	$page="inscription";
	include("header.php");
?>

 <?php
mysql_connect($hote , $utilisateur, $motDePasse);
mysql_select_db($baseDeDonnees);	

$prenom1= mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['prenom1'])));
$nom1= mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['nom1'])));
$sexe1= mysql_real_escape_string(htmlspecialchars($_POST['sexe1']));
$promo1= mysql_real_escape_string(htmlspecialchars($_POST['promo1']));
$mail1= mysql_real_escape_string(htmlspecialchars($_POST['mail1']));
$tel1= mysql_real_escape_string(htmlspecialchars($_POST['tel1']));
$prenom2= mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['prenom2'])));
$nom2= mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['nom2'])));
$sexe2= mysql_real_escape_string(htmlspecialchars($_POST['sexe2']));
$promo2= mysql_real_escape_string(htmlspecialchars($_POST['promo2']));
$mail2= mysql_real_escape_string(htmlspecialchars($_POST['mail2']));
$tel2= mysql_real_escape_string(htmlspecialchars($_POST['tel2']));
$nomBinome= mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['nomBinome'])));
$ecole= mysql_real_escape_string(htmlspecialchars($_POST['ecole']));
$estimation=mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['estimation'])));			
$commentaire= mysql_real_escape_string(htmlspecialchars(ucfirst($_POST['commentaire'])));
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$creationDate=date("d-m-Y-H-i-s");
$year=idate("Y");

if($password1 != $password2)
{
	header ('Location: inscription.php');
}
    
if(strlen ($username) > 30)
{
	header ('Location: inscription.php');
}
    
$password = sha1($_POST['password1']);

$resultsql = mysql_query ("SELECT * FROM ecole WHERE ( sigle='$ecole')") OR die(mysql_error());
$data4 = mysql_fetch_array($resultsql);
$ecoleid=$data4['id'];
mysql_query("INSERT INTO teams SET nomBinome='$nomBinome',estimation='$estimation',commentaire='$commentaire', password='$password',yearOfCompetition='$year',ecole_id='$ecoleid'") OR die(mysql_error());
mysql_query("INSERT INTO person VALUES('','$nom1','$prenom1','$sexe1','$promo1','$mail1','$tel1','$creationDate','$creationDate')") OR die(mysql_error());
mysql_query("INSERT INTO person VALUES('','$nom2','$prenom2','$sexe2','$promo2','$mail2','$tel2','$creationDate','$creationDate')") OR die(mysql_error());    

$resultsql = mysql_query ("SELECT * FROM teams WHERE ( nomBinome='$nomBinome' AND password='$password' ) ") OR die(mysql_error());
$data1 = mysql_fetch_array($resultsql);
$resultsql = mysql_query ("SELECT * FROM person WHERE ( nom='$nom1' AND prenom='$prenom1' ) ") OR die(mysql_error());
$data2 = mysql_fetch_array($resultsql);
$resultsql = mysql_query ("SELECT * FROM person WHERE ( nom='$nom2' AND prenom='$prenom2' ) ") OR die(mysql_error());
$data3 = mysql_fetch_array($resultsql);

$idPerson1=$data2['id'];
$idPerson2=$data3['id'];
$idTeam=$data1['id'];

mysql_query("INSERT INTO personAndTeams VALUES('$idTeam','$idPerson1')") OR die(mysql_error());
mysql_query("INSERT INTO personAndTeams VALUES('$idTeam','$idPerson2')") OR die(mysql_error());    

mysql_close(); // Déconnexion de MySQL
?>

<meta http-equiv="refresh" content="0; url= liste.php ">
<fieldset>
<legend>Enregistrement en cours- veuillez patienter</legend>
</fieldset>
				
<?php include("footer.php");?>