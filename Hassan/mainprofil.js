$(document).ready(function () {
    var defaultImage = '../media/utilisateur.png';

    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            // Set default image
            $('.profile-pic').attr('src', defaultImage);
        }
    }

    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });

    // Initialize with default image
    $('.profile-pic').attr('src', defaultImage);

});

document.getElementById('remove-pdf').addEventListener('click', function () {
    var pdfViewer = document.getElementById('pdf-viewer');
    pdfViewer.src = ''; // Reset iframe source
    document.getElementById('pdf-upload').value = '';
});
document.getElementById('pdf-upload').addEventListener('change', function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var pdfViewer = document.getElementById('pdf-viewer');
        pdfViewer.src = e.target.result;
    };

    reader.readAsDataURL(file);
});

