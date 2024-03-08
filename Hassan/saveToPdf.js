$(document).ready(function () {
    $('#btn-print-this').click(function () {
        $('.cv-template').printThis({
            importStyle: true,
            importCSS: true,
            loadCSS: "/Hassan/styleCV.css",
            printContainer: true,
            canvas: true,
        });
    })
});

const addFormation = document.getElementById('add-formation');
const removeFormation = document.getElementById('remove-formation');

const formationTab = [];

addFormation.addEventListener('click', function () {
    for (let i = 0; i < 4; i++) {
        formationTab[i] = document.getElementById(`formation${i + 1}`);
        let computedStyle = window.getComputedStyle(formationTab[i]);
        if (computedStyle.display === 'none') {
            formationTab[i].style.display = 'block';
            return;
        }
    }
});

removeFormation.addEventListener('click', function () {
    for (let i = formationTab.length-1; i >= 0; i--) {
        let computedStyle = window.getComputedStyle(formationTab[i]);
        if (computedStyle.display === 'block') {
            formationTab[i].style.display = 'none';
            let form = formationTab[i].querySelector('form'); // Assuming there's only one form inside each formation div
            if (form) {
                form.reset(); // Reset the form, clearing all input fields
            }
            return;
        }
    }
});



