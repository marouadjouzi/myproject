$(document).ready(function() {
  // Sélectionnez l'élément avec la classe "element-survol"
  $(".Platprincipale").hover(
    function() { // Fonction à exécuter lorsque survolé
      $(this).css("background-color", "#d1224e"); // Changez l'arrière-plan en bleu
    },
    function() { // Fonction à exécuter lorsque le survol se termine
      $(this).css("background-image", "url('second.png')"); // Rétablissez l'arrière-plan par défaut (vide)
    }
  );
});