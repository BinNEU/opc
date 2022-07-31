<?php
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');


$down = $_GET['f'];   //获取文件参数
$filename = $down; //获取文件名称
$dir ="down/";  //相对于网站根目录的下载目录路径
$down_host = $_SERVER['HTTP_HOST'].'/'; //当前域名


//判断如果文件存在,则跳转到下载路径
if(file_exists(__DIR__.'/'.$dir.$filename)){
    header('location:http://'.$down_host.$dir.$filename);
}else{
    header('HTTP/1.1 404 Not Found');
}


?>
<script language=javascript>
	history.go(-1);
</script>

