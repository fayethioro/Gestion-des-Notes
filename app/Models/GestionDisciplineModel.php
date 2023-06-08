<?php
namespace App\Models;


use PDO;

class GestionDisciplineModel extends Model
{
    protected $table = 'GestionDiscipline';

    public function insertGestionDiscipline($classeId, $cycleId, $groupeId, $disciplineId)
    {
        $conn = $this->db->getPDO();
        $query = "INSERT INTO GestionDiscipline
         (id_classe, id_cycle, id_groupe, id_discipline) VALUES (:classeId, :cycleId, :groupeId, :disciplineId)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':classeId', $classeId, PDO::PARAM_INT);
        $stmt->bindParam(':cycleId', $cycleId, PDO::PARAM_INT);
        $stmt->bindParam(':groupeId', $groupeId, PDO::PARAM_INT);
        $stmt->bindParam(':disciplineId', $disciplineId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}