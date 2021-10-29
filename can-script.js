//Ecouteur : au click du bonton lancer fetch
document.querySelector('button').onclick = selectCategory;
// fonction  au chargement lancer fetch
selectCategory(); //premier chargement

//fetch avec données formulaire
function selectCategory(e) {
  if (e) e.preventDefault();//if : pas d'evenement au premier chargement
  var myData = new FormData(document.querySelector('form'));
  for (var x of myData) console.log(x);
  fetch('produits_tri.php', { method: "POST", body: myData }).then(function (response) {
    if (response.ok) {
      response.json().then(function (json) {
      updateDisplay(json);
      });
    } else {
      console.log('Network request for products.json failed with response ' + response.status + ': ' + response.statusText);
    }
  });
}


// vide les produit afficher puis envois des nouveau elements vers showProduct
function updateDisplay(finalGroup) {
  var main = document.querySelector('main');
  while (main.firstChild) {
    main.removeChild(main.firstChild);
  }

  if (finalGroup.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'No results to display!';
    main.appendChild(para);
  } else {
    fisherYatesShuffle(finalGroup)//melange
    for (var i = 0; i < finalGroup.length; i++) {
      showProduct(finalGroup[i]);
    }
  }
}

// function melange de tableau
function fisherYatesShuffle(arr) {
  for (var i = arr.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    [arr[i], arr[j]] = [arr[j], arr[i]];
  }
}

//function pour ajouter les produit dans le html
function showProduct(product) {
  //creation des element composant le produit
  var url = 'images/' + product.image;
  var section = document.createElement('section');
  var heading = document.createElement('h2');
  var para = document.createElement('p');
  var image = document.createElement('img');
  var txtnutriscore = document.createElement('h3')
  var nutriscore = document.createElement('span')
  

  section.setAttribute('class', product.type);

  heading.textContent = product.nom.replace(product.nom.charAt(0), product.nom.charAt(0).toUpperCase());

  //para.textContent = product.prix.toFixed(2) + ' €';
  para.textContent = product.prix + ' €';
  image.src = url;
  image.alt = product.nom;

  
  nutriscore.textContent = product.nutriscore
  //mis en couleur selon le nutriscore
  nutriscore.className = nutriscore.textContent 


  txtnutriscore.textContent = 'Nutriscore : '

  // on ajoute les element du produit dans le html
  document.querySelector('main').appendChild(section);
  section.appendChild(heading);
  section.appendChild(para);
  section.appendChild(image);
  section.appendChild(txtnutriscore)
  txtnutriscore.appendChild(nutriscore)
}