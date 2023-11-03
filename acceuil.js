$(document).ready(function() {
  // Sélectionnez l'élément avec la classe "Platprincipale"
  $(".Platprincipale").hover(
    function() { // Fonction à exécuter lorsque survolé
      $(this).css("background-image", "url('./flou.png')"); //Changer l'image de l'arrière plan 
    },
    function() { // Fonction à exécuter lorsque le survol se termine
      $(this).css("background-image", "url('./second.png')"); // Rétablissez l'arrière-plan 
    }
  );
});
$(document).ready(function() {
  $(".salade").hover(
    function() { 
      $(this).css("background-image", "url('./flou2.png')"); 
    },
    function() {
      $(this).css("background-image", "url('./salade.png')");
    }
  );
});
$(document).ready(function() {
 
  $(".Dessert").hover(
    function() { 
      $(this).css("background-image", "url('./flou4.png')");
    },
    function() { 
      $(this).css("background-image", "url('./first.png')"); 
    }
  );
});
$(document).ready(function() {
 
  $(".drinks").hover(
    function() { 
      $(this).css("background-image", "url('./flou3.png')"); 
    },
    function() {
      $(this).css("background-image", "url('./drinks.png')"); 
    }
  );
});
$(document).ready(function() {
 
  $("button").hover(
    function() { 
      $(this).css("width", "150px"); 
    },
    function() {
      $(this).css("width", "100px"); 
    }
  );
});