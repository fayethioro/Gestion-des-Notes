<?php

namespace App\Models;

class ClasseModel extends Model
{

    public function allC()
    {
        $stmt = $this->db->getPDO()->query('SELECT Classe.nom_classe, NiveauEnseignement.nom_niveau,
            AnneeScolaire.nom_annee, COUNT(Eleve.id_eleve) AS effectif_classe
            FROM Classe
            INNER JOIN NiveauEnseignement ON Classe.id_niveau = NiveauEnseignement.id_niveau
            INNER JOIN AnneeScolaire ON Classe.annee_scolaire = AnneeScolaire.id_annee
            INNER JOIN Cycle ON NiveauEnseignement.id_cycle = Cycle.id_cycle
            LEFT JOIN Eleve ON Classe.id_classe = Eleve.id_classe
            GROUP BY Classe.nom_classe, NiveauEnseignement.nom_niveau, AnneeScolaire.nom_annee;
            ');
        return $stmt->fetchAll();

    }
}
