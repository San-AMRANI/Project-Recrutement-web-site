document.addEventListener("DOMContentLoaded", function() {
    const modifyButton = document.querySelector(".button2");
    const inputs = document.querySelectorAll("input, select");

    modifyButton.addEventListener("click", function(event) {
        event.preventDefault();
        if (modifyButton.textContent === "Modify") {
            modifyButton.textContent = "Submit";
            inputs.forEach(input => {
                input.disabled = false;
            });
        } else {
            
            document.getElementById("formulaire").submit();
        }
    });

    
    const cancelButton = document.querySelector(".button1");
    cancelButton.addEventListener("click", function(event) {
        event.preventDefault();
        modifyButton.textContent = "Modify";
        inputs.forEach(input => {
            input.disabled = true;
        });
    });
});


