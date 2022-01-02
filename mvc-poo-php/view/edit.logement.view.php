<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>logements/editvalid" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" value="<?= $logement->getTitre() ?>" name="titre" id="titre">
        
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" value="<?= $logement->getAdresse() ?>" name="adresse" id="adresse">
    </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" value="<?= $logement->getVille() ?>" name="ville" id="ville">
    </div>
    <div class="form-group">
        <label for="cp">Code Postal</label>
        <input type="text" class="form-control" value="<?= $logement->getCp() ?>" name="cp" id="cp">
    </div>
    <div class="form-group">
        <label for="surface">Surface</label>
        <input type="number" class="form-control" value="<?= $logement->getSurface() ?>" name="surface" id="surface">
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" class="form-control" value="<?= $logement->getPrix() ?>" name="prix" id="prix">
    </div>

    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <div class="form-group">
        <label for="type" class="form-label mt-4">Type de logement</label>
        <select class="form-select" name="type" id="type" required="required">
            <option value="">--Choississez un type--</option>
            <option value="location">Location</option>
            <option value="vente">Vente</option>
        </select>
    </div>

    <input type="hidden" name="id_logement" value="<?= $logement->getId_logement() ?>">
    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
</form>

<?php
$content =  ob_get_clean();
$title = "Edition de: " . $logement->getTitre();
require_once "base.html.php";
?>