<?php
  session_start();
  include('options1.php');
  $page="inscription";
  include("header.php");
  include("helper.php");

mysql_connect($hote , $utilisateur, $motDePasse);
mysql_select_db($baseDeDonnees);

$person=$_POST['person'];
$mail=$_SESSION['mail'];
 
/************************************************************
 * Script realise par Emacs
 * Crée le 19/12/2004
 * Maj : 23/06/2008
 * Licence GNU / GPL
 * webmaster@apprendre-php.com
 * http://www.apprendre-php.com
 * http://www.hugohamon.com
 *
 * Changelog:
 *
 * 2008-06-24 : suppression d'une boucle foreach() inutile
 * qui posait problème. Merci à Clément Robert pour ce bug.
 *
 *************************************************************/
 
/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/
 
// Constantes
define('TARGET', '/photoBinome');    // Repertoire cible
define('MAX_SIZE', 10000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 11800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 11800);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir(TARGET) ) {
  if( !mkdir(TARGET, 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              $message = 'Upload réussi !';
              if($person='1')
              {
                mysql_query("UPDATE person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id  INNER JOIN teams AS T ON T.id = A.teams_id SET photo='$nomImage' WHERE P.mail = '$mail'");
              }
              if($person='2')
              {
                mysql_query("UPDATE person AS P INNER JOIN personAndTeams AS A ON P.id  = A.person_id  INNER JOIN teams AS T ON T.id = A.teams_id SET photo='$nomImage' WHERE P.mail != '$mail'");
              }

            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
}
?>

<meta http-equiv="refresh" content="2; url= page_perso_edition.php ">
<fieldset>
<legend>Envoi en cours - veuillez patienter</legend>
</fieldset>
        
<?php include("footer.php");?>