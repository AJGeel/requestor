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
$interested = $conn->real_escape_string($_REQUEST['interested']);

// We create a string that holds the (sanitized) input we have for the MySQL server.
$sql_input = "UPDATE ${table_name_2} SET interested=$interested WHERE user_id=$user_id";

// We try the SQL input. If everything is all-right, the user's data is saved in the database.
if ($conn->query($sql_input) === TRUE) {
  

} else {
  // However, if it's not, we'll get some error message telling the user why that happened.
  // This is mainly for debugging, virtually impossible for an end-user to encounter this.
    echo "Error: " . $sql_input . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
