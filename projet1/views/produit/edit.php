<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Petit Formulaire</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            margin-top: 50px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid black;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-control,
        .form-select {
            border: 1px solid black;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        textarea {
            height: 60px;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <form method="POST" action="?controller=produit&page=save">
            <input type="hidden" class="form-control" id="productId" name="id"
                value="<?= htmlspecialchars($produit['id'], ENT_QUOTES, 'UTF-8') ?>" required>
            <div class="mb-3">
                <label for="productName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="productName" name="nom" required
                    placeholder="Nom du produit" value="<?= htmlspecialchars($produit['nom'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" required name="description"
                    placeholder="Description"><?= htmlspecialchars($produit['description'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Prix</label>
                <input type="number" class="form-control" id="productPrice" step="0.01" name="prix" required
                    placeholder="Prix" value="<?= htmlspecialchars($produit['prix'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="productQuantity" name="quantité" required
                    placeholder="Quantité" value="<?= htmlspecialchars($produit['quantité'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>