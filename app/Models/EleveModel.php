<?php
namespace App\Models;

use App\Models\ClasseModel;
use PDO;

class EleveModel extends Model
{
    public function insertEleve($prenom, $nom, $photo, $date_naissance, $profil, $sexe, $id_classe)
    {
        $activeAnneeId = $this->getActiveAnneeId();

        $stmt = $this->db->getPDO()->prepare("INSERT INTO Eleve (prenom_eleve, nom_eleve, 
        photo, date_de_naissance, profil, sexe, id_classe, id_annee)
        VALUES (:prenom, :nom, :photo, :date_naissance, :profil, :sexe, :id_classe, :id_annee)");

        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':profil', $profil);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':id_classe', $id_classe);
        $stmt->bindParam(':id_annee', $activeAnneeId);

        $stmt->execute();
        return $stmt->fetchAll();
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

}