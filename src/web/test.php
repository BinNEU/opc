<?php
$cache_time=30;
$OJ_CACHE_SHARE=false;
        //require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
    require_once('./include/const.inc.php');
        require_once('./include/setlang.php');
        //require_once ('./ceinfo.php');//引用结果返回界面
        $now=strftime("%Y-%m-%d %H:%M",time());
if (isset($_GET['cid'])) $ucid="&cid=".intval($_GET['cid']);
else $ucid="";
require_once("./include/db_info.inc.php");

        if(isset($OJ_LANG)){
                require_once("./lang/$OJ_LANG.php");
        }

	require("template/".$OJ_TEMPLATE."/test.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>