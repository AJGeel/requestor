<!-- First: make sure we have the database credentials -->
<?php require 'config.php'; ?>

<?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$num_heuristics = 10;
$heuristics_sql_string = "";

for ($i = 1; $i <= $num_heuristics; $i++) {
  $heuristics_sql_string .= "heu_" . $i . " int(1), heu_" . $i ."_issue varchar(1000), heu_" . $i ."_recommendation varchar(1000),";
}

// Try to create new table for this prototype
$sql = "CREATE TABLE $table_name (
  id int NOT NULL AUTO_INCREMENT,
  user_id int,
  prototype_id int,

  $heuristics_sql_string

  general_impression varchar(1000),

  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table for $table_name created successfully!";
} else {
    echo "Error creating table: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Sample command: INSERT INTO heuristic_evaluation_test (user_id, prototype_id, heu_1, heu_1_issue, heu_1_recommendation, heu_2, heu_2_issue, heu_2_recommendation) VALUES ('8529', '1337', '0', 'there is no issue here', 'its already perfect mate', '4', 'make sure the typewriter actually works bro', 'read the last one m9')
?>
