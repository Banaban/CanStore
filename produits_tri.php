<?php 
header("Content-type: application/json; charset=utf-8");
// On se  connecte, voir cours
include("connexion.php");
//base de la requete
$requete = "SELECT * FROM produits WHERE 1+1 ";   
// si une categorie choisie trier
if($_POST['category']!='Tous')
{
    $requete .= " AND  type = '".strtolower($_POST['category'])."'"; 
}
if($_POST['nutriscore']!='Tous')
{
    $requete .= " AND  nutriscore = '".$_POST['nutriscore']."'"; 
}
if($_POST['searchTerm']!='')
{
    $requete .= " AND nom LIKE '%".$_POST['searchTerm']."%'"; 
}

// Envoi de la requête vers MySQL
$select = $connexion->query($requete);
//recu sous forme d'un seul tableau et transformation en Json
$produits = json_encode($select->fetchAll( PDO::FETCH_ASSOC ));
// affichage du Json
print_r($produits);
?>

