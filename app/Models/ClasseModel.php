<?php

namespace App\Models;

use App\Models\AnneeModel;
use FFI\Exception;
use PDO;

class ClasseModel extends Model
{
    protected $table = 'Classe';

    public function insertClasse($libelle, $id_cycle)
    {
        // Utiliser la fonction pour obtenir l'ID de l'année scolaire active
        $id_annee = $this->getActiveAnneeId();

        // Insérer les valeurs dans la table Classe
        $sql = "INSERT INTO Classe (libelle, id_cycle, id_annee)
                VALUES (:libelle, :id_cycle, :id_annee)";

        // Préparer la requête
        $statement = $this->db->getPDO()->prepare($sql);

        // Assigner les valeurs aux paramètres
        $statement->bindParam(':libelle', $libelle);
        $statement->bindParam(':id_cycle', $id_cycle);
        $statement->bindParam(':id_annee', $id_annee);

        // Exécuter la requête
        $statement->execute();
        return $statement->fetchAll();

    }
    public function getActiveAnneeId()
    {
        $sql = "SELECT id FROM AnneeScolaire WHERE statut = 1";
        $statement = $this->db->getPDO()->query($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['id'])) {
            return $result['id'];
        }
    }


}