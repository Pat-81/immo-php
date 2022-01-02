<?php ob_start() ?>

<form method="POST" action="<?= URL ?>logements/gvalid" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" name="titre" id="titre" >
    </div>

    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" name="adresse" id="adresse">
    </div>

    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" name="ville" id="ville">
    </div>

    <div class="form-group">
        <label for="cp">Code Postal</label>
        <input type="text" class="form-control" name="cp" id="cp">
    </div>

    <div class="form-group">
        <label for="surface">Surface</label>
        <input type="number" class="form-control" name="surface" id="surface">
    </div>

    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" class="form-control" name="prix" id="prix">
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

<button type="submit" class="btn btn-primary btn-block">Ajouter</button>
</form>

<?php
$content =  ob_get_clean();
$title = "Ajouter un logement";
require_once "base.html.php";
?>