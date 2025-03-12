<?php
// Include the database functions
include 'DB/petition_db.php';
// Fetch all petitions from the database
$petitions = get_all_petitions();

// Include the HTML template to display the petitions
include 'IHM/liste_petition.html.php';