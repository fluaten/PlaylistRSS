<?php 
include 'config.php';

$ua = $_SERVER["HTTP_USER_AGENT"];

if(ereg('Opera', $ua
 ) || ereg('Yahoo-Blogs', $ua
 ) || ereg('VoilaBot', $ua
 ) || ereg('Maxthon', $ua
 ) || ereg('MyIE2', $ua
 ) || ereg('MSIE', $ua
 ) || ereg('Firefox', $ua
 ) || ereg('OmniWeb', $ua
 ) || ereg('Shiira', $ua
 ) || ereg('Safari', $ua
 ) || ereg('Camino', $ua
 ) || ereg('Konqueror', $ua
 ) || ereg('Lynx', $ua
 ) || ereg('HTTrack', $ua
 ) || ereg('NokiaN70', $ua
 ) || ereg('iCab', $ua
 ) || ereg('Netscape', $ua
 ) || ereg('Galeon', $ua
 ) || ereg('Epiphany', $ua
 ) || ereg('Firebird', $ua
 ) || ereg('K-Meleon', $ua
 ) || ereg('Googlebot', $ua
 ) || ereg('msnbot', $ua
 ) || ereg('Java/', $ua
 ) || ereg('Ask Jeeves/Teoma', $ua
 ) || ereg('Slurp', $ua
 ) || ereg('OmniExplorer_Bot', $ua
 ) || ereg('ia_archiver', $ua
 ) || ereg('Liferea', $ua
 ) || ereg('FeedFetcher-Google', $ua
 ) || ereg('Bloglines', $ua
 ) || ereg('FeedDemon', $ua
 ) || ereg('NetNewsWire', $ua
 ) || ereg('AppleSyndication', $ua
 ) || ereg('NewsGatorOnline', $ua
 ) || ereg('Feedreader', $ua
 ) || ereg('Thunderbird', $ua
 ) || ereg('MagpieRSS', $ua
 ) || ereg('Waggr_Fetcher', $ua
 ) || ereg('iTunes', $ua
 ) || ereg('CSE HTML Validator', $ua
 ) || ereg('Jigsaw', $ua
 ) || ereg('FeedValidator', $ua
 ) || ereg('WDG_Validator', $ua
 ) || ereg('Page Valet', $ua
 ) || ereg('NetMechanic', $ua
 ) || eregi('amaya', $ua
 ) || eregi('Incutio', $ua
 ) || eregi('SeaMonkey', $ua
 ) || eregi('AvantGo', $ua
 ) || ereg('Mozilla/', $ua
 ) || ereg('Gecko', $ua
 ) || eregi('NetPositive', $ua
 ) || ereg('curl', $ua
 ))
{
header ('location: playlist');	
}
echo $urldomain."/vlc.m3u"; 

?>