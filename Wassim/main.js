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