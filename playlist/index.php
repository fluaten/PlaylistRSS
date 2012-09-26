<?php include '../config.php'; 
if(ereg('VLC', $_SERVER["HTTP_USER_AGENT"])) { echo $urldomain."/vlc.m3u"; } else {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title><?php echo $titledomainname; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body id="list" onload="">
	<div class="header">
		<div class="m3u">
			<div class="n1"><h1><?php echo $titledomainname; ?></h1></div>
			<h3 class="sub"><?php echo $description; ?></h3>
		
			<span class="img">
				<a href="<?php echo $urldomain; ?>/Playlist_<?php
			$urldomainname = str_replace("/", "_", substr($urldomain, 7));
			 echo $urldomainname; ?>.xspf" rel="alternate" target=_blank >
					<span class="dl"><?php echo $downloadtext; ?></span>
				</a><br><br><br><br>
				<span class="copyvlc"><?php echo $copyinvlc; ?><br>
					<textarea id="url" cols="40" rows="1"><?php echo $urldomain; ?></textarea></span>
					<?php if ( $urldomain == "http://radio.domain.com") {
						echo '<br><br>'.$urlchange.'<br>';
					}?>
			</span>
			<br><br><br>
			<h5 class="footer"><?php echo $footer; ?> | <?php echo $vlclink; ?></h5>
			
		</div>
	</div>
</body>
</html>
<?php } ?>