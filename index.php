<?php

function getBrowser($deviceString){
	
	$deviceModel = strtolower($deviceString);
		
	if(strpos($deviceModel,'ecko')
	  || strpos($deviceModel,'yahoo')
	  || strpos($deviceModel,'voilaBot')
	  || strpos($deviceModel,'maxthon')
		  || strpos($devicemodel,'myie2')
		  || strpos($devicemodel,'msie')
		  || strpos($devicemodel,'firefox')
		  || strpos($devicemodel,'omniweb')
		  || strpos($devicemodel,'shiira')
		  || strpos($devicemodel,'safari')
		  || strpos($devicemodel,'camino')
		  || strpos($devicemodel,'konqueror')
		  || strpos($devicemodel,'lynx')
		  || strpos($devicemodel,'httrack')
		  || strpos($devicemodel,'nokian70')
		  || strpos($devicemodel,'icab')
		  || strpos($devicemodel,'netscape')
		  || strpos($devicemodel,'galeon')
		  || strpos($devicemodel,'epiphany')
		  || strpos($devicemodel,'firebird')
		  || strpos($devicemodel,'k-meleon')
		  || strpos($devicemodel,'googlebot')
		  || strpos($devicemodel,'msnbot')
		  || strpos($devicemodel,'java')
		  || strpos($devicemodel,'ask jeeves/teoma')
		  || strpos($devicemodel,'slurp')
		  || strpos($devicemodel,'omniexplorer_bot')
		  || strpos($devicemodel,'ia_archiver')
		  || strpos($devicemodel,'liferea')
		  || strpos($devicemodel,'feedfetcher-google')
		  || strpos($devicemodel,'bloglines')
		  || strpos($devicemodel,'feeddemon')
		  || strpos($devicemodel,'netnewswire')
		  || strpos($devicemodel,'applesyndication')
		  || strpos($devicemodel,'newsgatoronline')
		  || strpos($devicemodel,'feedreader')
		  || strpos($devicemodel,'thunderbird')
		  || strpos($devicemodel,'magpierss')
		  || strpos($devicemodel,'waggr_fetcher')
		  || strpos($devicemodel,'itunes')
		  || strpos($devicemodel,'cse html validator')
		  || strpos($devicemodel,'jigsaw')
		  || strpos($devicemodel,'feedvalidator')
		  || strpos($devicemodel,'wdg_validator')
		  || strpos($devicemodel,'page valet')
		  || strpos($devicemodel,'netmechanic')
		  || strpos($devicemodel,'amaya')
		  || strpos($devicemodel,'incutio')
		  || strpos($devicemodel,'seamonkey')
		  || strpos($devicemodel,'avantgo')
		  || strpos($devicemodel,'mozilla')
		  || strpos($devicemodel,'ecko')
		  || strpos($devicemodel,'netpositive')
		  || strpos($devicemodel,'curl')
		  || strpos($devicemodel,'elinks')
		  || strpos($devicemodel,'amigavoyager')
	 ){
	echo '<meta http-equiv="refresh" content="0; url=m">';
	header ('location: m');
	}
	else{
	$urldomain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo $urldomain."/vlc.m3u"; 
	}
}
// get the user agent string
$agent	=	strtolower($_SERVER['HTTP_USER_AGENT']);
// call the redirect function
$deviceScreen = getBrowser($agent); 
?>