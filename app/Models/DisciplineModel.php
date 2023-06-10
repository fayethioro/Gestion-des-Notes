<?php
namespace App\Models;


use PDO;

class DisciplineModel extends Model
{
    protected $table = 'Discipline';
    public function addDiscipline($code, $libelle, $groupeId)
    {
        $query = "INSERT INTO Discipline (code_discipline, libelle, id_groupe_discipline) 
                  VALUES (:code_discipline, :libelle, :id_groupe_discipline)";
        $statement = $this->db->getPDO()->prepare($query);
        $statement->bindParam(':code_discipline', $code);
        $statement->bindParam(':libelle', $libelle);
        $statement->bindParam(':id_groupe_discipline', $groupeId);
        $result = $statement->execute();

        if ($result) {
            return $this->db->getPDO()->lastInsertId();
        } else {
            return false;
        }
    }

    public function addClasseDiscipline($classeId, $disciplineId)
    {
        $query = "INSERT INTO ClasseDiscipline (id_discipline, id_classe) 
                  VALUES (:id_discipline, :id_classe)";
        $statement = $this->db->getPDO()->prepare($query);
        $statement->bindParam(':id_discipline', $disciplineId);
        $statement->bindParam(':id_classe', $classeId);
        $statement->execute();
    }


    public function getDisciplineIdByLibelle($libelle)
    {
        $pdo = $this->db->getPDO();
        $query = "SELECT id FROM Discipline WHERE libelle = :libelle";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':libelle', $libelle);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['id'] : false;
    }


    public function getAllDisciplines()
    {
        $pdo = $this->db->getPDO();
        $query = "SELECT * FROM Discipline";
        $result = $pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDisciplineFromClasse($classeId, $disciplineId)
    {
        $pdo = $this->db->getPDO();
        $query = "DELETE FROM ClasseDiscipline WHERE id_discipline = :disciplineId and id_classe = :classeId";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':disciplineId', $disciplineId);
        $statement->bindParam(':classeId', $classeId);
        $statement->execute();

    }



    public function checkExistingCode($code)
    {
        $pdo = $this->db->getPDO();
        $query = "SELECT * FROM Discipline WHERE code_discipline = :code";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':code', $code);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;
    }
}