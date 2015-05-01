<?php

function getDistance($adresse1,$adresse2){
$adresse1 = str_replace(" ", "+", $adresse1);
$adresse2 = str_replace(" ", "+", $adresse2);
$url='http://maps.google.com/maps/api/directions/xml?language=fr&origin='.$adresse1.'&destination='.$adresse2.'&sensor=false';
$xml=file_get_contents($url);
$root = simplexml_load_string($xml);

$distance=$root->route->leg->distance->value;

if ($root->status == "OK")
{
return $distance;
}
else
{
return "0";
}
}

function humanize($str) {
	
	$str = trim(strtolower($str));
	$str = preg_replace('/[^a-z0-9\s+]/', '', $str);
	$str = preg_replace('/\s+/', ' ', $str);
	$str = explode(' ', $str);
	
	$str = array_map('ucwords', $str);
	
	return implode(' ', $str);
}

?>