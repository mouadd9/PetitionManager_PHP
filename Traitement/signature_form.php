<?php
include 'DB/petition_db.php';
include 'DB/signature_db.php';

// Get the petition ID from the URL
$idp = isset($_GET['idp']) ? (int)$_GET['idp'] : 0;

// Fetch the petition details
$petition = get_petition_by_id($idp);

if (!$petition) {
    // If petition not found, redirect to list
    header('Location: index.php?action=liste_petition');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pays = $_POST['pays'];

    // Add the signature to the database
    add_signature($idp, $nom, $prenom, $pays, $email);

    // Redirect to petition list
    header('Location: index.php?action=liste_petition');
    exit;
}

// Display the form
include 'IHM/signature_form.html.php';