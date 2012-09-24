<?
include 'functions.php'; // include the functions to transform url in playlist (simplepie)
header_playlist(); // Header of the m3u

/* --- Playlist start ---- */

playlist_space(); 

category_title('Radios');

playlist_radio_stream('Jazzopolitan', 'http://listen.radionomy.com/jazzopolitan');
playlist_radio_stream('Dublab', 'http://205.188.215.225:8008/');
playlist_radio_stream('Laid Back Radio', 'http://streaming.radionomy.com:8000/Laid-Back-Radio');

playlist_space();

category_title('Podcasts');

playlist_space();

playlist_podcast('Dublab', 'http://dublab.com/podcast', 15);

playlist_podcast('Place de la toile [France Culture]', 'http://radiofrance-podcast.net/podcast09/rss_10465.xml', 10);


/* --- Playlist end ---- */


/* --- How to create/modify a playlist ---

Copy paste line below and change url and title.

playlist_space(); 
// Space in the playlist, 10s track to choose

category_title('Category title'); 
// Show a category title, 10s track to choose

playlist_radio_stream('Title of the radio', 'http://urlofthesoundstream'); 
// playlist_radio_stream(Title, url) (no space at the end)

playlist_podcast('Title of the podcast', 'http://urlofthepodcastrss', 10); 
// playlist_podcast(Title, url, number of elements) 

playlist_podcast_nospace('Title of the podcast', 'http://urlofthepodcastrss', 10)  
// playlist_podcast(Title, url, number of elements) (no space at the end)

*/


?>