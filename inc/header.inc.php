<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="/ma_bijouterie/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ma_bijouterie/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ma_bijouterie/favicon/favicon-16x16.png">
    <link rel="manifest" href="/ma_bijouterie/favicon/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/cerulean/bootstrap.min.css" integrity="sha512-1rXsIsq9uaj3bxRth2+Mw1slRDxuPzGlfJ8PaLmkO3/OtvCL7jVQrdxaC1VvCmCzKRMdKu0pmbCtqQz/3/xORA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/ma_bijouterie/style.css">

    <title>Ma Bijouterie</title>
</head>

<body>
    <?php require_once 'init.inc.php'; ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= BASE; ?>">Bijouterie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= BASE; ?>">Accueil</a>
                    </li>
                    <?php if (admin()) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ADMIN</a>
                            <div class="dropdown-menu text-dark">
                                <a class="dropdown-item text-dark" href="<?= BASE . 'back/formulaireProduit.php'; ?>">Ajouter un
                                    produit</a>
                                <a class="dropdown-item text-dark" href="<?= BASE . 'back/gestionProduit.php'; ?>">Gestion des
                                    produits</a>
                                <a class="dropdown-item text-dark" href="<?= BASE . 'back/gestionCategorie.php'; ?>">Gestion des catégories</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (!connect()) : ?>
                    <a href="<?= BASE . 'security/inscription.php'; ?>" class="btn btn-secondary me-2">Inscription</a>
                    <a href="<?= BASE . 'security/connexion.php'; ?>" class="btn btn-info">Connexion</a>
                <?php else :  ?>
                    <a href="<?= BASE . '?action=deco'; ?>" class="btn btn-info">Deconnexion</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container mt-4 pb-4"> <!--On ouvre une div que l'on va fermer dans le footer -->

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) :
            foreach ($_SESSION['messages'] as $type => $messages) :
                foreach ($messages as $key => $message) :
        ?>
                    <div class="alert alert-<?= $type; ?> text-center">
                        <p><?= $message; ?></p>
                    </div>
        <?php unset($_SESSION['messages'][$type][$key]);
                endforeach;
            endforeach;
        endif;
        ?>