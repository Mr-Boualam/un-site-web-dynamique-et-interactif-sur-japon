document.addEventListener('DOMContentLoaded', function() {
  // Récupérer le bouton d'ouverture du modal
var boutonOuvrir1 = document.getElementById("ouvrirModal1");
var boutonOuvrir2 = document.getElementById("ouvrirModal2");
var boutonOuvrir3 = document.getElementById("ouvrirModal3");

// Récupérer le modal
var modal1 = document.getElementById("monModal1");
var modal2 = document.getElementById("monModal2");
var modal3 = document.getElementById("monModal3");

// Récupérer l'élément de fermeture du modal
var boutonFermer1 = document.getElementsByClassName("fermer1")[0];
var boutonFermer2 = document.getElementsByClassName("fermer2")[0];
var boutonFermer3 = document.getElementsByClassName("fermer3")[0];

// Ouvrir le modal lorsque le bouton est cliqué
boutonOuvrir1.onclick = function() {
  modal1.style.display = "block";
}
boutonOuvrir2.onclick = function() {
  modal2.style.display = "block";
}
boutonOuvrir3.onclick = function() {
  modal3.style.display = "block";
}

// Fermer le modal lorsque l'utilisateur clique sur l'élément de fermeture
boutonFermer1.onclick = function() {
  modal1.style.display = "none";
}
boutonFermer2.onclick = function() {
  modal2.style.display = "none";
}
boutonFermer3.onclick = function() {
  modal3.style.display = "none";
}

// Fermer le modal lorsque l'utilisateur clique en dehors du contenu du modal
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
  if (event.target == modal3) {
    modal3.style.display = "none";
  }
}
});
