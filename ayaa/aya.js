//confirmation code


function confirmCode() {
  var prenom = document.getElementById('prenom').value;
  var nom = document.getElementById('nom').value;
  var tel = document.getElementById('tel').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var cpassword = document.getElementById('cpassword').value;
  
 
  if (prenom === "" || nom === "" || tel === "" || email === "" || password === "" || cpassword === "") {
    alert("Veuillez remplir tous les champs obligatoires.");
    return; 
  }
  
  var user = prompt("Veuillez entrer le code :");
  
  if (user !== null) {
    alert("Code soumis avec succès ! Code saisi : " + user);
  } else {
    alert("Annulation de la soumission du code.");
  }
}