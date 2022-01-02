<?php
require_once "Logement.php";
require_once "Manager.php";

class LogementManager extends Manager
{
    private $logements;

    public function addLogement($logement)
    {
        $this->logements[] = $logement;
    }

    public function getLogements()
    {
        return $this->logements;
    }

    public function loadLogements()
    {
        $req  = $this->getBdd()->prepare("SELECT * FROM logement");
        $req->execute();
        $myLogements = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myLogements as $logement) {
            $newLogement = new Logement($logement['id_logement'], $logement['titre'], $logement['adresse'], $logement['ville'], $logement['cp'], $logement['surface'], $logement['prix'], $logement['photo'], $logement['type']);
            $this->addLogement($newLogement);
        }
    }

    public function newLogementDB($titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type)
    {
        $req = "INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type) 
                VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":titre", $titre, PDO::PARAM_STR);
        $statement->bindValue(":adresse", $adresse, PDO::PARAM_STR);
        $statement->bindValue(":ville", $ville, PDO::PARAM_STR);
        $statement->bindValue(":cp", $cp, PDO::PARAM_STR);
        $statement->bindValue(":surface", $surface, PDO::PARAM_INT);
        $statement->bindValue(":prix", $prix, PDO::PARAM_INT);
        $statement->bindValue(":photo", $photo, PDO::PARAM_STR);
        $statement->bindValue(":type", $type, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $logement = new Logement($this->getBdd()->lastInsertId(), $titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type);
            $this->addLogement($logement);
        }
    }

    public function getLogementById($id_logement)
    {
        foreach ($this->logements as $logement) {
            if ($logement->getId_logement() == $id_logement) {
                return $logement;
            }
        }
    }

    public function editLogementDB($id_logement, $titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type)
    {
        $req = "UPDATE logement SET titre = :titre, adresse = :adresse, ville = :ville, cp = :cp, surface = :surface, prix = :prix, photo = :photo, type = :type
        WHERE id_logement = :id_logement";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":titre", $titre, PDO::PARAM_STR);
        $statement->bindValue(":adresse", $adresse, PDO::PARAM_STR);
        $statement->bindValue(":ville", $ville, PDO::PARAM_STR);
        $statement->bindValue(":cp", $cp, PDO::PARAM_STR);
        $statement->bindValue(":surface", $surface, PDO::PARAM_INT);
        $statement->bindValue(":prix", $prix, PDO::PARAM_INT);
        $statement->bindValue(":photo", $photo, PDO::PARAM_STR);
        $statement->bindValue(":type", $type, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $this->getLogementById($id_logement)->setTitre($titre);
            $this->getLogementById($id_logement)->setAdresse($adresse);
            $this->getLogementById($id_logement)->setVille($ville);
            $this->getLogementById($id_logement)->setCp($cp);
            $this->getLogementById($id_logement)->setSurface($surface);
            $this->getLogementById($id_logement)->setPrix($prix);
            $this->getLogementById($id_logement)->setPhoto($photo);
            $this->getLogementById($id_logement)->setType($type);
        }
    }

    public function deleteLogementDB($id_logement)
    {
        $req = "DELETE FROM logement WHERE id_logement = :id_logement";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id_logement", $id_logement, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $logement = $this->getLogementById($id_logement);
            unset($logement);
        }
    }
}
