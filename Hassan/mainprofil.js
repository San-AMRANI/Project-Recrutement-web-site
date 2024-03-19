// $(document).ready(function () {
//     var defaultImage = '../media/utilisateur.png';

//     var readURL = function (input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 $('.profile-pic').attr('src', e.target.result);
//             }

//             reader.readAsDataURL(input.files[0]);
//         } else {
//             // Set default image
//             $('.profile-pic').attr('src', defaultImage);
//         }
//     }

//     $(".file-upload").on('change', function () {
//         readURL(this);
//     });

//     $(".upload-button").on('click', function () {
//         $(".file-upload").click();
//     });

//     // Initialize with default image
//     $('.profile-pic').attr('src', defaultImage);

// });
$(document).ready(function () {

    $(".upload-button").on('click', function () {
        $(".file-upload").on(window.location.href = 'indexCV.html')
    });
});

document.getElementById('remove-pdf').addEventListener('click', function () {
    var pdfViewer = document.getElementById('pdf-viewer');
    pdfViewer.src = ''; // Reset iframe source
    document.getElementById('pdf-upload').value = '';
});
document.getElementById('pdf-upload').addEventListener('input', function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var pdfViewer = document.getElementById('pdf-viewer');
        pdfViewer.src = e.target.result;
    };

    reader.readAsDataURL(file);
});


document.addEventListener('DOMContentLoaded', function () {
    // Select all list items
    var listItems = document.querySelectorAll('.list-group-item');

    // Iterate over each list item
    listItems.forEach(function (item) {
        // Get the link URL from the span
        var url = item.querySelector('.link-url').textContent;

        // Create a link element
        var link = document.createElement('a');
        link.href = url;
        link.textContent = item.querySelector('h6').textContent;

        // Replace the content of the list item with the link
        item.innerHTML = '';
        item.appendChild(link);
    });
});

var newUrl = "#";
document.getElementById("linkedinBtn").addEventListener("click", function () {
    window.location.href = newUrl; // Replace with your LinkedIn URL
});



let cardnewlinks = document.getElementsByClassName("cardnewlinks")[0];
document.getElementById('linkedinEditBtn').addEventListener('click', function () {

    let cardnewlinksStyle = window.getComputedStyle(cardnewlinks);

    if (cardnewlinksStyle.display === 'none') {
        cardnewlinks.style.display = 'block';
        return;
    }
})
let cancellinks = document.getElementById("cancellinks");
cancellinks.addEventListener('click', function () {
    let cardnewlinksStyle = window.getComputedStyle(cardnewlinks);

    if (cardnewlinksStyle.display === 'block') {
        cardnewlinks.style.display = 'none';
        return;
    }
})
document.getElementById('formlinks').addEventListener('submit', function () {
    let cardnewlinksStyle = window.getComputedStyle(cardnewlinks);
    if (cardnewlinksStyle.display === 'block') {
        cardnewlinks.style.display = 'none';
        return;
    }
})

let disccandidat = new Quill('#desccandidat', {
    theme: 'snow'
});

