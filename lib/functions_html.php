<? 
require 'config.php';
require 'simplepie/simplepie_1.3.compiled.php'; 
include 'functions_video_html.php'; // include the functions to transform video playlist (simplepie)

function header_playlist() { 
	global $titledomainname, $description, $urldomain, $downloadtext, $copyinvlc;
	if(ereg('VLC', $_SERVER["HTTP_USER_AGENT"])) { echo $urldomain."/vlc.m3u"; exit; }
	echo '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
		<head>
			<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			<title>'.$titledomainname.'</title>
			<link rel="stylesheet" type="text/css" href="lib/css_style.css" />
		</head>
		<body id="htmlrender" onload=""><a name="top"></a>';
	
		echo '<h1 class="header">'.$titledomainname.'</h1>';
		echo '<h2 class="desc">'.$description.'</h2>';
		echo '<span class="domain"><h3>'.$urldomain.'</h3><br><h4>'.$copyinvlc.'</h4></span>';
		if ($urldomain == "http://radio.domain.com") {echo '<br><h4>'.$urlchange.'</h4><br>';}
		$urlxspf = str_replace("/", "_", substr($urldomain, 7));
		echo '<br><br><a class="dlink" href="'.$urldomain.'/Playlist_'.$urlxspf.'.xspf" rel="alternate" target=_blank ><span class="dl">'.$downloadtext.'</span></a><br><br>';
 
 }

function playlist_space()
{
    echo '<span class="space"></span>';
}

function category_title($title)
{ global $urldomain;
    echo '
	<ul class="category">
        <li>'.$title.'</li>      
    </ul>';
}


function playlist_radio_stream($title, $radio_url) {
    echo '
	<ul>
        <li>
		<a  class="radio" href="'.$radio_url.'">Radio / '.$title.'</a>
		<br>
		<span class="urlradio">'.$radio_url.'</span>
		</li>
    </ul>
	';
}

function playlist_podcast($title, $podcast_url, $items)
{
	category_title($title.'<span class="url">'.$podcast_url.'</span>');
	$feed = new SimplePie(); $feed->set_feed_url($podcast_url); $feed->set_item_class(); 
	$feed->enable_cache(true); $feed->strip_htmltags(); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache'); $feed->init(); $feed->handle_content_type();  
	$i = 1;
	echo '<ul>';
	foreach($feed->get_items(0, 3) as $item) 
	{  
		$mediaEnclosures = $item->get_enclosures(); 
		foreach ($mediaEnclosures as $enclosure) 
		{  
			$mp3Link=$enclosure->get_link(); 
			$date=$item->get_date('Y.m.d'); 
			$duration=$enclosure->get_duration();
			
			$seconds = $duration;
			$minutes = floor($seconds/60);
			$secondsleft = $seconds%60;
			if($minutes<10)
			    $minutes = "0" . $minutes;
			if($secondsleft<10)
			    $secondsleft = "0" . $secondsleft;
			$durationminute = $minutes." min ".$secondsleft." s";
			
			 
			$size = $enclosure->get_length()/1048576; 
			$_link = $mp3Link;  
			$xtitle = $item->get_title(); 
			$xtitle = ucfirst(strtolower($item->get_title()));
		    echo '
				<li>
					<a class="podcast" href="'.$_link.'">'.$xtitle.' 
						<span class="time"> '.$date.' / '.$durationminute.'</span>
					</a>
				</li>
		    ';
		}
		 
		$i++;
		 
	}	
	echo '</ul>';
	playlist_space();
}

function playlist_podcast_nospace($title, $podcast_url, $items)
{
	$feed = new SimplePie(); $feed->set_feed_url($podcast_url); $feed->set_item_class(); 
	$feed->enable_cache(true); $feed->strip_htmltags(); $feed->set_cache_duration(3600);
	$feed->set_cache_location('lib/simplepie/cache'); $feed->init(); $feed->handle_content_type();  
	$i = 1;
	echo '<ul>';
	foreach($feed->get_items(0, $items) as $item) 
	{  
		$mediaEnclosures = $item->get_enclosures(); 
		foreach ($mediaEnclosures as $enclosure) 
		{  
			$mp3Link=$enclosure->get_link(); 
			$date=$item->get_date('Y.m.d'); 
			$duration=$enclosure->get_duration(); 
			$size = $enclosure->get_length()/1048576;
			$seconds = $duration;
			$minutes = floor($seconds/60);
			$secondsleft = $seconds%60;
			if($minutes<10)
			    $minutes = "0" . $minutes;
			if($secondsleft<10)
			    $secondsleft = "0" . $secondsleft;
			$durationminute = $minutes." min ".$secondsleft." s"; 
			$_link = $mp3Link;  
			$xtitle = $item->get_title(); 
			$xtitle = ucfirst(strtolower($item->get_title()));
		    echo '
				
				<li>
					<a class="podcast" href="'.$_link.'">'.$xtitle.' 
						<span class="time"> '.$date.' / '.$durationminute.'</span>
					</a>
				</li>

			    ';
			
			

		}
		 
		$i++;
		 
	}	
echo '</ul>';
}
?>