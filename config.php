<?php
/*
Playlist Rss 0.2 / 2012
https://github.com/fluaten

Made with Simplepie for converting RSS feed.
http://simplepie.org/
*/

$urldomain = "http://radio.domain.com"; 
// Url of the website and playlist  (ex: http://radio.domain.com or http://www.domain.com/radio)
// Simplepie (podcast) won't work on restricted hosting.

// Show the list of each podcast and radio in html (mobile reader)

	$display = TRUE;
	
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
	//Video settings
	define("HD","TRUE"); // Set youtube video to HD format (best setting) 

/*  


Modify playlist.php to add radio or podcast.

Set folder simplepie/cache permission to 705 if Simplepie doesn't create cache files.

Be sure to have a file named .htaccess with :

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

## If website url is root or subdomain, else comment with ## in front

RewriteBase / 
RewriteRule ^vlc\.m3u$ /playlist.php [L]
RewriteRule ^Playlist_([^/]*)\.xspf$ /vlc_xspf.php [L]
RewriteRule ^m$ /playlist.php?type=m [L]

## If website url is in a folder change to your name/path of folder, here /radio) and uncomment the ##

##RewriteBase /radio/
##RewriteRule ^vlc\.m3u$ /radio/playlist.php [L]
##RewriteRule ^Playlist_([^/]*)\.xspf$ /radio/vlc_xspf.php [L]
##RewriteRule ^m$ /radio/playlist.php?type=m [L]


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