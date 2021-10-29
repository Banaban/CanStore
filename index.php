<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>The Can Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Cherry+Swash|Raleway" rel="stylesheet">
  <link href="can-style.css" rel="stylesheet">
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<?php
include("connexion.php");
?>
<body>
  <header>
    <h1><a href="index.html">Au jardin en boite</a></h1>
  </header>
  <div>
    <aside>
      <form name="saisie" id="saisie" method="post">
        <div>
          <label for="category">Catégorie :</label>
          <select id="category" name="category">
            <option selected="">Tous</option>
            <option>Legumes</option>
            <option>Viande</option>
            <option>Soupe</option>
          </select>
        </div>
        <div>
          <label for="nutriscore">Nutriscore :</label>
          <select id="nutriscore" name="nutriscore">
            <option selected="">Tous</option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
          </select>
        </div>
        <div>
          <label for="searchTerm">Recherche :</label>
          <input type="text" id="searchTerm" name="searchTerm" placeholder="ex : Petits pois">
        </div>
        <div>
          <button>GO !</button>
        </div>
      </form>
    </aside>
    <main>
      <?php
      $requete = "SELECT * FROM produits WHERE 1+1 ";   
      // si une categorie choisie trier
      if($_POST) {//si post
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
    }
      // Envoi de la requête vers MySQL
      $select = $connexion->query($requete);
      //recu sous forme objet
      $select->setFetchMode(PDO::FETCH_OBJ);
      // boucle sur les produits
      while($enregistrement = $select->fetch())

{ ?>
  
  <section class="<?php echo $enregistrement->type ?>">
  <h2><?php echo $enregistrement->nom ?></h2>
  <p><?php echo $enregistrement->prix ?> €</p>
  <img src="images/<?php echo $enregistrement->image ?>" alt="<?php echo $enregistrement->nom ?>">
  <h3>Nutriscore : <span class="<?php echo $enregistrement->nutriscore ?>">
  <?php echo $enregistrement->nutriscore ?></span></h3></section>

<?php
}
    
      ?>
    </main>
  </div>
  <footer>
  </footer>


</body>

</html>