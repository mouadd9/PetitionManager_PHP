<?php
include 'DB/petition_db.php';

// Fetch all petitions
$petitions = get_all_petitions();

// Set the content type to JSON and return the data
header('Content-Type: application/json');
echo json_encode($petitions);

// when this file is called it will :
  // - fetch the last 5 petitions 
  // - set the Header to application/json 
  // - encode the petitions into a json and return them