document.addEventListener('DOMContentLoaded', function () {
    // Get both links
    var searchForm1 = document.getElementById('searchform1');
    var searchForm2 = document.getElementById('searchform2');
    
    // Assuming the input has a unique class 'form-control-mpb', you can also consider giving it an ID for easier selection if there are multiple inputs with the same class.
    var inputField = document.querySelector('.form-control-mpb'); // If there's only one input with this class.
  
    // Function to add 'act-pww' to clicked item and remove from the other
    function toggleActiveClass(clickedElement, otherElement) {
      clickedElement.classList.add('act-pww');
      otherElement.classList.remove('act-pww');
    }
  
    // Add click event listeners to both links
    searchForm1.addEventListener('click', function() {
      toggleActiveClass(searchForm1, searchForm2);
      // Optionally reset the placeholder if needed when searchForm1 is clicked
      inputField.placeholder = "e.g., Graphic, Web Developer"; // Reset to default or another placeholder as desired
    });
  
    searchForm2.addEventListener('click', function() {
      toggleActiveClass(searchForm2, searchForm1);
      // Change the placeholder of the input field when searchForm2 is clicked
      inputField.placeholder = "e.g., Wassim Boutrassy";
    });
  });
  

  console.log(document.getElementById("homelink"));

  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('homelink').addEventListener('click', function(e) {
      e.preventDefault(); // Prevent the default link behavior
      window.scrollTo({
        top: document.body.scrollHeight, // Scrolls to the bottom of the document
        behavior: 'smooth' // Optional: adds smooth scrolling
      });
    });
  });


  document.addEventListener('DOMContentLoaded', function () {
    // Listen for click on the "Contact" link
    document.getElementById('contactlink').addEventListener('click', function(e) {
      e.preventDefault(); // Prevent the default link behavior
      window.scrollTo({
        top: document.body.scrollHeight, // Scrolls to the bottom of the document
        behavior: 'smooth' // Adds smooth scrolling
      });
    });
  });

  window.onscroll = function() {
    // Obtenir la barre de navigation par son identifiant ou sa classe
    var navbar = document.querySelector('.navbar'); // Ajustez ce sélecteur selon votre HTML

    // Vérifier si la page a été défilée de plus de 100 pixels
    if (window.scrollY > 100) {
        // Ajouter la classe 'fixed-top' si elle n'est pas déjà présente
        navbar.classList.add('fixed-top');

        // Ajouter des styles spécifiques
        navbar.style.backgroundColor = "white";
        navbar.style.paddingLeft = "250px";
        navbar.style.paddingRight = "250px";
        navbar.style.paddingTop = "10px";
        navbar.style.paddingBottom = "10px";
        navbar.style.boxShadow= "2px 2px 2px 1px rgb(0 0 0 / 20%)";

        // Optionnel: Ajouter un padding-top au corps de la page pour éviter un saut de contenu
        document.body.style.paddingTop = navbar.offsetHeight + 'px';
    } else {
        // Retirer la classe 'fixed-top' quand on est en haut de la page
        navbar.classList.remove('fixed-top');

        // Retirer les styles spécifiques
        navbar.style.backgroundColor = ""; // Remettre la couleur de fond par défaut
        navbar.style.paddingLeft = "";
        navbar.style.paddingRight = "";
        navbar.style.paddingTop = "";
        navbar.style.paddingBottom = "";
        navbar.style.boxShadow="";

        // Optionnel: Retirer le padding-top du corps de la page
        document.body.style.paddingTop = '0';
    }
};




