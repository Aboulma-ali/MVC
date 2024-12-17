<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulaire d'Inscription</title>
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
            border: 1px solid black; /* Bordure des champs */
            border-radius: 5px; /* Coins arrondis des champs */
            font-size: 0.9rem; /* Taille de police réduite */
        }

        textarea {
            height: 60px; /* Réduit la hauteur de la zone de texte */
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <form method="POST" action="?controller=user&page=update">
        <input type="hidden" class="form-control" id="productId" name="id" 
        value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>" required>
            <div class="mb-3">
                <label for="userName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="userName" name="nom" required placeholder="Nom de l'utilisateur" value="<?=$user['nom']?>">
            </div>
            <div class="mb-3">
                <label for="userPrenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="userPrenom" name="prenom" required placeholder="Prénom de l'utilisateur" value="<?=$user['prenom']?>">
            </div>
            <div class="mb-3">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="userEmail" name="email" required placeholder="Email de l'utilisateur" value="<?=$user['email']?>">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="userPassword" name="mot_de_passe" required placeholder="Mot de passe" value="<?=$user['mot_de_passe']?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>