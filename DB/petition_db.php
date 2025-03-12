<?php
include 'database.php';  // Include the database connection
// Include database.php to use the connection.
// here we will have functions to : 
  // create a petition (INSERT INTO petition ...)
  // get all petitions (SELECT * FROM petition)
  // get a petition by ID (SELECT * FROM petition WHERE id = ?)

/*
these functions are reusable building blocks for interacting with the database.
By putting them in separate files, you keep your logic files (Traitement/)
focused on processing requests, not SQL details.
This separation makes your code modular—easier to test, debug, and reuse in other projects.
*/

// Get all petitions
function get_all_petitions() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM Petition");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get a petition by ID
function get_petition_by_id($idp) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM Petition WHERE IDP = ?");
    $stmt->execute([$idp]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Add a new petition
function add_petition($titre, $description, $datePublic, $dateFinP, $porteurP, $email) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO Petition (Titre, Description, DatePublic, DateFinP, PorteurP, Email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titre, $description, $datePublic, $dateFinP, $porteurP, $email]);
    return $pdo->lastInsertId();  // Returns the new petition's ID
}