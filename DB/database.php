<?php
/*here we define the database connection*/
// we use PDO to connect to the database
// Define database credentials (host, database name, username, password).
// Create a connection object or variable to use in other files

$host = 'localhost';
$dbname = 'petition';
$username = 'root';  // Default for XAMPP/WAMP; update if different
$password = '';      // Default for XAMPP/WAMP; update if different

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
