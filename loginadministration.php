<?php 
	$page='login';
	include("header.php");
?>


<h1>Login Administration</h1>

<div>
<p>Responsable d'école : Ceci est ta page<br/> <br/>
</p>
</div>

<div>
	<form action="loginadministration_form.php" method="post">
		<label for="identifiant">Identifiant</label> <br/>
		<input type="text" id="identifiant" name="identifiant" value=""/>
		<br/>
		<label for="password">Mot de passe</label> <br/>
		<input type="password" id="password" name="password" value="" maxlength="20" />
		<br/>
		<input type="submit" value="submit" id="submit"  name="Envoyer"/>
	</form>
</div>


<?php include("footer.php");?>