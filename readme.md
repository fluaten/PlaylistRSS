# Playlist Rss

Webhosted (php) m3u playlist generator.
To play radio stream and latest podcast from RSS. 

Source : <https://github.com/fluaten/PlaylistRSS>

Demo : <http://playlistrss.fluate.net> / Demo (FR) : <http://playlistrss.fluate.net/fr>

Author : Nicolas Boillot <http://www.fluate.net>

Made with Simplepie for converting RSS feed. <http://simplepie.org/>

![VLC](http://playlistrss.fluate.net/img/rssplaylist.png)

### Required

A webhosting supporting PHP 5 and custom url rewriting.

### Install

 1. Download zip : <https://github.com/fluaten/PlaylistRSS/zipball/master>
 2. Extract and copy the folder by ftp on the website.
 3. Create a subdomain (ex: http://radio.domain.com) pointing to the ftp folder.
 4. Or modify the folder name (ex: http://www.domain.com/radio).
   
 		If PlaylistRSS is not in a subdomain but in a folder :
 
 		1. Open .htaccess in the folder.
 		2. Comment with ## in front of these 4 lines :
 
		##RewriteBase /
		##RewriteRule ^vlc\.m3u$ /playlist.php [L]
		##RewriteRule ^Playlist_([^/]*)\.xspf$ /vlc_xspf.php [L]
		##RewriteRule ^m$ /playlist.php?type=m [L]
	
 
 		3. Uncomment and change the path name to the folder (here /radio) :
 
		RewriteBase /radio/
		RewriteRule ^vlc\.m3u$ /radio/playlist.php [L]
		RewriteRule ^Playlist_([^/]*)\.xspf$ /radio/vlc_xspf.php [L]
		RewriteRule ^m$ /radio/playlist.php?type=m [L]
	
	
 		4. Save .htaccess file on the ftp
	
 5. Open **config.php**
 6. Comment with // `$display = TRUE;` if you want to hide the list of each podcast and radio in html (mobile reader)
 7. Change `$urldomain` to subdomain or folder url.
 8. Choose Language (English or French), uncomment selected language.
 9. Change title `$titledomainname` and description `$description` of frontend page.
 10. Save **config.php** on the ftp.
 11. Open **playlist.php**
 12. Add/modify playlist element after `/* --- Playlist start ---- */`.
 13. Save **playlist.php** on the ftp.
 14. Visit the website (ex: http://radio.domain.com or http://www.domain.com/radio)
 15. Download the playlist, open it with VLC http://www.videolan.org/ or else.	
 16. Or copy paste website url in VLC (Media > Open network Stream)

![VLCnetwork](http://playlistrss.fluate.net/img/networkstream.png) 


### How to create/modify a playlist

Copy paste line below in **playlist.php** and change url and title.

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


#### Video playlist with youtube, vimeo, dailymotion (experimental)

Video streaming is still experimental, and freeze sometimes, it depends on how VLC read these stream. 

You need to do two modifications to VLC (latest version) :

To read a youtube video in VLC, replace the content of youtube.lua with :
<http://git.videolan.org/?p=vlc.git;a=blob_plain;f=share/lua/playlist/youtube.lua>

To read a vimeo video in VLC, replace the content of vimeo.lua with :
<http://git.videolan.org/?p=vlc.git;a=blob_plain;f=share/lua/playlist/vimeo.lua>

		Modify lua script here :
		Windows : C:/Program Files/VideoLAN/VLC/lua/playlist/
		Mac : /Applications/VLC.app/Contents/MacOS/share/lua/playlist/
		Linux : /usr/lib/vlc/lua/playlist


#####Youtube

`playlist_youtube_user('Title', 'user ID', 20);`

// playlist_youtube_user(Title, youtube username, number of elements);

`playlist_youtube_user_favorite('Title', 'user ID', 20);`

// playlist_youtube_user_favorite(Title, youtube username, number of elements);

`playlist_youtube_normal('Title', 'http://urlofthevideorss', 10);`

// playlist_youtube_normal(Title, feedurl, number of elements);

`playlist_youtube_playlist('Title', 'Playlist ID', 20);`

// playlist_youtube_playlist(Title, Playlist ID, number of elements); // Playlist ID ex : 39BF9545D740ECFF

#####Vimeo 

`playlist_vimeo_user('Title', 'vimeo userID', 20);`

// playlist_vimeo_user(Title, vimeo username, number of elements);

`playlist_vimeo_likes('Title', 'vimeo userID', 20);`

// playlist_vimeo_likes(Title, vimeo username, number of elements);

`playlist_vimeo_groups('Title', 'vimeo groupID', 20);`

// playlist_vimeo_groups(Title, vimeo group name, number of elements);

`playlist_vimeo_channels('Title', 'vimeo channelID', 20);`

// playlist_vimeo_channels(Title, vimeo channel name, number of elements);

#####Dailymotion

`playlist_dailymotion_user('Title', 'dailymotion userID', 20);`

// playlist_dailymotion_user(Title, dailymotion username, number of elements);

`playlist_dailymotion_search('Title', 'dailymotion search term', 20);`

// playlist_dailymotion_user(Title, search term, number of elements);

`playlist_dailymotion_playlist('Title', 'dailymotion playlistID', 20);`

// playlist_dailymotion_playlist(Title, dailymotion playlist name, number of elements);

`playlist_dailymotion_groups('Title', 'dailymotion groupID', 20);`

// playlist_dailymotion_groups(Title, dailymotion group name, number of elements);


### Simplified BSD License

   https://en.wikipedia.org/wiki/BSD_licenses
	
	Copyright 2012 Nicolas Boillot. All rights reserved.

    Redistribution and use in source and binary forms, with or without modification, are
    permitted provided that the following conditions are met:

       1. Redistributions of source code must retain the above copyright notice, this list of
          conditions and the following disclaimer.

       2. Redistributions in binary form must reproduce the above copyright notice, this list
          of conditions and the following disclaimer in the documentation and/or other materials
          provided with the distribution.

    THIS SOFTWARE IS PROVIDED BY NICOLAS BOILLOT ''AS IS'' AND ANY EXPRESS OR IMPLIED
    WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND
    FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL Maurice Svay OR
    CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
    CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
    SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
    ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
    NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
    ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

    The views and conclusions contained in the software and documentation are those of the
    authors and should not be interpreted as representing official policies, either expressed
    or implied, of Nicolas Boillot.