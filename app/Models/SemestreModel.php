<?php

namespace App\Models;

use PDO;

class SemestreModel extends Model
{
    protected $table = 'Semestre';

    public function AllSemestre()
    {
        $stmt = $this->db->getPDO()->query('SELECT * FROM Semestre  where etat = 1
       ');
        return $stmt->fetchAll();
    }
    public function AllSemestreByCycle($id)
    {
        $statement = $this->db->getPDO()->prepare('SELECT s.*
        FROM Semestre s
        JOIN Cycle cy ON s.id_cycle = cy.id
        WHERE cy.id = :id 
        order by etat desc;
        ');
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }
    public function updateStatut($id, $etat)
    {
        $statement = $this->db->getPDO()->prepare('UPDATE semestre SET etat = :etat WHERE id = :id');
        $statement->execute(['etat' => $etat, 'id' => $id]);
    }

    public function disableAllStatusExcept($id)
    {
        $statement = $this->db->getPDO()->prepare('UPDATE semestre SET etat = 0 WHERE id <> :id');
        $statement->execute(['id' => $id]);
    }
    public function getCycleById($id)
    {
        $statement = $this->db->getPDO()->prepare('SELECT s.id_cycle , s.libelle
        FROM Semestre s
        JOIN Cycle cy ON s.id_cycle = cy.id
        WHERE s.id = :id 
        limit 1;');
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['id_cycle'] : false;
    }

    public function typeNote()
    {
        $stmt = $this->db->getPDO()->query('SELECT * FROM typenote
       ');
        return $stmt->fetchAll();
    }
}