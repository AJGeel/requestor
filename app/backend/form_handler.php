<?php

// Require database credentials
require 'config.php';

// Use these to create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function that checks an 'Int' input for validity. If the input value is 'null', it's changed to '-1'.
function validateInputInt($input) {

  if ($input == null) {
    return -1;
  } else {
    return $input;
  }
}


// Escape user inputs for security, prevent sql injection
$user_id = $conn->real_escape_string($_REQUEST['user_id']);
$prototype_id = $conn->real_escape_string($_REQUEST['prototype_id']);

// Loop from 1 to 10, make sure all user input is captured.
$num_heuristics = 10;
$heuristics_string_names = "";
$heuristics_string_values = "";

for ($i = 1; $i <= $num_heuristics; $i++) {
  ${"heu_{$i}"} = validateInputInt( $conn->real_escape_string($_REQUEST["heu_{$i}"]));
  ${"heu_{$i}_issue"} = $conn->real_escape_string($_REQUEST["heu_{$i}_issue"]);
  ${"heu_{$i}_recommendation"} = $conn->real_escape_string($_REQUEST["heu_{$i}_recommendation"]);

  // Append to strings that hold the heuristics' variable names and values, used by the MySQL statement.
  $heuristics_string_names .= "heu_${i}, heu_{$i}_issue, heu_{$i}_recommendation,";
  $heuristics_string_values .= "'" . ${"heu_{$i}"} . "', '" . ${"heu_{$i}_issue"} . "', '" . ${"heu_{$i}_recommendation"} . "',";
}

// Finally, we store the general impression the user left for us.
$general_impression = $conn->real_escape_string($_REQUEST['general_impression']);

// Then, we create a string that holds the (sanitized) input we have for the MySQL server.
$sql_input = "INSERT INTO ${table_name} (user_id, prototype_id, {$heuristics_string_names} general_impression) VALUES ('$user_id', '$prototype_id', $heuristics_string_values '${general_impression}')";


// We try the SQL input. If everything is all-right, the user's data is saved in the database.
if ($conn->query($sql_input) === TRUE) {

} else {
  // However, if it's not, we'll get some error message telling the user why that happened.
  // This is mainly for debugging, virtually impossible for an end-user to encounter this.
    echo "Error: " . $sql_input . "<br>" . $conn->error;
}

// Now we check the performance data that was implicitly collected:
// this includes time spent on tasks, and whether they completed the scenario.
$time_spent_total = $conn->real_escape_string($_REQUEST['time_spent_total']);
$time_spent_on_onboarding = $conn->real_escape_string($_REQUEST['time_spent_on_onboarding']);
$time_spent_on_scenario = $conn->real_escape_string($_REQUEST['time_spent_on_scenario']);
$time_spent_on_evaluation = $conn->real_escape_string($_REQUEST['time_spent_on_evaluation']);
$completed_scenario = $conn->real_escape_string($_REQUEST['completed_scenario']);

// We create a string that holds the (sanitized) input we have for the MySQL server.
$sql_input = "INSERT INTO ${table_name_2} (user_id, prototype_id, time_spent_total, time_spent_on_onboarding, time_spent_on_scenario, time_spent_on_evaluation, completed_scenario) VALUES ('$user_id', '$prototype_id', '$time_spent_total', '$time_spent_on_onboarding', '$time_spent_on_scenario', '$time_spent_on_evaluation', '$completed_scenario')";

// We try the SQL input. If everything is all-right, the user's data is saved in the database.
if ($conn->query($sql_input) === TRUE) {

} else {
  // However, if it's not, we'll get some error message telling the user why that happened.
  // This is mainly for debugging, virtually impossible for an end-user to encounter this.
    echo "Error: " . $sql_input . "<br>" . $conn->error;
}

// Once all data has been submitted to the DB and processed, show success page
// which contains follow-up instructions for this study experiment.
include 'success.php';

// Close the database connection
$conn->close();

?>
