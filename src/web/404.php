<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
////////////////////////////Common head
	$cache_time=2;
	$OJ_CACHE_SHARE=false;
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
    require_once('./include/memcache.php');
	require_once('./include/setlang.php');
	$view_title= "$MSG_STATUS";
	
        
require_once("./include/my_func.inc.php");
if(isset($OJ_LANG)){
                require_once("./lang/$OJ_LANG.php");
        }
require_once("./include/const.inc.php");

	require("template/".$OJ_TEMPLATE."/404.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>