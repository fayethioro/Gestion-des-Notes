<?php

namespace App\Controllers;

use App\Models\SemestreModel;

class SemestreController extends Controller
{

    public function modifierEtat($id)
    {
        $semestreModel = new SemestreModel($this->getDB());
        $semestre = $semestreModel->find($id);

        if ($semestre) {
            $statutActuel = $semestre->statut;
            $nouveauStatut = ($statutActuel == 0) ? 1 : 0;

            // Désactiver tous les autres statuts
            $semestreModel->disableAllStatusExcept($id);

            // Mettre à jour le statut de l'année sélectionnée
            $semestreModel->updateStatut($id, $nouveauStatut);
            $cycle = (new SemestreModel($this->getDB()))->getCycleById($id);

            header('Location: /niveau/classe/' . $cycle);
        }
    }

}