const discipline = document.querySelector('.discipline');
const note = document.querySelector('.note');
const notes = document.querySelector('#notes');
const ponderations = document.querySelectorAll('.ponderation');
const maxNote = document.querySelectorAll('.max-note');

console.log(notes.data);


if (discipline.value == 0 || note.value == 0) {
   ponderations.forEach(ponderation => {
      ponderation.style.display = 'none';
   });
}
note.addEventListener('change', () => {
   if (note.value == 0) {
      ponderations.forEach(ponderation => {
         ponderation.style.display = 'none';
      });
   }
});
discipline.addEventListener('change', () => {
   if (discipline.value == 0) {
      ponderations.forEach(ponderation => {
         ponderation.style.display = 'none';
      });
   }
});
discipline.addEventListener('change', () => {
   note.addEventListener('change', () => {
         ponderations.forEach(ponderation => {
            ponderation.style.display = 'block';
         });
   });
});

note.addEventListener('change', () => {
   getNote((cd) => {
      var idRecherche = discipline.value;
      var position = cd.findIndex(function (objet) {
         return objet.id == idRecherche;
      });
      if (note.value == 1) {
         maxNote.forEach(elt => {
            elt.innerHTML = cd[position].ressource;
         });
      }
      if (note.value == 2) {
         maxNote.forEach(elt => {
            elt.innerHTML = cd[position].examen;
         });
      }
   });
});

async function getNote(cd) {

   const classeId = document.querySelector('.classeId').value;
   const response = await fetch(`/note/${classeId}`);
   if (!response.ok) {
      throw new Error('Erreur de requête');
   }
   const disciplines = await response.json();
   cd(disciplines);
}





