<?php

// $newString = '';
//
// foreach (str_split('test') as $character) {
//     $newString .= chr(ord($character) + 1);
// }
//
// echo $newString;

$base_url = 'https://requestor.nl/app/r/';

$uniqid = uniqid();
$generated_url = $base_url . $uniqid;

$uniqid_reversed = strrev($uniqid);
$rev_url = $base_url . $uniqid_reversed;

echo "
<style>
div{max-width:35em;font-family:monospace;margin:4em auto; line-height:1.5}code{background-color: #eee;padding:.2em}a{color:SeaGreen;transition:color .2s ease-in-out}a:hover{color:black}hr{border-style:solid;border-color:#888;margin:2em 0}
</style>

<div>
  <h3>Requestor: generating URLs</h3>
  <p>We can use PHP's <code>uniqid()</code> function to generate a seemingly random, unique string. This string looks like this:</p>
  <hr>
  <p>uniqid(): $uniqid</p>
  <p>Resulting URL: <a href='$generated_url'>$generated_url</a></p>

</div>
";



?>
