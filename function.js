<script type="text/javascript">
    calculate = function(){
        origin      = '<?=$depaturePoint;?>'; // Le point départ
        destination = '<?=$arrivalPoint;?>'; // Le point d'arrivé
        if(origin && destination){
            var request = {
                origin      : origin,
                destination : destination,
                travelMode  : google.maps.DirectionsTravelMode.DRIVING // Type de transport
            }
            var directionsService = new google.maps.DirectionsService(); // Service de calcul d'itinéraire
            directionsService.route(request, function(response, status){ // Envoie de la requête pour calculer le parcours
            var ditanceInKilometre = directionsService.distance;
            var xhr = new XmlHttpRequest();
            xhr.open("POST", "/page_perso_edition_form.php", true);
            xhr.send("&ditanceInKilometre=" + ditanceInKilometre);
            });
        } //http://code.google.com/intl/fr-FR/apis/maps/documentation/javascript/reference.html#DirectionsRequest 
    };
</script>