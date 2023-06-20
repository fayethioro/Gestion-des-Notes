<?php

namespace App\Models;

use PDO;

class NoteModel extends Model
{
    protected $table = 'NoteEleve';


    public function enregistrerNote($classeDiscipline, $eleve, $semestre, $note, $typeNote)
    {

        // Vérifier si la note existe déjà dans la table NoteEleve pour cet élève, cette discipline et ce semestre
        $query = "SELECT id FROM NoteEleve WHERE 
                id_classediscipline = :classeDiscipline AND id_eleve = :eleve AND 
                id_semestre = :semestre AND  id_type_note= :typeNote";
        $stmt = $this->db->getPDO()->prepare($query);
        $stmt->bindParam(':classeDiscipline', $classeDiscipline, PDO::PARAM_INT);
        $stmt->bindParam(':eleve', $eleve, PDO::PARAM_INT);
        $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);
        $stmt->bindParam(':typeNote', $typeNote, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        print_r($result);
        if ($result) {
            // La note existe, mettre à jour sa valeur
            $query = "UPDATE NoteEleve SET note = :note
            WHERE id = :noteId";
            $stmt = $this->db->getPDO()->prepare($query);
            $stmt->bindParam(':note', $note, PDO::PARAM_INT);
            $stmt->bindParam(':noteId', $result->id, PDO::PARAM_INT);
            return $stmt->execute();
        } else {
            // La note n'existe pas, l'insérer dans la table NoteEleve
            $query = "INSERT INTO NoteEleve (id_classediscipline, id_eleve, id_semestre,
             note, id_type_note) VALUES (:classeDiscipline, :eleve, :semestre, :note, :typeNote)";
            $stmt = $this->db->getPDO()->prepare($query);
            $stmt->bindParam(':classeDiscipline', $classeDiscipline, PDO::PARAM_INT);
            $stmt->bindParam(':eleve', $eleve, PDO::PARAM_INT);
            $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);
            $stmt->bindParam(':note', $note, PDO::PARAM_INT);
            $stmt->bindParam(':typeNote', $typeNote, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    public function getNote()
    {

        $sql = "SELECT * FROM NoteEleve";
        $statement = $this->db->getPDO()->query($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNotesByClassAndType($classId, $typeId)
    {
        $sql = "SELECT ne.*
                FROM NoteEleve ne
                INNER JOIN ClasseDiscipline cd ON ne.id_classediscipline = cd.id
                INNER JOIN Classe c ON cd.id_classe = c.id
                INNER JOIN TypeNote tn ON ne.id_type_note = tn.id
                WHERE c.id = :classId AND tn.id = :typeId";

        $statement = $this->db->getPDO()->prepare($sql);
        $statement->bindParam(':classId', $classId, PDO::PARAM_INT);
        $statement->bindParam(':typeId', $typeId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}