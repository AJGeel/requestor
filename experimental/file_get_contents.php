<?php

// https://elev.io/blog/getting-around-the-x-frame-options-to-sameorigin-issue/

$url = 'https://bol.com';
// $parse = parse_url($url);
// $domain = $parse['scheme'] . '://' . $parse['host'] . '/';
$content = file_get_contents($url);
// $base_url = '';
// $content = str_replace('', $base_url . '', $content);
// $content = str_replace('src="/', 'src="' . $domain, $content);
// $content = str_replace('href="/', 'href="' . $domain, $content);
echo $content;

?>
