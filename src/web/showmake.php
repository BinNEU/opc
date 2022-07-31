<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
////////////////////////////Common head
	$cache_time=2;
	$OJ_CACHE_SHARE=false;
	
        
require_once("./include/my_func.inc.php");
if(isset($OJ_LANG)){
                require_once("./lang/$OJ_LANG.php");
        }
require_once("./include/const.inc.php");
$user_id=$_POST['user_id'];
$name=$_POST['name'];
$weizhi=$_POST['weizhi'];
$status=$_POST['status'];
   if (get_magic_quotes_gpc ()) {
        $user_id= stripslashes ( $user_id);
        $name= stripslashes ( $name);
		$weizhi= stripslashes ( $weizhi);
		$status= stripslashes ( $status);
   }
   $time=date('Y-m-d H:i:s', time());
	require("template/".$OJ_TEMPLATE."/showmake.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>