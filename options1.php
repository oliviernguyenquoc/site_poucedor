<?php

	$serveur='local';

	if($serveur=='local')
	{
	$hote	= 'localhost' ;	// Nom de votre serveur SQL
	$utilisateur	= 'root' ;	// Nom d'utilisateur SQL
	$motDePasse = 'root' ;	// Mot de passe SQL
	$baseDeDonnees = 'clubs_poucedor' ;	// Nom de la base de données
	}

	if($serveur=='web')
	{
		$hote= 'localhost' ;	// Nom de votre serveur SQL
		$utilisateur= 'clubs_poucedor' ;	// Nom d'utilisateur SQL
		$motDePasse = 'iEk1yT5NdnGH' ;	// Mot de passe SQL
		$baseDeDonnees = 'clubs_poucedor' ;	// Nom de la base de données
	}
?>