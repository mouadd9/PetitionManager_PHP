<!--HTML for listing petitions-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pétitions</title>
    <style>
        .petition-card {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            width: 300px;
            display: inline-block;
        }
        .petition-card h3 {
            margin: 0;
        }
        .petition-card p {
            margin: 5px 0;
        }
        .sign-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php include 'navbar.html.php'; ?>  <!-- Include the navbar here -->
    <h1>Liste des Pétitions</h1>
    <div class="petitions-container">
        <?php foreach ($petitions as $petition): ?>
            <div class="petition-card">
                <h3><?php echo htmlspecialchars($petition['Titre']); ?></h3>
                <p><?php echo htmlspecialchars($petition['Description']); ?></p>
                <p><strong>Publié le:</strong> <?php echo htmlspecialchars($petition['DatePublic']); ?></p>
                <p><strong>Fin le:</strong> <?php echo htmlspecialchars($petition['DateFinP']); ?></p>
                <p><strong>Porteur:</strong> <?php echo htmlspecialchars($petition['PorteurP']); ?></p>
                <a href="index.php?action=signature_form&idp=<?php echo $petition['IDP']; ?>" class="sign-btn">Signer</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
