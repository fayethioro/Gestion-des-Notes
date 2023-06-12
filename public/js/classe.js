// Fonction pour mettre à jour les disciplines
async function updateDisciplines() {
  // Récupérer les valeurs des champs de chaque ligne
  const rows = document.querySelectorAll('#discipline-table tbody tr');
  const discipline = [];

  rows.forEach((row) => {
    const disciplineData = {
      libelle:'',
      ressource:0,
      examen:0
    }
    const libelle = row.querySelector('td:nth-child(1)').textContent;;
    const ressource = row.querySelector('[name="ressource"]').value;
    const examen = row.querySelector('[name="examen"]').value;
    disciplineData.libelle = libelle;
    disciplineData.ressource = ressource;
    disciplineData.examen = examen;

    discipline.push(disciplineData);
  });
console.log(discipline);
  // Envoyer les données au serveur
  const response = await fetch('/classe/update', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(discipline),
  });
console.log(response);
  // Vérifier la réponse du serveur
  if (response.ok) {
    const result = await response.text();
    console.log(result); 
    alert('bien');// Faire quelque chose avec la réponse
  } else {
    console.error('Erreur lors de la mise à jour des disciplines');
  }
}
const form = document.getElementById('update-form');

// Ajouter un gestionnaire d'événement sur l'événement "submit" du formulaire
form.addEventListener('submit', async (e) => {
  e.preventDefault(); 
  await updateDisciplines(); 
});
