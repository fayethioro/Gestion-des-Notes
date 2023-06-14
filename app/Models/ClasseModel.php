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
        $statement = $this->db->getPDO()->prepare
        ('SELECT e.id, e.prenom_eleve, e.nom_eleve,e.date_de_naissance, e.id_classe
        FROM Eleve e
        JOIN Classe c ON e.id_classe = c.id
        JOIN AnneeScolaire a ON c.id_annee = a.id
        WHERE a.statut = 1 and c.id = :id');
        $statement->execute(['id' => $id]);
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
    public function getIdCycleById($id)
    {
        $sql = "SELECT id_cycle FROM classe WHERE id = :id limit 1";
        $statement = $this->db->getPDO()->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();

    }
    public function getNameById($id)
    {
        $sql = "SELECT * FROM classe WHERE id = :id limit 1";
        $statement = $this->db->getPDO()->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }
    public function getDisciplinesByClasse($classeId)
    {
        $pdo = $this->db->getPDO();
        $query = "SELECT DISTINCT d.id, d.code_discipline, d.libelle,cd.ressource, cd.examen, cd.id_classe
              FROM Discipline AS d
              INNER JOIN ClasseDiscipline AS cd ON d.id = cd.id_discipline
              WHERE cd.id_classe = :classeId";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':classeId', $classeId);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateDisciplineres($id, $ressource)
    {
        $pdo = $this->db->getPDO();
        $query = "UPDATE ClasseDiscipline SET ressource = :ressource WHERE id_discipline = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':ressource', $ressource);
        $statement->bindParam(':id', $id);
        return $statement->execute();
    }
    public function updateDisciplineexam($id, $examen)
    {
        $pdo = $this->db->getPDO();
        $query = "UPDATE ClasseDiscipline SET examen = :examen WHERE id_discipline = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':examen', $examen);
        $statement->bindParam(':id', $id);
        return $statement->execute();
    }


}