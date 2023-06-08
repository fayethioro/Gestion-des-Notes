<?php

namespace App\Controllers;

use App\Models\GestionDisciplineModel;

class GestionDisciplineController extends Controller
{
    public function addGestionDiscipline()
    {
        // Récupérer les données du formulaire
        $classeId = $_POST['classeId'];
        $cycleId = $_POST['cycleId'];
        $groupeId = $_POST['groupeId'];
        $disciplineId = $_POST['disciplineId'];

        // Appeler la fonction du modèle pour ajouter une discipline
        $success = (new GestionDisciplineModel($this->getDB()))
            ->insertGestionDiscipline($classeId, $cycleId, $groupeId, $disciplineId);

        // Retourner une réponse JSON
        echo json_encode(['success' => $success]);
    }


}