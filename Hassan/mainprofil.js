document.getElementById('remove-pdf').addEventListener('click', function () {
    var pdfViewer = document.getElementById('pdf-viewer');
    pdfViewer.src = ''; // Reset iframe source
    pdfViewer.style.display = "none"; // Hide the iframe
    document.getElementById('pdf-upload').value = ''; // Reset file input
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
