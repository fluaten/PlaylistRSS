<?php 
include 'config.php';
if (ereg("MSIE", $_SERVER["HTTP_USER_AGENT"])) 
{  header ('location: playlist'); 
}  elseif (ereg("^Mozilla/", $_SERVER["HTTP_USER_AGENT"])) 
{  header ('location: playlist'); 
} elseif (ereg("^Opera/", $_SERVER["HTTP_USER_AGENT"])) 
{  header ('location: list'); 
} else 
{ //header ('location: index.php'); 
} 
echo $urldomain."/vlc.m3u"; 
?>