<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signer une Pétition</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .form-container label {
            display: block;
            margin: 10px 0 5px;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .petition-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.html.php'; ?>

    <div class="form-container">
        <div class="petition-title">
            Pétition: <?php echo htmlspecialchars($petition['Titre']); ?>
        </div>

        <h1>Signer cette Pétition</h1>
        <form method="POST" action="index.php?action=signature_form&idp=<?php echo $idp; ?>">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="pays">Pays:</label>
            <input type="text" id="pays" name="pays" required>

            <button type="submit">Signer</button>
        </form>

        <h2>Dernières Signatures</h2>
        <textarea id="signatures" rows="5" readonly></textarea>
    </div>

    <script>
    </script>
</body>
</html>