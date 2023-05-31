<?php

namespace App\Models;

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

    public function allEleve($id)
    {
        $statement = $this->db->getPDO()->prepare('SELECT e.id, e.prenom_eleve, e.nom_eleve,e.date_de_naissance
        FROM Eleve e
        JOIN Classe c ON e.id_classe = c.id
        JOIN AnneeScolaire a ON c.id_annee = a.id
        WHERE a.statut = 1 and c.id = :id');
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }
    public function countEleve($id)
    {
        $statement = $this->db->getPDO()->prepare('SELECT COUNT(*) as total_eleve
        FROM Eleve
        WHERE id_classe = :id');
        $statement->execute(['id' => $id]);
        return $statement->fetchColumn();
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
    public function getIdCycleById($id)
    {
        $sql = "SELECT id_cycle FROM classe WHERE id = :id limit 1";
        $statement = $this->db->getPDO()->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();

    }

}