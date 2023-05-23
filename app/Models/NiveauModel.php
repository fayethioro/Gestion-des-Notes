<?php

namespace App\Models;
use PDO;

class NiveauModel extends Model
{

    public function allN(): array
    {
        $stmt = $this->db->getPDO()->query('SELECT N.id_niveau, N.nom_niveau, C.nom_cycle
        FROM NiveauEnseignement N
        JOIN Cycle C ON N.id_cycle = C.id_cycle;');
        return $stmt->fetchAll();
    }
    public function allCycle(): array
    {
        $stmt = $this->db->getPDO()->query('SELECT distinct * from Cycle');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
