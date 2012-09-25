# Playlist Rss
## Webhosted (php) m3u playlist generator.
## To play radio stream and latest podcast from RSS. 

Source : <https://github.com/fluaten/PlaylistRSS>
Demo : <http://playlistrss.fluate.net>

Made with Simplepie for converting RSS feed. <http://simplepie.org/>

![VLC](http://playlistrss.fluate.net/img/rssplaylist.png)

### Install

* 1. Download zip : <https://github.com/fluaten/PlaylistRSS/zipball/master>
* 2. Copy the folder by ftp on the webiste.
* 3. Create a subdomain (ex: radio.domain.com) or modify folder name.
* 4. Open config.php
* 5. Change $urldomain to subdomain or folder url.

	$urldomain = "http://radio.domain.com"; 
	// Url of the website and playlist (subdomain if possible)
	// Simplepie (podcast) won't work on restricted hosting.

* 6. Choose Language

	define("LANG", "EN"); // English language
	//define("LANG", "FR"); // Langue française

* 7. Change title (`$titledomainname`) and description (`$description`) of frontend page.
* 8. Save config.php
* 9. Open playlist.php
* 10. Add playlist element after /* --- Playlist start ---- */
* 11. Save playlist.php
* 12. Go to website (ex: radio.domain.com)
* 13. Download the playlist, open it with VLC http://www.videolan.org/ or else.
	
Or copy paste website url in VLC (Media > Open network Stream)

![VLCnetwork](http://playlistrss.fluate.net/img/networkstream.png) 


### How to create/modify a playlist

Copy paste line below in playlist.php and change url and title.

`playlist_space();`
// Space in the playlist, 10s track to choose

`category_title('Category title');`
// Show a category title, 10s track to choose

`playlist_radio_stream('Title of the radio', 'http://urlofthesoundstream');`
// playlist_radio_stream(Title, url) (no space at the end)

`playlist_podcast('Title of the podcast', 'http://urlofthepodcastrss', 10);`
// playlist_podcast(Title, url, number of elements)

`playlist_podcast_nospace('Title of the podcast', 'http://urlofthepodcastrss', 10);`
// playlist_podcast(Title, url, number of elements) (no space at the end)

