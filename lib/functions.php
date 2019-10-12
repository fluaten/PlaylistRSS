<? 
require 'config.php';
require 'simplepie/autoloader.php'; 
include 'functions_video.php'; // include the functions to transform video playlist (simplepie)

function header_playlist() { print "#EXTM3U\r\n"; }

function playlist_space()
{ 
	global $urldomain;
	print "\r#EXTINF:,. -                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           . \r
$urldomain/wait.mp3\r\n\r\n"; 
}

function category_title($title)
{	
	global $urldomain;
	print "#EXTINF:,. - $title __________________________________________________________________________________________________________________________________________________________________________________________________________________________________\r
	$urldomain/wait.mp3\r\n";
}

function playlist_radio_stream($title, $radio_url) {
	print "\r#EXTINF:,$title - $title                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           . \r
	$radio_url\r\n\r\n";
}

function playlist_podcast($title, $podcast_url, $maxitems, $reverse = FALSE)
{
	category_title($title);
	$feed = new SimplePie(); $feed->set_feed_url($podcast_url); $feed->set_item_class(); 
	$feed->enable_cache(true); $feed->strip_htmltags(); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache'); $feed->init(); $feed->handle_content_type();
	$feeditems = $feed->get_items(0, $maxitems);
	if ($reverse) {
		$feeditems = array_reverse($feeditems);
	}
	$i = 1;
	foreach($feeditems as $item)  
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
	playlist_space();
}

function playlist_podcast_nospace($title, $maxitems, $reverse = FALSE)
{
	$feed = new SimplePie(); $feed->set_feed_url($podcast_url); $feed->set_item_class(); 
	$feed->enable_cache(true); $feed->strip_htmltags(); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache'); $feed->init(); $feed->handle_content_type();
	$feeditems = $feed->get_items(0, $maxitems);
	if ($reverse){
			$feeditems = array_reverse($feeditems);
		}
	$i = 1;
	foreach($feeditems as $item) 
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