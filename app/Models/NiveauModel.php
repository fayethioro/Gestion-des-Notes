<?php

namespace App\Models;
use PDO;

class NiveauModel extends Model
 {

    public function allN(): array
 {
        $stmt = $this->db->getPDO()->query( 'SELECT id_niveau, nom_niveau from NiveauEnseignement
       where id_cycle =1' );
        return $stmt->fetchAll();
    }

    public function allM(): array
 {
        $stmt = $this->db->getPDO()->query( 'SELECT id_niveau, nom_niveau from NiveauEnseignement
          where id_cycle =2' );
        return $stmt->fetchAll();
    }

    public function allS(): array
 {
        $stmt = $this->db->getPDO()->query( 'SELECT id_niveau, nom_niveau from NiveauEnseignement
          where id_cycle =3' );
        return $stmt->fetchAll();
    }

    public function allCycle(): array
 {
        $stmt = $this->db->getPDO()->query( 'SELECT distinct * from Cycle' );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }
}
