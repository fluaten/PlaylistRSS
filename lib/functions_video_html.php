<?php

$reff = "http://www.dereferer.org/?";
$limititems = 5;

//Playlist user youtube
function playlist_youtube_user($title, $youtube_username, $items)
{ 	$items = $GLOBALS['limititems'];

	$feed_url = "https://www.youtube.com/feeds/videos.xml?user=".$youtube_username;
	category_title($title.' (youtube user) <span class="url">'.$youtube_username.'</span>');	echo '<ul>';
	
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	if ($hd = 1) { $hdurl =""; } else { $hdurl = "&fmt=18"; }
	foreach($feed->get_items(0, $items) as $item) {  	
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = substr($streamLink, 0, -26).$hdurl; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$txt = $item->get_description();
		$re1='.*?';	# Non-greedy match on filler
		$re2='((?:(?:[0-5][0-9])|(?:[2][0-3])|(?:[0-9])):(?:[0-5][0-9])(?::[0-5][0-9])?(?:\\s?(?:am|AM|pm|PM))?)<';	
		if ($c=preg_match_all ("/".$re1.$re2."/is", $txt, $matches)) { $timeY=$matches[1][0]; }
		$duration = MinSecToSeconds($timeY);
		$itemtitle = $item->get_title(); 
		$seconds = $duration;
		$minutes = floor($seconds/60);
		$secondsleft = $seconds%60;
		if($minutes<10)
		    $minutes = "0" . $minutes;
		if($secondsleft<10)
		    $secondsleft = "0" . $secondsleft;
		$duration2 = $minutes." min ".$secondsleft." s";
		
		    echo '
				
					<li><a class="youtube" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$duration2.' / '.$title.'</span></a></li>	
			
			';
		$i++; }
		playlist_space();	echo '</ul>';
}

