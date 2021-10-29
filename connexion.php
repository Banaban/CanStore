<?php
try {
  $dns = 'mysql:host=localhost;dbname=jardin'; // dbname : nom de la base
  $utilisateur = 'root'; // root sur vos postes
  $motDePasse = ''; // pas de mot de passe sur vos postes
  $connexion = new PDO( $dns, $utilisateur, $motDePasse );
  $connexion->exec('SET NAMES utf8');//recuperer en utf8
} catch (Exception $e) {
  echo "Connexion à MySQL impossible : ", $e->getMessage();
  die();
}