<?php

namespace App\Controllers;

use App\Models\ClasseModel;
use App\Models\NiveauModel;
use App\Models\SemestreModel;
use App\Models\DisciplineModel;

class ClasseController extends Controller
{
    public function allClasse($id)
    {
        $classe = (new NiveauModel($this->getDB()))->allClasse($id);
        $name = (new NiveauModel($this->getDB()))->getNameById($id);
        $semestre = (new SemestreModel($this->getDB()))->AllSemestreByCycle($id);
        return $this->view('classe.classe', compact('classe', 'id', 'name', 'semestre'));
    }
    public function destroyClasse(int $id)
    {
        $classe = (new NiveauModel($this->getDB()))->destroy($id);
        return $this->view('classe.classe', compact('classe', ));

    }

    public function ajouterClasse()
    {
        $errorMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs du formulaire
            $libelle = $_POST['libelle'];
            $id_cycle = $_POST['id_cycle'];

            // Instancier le modèle de classe
            $classeModel = new ClasseModel($this->getDB());

            if (!$classeModel->isLibelleUnique($libelle)) {
                $errorMessage = 'Cette classe existe déjà.';


            } else {
                // Appeler la fonction du modèle pour insérer la classe
                $classeModel->insertClasse($libelle, $id_cycle);

            }
            // Rediriger ou afficher un message de succès
            header('Location: /niveau/classe/' . $_POST['id_cycle']);
            exit();
        }
    }
    public function getClasses($id)
    {
        $classes = (new NiveauModel($this->getDB()))->allClasse($id);
        echo json_encode($classes);
    }
    public function getDisciplines($classeId)
    {
        $disciplines = (new ClasseModel($this->getDB()))->getDisciplinesByClasse($classeId);
        // Retourner les disciplines au format JSON
        echo json_encode($disciplines);
    }

    public function getponderation($classeId)
    {
        $disciplines = (new ClasseModel($this->getDB()))->getDisciplinesByClasse($classeId);
        $name = (new ClasseModel($this->getDB()))->getNameById($classeId);
        // Retourner les disciplines au format JSON
        // echo json_encode($disciplines);

        return $this->view('classe.ponderation', compact('disciplines', 'name'));

    }
    public function updateDisciplines()
    {
        // Récupérer les données envoyées dans la requête
        $data = json_decode(file_get_contents('php://input'), true);

        $classemodel = new ClasseModel($this->getDB());
        foreach ($data as $value) {
            if ($value['libelle'] === 'ressource') {
                $classemodel->updateDisciplineres($value['id'], $value['note']);
            } else {
                $classemodel->updateDisciplineexam($value['id'], $value['note']);
            }
        }
    }


    public function deleteDiscipline()
    {

        if (isset($_POST['disciplineIds']) && isset($_POST['classeId'])) {
            $disciplineId = intval($_POST['disciplineIds']);
            $classeId = intval($_POST['classeId']);
            echo $disciplineId;
            (new DisciplineModel($this->getDB()))->deleteDisciplineFromClasse($classeId, $disciplineId);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'discipline ou classe manquante']);
        }

    }
}