//Playlist user favorite youtube
function playlist_youtube_user_favorite($title, $youtube_username, $items)
{ 	
		$items = $GLOBALS['limititems'];
	$feed_url = "https://www.youtube.com/feeds/videos.xml?channel_id=".$youtube_username;
	category_title($title.' (youtube user)<span class="url">'.$youtube_username.'</span>');
	echo '<ul>';
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	if ($hd = 1) { $hdurl =""; } else { $hdurl = "&fmt=18"; }
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = substr($streamLink, 0, -26).$hdurl; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$txt = $item->get_description();
		$re1='.*?';	# Non-greedy match on filler
		$re2='((?:(?:[0-5][0-9])|(?:[2][0-3])|(?:[0-9])):(?:[0-5][0-9])(?::[0-5][0-9])?(?:\\s?(?:am|AM|pm|PM))?)<';	
		if ($c=preg_match_all ("/".$re1.$re2."/is", $txt, $matches)) { $timeY=$matches[1][0]; }
		$itemtitle = $item->get_title(); 
		    echo '
				
					<li><a class="youtube" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
';
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist regular youtube rss (only direct links in a feed, ex:delicious.com)
function playlist_youtube_normal($title, $feed_url, $items)
{ 	$items = $GLOBALS['limititems'];
	category_title($title.' (youtube favorite)<span class="url">'.$feed_url.'</span>');
	echo '<ul>';
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type(); 
	$i = 1;
	if ($hd = 1) { $hdurl =""; } else { $hdurl = "&fmt=18"; }
	foreach($feed->get_items(0, $items) as $item) 
	{  
		$streamLink=$item->get_link();  
		$date=$item->get_date('Y.m.d'); 
		$itemLink = $streamLink.$hdurl; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$itemtitle = $item->get_title(); 
		
		    echo '
				
					<li><a class="youtube" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	

';
		$i++; 
	}
	playlist_space();	echo '</ul>';
}

//Playlist playlist youtube
function playlist_youtube_playlist($title, $youtube_playlist, $items)
{ 	$items = $GLOBALS['limititems'];
	$feed_fav_ytube = "https://www.youtube.com/feeds/videos.xml?playlist_id=".$youtube_playlist;
	//$url_fav_ytube = "https://www.youtube.com/playlist?list=".$youtube_playlist;
	category_title($title.' (youtube playlist) <span class="url">'.$youtube_playlist.'</span>');
	echo '<ul>';
	$feed = new SimplePie(); $feed->set_feed_url($feed_fav_ytube);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	$i = 1;
	if ($hd = 1) { $hdurl =""; } else { $hdurl = "&fmt=18"; }
	foreach($feed->get_items(0, $items) as $item) 
	{  
		$streamLink=$item->get_link();  
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink.$hdurl;  
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		if ($enclosure = $item->get_enclosure())
		{
			$dura = $enclosure->get_duration(true);
			$duration = MinSecToSeconds($dura);
		}
		$date = "";
		$itemtitle = $item->get_title(); 
		$seconds = $duration;
		$minutes = floor($seconds/60);
		$secondsleft = $seconds%60;
		if($minutes<10)
		    $minutes = "0" . $minutes;
		if($secondsleft<10)
		    $secondsleft = "0" . $secondsleft;
		$duration2 = $minutes." min ".$secondsleft." s";
		
		    echo '
				
					<li><a class="youtube" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$duration2.' / '.$title.'</span></a></li>	
		';
		$i++; 
	}
	playlist_space();	echo '</ul>';
}

//Playlist user feed dailymotion
function playlist_dailymotion_user($title, $daily_user, $items)
{
	category_title($title.' (dailymotion_user)<span class="url">'.$daily_user.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://www.dailymotion.com/rss/user/".$daily_user."/1"; 
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$itemtitle = $item->get_title(); 
		
		    echo '
				
					<li><a class="daily" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist group dailymotion
function playlist_dailymotion_groups($title, $daily_group, $items)
{ 
	category_title($title.' (dailymotion groups)<span class="url">'.$daily_group.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://www.dailymotion.com/rss/group/".$daily_group."/1";
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$data = $feed->sanitize($itemdescription, SIMPLEPIE_CONSTRUCT_TEXT);	
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="daily" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist playlist dailymotion
function playlist_dailymotion_playlist($title, $daily_playlistID, $items)
{ 
	category_title($title.' (dailymotion playlist)<span class="url">'.$daily_playlistID.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://www.dailymotion.com/rss/playlist/".$daily_playlistID."/1";
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="daily" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist search dailymotion
function playlist_dailymotion_search($title, $daily_s, $items)
{ 
	category_title($title.' (dailymotion search)<span class="url">'.$daily_s.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://www.dailymotion.com/rss/playlists/relevance/search/".$daily_s."/1";
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="daily" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist user feed vimeo
function playlist_vimeo_user($title, $vimeo_user, $items)
{	category_title($title.' (vimeo user)<span class="url">'.$vimeo_user.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://vimeo.com/".$vimeo_user."/videos/rss"; 
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="vimeo" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';
		$i++; }
		playlist_space();	echo '</ul>';
	}
	


//Playlist likes feed vimeo
function playlist_vimeo_likes($title, $vimeo_user, $items)
{ 
	category_title($title.' (vimeo likes)<span class="url">'.$vimeo_user.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://vimeo.com/".$vimeo_user."/likes/rss";
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache');  $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  
		$streamLink=$item->get_link(); 
		$date=$item->get_date('Y.m.d');  
		$itemLink = $streamLink; 
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="vimeo" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';  
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist group feed vimeo
function playlist_vimeo_groups($title, $vimeo_groupname, $items)
{ 
	category_title($title.' (vimeo groups)<span class="url">'.$vimeo_groupname.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://vimeo.com/groups/".$vimeo_groupname."/videos/rss";
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache'); $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  		
		$date=$item->get_date('Y.m.d');   
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$mediaEnclosures = $item->get_enclosures(); 
		foreach ($mediaEnclosures as $enclosure) { $txt = substr($enclosure->get_link(), 39); }
		$itemLink = "http://vimeo.com/".$txt;
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="vimeo" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	'; 
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Playlist channels feed vimeo
function playlist_vimeo_channels($title, $vimeo_channelname, $items)
{ 
	category_title($title.' (vimeo channels)<span class="url">'.$vimeo_channelname.'</span>');	echo '<ul>';
	$items = $GLOBALS['limititems'];
	$feed_url = "http://vimeo.com/channels/".$vimeo_channelname."/videos/rss";
	$feed = new SimplePie(); $feed->set_feed_url($feed_url);
	$feed->set_item_class(); $feed->enable_cache(true); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache'); $feed->init(); $feed->handle_content_type();
	foreach($feed->get_items(0, $items) as $item) {  		
		$date=$item->get_date('Y.m.d');  
		$itemdescription = shorten($item->get_description(),100);
		$feed->strip_htmltags($strip_htmltags);
		$mediaEnclosures = $item->get_enclosures(); 
		foreach ($mediaEnclosures as $enclosure) { $txt = substr($enclosure->get_link(), 39); }
		$itemLink = "http://vimeo.com/".$txt;
		$itemtitle = $item->get_title(); 
		    echo '
				<li><a class="vimeo" href="'.$GLOBALS['reff'].$itemLink.'">'.$itemtitle.'<span class="time"> '.$date.' / '.$title.'</span></a></li>	
	';
		$i++; }
		playlist_space();	echo '</ul>';
	}

//Short description
function shorten($string, $length)
{
	// By default, an ellipsis will be appended to the end of the text.
	$suffix = '..';

	$string = preg_replace("/,/"," ", $string);

	// Convert 'smart' punctuation to 'dumb' punctuation, strip the HTML tags,
	// and convert all tabs and line-break characters to single spaces.
	$short_desc = trim(str_replace(array("\r","\n", "\t",'/&ldquo;/','/&rdquo;/','/&quot;/','/&#39;/','"'), ' ', strip_tags($string)));

	// Cut the string to the requested length, and strip any extraneous spaces 
	// from the beginning and end.
	$desc = trim(substr($short_desc, 0, $length));

	// Find out what the last displayed character is in the shortened string
	$lastchar = substr($desc, -1, 1);

	// If the last character is a period, an exclamation point, or a question 
	// mark, clear out the appended text.
	if ($lastchar == '.' || $lastchar == '!' || $lastchar == '?') $suffix='';

	// Append the text.
	$desc .= $suffix;

	// Send the new description back to the page.
	return $desc;
}

function MinSecToSeconds($minsec)
{
	if (strlen($minsec)<=6) {
		if (preg_match('/(\\d+).*?(\\d+)/is', $minsec, $matches))
		{ return $matches[1]*60 + $matches[2] -1;
		} else { trigger_error("MinSecToSeconds: Bad time format $minsec", E_USER_ERROR); return 0; }
	} else if (strlen($minsec)>6) {
		if (preg_match('/(\\d+).*?(\\d+).*?(\\d+)/is', $minsec, $matches))
		{ return $matches[1]*3600 + $matches[2]*60 + $matches[3] - 1;
		} else { trigger_error("MinSecToSeconds: Bad time format $minsec", E_USER_ERROR); return 0; }
	}
}

/*  Youtube help about url
	&fmt=18 is video with _480x360 pixels resolution (_4:3 ratio) recorded at _512 kbps
	&fmt=22 is video with 1280x720 pixels resolution (16:9 ratio) recorded at 2000 kbps
	&fmt=35 is video with _854x480 pixels resolution (16:9 ratio) recorded at _900 kbps

	&fmt=18 is what's considered high-quality
	&fmt=22 is the standard for high-definition
	&fmt=35 is the true version of high-quality.
*/

?>
