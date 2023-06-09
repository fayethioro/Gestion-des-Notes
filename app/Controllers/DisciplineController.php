<?php

namespace App\Controllers;

use PDO;
use App\Models\ClasseModel;
use App\Models\DisciplineModel;

class DisciplineController extends Controller
{

    public function getAllDisciplines()
    {
        $disciplines = (new DisciplineModel($this->getDB()))->getAllDisciplines();
        echo json_encode($disciplines);
    }
    public function addDiscipline()
    {
        // Vérifier si les données nécessaires sont présentes
        if (isset($_POST['classeId'], $_POST['groupeId'], $_POST['discipline']) && !empty($_POST['discipline'])) {
            $classeId = intval($_POST['classeId']);
            $groupeId = ($_POST['groupeId'] === 'autre') ? null : intval($_POST['groupeId']);
            $discipline = $_POST['discipline'];

            // Vérifier si le libellé de discipline existe déjà dans la table Discipline
            $disciplineId = (new DisciplineModel($this->getDB()))->getDisciplineIdByLibelle($discipline);

            if ($disciplineId !== false) {
                // Associer la discipline existante à la classe dans la table ClasseDiscipline
                (new DisciplineModel($this->getDB()))->addClasseDiscipline($classeId, $disciplineId);
                echo json_encode(['success' => true]);
            } else {
                // Générer le code de discipline
                $code = $this->generateDisciplineCode($discipline);

                // Insérer la discipline dans la table Discipline
                $disciplineId = (new DisciplineModel($this->getDB()))->addDiscipline($code, $discipline, $groupeId);

                if ($disciplineId !== false) {
                    // Associer la discipline à la classe dans la table ClasseDiscipline
                    (new DisciplineModel($this->getDB()))->addClasseDiscipline($classeId, $disciplineId);
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Failed to add discipline']);
                }
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Missing or empty discipline']);
        }
    }



    private function generateDisciplineCode($discipline)
    {

        $code = '';
        $pos = strpos($discipline, ' ');
        if ($pos === false) {

            $code = strtoupper(substr($discipline, 0, 3));

            // Vérifier si le code existe déjà
            while ((new DisciplineModel($this->getDB()))->checkExistingCode($code)) {
                $code .= substr($discipline, strlen($code), 1);
            }
            return $code;

        } else {
            $discipline = trim($discipline);
            $words = explode(' ', $discipline);

            $code = '';

            foreach ($words as $word) {
                $code .= strtoupper($word[0]);
            }

            $existingCode = (new DisciplineModel($this->getDB()))->checkExistingCode($code);


            while ($existingCode) {
                $index = 1;
                $code .= $index;
                $existingCode = (new DisciplineModel($this->getDB()))->checkExistingCode($code);
                $index++;
            }
        }

        return $code;
    }

    public function deleteDisciplines()
    {

        $disciplineIds = explode(',', $_POST['disciplineIds']);

        print_r($disciplineIds);

        foreach ($disciplineIds as $disciplineId) {
            (new DisciplineModel($this->getDB()))->deleteDisciplineFromClasse($disciplineId);
        }

        echo json_encode(['success' => true]);


    }

    public function showAddGestionDisciplineForm()
    {
        // Charger le contenu HTML du formulaire
        $content = file_get_contents('../views/discipline/discipline.php');

        // Afficher le contenu HTML
        echo $content;
    }


}