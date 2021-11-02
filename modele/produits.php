<?php
// prend pour arg les valeurs du formulalire de saisie (3 strings)
function selection($arg1, $arg2, $arg3) {
        global $connexion;

      $requete = "SELECT * FROM produits WHERE 1+1 ";   
      // si une categorie choisie trier
      
      if($arg1!='Tous')
      {
          $requete .= " AND  type = '".strtolower($arg1)."'"; 
      }
      if($arg2!='Tous')
      {
          $requete .= " AND  nutriscore = '".$arg2."'"; 
      }
      if($arg3!='')
      {
          $requete .= " AND nom LIKE '%".$arg3."%'"; 
      }
    
      // Envoi de la requête vers MySQL
      $select = $connexion->query($requete);
      //recu sous forme objet
      $select->setFetchMode(PDO::FETCH_OBJ);
      // boucle sur les produits
      
      if ($select->rowCount() > 0)
      $enregistrements = $select->fetchall();
      else $enregistrements = '<span class="none">Pas de résultat pour cette recherche : '.$arg3.'</span>';
// retourne une string si requete vide / la collection d'objets si ok
      return $enregistrements;

    }