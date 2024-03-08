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
//descriptoions text editor 
//formation
var editorsFor = [];

for (let i = 0; i < 5; i++) {
    let editor = new Quill(`#descriptionfor${i}`, {
        theme: 'snow'
    });
    editorsFor.push(editor);
}

//experience
var editorsExp = [];

for (let i = 0; i < 5; i++) {
    let editor = new Quill(`#descriptionexp${i}`, {
        theme: 'snow'
    });
    editorsExp.push(editor);
}

//affect quills to forms 



//gere les formation
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
    for (let i = formationTab.length - 1; i >= 0; i--) {
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

//gere les experience
const addExperience = document.getElementById('add-experience');
const removeExperience = document.getElementById('remove-experience');

const experienceTab = [];

addExperience.addEventListener('click', function () {
    for (let i = 0; i < 4; i++) {
        experienceTab[i] = document.getElementById(`experience${i + 1}`);
        let computedStyle = window.getComputedStyle(experienceTab[i]);
        if (computedStyle.display === 'none') {
            experienceTab[i].style.display = 'block';
            return;
        }
    }
});

removeExperience.addEventListener('click', function () {
    for (let i = experienceTab.length - 1; i >= 0; i--) {
        let computedStyle = window.getComputedStyle(experienceTab[i]);
        if (computedStyle.display === 'block') {
            experienceTab[i].style.display = 'none';
            let form = experienceTab[i].querySelector('form'); // Assuming there's only one form inside each experience div
            if (form) {
                form.reset(); // Reset the form, clearing all input fields
            }
            return;
        }
    }
});



for (let i = 0; i < 5; i++) {
    document.getElementById(`formfor${i}`).addEventListener('submit', function (event) {
        // Get the Quill editor content for the specified form
        var editorContent = editorsFor[i].root.innerHTML;
        // Set the content to the hidden input field
        document.getElementById(`descriptionfor-input${i}`).value = editorContent;
        // Submit the form
        // (optional) You can prevent the default form submission behavior if needed
        // event.preventDefault();
    });
}
for (let i = 0; i < 5; i++) {
    document.getElementById(`formexp${i}`).addEventListener('submit', function (event) {
        // Get the Quill editor content for the specified form
        var editorContent = editorsExp[i].root.innerHTML;
        // Set the content to the hidden input field
        document.getElementById(`descriptionexp-input${i}`).value = editorContent;
        // Submit the form
        // (optional) You can prevent the default form submission behavior if needed
        // event.preventDefault();
    });
}