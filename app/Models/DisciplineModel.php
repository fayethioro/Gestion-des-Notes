<?php
namespace App\Models;


use PDO;

class DisciplineModel extends Model
{
    protected $table = 'Discipline';
    public function addDiscipline($classeId, $groupeId, $discipline)
    {
        $code = $this->generateDisciplineCode($discipline);

        echo $code;
        $query = "INSERT INTO Discipline (code_discipline, libelle, id_groupe_discipline, id_classe) 
        VALUES (:code_discipline, :libelle, :id_groupe_discipline, :id_classe)";
        $statement = $this->db->getPDO()->prepare($query);

        $statement->bindParam(':code_discipline', $code);
        $statement->bindParam(':libelle', $discipline);
        $statement->bindParam(':id_groupe_discipline', $groupeId);
        $statement->bindParam(':id_classe', $classeId);

        $statement->execute();
        return $statement->fetchAll();
    }

    public function getAllDisciplines()
    {
        $pdo = $this->db->getPDO();
        $query = "SELECT * FROM Discipline";
        $result = $pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDisciplines($id)
    {
        $pdo = $this->db->getPDO();
        $query = "DELETE FROM Discipline WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    private function generateDisciplineCode($discipline)
    {

        $code = '';
        $pos = strpos($discipline, ' ');
        if ($pos === false) {

            $code = strtoupper(substr($discipline, 0, 3));

            $existingCode = $this->checkExistingCode($code);
            if ($existingCode) {
                $code = strtoupper(substr($discipline, 0, 4));

            }

        } else {
            $discipline = trim($discipline);
            $words = explode(' ', $discipline);

            $code = '';

            foreach ($words as $word) {
                $code .= strtoupper($word[0]);
            }

            $existingCode = $this->checkExistingCode($code);


            while ($existingCode) {
                $index = 1;
                $code .= $index;
                $existingCode = $this->checkExistingCode($code);
                $index++;
            }
        }

        return $code;
    }

    private function checkExistingCode($code)
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