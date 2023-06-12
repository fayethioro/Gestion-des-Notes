<?php

namespace App\Controllers;

use App\Models\ClasseModel;
use App\Models\EleveModel;
use App\Models\SemestreModel;

class EleveController extends Controller
{
    public function allEleve($id)
    {
        $eleve = (new ClasseModel($this->getDB()))->allEleve($id);
        $niveau = (new ClasseModel($this->getDB()))->getIdCycleById($id);
        $name = (new ClasseModel($this->getDB()))->getNameById($id);
        $effectif = (new EleveModel($this->getDB()))->countEleve($id);
        $disciplines = (new ClasseModel($this->getDB()))->getDisciplinesByClasse($id);
        $semestre = (new SemestreModel($this->getDB()))->AllSemestre();
        return $this->view(
            'eleve.eleve',
            compact('eleve', 'id', 'niveau', 'name', 'effectif', 'disciplines', 'semestre')
        );
    }

    public function AjouterEleve()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $photo = $_POST['photo'];
            $date_naissance = $_POST['date_naissance'];
            $profil = $_POST['profil'];
            $sexe = $_POST['sexe'];
            $id_classe = $_POST['id_classe'];

            // Instancier le modèle "EleveModel"
            $eleveModel = new EleveModel($this->getDB());

            // Appeler la méthode d'insertion des données
            $eleveModel->insertEleve($prenom, $nom, $photo, $date_naissance, $profil, $sexe, $id_classe);

            header('Location: /classe/liste/' . $_POST['id_classe']);
            exit();
        }

    }


}