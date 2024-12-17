<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=<?= $description ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/style/style.css">
    <title><?= $title ?></title>
</head>

<body class="min-vh-100 d-flex flex-column">
    
    
    <?php require_once "header.php" ?>

    <main class=" container flex-grow-1">
        <?= $content ?>
    </main>

    <?php require_once "footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>