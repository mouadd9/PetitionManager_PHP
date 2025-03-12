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
    <div id="petitions-container" class="petitions-container">
        <?php foreach ($petitions as $petition): ?>
            <div class="petition-card" data-idp="<?php echo $petition['IDP']; ?>">
                <h3><?php echo htmlspecialchars($petition['Titre']); ?></h3>
                <p><?php echo htmlspecialchars($petition['Description']); ?></p>
                <p><strong>Publié le:</strong> <?php echo htmlspecialchars($petition['DatePublic']); ?></p>
                <p><strong>Fin le:</strong> <?php echo htmlspecialchars($petition['DateFinP']); ?></p>
                <p><strong>Porteur:</strong> <?php echo htmlspecialchars($petition['PorteurP']); ?></p>
                <a href="index.php?action=signature_form&idp=<?php echo $petition['IDP']; ?>" class="sign-btn">Signer</a>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        // Keep track of existing petition IDs
        let existingIds = new Set(
            Array.from(document.querySelectorAll('.petition-card')).map(card => 
                parseInt(card.getAttribute('data-idp'))
            )
        );
        function fetchNewPetitions() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'index.php?action=get_new_petitions', true);
            xhr.onload = function() { // if the server responds we execute this function
                if (xhr.status === 200) {
                    const petitions = JSON.parse(xhr.responseText); //we parse the response in to a javascript object (array of petitions)
                    const container = document.getElementById('petitions-container');
                    // so we hava an array that has the IDs of the existing petitions
                    // now the idea is, we need to only append new petitions that arent already shown 
                    // so for each petition we will check if its ID is included in that array of already shown ids
                    petitions.forEach(petition => {
                        if(!existingIds.has(petition.IDP)) {
                            console.log('petition to add');
                            console.log(petition);
                            // in this case this petition is not displayed
                            // so we need to construct a new DOM petition and append it 
                            const card = document.createElement('div');
                            card.className = 'petition-card';
                            card.setAttribute('data-idp', petition.IDP);
                            card.innerHTML = `
                                <h3>${escapeHtml(petition.Titre)}</h3>
                                <p>${escapeHtml(petition.Description)}</p>
                                <p><strong>Publié le:</strong> ${escapeHtml(petition.DatePublic)}</p>
                                <p><strong>Fin le:</strong> ${escapeHtml(petition.DateFinP)}</p>
                                <p><strong>Porteur:</strong> ${escapeHtml(petition.PorteurP)}</p>
                                <a href="index.php?action=signature_form&idp=${petition.IDP}" class="sign-btn">Signer</a>
                            `;
                            container.appendChild(card);
                            existingIds.add(petition.IDP);  // Track the new ID
                        }
                        
                    });
                }
            }
            xhr.send(); // here we send the request
        }
        // Escape HTML to prevent XSS
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Fetch new petitions every 10 seconds
        setInterval(fetchNewPetitions, 2000);
    </script>
</body>
</html>
