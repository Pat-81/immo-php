<?php ob_start(); ?>

<table class="table table-hover text-center">
    <thead>
        <tr class="bg-primary text-white">
            <th>Titre</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Photo</th>
            <th>Type</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($logements as $logement) : ?>
            <tr>
                <td class="align-middle"><?= $logement->getTitre() ?></td>
                <td class="align-middle"><?= $logement->getAdresse() ?></td>
                <td class="align-middle"><?= $logement->getVille() ?></td>
                <td class="align-middle"><?= $logement->getCp() ?></td>
                <td class="align-middle"><?= $logement->getSurface() ?></td>
                <td class="align-middle"><?= $logement->getPrix() ?></td>
                <td class="align-middle"><img src="../public/images/<?= $logement->getPhoto() ?>" width="60px" alt="image de maison"></td>
                <td class="align-middle"><?= $logement->getType() ?></td>
                <td class="align-middle"><a href="<?= URL ?>logements/edit/<?= $logement->getId_logement() ?>"><i class="fas fa-edit"></i></a></td>
                <td class="align-middle">
                    <form action="<?= URL ?>logements/delete/<?= $logement->getId_logement() ?>" method="post" onSubmit=" return confirm('Êtes-vous certain de vouloir supprimer ce logement ?')">
                        <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= URL ?>logements/add" class="btn btn-primary btn-block">Ajouter un logement</a>

<?php
$content = ob_get_clean();
$title = "Liste des logements";
require_once "base.html.php";
?>