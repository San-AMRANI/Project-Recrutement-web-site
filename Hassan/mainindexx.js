// function toggleCollapse(parm) {
//     var info = document.getElementById('info'+parm);
//     info.classList.toggle('show');
// }


let descriptionOffre = new Quill('#descriptionoffre00', {
    theme: 'snow'
});

descriptionOffre.on('text-change', function () {
    var discOffreContent = descriptionOffre.root.innerHTML;
    var descriptionElements = document.getElementsByName('discriptionoff');
    for (var i = 0; i < descriptionElements.length; i++) {
        descriptionElements[i].value = discOffreContent;
    }
});


let addOffre = document.getElementById("displayoffre");

let offreCard = document.getElementsByClassName("cardnewoffre")[0];

addOffre.addEventListener('click', function () {

    let offreCardStyle = window.getComputedStyle(offreCard);

    if (offreCardStyle.display === 'none') {
        offreCard.style.display = 'block';
        return;
    }
})

let cancelOffre = document.getElementById("canceloffre");
cancelOffre.addEventListener('click', function () {
    let offreCardStyle = window.getComputedStyle(offreCard);

    if (offreCardStyle.display === 'block') {
        offreCard.style.display = 'none';
        return;
    }
})




// const forms = document.querySelectorAll('form');

// Loop through each form
// forms.forEach(form => {
//     // Add submit event listener
//     form.addEventListener('submit', function (event) {
//         // Prevent default form submission
//         event.preventDefault();
//         form.submit();
//         // Additional processing if needed
//         // For example, you can submit the form using AJAX
//     });
// });