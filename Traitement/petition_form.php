<?php
// Include the database functions
include 'DB/petition_db.php';

// only if its a post request, meaning we are submitting a new petition
// POST Request (index.php?action=petition_form) User submits the form → Saves data → Redirects to petition list.
// <form method="POST" action="index.php?action=petition_form">
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // This block runs because it’s a POST request
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $datePublic = $_POST['datePublic'];
    $dateFinP = $_POST['dateFinP'];
    $porteurP = $_POST['porteurP'];
    $email = $_POST['email'];

    add_petition($titre, $description, $datePublic, $dateFinP, $porteurP, $email);

    // we use header to redirect
    header('Location: index.php?action=liste_petition');
    exit;
}

// GET Request (index.php?action=petition_form)  User clicks "New Petition" → Shows the form.
// Include the HTML template to display the petitions
include 'IHM/petition_form.html.php';