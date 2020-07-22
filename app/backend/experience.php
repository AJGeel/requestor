<?php

// Require database credentials
require 'config.php';

// Use these to create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security, prevent sql injection
$user_id = $conn->real_escape_string($_REQUEST['user_id']);
$experience_level = $conn->real_escape_string($_REQUEST['experience_level']);
$novelty_familiarity = $conn->real_escape_string($_REQUEST['novelty_familiarity']);
$novelty_frequency = $conn->real_escape_string($_REQUEST['novelty_frequency']);

// We create a string that holds the (sanitized) input we have for the MySQL server.
$sql_input = "INSERT INTO experience (user_id, experience_level, novelty_familiarity, novelty_frequency) VALUES ('$user_id', '$experience_level', '$novelty_familiarity', '$novelty_frequency')";

// We try the SQL input. If everything is all-right, the user's data is saved in the database.
if ($conn->query($sql_input) === TRUE) {

  // Communicate 200 status — OK
  http_response_code(200);

} else {

  // Communicate 400 status — Bad Request
  http_response_code(400);
}

// Close the database connection
$conn->close();

?>
