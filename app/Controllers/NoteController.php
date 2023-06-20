<?php

namespace App\Controllers;

use App\Models\NoteModel;

class NoteController extends Controller
{

    public function enregistrerNote()
    {

        $data = json_decode(file_get_contents('php://input'), true);

        // Appeler la méthode enregistrerNote du modèle
        $result = new NoteModel($this->getDB());
        // Préparer la réponse JSON
        foreach ($data as $value) {
            $result->enregistrerNote(
                $value['classeDiscipline'],
                $value['eleve'], $value['semestre'], $value['note'], $value['typeNote']
            );

        }
    }

    public function getAllNote()
    {
        $disciplines = (new NoteModel($this->getDB()))->getNote();
        echo json_encode($disciplines);
        // return $this->view('classe.ponderation', compact('disciplines', 'name'));

    }
}