<?php
	include('options1.php');
	$page="inscription";
	include("header.php");
?>

 <?php
mysql_connect($hote , $utilisateur, $motDePasse);
mysql_select_db($baseDeDonnees);	

//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['mail']) and isset($_POST['password']))
{
//3.1.1 Assigning posted values to variables.
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	//If mail contain a "@" then :
	if (strpos($mail,'@') !== false)
	{
	//3.1.2 Checking the values are existing in the database or not
	$sql = "SELECT * FROM teams AS T INNER JOIN personAndTeams AS A ON T.id  = A.teams_id  INNER JOIN person AS P ON P.id = A.person_id WHERE P.mail='$mail' AND T.password=sha1('$password') LIMIT 1"; // On peut utiliser LIKE
    $result = mysql_query($sql);
    $count=mysql_num_rows($result);
	    if($count==1) {
	        // on demarre la session
			session_start ();
			// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
			$_SESSION['mail'] = $mail;
			$_SESSION['password'] = $password;
				
			echo "<p>Logged in successfully</p>";

			// on redirige notre visiteur vers une page de notre section membre
			// header ('location: page_perso.php');
			?>
				<meta http-equiv="refresh" content="2; url=/page_perso_edition.php "> <!-- http://'.$_SERVER['SERVER_NAME']. -->
			<?php
			exit();
	    }
	    else {

			echo "<p>Invalid mail/password combination</p>";
			mysql_close(); // Déconnexion de MySQL
			?>
				<meta http-equiv="refresh" content="1; url= login.php ">
			<?php
	    }
	}
	else {
		echo "<p>Please login with your email. Example : example@gmail.com </p>";
		mysql_close(); // Déconnexion de MySQL
		?>
			<meta http-equiv="refresh" content="1; url= login.php ">
		<?php
    }
}
//mysql_close(); // Déconnexion de MySQL
?>

<fieldset>
<legend>Authentification en cours - veuillez patienter</legend>
</fieldset>
				
<?php include("footer.php");?>