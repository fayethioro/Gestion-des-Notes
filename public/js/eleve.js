const discipline = document.querySelector(".discipline");
const note = document.querySelector(".note");
const ponderations = document.querySelectorAll(".ponderation");
const maxNote = document.querySelectorAll(".max-note");

discipline.addEventListener("change", () => {
  console.log(discipline.value);
  console.log(discipline.options[discipline.selectedIndex].id);
});

if (discipline.value == 0 || note.value == 0) {
  ponderations.forEach((ponderation) => {
    ponderation.style.display = "none";
  });
}
note.addEventListener("change", () => {
  if (note.value == 0) {
    ponderations.forEach((ponderation) => {
      ponderation.style.display = "none";
    });
  }
});
discipline.addEventListener("change", () => {
  if (discipline.value == 0) {
    ponderations.forEach((ponderation) => {
      ponderation.style.display = "none";
    });
  }
});
discipline.addEventListener("change", () => {
  note.addEventListener("change", () => {
    ponderations.forEach((ponderation) => {
      ponderation.style.display = "block";
    });
  });
});

note.addEventListener("change", () => {
  getNote((cd) => {
    let idRecherche = discipline.value;
    let position = cd.findIndex(function (objet) {
      return objet.id == idRecherche;
    });
    if (note.value == 1) {
      maxNote.forEach((elt) => {
        elt.innerHTML = cd[position].ressource;
      });
    }
    if (note.value == 2) {
      maxNote.forEach((elt) => {
        elt.innerHTML = cd[position].examen;
      });
    }
  });
});

async function getNote(cd) {
  const classeId = document.querySelector(".classeId").value;
  const response = await fetch(`/note/${classeId}`);
  if (!response.ok) {
    throw new Error("Erreur de requête");
  }
  const disciplines = await response.json();
  cd(disciplines);
}

document
  .getElementById("enregistrer")
  .addEventListener("click", async function (event) {
    event.preventDefault();

    // Récupérer toutes les lignes du tableau
    const rows = document.querySelectorAll("tbody tr");
    const classeDiscipline = discipline.options[discipline.selectedIndex].id;
    const semestre = document.getElementById("semestreId").value;
    const typeNote = document.querySelector(".note").value;

    const classeNote = [];

    // Parcourir les lignes
    rows.forEach((row) => {
      // Récupérer la valeur de l'input "note" de la ligne actuelle
      let noteInput = row.querySelector(".noteEleve");
      let noteValue = noteInput.value;
console.log(noteInput);
      const noteMax = row.querySelector(".max-note").textContent;
      console.log("Max note " + noteMax);
      // Récupérer la valeur de l'input "eleve" de la ligne actuelle
      let eleveInput = row.querySelector(".eleveId");
      let eleveValue = eleveInput.value;
    
        let newNote = {
          classeDiscipline: +classeDiscipline,
          eleve: +eleveValue,
          semestre: +semestre,
          note: +noteValue,
          typeNote: +typeNote,
        }
        classeNote.push(newNote);
      
    });
   //  console.log(classeNote);

    //  Envoyer la requête fetch
    let response = await fetch("/note", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(classeNote),
    });

    let data = await response.text();

   //  console.log(data);

    if (data.success) {
      alert("bien");
      // Réinitialiser les champs du formulaire
      // document.getElementById('classe-discipline').value = '';
      // document.getElementById('eleve').value = '';
      // document.getElementById('semestre').value = '';
      // document.getElementById('note').value = '';
      // document.getElementById('type-note').value = '';
    } else {
      alert("pas bien");
    }
  });
