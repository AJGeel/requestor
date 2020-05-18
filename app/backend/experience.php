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

// We create a string that holds the (sanitized) input we have for the MySQL server.
$sql_input = "INSERT INTO experience (user_id, experience_level) VALUES ('$user_id', '$experience_level')";

// We try the SQL input. If everything is all-right, the user's data is saved in the database.
if ($conn->query($sql_input) === TRUE) {

  // Communicate 200 status — OK
  http_response_code(200);

} else {
  // However, if it's not, we'll get some error message telling the user why that happened.
  // This is mainly for debugging, virtually impossible for an end-user to encounter this.
  // echo "Error: " . $sql_input . "<br>" . $conn->error;

  // Communicate 400 status — Bad Request
  http_response_code(400);
}

// Close the database connection
$conn->close();

?>
