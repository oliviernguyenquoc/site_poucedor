<?php 
	$page='login';
	include("header.php");
?>


<h1>Login</h1>

<div>
<p>Chaque binôme dispose d'une page perso sur le site du Pouce d'Or<br/> <br/>
Tu peux ici poster la photo de ton binôme, donner l'endroit où tu es aller et même raconter ton aventure.
</p>
</div>

<div>
	<form action="login_form.php" method="post">
		<label for="mail">Un des mails du binôme :</label> <br/>
		<input type="text" id="mail" name="mail" value=""/>
		<br/>
		<label for="password">Mot de passe du binôme (celui donné à l'inscription au concours) :</label> <br/>
		<input type="password" id="password" name="password" value="" maxlength="20" />
		<br/>
		<input type="submit" value="submit" id="submit"  name="Envoyer"/>
	</form>
</div>


<?php include("footer.php");?>