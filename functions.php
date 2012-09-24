<? 
require 'config.php';
require 'simplepie/simplepie_1.3.compiled.php'; 
// simplepie require .htaccess with 
// SetEnv SESSION_USE_TRANS_SID 0
// SetEnv PHP_VER 5
// On some configuration

function header_playlist() { print "#EXTM3U\r\n"; }

function category_title($title)
{	
	global $urldomain;
	print "#EXTINF:,. - $title __________________________________________________________________________________________________________________________________________________________________________________________________________________________________\r
	$urldomain/wait.mp3\r\n";
}

function playlist_radio_stream($title, $feed_url) {
	print "\r#EXTINF:,.$title - $title                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           . \r
	$feed_url\r\n\r\n";
}

function playlist_space()
{ 
	global $urldomain;
	print "\r#EXTINF:,. -                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           . \r
$urldomain/wait.mp3\r\n\r\n"; 
}

function playlist_podcast($title, $feed_url, $items)
{
	global $urldomain;
	print "#EXTINF:,. - $title __________________________________________________________________________________________________________________________________________________________________________________________________________________________________\r
		$urldomain/wait.mp3\r\n";

	$feed = new SimplePie(); 
	$feed->set_feed_url($feed_url);
	$feed->set_item_class(); 
	$feed->enable_cache(true); 
	$feed->strip_htmltags();
	$feed->set_cache_duration(3600);
	$feed->set_cache_location('simplepie/cache'); 
	$feed->init(); 
	$feed->handle_content_type();  
	$i = 1;
	foreach($feed->get_items(0, $items) as $item) 
	{  
		$mediaEnclosures = $item->get_enclosures(); 
		foreach ($mediaEnclosures as $enclosure) 
		{  
			$mp3Link=$enclosure->get_link(); 
			$date=$item->get_date('Y.m.d'); 
			$duration=$enclosure->get_duration(); 
			$size = $enclosure->get_length()/1048576; 
			$_link = $mp3Link;  
			$xtitle = $item->get_title(); 
			$xtitle = ucfirst(strtolower($item->get_title()));
			print "#EXTINF:$duration,$date / $title - $xtitle ($date)\r\n$_link\r\n"; 
		}
		 
		$i++;
		 
	}	
	
	print "\r#EXTINF:,. -                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           . \r
		$urldomain/wait.mp3\r\n\r\n"; 
}

function playlist_podcast_nospace($title, $feed_url, $items)
{
	$feed = new SimplePie(); 
	$feed->set_feed_url($feed_url);
	$feed->set_item_class(); 
	$feed->enable_cache(true); 
	$feed->strip_htmltags();
	$feed->set_cache_duration(3600);
	$feed->set_cache_location('simplepie/cache'); 
	$feed->init(); 
	$feed->handle_content_type();  
	$i = 1;
	foreach($feed->get_items(0, $items) as $item) 
	{  
		$mediaEnclosures = $item->get_enclosures(); 
		foreach ($mediaEnclosures as $enclosure) 
		{  
			$mp3Link=$enclosure->get_link(); 
			$date=$item->get_date('Y.m.d'); 
			$duration=$enclosure->get_duration(); 
			$size = $enclosure->get_length()/1048576; 
			$_link = $mp3Link;  
			$xtitle = $item->get_title(); 
			$xtitle = ucfirst(strtolower($item->get_title()));
			print "#EXTINF:$duration,$date / $title - $xtitle ($date)\r\n$_link\r\n"; 
		}
		 
		$i++;
		 
	}	

}
?>