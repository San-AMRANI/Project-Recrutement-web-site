//confirmation code
function confirmCode() {
    
    var user = prompt("Veuillez entrer le code :");
    
    if (user !== null) {
      
        alert("Code soumis avec succès ! Code saisi : " + user);
    } else {
         alert("Annulation de la soumission du code.");
    }
}
