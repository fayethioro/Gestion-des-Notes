<?php

namespace App\Models;

class AnneeModel extends Model
{
    protected $table = 'AnneeScolaire';

    public function allA()
    {
        $stmt = $this->db->getPDO()->query('SELECT * FROM AnneeScolaire order by statut desc');
        return $stmt->fetchAll();

    }



    public function updateStatut($id, $statut)
    {
        $statement = $this->db->getPDO()->prepare('UPDATE AnneeScolaire SET statut = :statut WHERE id = :id');
        $statement->execute(['statut' => $statut, 'id' => $id]);
    }

    public function disableAllStatusExcept($id)
    {
        $statement = $this->db->getPDO()->prepare('UPDATE AnneeScolaire SET statut = 0 WHERE id <> :id');
        $statement->execute(['id' => $id]);
    }

}