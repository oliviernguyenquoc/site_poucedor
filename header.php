<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr"
	  xmlns:fb="http://ogp.me/ns/fb#" >

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png" />
	<title>Pouce d'Or : Le site officiel !</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	
	<!-- Balise meta pour Google (textes ...) -->
	<meta name="description" content="Le Pouce d'Or, c'est LE concours de stop des écoles d'ingénieurs, de commerce et d'éducation supérieurs. 
	
	Le but : Aller le plus loin possible et revenir en stop en 48h.
	
	Tu te sens l'âme d'aventurier : prends ton sac, trouve ton équipier et c'est partie !" />
	
	<!-- Balise meta pour une bonne apparition sur Facebook -->
	<meta property= "og:title" content= "Pouce d'Or : Le site officiel !" />
	<meta property= "og:description" content= "Le concours de stop des écoles d'ingénieurs, de commerce et d'éducation supérieurs. 
	Le but : Aller le plus loin possible et revenir en stop en 48h." />
	<meta property="og:image" content="http://www.poucedor.fr/images/poucelogositefb.jpg" />
	<meta property="og:url" content="http://www.poucedor.fr" />
	
 	<!--[if lt IE 9]>
 	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->
  	
  	<link rel="shortcut icon" href="images/favicon.gif" type="image/x-icon"/>
  	
  	<!-- Permet d'adapter le css en fonction de la page -->
  	<!--?php if ($page=='index') {		
  		echo '<link rel="stylesheet" href="css/styles.css" type="text/css" />';
	} 
	else {
		echo '<link rel="stylesheet" href="css/styles2.css" type="text/css" />';
	}
	?--> 
	
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9y0Cs5Y1htYYU_o7wdrfFhC--_kt3BB8"></script>

</head>

<body>
	
    <!--start container-->
    <div id="container">
    
    <!--start header-->
    <header>

    <!--start logo-->
    <a href="index.php" id="logo"><img src="images/poucelogosite.png" width="343" height="110" alt="logo"/></a>    
	<!--end logo-->
	
   <!--start menu-->

<div id="nav">
	<nav>
		<ul>
		<li>
			<a href="index.php" title="Revenir à l'Accueil" <?php if($page=='index') echo'class="current"'; ?>>Accueil</a>
		</li>
		<li><a href="asso.php" <?php if($page=='asso'||$page=='regles'||$page=='conseils'||$page=='liens') echo'class="current"'; ?>>Le Pouce d'Or</a>
          <ul>
            <li><a href="asso.php" title="Qui sommes-nous">L'association</a></li>
            <li><a href="regles.php" title="Les règles sacrées du pouce d'or" >Règles</a></li>
            <li><a href="conseils.php" title="Les conseils : l'autostop pour les nuls">Conseils et Recommandations</a></li>
            <li><a href="liens.php" title="Liens utiles">Liens</a></li>
          </ul>
      	</li>
      	<li><a href="edition.php" <?php if($page=='inscription'||$page=='liste'||$page=='inscriptionEcole'||$page=='edition') echo'class="current"'; ?>>Edition 2014</a>
          <ul>
            <li><a href="inscription.php" title="Inscrire son binôme pour l'édition 2014">S'inscrire</a></li>
            <li><a href="inscriptionEcole.php" title="Inscrire son école/université pour l'édition 2014">Inscrire son école</a></li>
            <li><a href="liste.php" title="Consulter la liste des inscrits">Liste des inscrits</a></li>
            <li><a href="edition.php" title="Les informations sur l'édition 2014">Edition 2014</a></li>
          </ul>
        <li><a href="archives.php" <?php if($page=='archives') echo'class="current"'; ?>>Archives</a>
          <ul>
            <li><a href="editions_precedentes.php" title="Résultats des années précedentes, photos, témoignages">Les &eacute;ditions pr&eacute;c&eacute;dentes</a></li>
            <li><a href="photos.php" title="Résultats des années précedentes, photos, témoignages">Les photos</a></li>
            <li><a href="videos.php" title="Résultats des années précedentes, photos, témoignages">Les vid&eacute;os</a></li>
          </ul>
      	</li>
      	<li><a href="records.php" <?php if($page=='records') echo'class="current"'; ?> title="Le classement officiel des 25 meilleures distances jamais réalisées">Le top 25</a></li>
    	</ul>
    </nav>
	<!--end menu-->
</div>
	

    <!--end header-->
	</header>
