<?php
// ne prend pas d'argument
function categorie() {
        global $connexion;

      $requete = "SELECT DISTINCT type FROM produits";

      // Envoi de la requête vers MySQL
      $select = $connexion->query($requete);
      //recu sous forme objet
      $select->setFetchMode(PDO::FETCH_OBJ);
      // boucle sur les produits
      
      if ($select->rowCount() > 0)
      $cat = $select->fetchall();
      else $cat = '<span class="none">Pas de résultat pour cette recherche</span>';
// retourne une string si requete vide / la collection d'objets si ok
      return $cat;

    }