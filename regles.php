<?php 
	$page='regles';
	include("header.php");
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(".toggle").hide();                                         //Hide .toggles

$(window).load(function(){
  $('.toggle').not(':hidden')
      .prev('.trigger').trigger("click");                    //Simulate click on visible .toggle(s) h3(s)
});

$('.trigger').each(function() {                              //For each .trigger
    var theActive = $.cookie($(this).attr('id'));            //Retrieve the cookies
    if (theActive) {                                         //Verify if cookies exist
        $('#' + theActive).next(".toggle").slideDown(700);   //And slide down the respective .toggle
    }

});

$(".trigger").toggle(                                        //Toggle permits alternate clicks
   function() {
    $(this).next('.toggle').slideDown('slow');               //On odd clicks, .toggle slides down...
    $.cookie($(this).attr('id'), $(this).attr('id'));        //...and the cookie is set by its ids.
}, function() {
    $(this).next('.toggle').slideUp('slow');                 //On even clicks, .toggle slides up...
    $.cookie($(this).attr('id'), null);                      //...and the cookie is deleted.
});
</script> 


<!--
Racourcis moches sur le nouveau site
<div id="menuregles">
	<a href="#commandements">1. les 10 commandements</a><br />
	<a href="#jeu">2. Règles du jeu</a><br />	
	<a href="#securite">3. Règles de sécurité</a><br />
</div>
-->

<h1>Les règles détaillées</h1>

<div class="holder_content_3">

<div id="commandements">
	
	<h3 class="trigger" style="text-align:center;">Les 10 commandements du Pouceux</h3>
	
	<p>
		Pour pouvoir être accepté (peut-être) dans la communauté des pouceux, il te faudra respecter les 10 commandements dictées de la main de go(l)d : <br/> <br/>
	</p>

	<div class="toggle">
		<ul style="text-align:center;">
			<li> <strong>Commandement n°1 :</strong> Tu parleras du POUCE D'OR</li>
			<li> <strong>Commandement n°2 :</strong> Tu parleras ENCORE PLUS du pouce d'or</li>
			<li> <strong>Commandement n°3 :</strong> Tu partiras en Binôme, 2 filles ensemble c'est interdit </li>
			<li> <strong>Commandement n°4 :</strong> Tu tombes, tu te blesses, tu es emprisonné ou écrasé, le pouce d'or s'arrête. <br/> Tu es responsable de toi-même</li>
			<li> <strong>Commandement n°5 :</strong> La météo n'est pas une excuse. </li>
			<li> <strong>Commandement n°6 :</strong> Un gilet de securité tu acheteras (on sait jamais) </li>
			<li> <strong>Commandement n°7 :</strong> De ton binôme, JAMAIS TU NE TE SEPARERAS (même s'il est moche, même s'il a la grippe A)  </li>
			<li> <strong>Commandement n°8 :</strong> De risques inutiles tu ne prendras pas : Le Pouce d’Or est un JEU </li>
			<li> <strong>Commandement n°9 :</strong> Refuser des voitures, tu en as le droit, mais si le chocho est chelou tu en as l'obligation!</li>
			<li> <strong>Commandement Final :</strong> Le pouce d'or, c'est toi. C'est ta responsabilité. </li>
		</ul>
	</div>
	
</div>

<div id="reglesdujeu">
	
	<h3 style="text-align:center;">Règles du jeu </h3>
	
	<p>
		Les règles du jeu sont simples.
	</p> 

	<p class="toggle" style="display:none">
		En binôme, aller le plus loin possible en stop en un week end.
		Départ le samedi 6 novembre de la résidence à 9h et retour avant le début des cours le lundi 8h.
		100 km de pénalité par heure de retard.<br/> <br/> 

		Tout trajet en transport autre que du stop est éliminatoire (transports en commun dans les villes sont acceptés) <br/> <br/> 
	
		Retour en train = abandon
	</p>

</div>

</div>

<article id="securite">
	<h3>R&EgraveGLES DE SECURITE </h3>

	<p>
		Les binômes de 2 filles sont interdits. <br/> 
		CONSEIL: Un gars//une fille <br/>
		NE JAMAIS SE SEPARER <br/>
		NE PAS S'ENDORMIR EN MEME TEMPS !!! <br/> <br />
		Stop INTERDIT (par la loi) sur les bords d'autoroutes. Demandez que l'on vous dépose sur une aire ou après être sorti de l'autoroute en lieu sur <br/> <br/>
		Si c'est quand même le cas, rester derrière la glissière de sécurité. 
		(Aspiration Camions, voitures rapides)<br/>
		Ne jamais traverser les autoroutes <br/>
				 
		Faire du stop là où vous êtes visibles <br/>	
	 
		Faire du stop là où les voitures peuvent s'arrêter. Eviter les ronds-points
	</p>
</article>

<?php include("footer.php"); ?>