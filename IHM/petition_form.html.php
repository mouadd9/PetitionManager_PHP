<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Nouvelle Pétition</title>
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
    </style>
</head>
<body>
    <?php include 'navbar.html.php'; ?>  <!-- Include the navbar -->

    <div class="form-container">
        <h1>Créer une Nouvelle Pétition</h1>
        <form method="POST" action="index.php?action=petition_form">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="datePublic">Date de Publication:</label>
            <input type="date" id="datePublic" name="datePublic" required>

            <label for="dateFinP">Date de Fin:</label>
            <input type="date" id="dateFinP" name="dateFinP" required>

            <label for="porteurP">Porteur de la Pétition:</label>
            <input type="text" id="porteurP" name="porteurP" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Créer la Pétition</button>
        </form>
    </div>
</body>
</html>