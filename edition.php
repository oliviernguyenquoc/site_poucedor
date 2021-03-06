 <?php 
	$page='edition';
	include("header.php");
?>

<!--
Racourcis moches sur le nouveau site
<div id="menuconseils">
	<a href="#carte">1. Les écoles qui participent cette année</a><br />
	<a href="#dates">2. Les Dates</a>
</div>
-->

<h1>Edition 2014 : Tous ce que tu dois savoir</h1>

<script>

function efface()
{
	var list=document.getElementById("enc");
	for (i=0; i < 15; i++)
	{
		list.getElementsByTagName("LI")[i*2+1].style.display = "none";
	}
}

function affiche(num)
{
	efface();
	var list=document.getElementById("enc");
	list.getElementsByTagName("LI")[num*2+1].style.display = "block";
}

</script>

<div id="conseils">

	<h2 id="carte">Les écoles qui participent cette année</h2>  <!--A refaire sous forme de base de donnée-->
	
	<img id="carteecoles" src="images/Carte_pouce_2013.png" class="float" alt="carte ecoles 2013" title="Carte des écoles particpants au Pouce d'Or 2013" /><br/>
	
	<B>Cette année encore, plusieurs écoles nous ont rejoint !</B> :<br> Pour cette année, 15 écoles participent à l'aventure :<br/><br/>
	<ul id="enc">
		<li onmouseover="affiche(0)">Centrale Nantes</li>
			<li id="orgas" style="display: block;"><u>Organisateur:</u><br/><B>Alexandre Raguénès</B><br/>alexandre.raguenes@eleves.ec-nantes.fr<br/><B>Olivier Nguyen Quoc</B><br/>olivier.nguyen-quoc@eleves.ec-nantes.fr</li>
		<li onmouseover="affiche(1)">Centrale Lille</li>
			<li id="orgas" style="display:none"><u>Organisateurs:</u><br/><B>Maxime Fleury</B><br/>fleurymaxime666@gmail.com<br/><B>Pierre Delannoy</B><br/>pierre.delannoy.13@centraliens-lille.org</li>
		<li onmouseover="affiche(2)">Centrale Paris</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Gabriel Rogosic</B><br/>gabriel.rogosic@student.ecp.fr<br/><br/></li>
		<li onmouseover="affiche(3)">Centrale Lyon</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Maxime Guillemont</B><br/>maxime.guillement@ecl2015.ec-lyon.fr<br/><br/></li>
		<li onmouseover="affiche(4)">Centrale Marseille</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Tom Meallant</B><br/>tom.meallant@centrale-marseille.fr<br/><br/></li>
		<li onmouseover="affiche(5)">HEI</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>David Treca</B><br/>david.treca@hei.fr<br/><br/></li>
		<li onmouseover="affiche(6)">ILLIS</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Lucie Walle</B><br/>walle@hotmail.fr<br/><br/></li>
		<li onmouseover="affiche(7)">ITEM</li>
			<li id="orgas" style="display:none"><u>Organisateurs:</u><br/><B>Maxime Fleury</B><br/>fleurymaxime666@gmail.com<br/><B>Pierre Delannoy</B><br/>pierre.delannoy.13@centraliens-lille.org</li>
		<li onmouseover="affiche(8)">Mines de St Etienne</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Rémi Bonnel</B><br/>remi.bonnel@etu.emse.fr<br/><br/></li>
		<li onmouseover="affiche(9)">Science Po Lille</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Sylvain Capet</B><br/>sylvain.capet@gmail.com<br/><br/></li>
		<li onmouseover="affiche(10)">Supélec</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Ghada Ben Hassine</B><br/>ghada.benhassine@supelec.fr<br/><br/></li>
		<li onmouseover="affiche(11)">Supaéro</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Charlotte Dietrich</B><br/>charlotte.dietrich@supaero.isae.fr<br/><br/></li>
		<li onmouseover="affiche(12)">Oniris</li>
			<li id="orgas" style="display:none"><u>Organisateurs:</u><br/><B>Noémie Nguyen</B><br/>noemie.nguyen@oniris-nantes.fr<br/><B>Arnaud Gernigon</B><br/>arnaud.gernigon@oniris-nantes.fr</li>
		<li onmouseover="affiche(13)">Université de Lille 1</li>
			<li id="orgas" style="display:none"><u>Organisateurs:</u><br/><B>Sylvain Capet</B><br/>sylvain.capet@gmail.com<br/><B>Sébastien Delannoy</B><br/>sebastiendelannoy@hotmail.fr</li>
		<li onmouseover="affiche(14)">Université de Lille 2</li>
			<li id="orgas" style="display:none"><u>Organisateur:</u><br/><B>Lucie Walle</B><br/>walle@hotmail.fr<br/><br/></li>
	</ul>
	<br/>
	
	<h2 id="dates">Les Dates à ne pas rater</h2>
	
	<br/><B>Lundi 15 septembre</B> : Ouverture des inscriptions en ligne : <a href="new_binome">Inscription</a><br/>
	<br/><B>Mercredi 24 septembre à 23h59</B> : Fermeture des inscriptions en ligne<br/>
	<br/><B>Samedi 27 septembre à 8h20</B> : Rendez-vous au point de rencontre pour les derniers points de sécurité et la distribution des gilets jaunes (si votre école bénéficie du partenariat avec Gotoo). On en profite pour sortir son plus beau sourire pour les photos d'avant départ<br/>
	<br/><B>Samedi 27 septembre à 9h</B> : Départ pour l'aventure<br/>
	<br/><B>Samedi 27 septembre à 19h27</B> : Tu envoies un message à ta maman pour la rassurer, par la même occasion à quelqu'un à Nantes et tu partages ton itinéraire sur GoToo<br/>
	<br/><B>Dimanche 28 septembre à 13h12</B> : Tu renvoies un message à ta maman et à Nantes et tu mets à jour ton aventure sur GoToo<br/>
	<br/><B>Lundi 29 septembre à 8h</B> : Début des Amphi donc fin du Pouce d'Or. Alors comment c'était?<br/>
	<br/><B>Mercredi 01 octobre à 15h</B> : Si tu arrives maintenant c'est que tu t'es perdu en route ou que tu es allé en Pologne<br/>
	<br/><B>Semaine du 29 septembre au 5 octobre</B> : Tu parles du Pouce d'Or avec tous tes potes et tu fais partager tes experiences<br/>
	<br/><br/>
</div>

<?php include("footer.php"); ?>