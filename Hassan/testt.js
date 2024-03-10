var editorsFor = [];
function feditorFor() {
  for (let i = 0; i < 5; i++) {
    let editor = new Quill(`#descriptionfor${i}`, {
      theme: "snow",
    });
    editorsFor.push(editor);
  }
}
feditorFor();

//experience
var editorsExp = [];
function feditorExp() {
  for (let i = 0; i < 5; i++) {
    let editor = new Quill(`#descriptionexp${i}`, {
      theme: "snow",
    });
    editorsExp.push(editor);
  }
}
feditorExp();

// listnerr title
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`titre-formation${i}`);
  let ele = document.getElementById(`titre-formation${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}

// listnerr date debut
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`dateDebutfor${i}`);
  let ele = document.getElementById(`dateDebutfor${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value + "-";
  });
}

// listnerr date fin
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`dateFinfor${i}`);
  let ele = document.getElementById(`dateFinfor${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}
// listnerr ville
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`villefor${i}`);
  let ele = document.getElementById(`villefor${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}

// listnerr etablissemant
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`etablissement${i}`);
  let ele = document.getElementById(`etablissement${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}

for (let i = 0; i < 4; i++) {
  let ele = document.getElementById(`descriptionfor${i}${i}`);
  editorsFor[i].on("text-change", function () {
    ele.innerHTML = editorsFor[i].root.innerHTML;
  });
}

// listen to the experience

for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`titre-experience${i}`);
  let ele = document.getElementById(`titre-experience${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}

// listnerr date debut
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`dateDebutexp${i}`);
  let ele = document.getElementById(`dateDebutexp${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value + "-";
  });
}

// listnerr date fin
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`dateFinexp${i}`);
  let ele = document.getElementById(`dateFinexp${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}
// listnerr ville
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`villeexp${i}`);
  let ele = document.getElementById(`villeexp${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}

// listnerr etablissemant
for (let i = 0; i < 4; i++) {
  let elemt = [];

  elemt[i] = document.getElementById(`Employeur${i}`);
  let ele = document.getElementById(`Employeur${i}${i}`);
  elemt[i].addEventListener("input", function () {
    ele.textContent = elemt[i].value;
  });
}

for (let i = 0; i < 4; i++) {
  let ele = document.getElementById(`descriptionexp${i}${i}`);
  editorsExp[i].on("text-change", function () {
    ele.innerHTML = editorsExp[i].root.innerHTML;
  });
}
// listener for competence

for (let i = 0; i < 4; i++) {
  let elemt1 = [];
  let elemt2 = [];

  elemt1[i] = document.getElementById(`title-competence${i}`);
  let ele1 = document.getElementById(`title-competence${i}${i}`);
  elemt1[i].addEventListener("input", function () {
    ele1.textContent = elemt1[i].value + " :";
  });

  elemt2[i] = document.getElementById(`level-competence${i}`);
  let ele2 = document.getElementById(`level-competence${i}${i}`);
  elemt2[i].addEventListener("input", function () {
    if (elemt2[i].value == 1) {
      ele2.textContent = "Débutant";
    }
    if (elemt2[i].value == 2) {
      ele2.textContent = "Intermédiaire";
    }
    if (elemt2[i].value == 3) {
      ele2.textContent = "Avancé";
    }
  });
}

// listener for language

for (let i = 0; i < 4; i++) {
  let elemt1 = [];
  let elemt2 = [];

  elemt1[i] = document.getElementById(`title-language${i}`);
  let ele1 = document.getElementById(`title-language${i}${i}`);
  elemt1[i].addEventListener("input", function () {
    ele1.textContent = elemt1[i].value + " :";
  });

  elemt2[i] = document.getElementById(`level-language${i}`);
  let ele2 = document.getElementById(`level-language${i}${i}`);

  elemt2[i].addEventListener("input", function () {
    if (elemt2[i].value == 1) {
      ele2.textContent = "Débutant";
    }
    if (elemt2[i].value == 2) {
      ele2.textContent = "Intermédiaire";
    }
    if (elemt2[i].value == 3) {
      ele2.textContent = "Avancé";
    }
  });
}
