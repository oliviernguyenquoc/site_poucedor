<?php 
	$page='archives';
	include("header.php");
?>

<!--
Racourcis moches sur le nouveau site
<div id="menuregles">
	<a href="editions_precedentes.php">Editions Précedentes</a><br />
	<a href="photos.php">Photos</a><br />
	<a href="videos.php">vidéos</a><br />
</div>
-->

<h1>Archives</h1>

<div id="regles">
<p>Tu es ici dans le vatican du Pouce d'Or.<br/> <br/> Ici repose en paix, sur un serveur dont la localisation m'est inconnue, la mémoire des vétérans du Pouce d'Or qui sont aujourd'hui des gens très serieux (ou pas)  
mais qui gardent en eux le souvenir d'un week-end démentiel passé à silloner les routes d'Europe, ou de France, ou de la Loire-Atlantique.</p>
</div>

<div class="MenuArchive">
<li>  
    <figure tabindex="0">
    <div id="TitreImage">&Eacute;ditions précédentes</div>
        <a href="editions_precedentes.php"><img alt="Editions précédentes" src="/images/essaie2.jpg" width="300px"/></a>  
        <a href="editions_precedentes.php"><figcaption><p>Le pouce d'or existe depuis très longtemps. Mais toute trace écrite, l'histoire donc, ne débute qu'en 2003.</p></figcaption></a>
    </figure>  
</li> 
<li>  
    <figure tabindex="0">
    <div id="TitreImage">Photos</div>
        <a href="photos.php"><img alt="Photos" src="/images/IconePhoto.jpg" width="300px"/></a>    
        <a href="photos.php"><figcaption><p>Toutes les photos envoyées aux organisateurs.</p></figcaption></a>    
    </figure>  
</li>  
<li>  
    <figure tabindex="0">  
    <div id="TitreImage"> Vid&eacute;os </div>
        <a href="videos.php"><img alt="Videos" src="/images/video.jpg" width="300px"/></a>    
        <a href="videos.php"><figcaption><p>Toutes les vidéos faites pour la promotion du Pouce d'Or.</p></figcaption></a>    
    </figure>  
</li>  
</div>


<?php include("footer.php");?>