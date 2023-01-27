<?php require_once '../inc/header.inc.php';

if (!empty($_GET['id'])) {
    $req = executeRequete("SELECT * FROM product WHERE id=:id", array(
        ':id' => $_GET['id']
    ));
    $product = $req->fetch(PDO::FETCH_ASSOC);

    $requete = executeRequete("SELECT u.username as username, r.* FROM rating r INNER JOIN user u ON u.id=r.id_user WHERE id_product=:id", array(
        ':id' => $_GET['id']
    ));
    $comments = $requete->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('location:../');
    exit();
}

if (!empty($_POST)) {
    $r = executeRequete("INSERT INTO rating (comment, rate, id_product,publish_date, id_user) VALUES (:comment, :rate, :id_product,:publish_date, :id_user)", array(
        ':comment' => $_POST['comment'],
        ':rate' => $_POST['rate'],
        ':publish_date' => date_format(new DateTime(), 'Y-m-d H:i:s'),
        ':id_product' => $_POST['id_product'],
        ':id_user' => $_SESSION['user']['id']
    ));

    header("location:./detailProduit.php?id=$_POST[id_product]");
    exit();
}

?>

<div class="card col-md-12 p-0 border-primary m-3">
    <div class="card-header rounded p-0 text-center bg bg-info">
        <img src="<?= BASE . $product['picture']; ?>" width="240" alt="photo du bijou" class="img-product rounded img-fluid m-2">
    </div>
    <div class="card-body">
        <h4 class="card-title text-center"><?= $product['title']; ?></h4>
        <h5 class="card-title text-center"><?= $product['price'] . ' €'; ?></h5>
        <p class="card-text text-center"><?= $product['description']; ?></p>
    </div>
</div>

<?php if (connect()) : ?>
    <form method="post" action="">
        <input type="hidden" name="id_product" value="<?= $product['id']; ?>">
        <div class="col-4 mx-auto text-center ">
            <label for="floatingSelect">Selectionner votre note</label>
            <select name="rate" class="bg-light text-dark form-select border-primary mt-1" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Notes de 1 à 5</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="col-7 mt-4 mb-3 mx-auto text-center">
            <label for="floatingTextarea2">Laisser un commentaire</label>
            <textarea name="comment" class="bg-light text-dark form-control border-primary my-1" id="floatingTextarea2" style="height: 100px" placeholder="Votre commentaire"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class=" mt-2 btn btn-info">Valider</button>
        </div>
    </form>
<?php endif; ?>

<h5 class="text-center my-4 mx-2">Les avis de nos clients sur cet article :</h5>
<div class="col-md-7 mx-auto">
    <?php foreach ($comments as $comment) : ?>
        <div class="card border-primary m-3">
            <div class="card-body">
                <p class="card-title text-center"><?= $comment['username']; ?> a laissé un commentaire le <?= date_format(new DateTime($comment['publish_date']), 'd-m-Y'); ?> : </p>
                <p class="card-title text-center">Note : <?= $comment['rate']; ?>/5</p>
                <p class="card-text text-center"><?= $comment['comment']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once '../inc/footer.inc.php'; ?>