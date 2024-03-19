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

document.getElementById("addImage").addEventListener("click", function () {
  document.getElementById("imageInput").click();
});

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

      // Send the uploaded image to the server using AJAX
      var formData = new FormData();
      formData.append("image", file);

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "uploadedimg.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log("Image uploaded successfully");
        }
      };
      xhr.send(formData);
    }
  };

  reader.readAsDataURL(file);
});

discriptionOffre = new Quill("#descriptionoffre00", {
  theme: "snow",
});

/*document.getElementById("EditButton").addEventListener("click", function () {
  if (this.textContent == "Edit profile") {
    this.textContent = "Modify";
  } else if (this.textContent == "Modify") {
    this.textContent = "Edit profile"; // Utilisation de l'opérateur d'attribution "=" pour modifier le texte
  }
});
*/
$(document).ready(function () {
  var defaultImage = "../media/utilisateur.png";

  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#addImage2").attr("src", e.target.result);
        $("#fileData").val(e.target.result); // Set file data to hidden input
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      // Set default image
      $("#addImage2").attr("src", defaultImage);
    }
  };

  $(".file-upload").on("change", function () {
    readURL(this);
  });

  $("#imageInput").on("click", function () {
    $(".file-upload").click();
  });

  // Initialize with default image
  $(".#addImage2").attr("src", defaultImage);
});
