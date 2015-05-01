<section style="float: left; width: 100%;">
<!-- 	style="margin: 10px 0 10px 0; height:300px; line-height:300px; -->
	<div id="blocBinome" >

<!-- 2 cas possibles : Les infomations n'ont pas été encore remplit (ville et pays d'arrivé) ou les informations sont déja complétés -->
<?php
	$arrivalPoint=str_replace(" ","+",$data1['ville']).",".str_replace(" ","+",$data1['pays']);
?>

	<!-- Insertion de la google map du trajet calculé : Google map Embeded (voir API) -> Le plus facile à mettre en place -->
	<iframe
	  width="550"
	  height="400"
	  frameborder="1" style="float:right; border:1px; margin: 0 10px 0 10px; display:block;"
	  src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyD9y0Cs5Y1htYYU_o7wdrfFhC--_kt3BB8&origin=<?php print "{$departurePoint}" ?>&destination=<?php print "{$arrivalPoint}" ?>&mode=driving&units=metric">
	</iframe>

	<!-- <img src="images/binome_'$data2['nom']'_'$data2['create_time']'" onerror="this.src='binomeDefault1.jpg'" alt="Photo du binome" width=400px height=400px style="float:left;">
	 -->

	<p style="vertical-align:middle; display:inline-block; line-height:normal;">
<?php
	echo 'Destination la plus loin atteinte : '.$data1['ville']." , ".$data1['pays']."<br/>";
?>

<?php
	echo "Nombre de kilomètres parcouru : ".$data1['distance']." km"."<br/>";
	echo "Actions remarquables : ";
?>
	<ul>
<?php
	if(mysql_num_rows($resultsql4) > 0)
	{
		while ($actions)
			{
				echo "<li>".$actions['nomAction']."</li>";
				$actions= mysql_fetch_array($resultsql4);
			}
	}
?>
	</ul>

<?php
	// if($numRows> 0)
	// {
	// 	$nbPoint=0;
	// 	while ($action = $resultsql4->fetch())
	// 		{
	// 			$nbPoint+=$action['pointsBonus'];
	// 		}
	// 	$resultsql4->closeCursor();
	// 	echo "Nombre de points bonus : ";
	// 	if ($nbPoint!=0)
	// 	{
	// 		echo $nbPoint."<br/>";
	// 	}
	// }
?>

	</p>

</div>
	
</section>