<?php require_once 'inc/header.inc.php';

if (isset($_GET['action'])  && $_GET['action'] == 'deco') {
    unset($_SESSION['user']);
    $_SESSION['messages']['info'][] = 'Au revoir et à bientôt !';
    header('location:./');
    exit();
}
$resultat = executeRequete("SELECT * FROM product");

//debug($resultat);

$products = $resultat->fetchAll(PDO::FETCH_ASSOC); // $resultat nous retourne un objet PDOStatements. On appelle sur cet objet la méthode fetchAll() présente nativement dans la classe PDOStatements, et lui renseignons en argument le mode de conversion des données, ici FETCH_ASSOC pour convertir les données en tableau associatif ayant pour index le nom des colonnes en BDD et pour valeur, la valeur des enregistrements en BDD. fetchAll() est utilisé lorsqu'on attend plus d'un résultat sur la requête afin qu'il génère un tableau auto-indexé. Sinon on aurait utilisé la méthode fetch() nous renvoyant un tableau à une dimension.

//debug($products);

?>

<div class="row justify-content-evenly">
    <?php foreach ($products as $product) : ?>
        <a class="col-md-3 text-decoration-none " href="<?= BASE . 'front/detailProduit.php?id=' . $product['id']; ?>">
            <div class="card card-index p-0 border-primary my-3 mx-auto " style="max-width: 20rem;">
                <div class="card-header  p-0">
                    <img src="<?= $product['picture']; ?>" class="rounded-top img-fluid" alt="photo du bijou">
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?= $product['title']; ?></h4>
                    <h5 class="card-title"><?= $product['price']; ?>€</h5>
                    <p class="card-title"><?= substr($product['description'], 0, 40) . '...<br>'; ?><span style="color:gray">Lire la suite...</span></p>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php require_once 'inc/footer.inc.php'; ?>