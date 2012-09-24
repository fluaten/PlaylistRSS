<?
include 'config.php';	

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$file");
header("content-type: audio/x-mpegurl");
header("Content-Transfer-Encoding: binary");

echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
  <trackList>
    <track>
      <location><?php echo $urldomain; ?>/vlc.m3u</location>
      <title><?php echo $xspfloading; ?></title>
    </track>
  </trackList>
</playlist>
