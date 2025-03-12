<?php
// this switch will be called in index.php to route to a specific treatment function

// requests are passed to index.php, with a querry param called action
// example : http://localhost/petitionManager/index.php?action=liste_petition

// we first Get the action from the URL, default to 'liste_petition' if not set
$action = isset($_GET['action']) ? $_GET['action'] : 'liste_petition'; // $action will contain the action if not action is sent in the URL we set liste_petition


// actions : 
// liste_petition : an action to list all petitions this the default action it is responsible for showing a list of petitions
// petition_form : an action to render a petition form
// signature_form : an action to render a signature form
switch ($action) {
    case 'liste_petition': // displays a page that has a liste of petitions
        include 'liste_petition.php';
        break;
    case 'petition_form': // displays a page that has a petition_form for the user to add a petition
        include 'petition_form.php';
        break;
    case 'signature_form': // displays a page that has signature_form for the user to sign a petition. in this case we'ill need the id of the petition selected by the user so it will be passed in the URL
        include 'signature_form.php';
        break;
    default:
        // If action is unknown, default to showing the list
        include 'liste_petition.php';
        break;
}
