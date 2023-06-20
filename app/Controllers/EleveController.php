<?php

namespace App\Controllers;

use App\Models\ClasseModel;
use App\Models\EleveModel;
use App\Models\NoteModel;
use App\Models\SemestreModel;

class EleveController extends Controller
{
    public function allEleve($id)
    {
        $eleves = (new ClasseModel($this->getDB()))->allEleve($id);
        $niveau = (new ClasseModel($this->getDB()))->getIdCycleById($id);
        $name = (new ClasseModel($this->getDB()))->getNameById($id);
        $effectif = (new EleveModel($this->getDB()))->countEleve($id);
        $disciplines = (new ClasseModel($this->getDB()))->getDisciplinesByClasse($id);
        $semestre = (new SemestreModel($this->getDB()))->AllSemestre();
        $notes = (new SemestreModel($this->getDB()))->typeNote();
        $mesnote = (new NoteModel($this->getDB()))->getNote();

        return $this->view(
            'eleve.eleve',
            compact(
                'eleves',
                'id',
                'niveau',
                'name',
                'effectif',
                'disciplines',
                'semestre',
                'notes',
                'mesnote',

            )
        );
    }

    public function AjouterEleve(
    ) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $photo = $_POST['photo'];
            $datenaissance = $_POST['date_naissance'];
            $profil = $_POST['profil'];
            $sexe = $_POST['sexe'];
            $idclasse = $_POST['id_classe'];

            // Instancier le modèle "EleveModel"
            $eleveModel = new EleveModel($this->getDB());

            // Appeler la méthode d'insertion des données
            $eleveModel->insertEleve($prenom, $nom, $photo, $datenaissance, $profil, $sexe, $idclasse);

            header('Location: /classe/liste/' . $_POST['id_classe']);
            exit();
        }

    }


}