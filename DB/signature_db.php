<?php
include 'database.php';  // Include the database connection
// Include database.php to use the connection.
// we will have functions to : 
  // create a signature (INSERT INTO signature ...)
  // Get the last five signatures for a petition (SELECT Nom, Prenom, Date, Heure FROM Signature WHERE IDP = ? ORDER BY Date DESC, Heure DESC LIMIT 5).


/*
these functions are reusable building blocks for interacting with the database.
By putting them in separate files, you keep your logic files (Traitement/)
focused on processing requests, not SQL details.
This separation makes your code modular—easier to test, debug, and reuse in other projects.
*/

// Add a signature
function add_signature($idp, $nom, $prenom, $pays, $email) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO Signature (IDP, Nom, Prenom, Pays, Date, Heure, Email) VALUES (?, ?, ?, ?, CURDATE(), CURTIME(), ?)");
    $stmt->execute([$idp, $nom, $prenom, $pays, $email]);
}

// Get the last five signatures for a petition
function get_last_five_signatures($idp) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT Nom, Prenom, Date, Heure FROM Signature WHERE IDP = ? ORDER BY Date DESC, Heure DESC LIMIT 5");
    $stmt->execute([$idp]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}