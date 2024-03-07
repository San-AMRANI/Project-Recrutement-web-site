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
})


