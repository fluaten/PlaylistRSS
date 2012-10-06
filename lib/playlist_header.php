<?php
include 'config.php';	

 if ($_GET["type"] == "m" ) {
	include 'lib/functions_html.php'; // include the functions to transform url in rss feed.
} else {
include 'lib/functions.php'; // include the functions to transform url in playlist (simplepie)
}

header_playlist(); // Header of the playlist

// Show the list of each podcast and radio in html (mobile reader)
if (($_GET["type"] == "m" ) && ($display != TRUE)) { 
	$_GLOBAL["showlist"] = FALSE; 
} else { $_GLOBAL["showlist"] = TRUE; }

?>