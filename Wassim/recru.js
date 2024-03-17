/*document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("addImage").addEventListener("click", function () {
    document.getElementById("imageInput").click();
  });

  document.getElementById("imageInput").addEventListener("change", function () {
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
      var newImage = document.createElement("img");
      newImage.classList.add("img-fluid");
      newImage.src = e.target.result;

      var newFigure = document.createElement("figure");
      newFigure.classList.add("mb-0");
      newFigure.appendChild(newImage);

      var newCol = document.createElement("div");
      newCol.classList.add("col-md-4");
      newCol.appendChild(newFigure);

      document
        .querySelector(".row")
        .insertBefore(
          newCol,
          document.getElementById("addImageFigure").parentElement
        );

      // Reset the file input to allow uploading the same image again
      document.getElementById("imageInput").value = "";
    };

    reader.readAsDataURL(file);
  });
});
*/

document.getElementById("addImage").addEventListener("click", function () {
  document.getElementById("imageInput").click();
});
/*
document.getElementById("imageInput").addEventListener("change", function () {
  var file = this.files[0];
  var reader = new FileReader();

  reader.onload = function (e) {
    var newImage = document.createElement("img");
    newImage.classList.add("img-fluid");
    newImage.src = e.target.result;

    var newFigure = document.createElement("figure");
    newFigure.classList.add("mb-0");
    newFigure.appendChild(newImage);

    var newCol = document.createElement("div");
    newCol.classList.add("col-md-4");
    newCol.appendChild(newFigure);

    // Append the new column to the row
    document
      .querySelector(".row")
      .insertBefore(
        newCol,
        document.getElementById("addImageFigure").parentElement
      );

    // Reset the file input to allow uploading the same image again
    document.getElementById("imageInput").value = "";
  };

  reader.readAsDataURL(file);
});

/*for (let i = 0; i < 10; i++) {
  let elements = [];
  elements[i] = document.getElementById(`col${i}`);
  if (elements[i].id != "coladd") {
    elements[i].style.display = "none";
  }
}*/

document.getElementById("imageInput").addEventListener("change", function () {
  var file = this.files[0];
  var reader = new FileReader();

  reader.onload = function (e) {
    var emptyFigures = document.querySelectorAll(
      'img[src=""]:not([id="addImage"])'
    );
    if (emptyFigures.length > 0) {
      emptyFigures[0].src = e.target.result;
      emptyFigures[0].parentElement.parentElement.style.display = "block";
    }
  };

  reader.readAsDataURL(file);
});

discriptionOffre = new Quill("#descriptionoffre00", {
  theme: "snow",
});

document.getElementById("EditButton").addEventListener("click", function (e) {
  if (e.textContent == "Edit profile") {
    e.textContent = "Modify";
  } else if (e.textContent == "Modify") {
    e.textContent = "Edit profile"; // Utilisation de l'opérateur d'attribution "=" pour modifier le texte
  }
});
