$(document).ready(function() {
  // Sélectionnez l'élément avec la classe "Platprincipale"
  $(".Platprincipale").hover(
    function() { // Fonction à exécuter lorsque survolé
      $(this).css("background-image", "url('./flou.png')"); // Changez l'arrière-plan en bleu
    },
    function() { // Fonction à exécuter lorsque le survol se termine
      $(this).css("background-image", "url('./second.png')"); // Rétablissez l'arrière-plan par défaut (vide)
    }
  );
});
$(document).ready(function() {
  // Sélectionnez l'élément avec la classe "Platprincipale"
  $(".salade").hover(
    function() { // Fonction à exécuter lorsque survolé
      $(this).css("background-image", "url('./flou2.png')"); // Changez l'arrière-plan en bleu
    },
    function() { // Fonction à exécuter lorsque le survol se termine
      $(this).css("background-image", "url('./salade.png')"); // Rétablissez l'arrière-plan par défaut (vide)
    }
  );
});
$(document).ready(function() {
  // Sélectionnez l'élément avec la classe "Platprincipale"
  $(".Dessert").hover(
    function() { // Fonction à exécuter lorsque survolé
      $(this).css("background-image", "url('./flou4.png')"); // Changez l'arrière-plan en bleu
    },
    function() { // Fonction à exécuter lorsque le survol se termine
      $(this).css("background-image", "url('./first.png')"); // Rétablissez l'arrière-plan par défaut (vide)
    }
  );
});
$(document).ready(function() {
  // Sélectionnez l'élément avec la classe "Platprincipale"
  $(".drinks").hover(
    function() { // Fonction à exécuter lorsque survolé
      $(this).css("background-image", "url('./flou3.png')"); // Changez l'arrière-plan en bleu
    },
    function() { // Fonction à exécuter lorsque le survol se termine
      $(this).css("background-image", "url('./drinks.png')"); // Rétablissez l'arrière-plan par défaut (vide)
    }
  );
});