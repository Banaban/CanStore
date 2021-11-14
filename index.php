<?php
/*** Récupération de la clé de la route ***/
$origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);
 echo $origine;
// echo '<br>'.dirname($_SERVER['PHP_SELF']);
// ROUTES + TXT ACCUEIL + TITLE
// $routes = array(
//     "/Canstore/boutique.php?first=viande" => "viande",
//     "/Canstore/Viandes" => "viande",
//     "/Canstore/Viande" => "viande",
//     "/Canstore/viande" => "viande",
//     "/Canstore/boutique.php?first=legumes" => "legumes",
//     "/Canstore/L%C3%A9gumes" => "legumes",
//     "/Canstore/Legumes" => "legumes",
//     "/Canstore/boutique.php?first=soupe" => "soupe",
//     "/Canstore/Soupes" => "soupe",
//     "/Canstore/Soupe" => "soupe"
// );
// if (array_key_exists($origine, $routes)) $_GET['first']=$routes[$origine];
/*** Création de l'url de destination ***/

//INIT FIRST CHOIX
if(isset($_GET['first'])&&empty($_POST)) { 
    $_POST['category'] = $_GET['first']; $_POST['nutriscore']='Tous';$_POST['searchTerm']='';
  }
  //si pas de post
  elseif(empty($_POST)) {
    $_POST['category'] = 'Tous'; $_POST['nutriscore']='Tous';$_POST['searchTerm']='';
  }
  else {
    $choix = $_POST['category'];
  }
switch($origine)
{
    case "/Canstore/boutique.php?first=viande";
    case "/Canstore/Viandes";
    case "/Canstore/Viande";
    case "/Canstore/Viande";
        $look = array("CanStore : nos viandes", "Nos meilleurs viandes");
        $_GET['first']="viande";
        break;
    case "/Canstore/boutique.php?first=legumes";
    case "/Canstore/L%C3%A9gumes";
    case "/Canstore/Legumes";
    case "/Canstore/legume";
        $look = array("CanStore : nos légumes", "Nos meilleurs légumes");
        $_GET['first']="legumes";
        break;
    case "/Canstore/boutique.php?first=soupe";
    case "/Canstore/soupes";
    case "/Canstore/soupe";
    case "/Canstore/Soupe";
        $look = array("CanStore : nos soupes", "Nos meilleurs soupes");
        $_GET['first']="soupe";
        break;
    case "/Canstore/";
        $look = array("CanStore : tous nos produits", "Tous nos produits");
        $_GET['first']="soupe";
        break;
    default;
        $look = array("CanStore : Votre sélection", "Votre sélection");
        break;
}



include("modele/connexion.php");
include("modele/produits.php");
include("modele/cat.php");

//premier affichage


// recuperation des categories
$cats = categorie();


?>
<?
if ($a == 1):
    echo 'Il y a '.$var.' résultat';
elseif ($a > 1):
    echo 'Il y a '.$var.' résultats';
else:
    echo "Il y a une erreur";
    echo "!!!";
endif;
?>

