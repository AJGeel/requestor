<?php
// /* First: verify that the script is being accessed from an app page */
// TODO: Create function that allows this.
// However: it seems that if the backend file is going to be accessed through AJAX, it needs to be requestable by the user.
// Source: https://security.stackexchange.com/questions/60988/prevent-a-server-side-script-from-a-direct-url-access


/* Then: make sure we have the database credentials */
require 'config.php';
?>

<?php

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
// The user is shown the success message.
if ($conn->query($sql_input) === TRUE) {

  echo '<style media="screen"> *{margin: 0; padding: 0; font-family: sans-serif;}.container{width: 100vw; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;}img{filter: hue-rotate(148deg) saturate(11); max-width: 100%; height: 70%; z-index: -1; margin-top: -10em;}h2{font-size: 1.3em; max-width: 500px; text-align: center; margin-top: -3em;}p{color: #3c5567; margin-top: 2em;}p.credit{display: none;}a{color: #357dff;}</style><div class="container"> <img src="../i/TEMP_success-tick-dribbble.gif" alt="A checkmark that is being ticked to signal success"> <h2>You completed all the tasks of this evaluation. Thank you very much for your help!</h2> <p class="credit">Original animation courtesy of <a href="https://dribbble.com/shots/5315437-Great-Success">Gavin Campbell-Wilson</a></p></div>';

} else {
  // However, if it's not, we'll get some error message telling the user why that happened.
  // TODO: Make sure the end-user never has to see this. This is mainly for debugging.
    echo "Error: " . $sql_input . "<br>" . $conn->error;
}

$conn->close();
?>
