<?php

/*
  This file handles the creation of Requestor projects. It should receive
  input from the 'dashboard' new project creator XMLHttpRequest, and input them
  here.
*/

// Generate a unique timestamp for the moment the file is created
$uniqid = strtoupper(uniqid());


// Create a file for the page that is to be created
$new_file = fopen("$uniqid.php", "w");

// Add content to this file
// fwrite($new_file, $page_content);
fwrite($new_file, 'Hello world');

// Close (and save) the file
fclose($new_file);

// Debugging: log the newly created file so that we can verify that it all works.
echo "

<style>*{font-family: 'Sen', sans-serif; color: #333} a{color: #009973; transition: color .2s ease-in-out} a:hover{color: #000}</style>
<p>Your new file can be found at <a href='$uniqid.php' target='_blank'>https://requestor.nl/app/r/$uniqid</a>.</p>

";

 ?>
