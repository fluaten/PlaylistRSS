<?
include 'lib/playlist_header.php'; // include the functions to transform url in playlist (simplepie)
if ($_GLOBAL["showlist"]) { // Hide or show playlist in html

/* --- Playlist start ---- */

playlist_space(); 

category_title('Radios');

playlist_radio_stream('Radio nova', 'http://broadcast.infomaniak.net:80/radionova-high.mp3');
playlist_radio_stream('Fip autour du Groove', 'http://direct.fipradio.fr/live/fip-webradio3.mp3');
playlist_radio_stream('Deutschlandfunk', 'http://st01.dlf.de/dlf/01/128/mp3/stream.mp3');


playlist_space();

category_title('Podcasts');

playlist_space();

playlist_podcast('DJ Nirso podcast', 'https://djnirso.podomatic.com/rss2.xmlsource', 10, 12);

playlist_podcast('Une vie, une oeuvre [France Culture]', 'http://radiofrance-podcast.net/podcast09/rss_10471.xml', 10, 20);


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

Youtube ------------------------

playlist_youtube_user('Title', 'user ID', 20);
// playlist_youtube_user(Title, youtube username, number of elements);

playlist_youtube_user_favorite('Title', 'user ID', 20);
// playlist_youtube_user_favorite(Title, youtube username, number of elements);

playlist_youtube_normal('Title', 'http://urlofthevideorss', 10);
// playlist_youtube_normal(Title, feedurl, number of elements);

playlist_youtube_playlist('Title', 'Playlist ID', 20);
// playlist_youtube_playlist(Title, Playlist ID, number of elements); // Playlist ID ex : 39BF9545D740ECFF

Vimeo ------------------------

playlist_vimeo_user('Title', 'vimeo userID', 20);
// playlist_vimeo_user(Title, vimeo username, number of elements);

playlist_vimeo_likes('Title', 'vimeo userID', 20);
// playlist_vimeo_likes(Title, vimeo username, number of elements);

playlist_vimeo_groups('Title', 'vimeo groupID', 20);
// playlist_vimeo_groups(Title, vimeo group name, number of elements);

playlist_vimeo_channels('Title', 'vimeo channelID', 20);
// playlist_vimeo_channels(Title, vimeo channel name, number of elements);

Dailymotion ------------------

playlist_dailymotion_user('Title', 'dailymotion userID', 20);
// playlist_dailymotion_user(Title, dailymotion username, number of elements);

playlist_dailymotion_search('Title', 'dailymotion search term', 20);
// playlist_dailymotion_user(Title, search term, number of elements);

playlist_dailymotion_playlist('Title', 'dailymotion playlistID', 20);
// playlist_dailymotion_playlist(Title, dailymotion playlist name, number of elements);

playlist_dailymotion_groups('Title', 'dailymotion groupID', 20);
// playlist_dailymotion_groups(Title, dailymotion group name, number of elements);


*/

}

include 'lib/playlist_footer.php'; 
?>