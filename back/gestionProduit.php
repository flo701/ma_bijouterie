<?php require_once '../inc/header.inc.php';

if (!admin()) {
    header('location:../');
    exit();
}

$resultat = executeRequete("SELECT p.*, c.title as category FROM product p INNER JOIN category c ON p.id_category=c.id");
$products = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Ici on s'assure de réceptionner toutes les informations transmises en GET grâce au clic sur notre bouton supprimer, afin d'éviter une saisie dans l'url par un utilisateur malveillant.
// Existe-t-il l'entrée action dans $_GET ? Est-ce que $_GET['action'] a pour valeur delete (param de suppression) ?Et y a-t-il présence d'une entrée 'id' dans $_GET ?
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {

    // Suppression du fichier d'upload de photo :

    // On récupère le produit en question pour connaître le nom de son fichier upload :
    $requete = executeRequete("SELECT * FROM product WHERE id=:id", array(
        ':id' => $_GET['id']
    ));
    $product = $requete->fetch(PDO::FETCH_ASSOC);

    // On appelle unlink() pour supprimer le fichier, cette méthode attend en paramètre l'emplacement du fichier avec son nom :

    //debug('../'.$product['picture']);
    unlink('../' . $product['picture']);

    $req = executeRequete("DELETE FROM product WHERE id=:id", array(
        ':id' => $_GET['id']
    ));

    // Redirection sur la même page pour la recharger :
    header('location:./gestionProduit.php');
    exit();
}

?>

<div class="tableau">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center align-middle" scope="col">#</th>
                <th class="text-center align-middle" scope="col">Titre</th>
                <th class="text-center align-middle" scope="col">Catégorie</th>
                <th class="text-center align-middle" scope="col">Prix</th>
                <th class="text-center align-middle" scope="col">Description</th>
                <th class="text-center align-middle" scope="col">photo</th>
                <th class="text-center align-middle" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody><?php foreach ($products as $product) :  ?><tr>
                    <th class="text-center align-middle" scope="row"><?= $product['id']; ?></th>
                    <td class="text-center align-middle"><?= $product['title']; ?></td>
                    <td class="text-center align-middle"><?= $product['category']; ?></td>
                    <td class="text-center align-middle"><?= $product['price']; ?>€</td>
                    <td class="text-center align-middle"><?= $product['description']; ?></td>
                    <td class="text-center align-middle"><img src="<?= BASE . $product['picture']; ?>" width="90" alt=""></td>
                    <td class="text-center align-middle"><a href="<?= BASE . 'back/formulaireProduit.php?id=' . $product['id']; ?>" class="btn btn-info mb-2">Modifier</a><a onclick="return confirm('Etes-vous sûr de vouloir supprimer cet article ?')" href="?action=delete&id=<?= $product['id']; ?>" class="btn btn-danger ms-2">Supprimer</a></td>
                </tr><?php endforeach; ?></tbody>
    </table>
</div>

<div class="mobile">
    <div class="row justify-content-evenly mt-5">
        <?php foreach ($products as $product) :  ?>
            <div class="card-body py-3 px-2 mb-4 mx-1 border border-primary rounded" style="max-width:400px">
                <p class="text-center">Identifiant : <?= $product['id']; ?></p>
                <p class="text-center">Titre : <?= $product['title']; ?></p>
                <p class="text-center">Catégorie : <?= $product['category']; ?></p>
                <p class="text-center">Prix : <?= $product['price']; ?>€</p>
                <p class="text-center">Description : <?= $product['description']; ?></p>
                <div class="text-center">
                    <img src="<?= BASE . $product['picture']; ?>" width="90" class="rounded img-fluid mb-2" alt="photo du bijou">
                </div>
                <div class="text-center">
                    <a href="<?= BASE . 'back/formulaireProduit.php?id=' . $product['id']; ?>" class="btn btn-info mb-2">Modifier</a>
                </div>
                <div class="text-center">
                    <a onclick="return confirm('Etes-vous sûr de vouloir supprimer cet article ?')" href="?action=delete&id=<?= $product['id']; ?>" class="btn btn-danger ms-">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once '../inc/footer.inc.php';   ?>