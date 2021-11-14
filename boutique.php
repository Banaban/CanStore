<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title><?= $look[0] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="can-style.css" rel="stylesheet">
 
</head>

<body>
  <header>
    <h1><a href="index.html">Au jardin en boite</a></h1>
  </header>
  <div>
    <aside>
      <form name="saisie" id="saisie" method="post" action="boutique">
        <div>
          <label for="category">Catégorie :</label>
          <select id="category" name="category">
          <option <?php if ($_POST['category']=='Tous'){echo 'selected';}?> >Tous</option>
            <?php
            
            foreach($cats as $cat)
{ 
  echo  "<option ";
  if ($_POST['category']==$cat->type){echo 'selected';}
  echo ">$cat->type</option>";
}
      ?>
          </select>
        </div>
        <div>
          <label for="nutriscore">Nutriscore :</label>
          <select id="nutriscore" name="nutriscore">
            <option selected>Tous</option>
            <option <?php if ($_POST['nutriscore']=='A'){echo 'selected';}?> >A</option>
            <option <?php if ($_POST['nutriscore']=='B'){echo 'selected';}?>>B</option>
            <option <?php if ($_POST['nutriscore']=='C'){echo 'selected';}?>>C</option>
            <option <?php if ($_POST['nutriscore']=='D'){echo 'selected';}?>>D</option>
            <option <?php if ($_POST['nutriscore']=='E'){echo 'selected';}?>>E</option>
          </select>
        </div>
        <div>
          <label for="searchTerm">Recherche :</label>
          <input type="text" id="searchTerm" name="searchTerm" placeholder="ex : Petits pois" <?php echo "value=".$_POST['searchTerm']; ?>>
        </div>
        <div>
          <button>GO !</button>
        </div>
      </form>
      <h2>
        <?= $look[1] ?>
</h2>
    </aside>N  
    <main>
      <?php
// recuperation des produits
$resultats = selection($_POST['category'] ,$_POST['nutriscore'],$_POST['searchTerm']);
   
    if ( is_string($resultats)) echo $resultats;
    else
    foreach($resultats as $objet)
{ ?>
  
  <section class="<?php echo $objet->type ?>">
  <h2><?php echo $objet->nom ?></h2>
  <p><?php echo $objet->prix ?> €</p>
  <img src="images/<?php echo $objet->image ?>" alt="<?php echo $objet->nom ?>">
  <h3>Nutriscore : <span class="<?php echo $objet->nutriscore ?>">
  <?php echo $objet->nutriscore ?></span></h3></section>

<?php
}
      ?>
    </main>
  </div>
  <footer>
  </footer>


</body>

</html>