<?php

namespace App\Models;

use PDO;

class NiveauModel extends Model
{
    protected $table = 'Cycle';

    public function allCycle(): array
    {
        $stmt = $this->db->getPDO()->query('SELECT * from Cycle');
        return $stmt->fetchAll();
    }

    public function allClasse($id)
    {
        $statement = $this->db->getPDO()->prepare('SELECT c.id, c.libelle, c.id_cycle
        FROM Classe c
        JOIN Cycle cy ON c.id_cycle = cy.id
        JOIN AnneeScolaire a ON c.id_annee = a.id
        WHERE cy.id = :id AND a.statut = 1;
        ');
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }
    public function getNameById($id)
    {
        $sql = "SELECT libelle FROM cycle WHERE id = :id limit 1";
        $statement = $this->db->getPDO()->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();

    }
}