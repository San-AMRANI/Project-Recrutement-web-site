function toggleCollapse() {
    var info = document.getElementById('info');
    info.classList.toggle('show');
}


let descriptionOffre = new Quill('#descriptionoffre00', {
    theme: 'snow'
})

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


