<?php
require_once "modele/LogementManager.php";

class LogementController
{
    private $logementManager;

    public function __construct()
    {
        $this->logementManager = new LogementManager;
        $this->logementManager->loadLogements();
    }

    public function displayLogements()
    {
        $logements = $this->logementManager->getLogements();
        require_once "view/logements.view.php";
    }

    public function newLogementForm()
    {
        require_once "view/new.logement.view.php";
    }

    public function newLogementValidation()
    {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoutee = $this->ajoutPhoto($file, $repertoire);
        $this->logementManager->newLogementDB($_POST['titre'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['surface'], $_POST['prix'], $nomImageAjoutee, $_POST['type']);
        header('Location:' . URL . "logements");
    }

    public function editLogementForm($id_logement)
    {
        $logement = $this->logementManager->getLogementById($id_logement);
        require_once "view/edit.logement.view.php";
    }

    public function editLogementValidation()
    {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoutee = $this->ajoutPhoto($file, $repertoire);

        $this->logementManager->editLogementDB($_POST['id_logement'], $_POST['titre'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['surface'], $_POST['prix'], $nomImageAjoutee, $_POST['type']);
        header("Location:" . URL . "logements");
    }

    public function deleteLogements($id_logement)
    {
        $this->logementManager->deleteLogementDB($id_logement);
        header("Location: " . URL . "logements");
    }

    private function ajoutPhoto($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if (!file_exists($dir)) mkdir($dir, 0777, true);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $target_file = $dir . "logement_" . time() . "." . $extension;

        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif" && $extension !== "webp")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ("logement_" . time() . "." . $extension);
    }
}
