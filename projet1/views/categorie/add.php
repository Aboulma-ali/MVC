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
            /* Bordure des champs */
            border-radius: 5px;
            /* Coins arrondis des champs */
            font-size: 0.9rem;
            /* Taille de police réduite */
        }

        textarea {
            height: 60px;
            /* Réduit la hauteur de la zone de texte */
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <form method="POST" action="?controller=categorie&page=save">
            <div class="mb-3">
                <label for="productName" class="form-label">Libelle</label>
                <input type="text" class="form-control" id="productName" name="libelle" required
                    placeholder="Nom du produit">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>