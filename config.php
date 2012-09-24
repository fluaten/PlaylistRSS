<?php
/*
Playlist Rss 0.1 / 2012
https://github.com/fluaten

Made with Simplepie for converting RSS feed.
http://simplepie.org/
*/

$urldomain = "http://radio.domain.com"; 
// Url of the website and playlist (subdomain if possible)
// Simplepie (podcast) won't work on restricted hosting.

// Change here the frontend text of index.php in folder /playlist

define("LANG", "EN"); // English language
//define("LANG", "FR"); // Langue française

if (LANG == "EN") {
	$titledomainname = "Radio and podcast playlist for VLC"; // Set a title
	$description = "Playlist description"; // Set a description

	$downloadtext = "Download the playlist";
	$copyinvlc = "Copy in VLC (Ctrl + N / Command + N)";

	// XSPF Text
	$xspfloading = "Loading..";
	
} else if (LANG == "FR") {
	$titledomainname = "Playlist de radio et podcast pour VLC"; // Définir un titre
	$description = "Description de la playlist"; // Définir une description

	$downloadtext = "Téléchargez la playlist";
	$copyinvlc = "Copier dans VLC (Ctrl + N / Command + N)";

	// XSPF Text
	$xspfloading = "Chargement..";
	
}


/*  


Modify playlist.php to add radio or podcast.

Set folder simplepie/cache permission to 705 if Simplepie doesn't create cache files.

Be sure to have a file named .htaccess at the root folder with :

##---------.htaccess-------------

SetEnv SESSION_USE_TRANS_SID 0
SetEnv PHP_VER 5

AddType application/octet-stream .m3u
AddType application/octet-stream .xspf

<Files *.m3u>
	ForceType application/octet-stream
	Header set Content-Disposition attachment
</Files>

<Files *.xspf>
	ForceType application/octet-stream
	Header set Content-Disposition attachment
</Files>

RewriteEngine On
RewriteBase / 

RewriteRule ^vlc\.m3u$ /playlist.php [L]

RewriteRule ^Playlist_([^/]*)\.xspf$ /vlc_xspf.php [L]

##-----------------------------

*/

// Footer
$footer = 
'
	Source : <a href="https://github.com/fluaten/PlaylistRSS">
	https://github.com/fluaten/PlaylistRSS</a>
';
$vlclink = '<a href="http://www.videolan.org">VLC</a>';
	
// Frontend config
if (LANG == "EN") {
	$urlchange = "Modify config.php to set the url of the playlist.";
} else if (LANG == "FR") {
	$urlchange = "Modifiez config.php pour définir l'url de la playlist.";	
}	
	
?>