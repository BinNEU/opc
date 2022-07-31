<?php
////////////////////////////Common head
	$cache_time=30;
	$OJ_CACHE_SHARE=true;
	require_once('./include/cache_start.php');
        require_once('./include/db_info.inc.php');
        require_once('./include/memcache.php');
	require_once('./include/setlang.php');
	$view_title= "Welcome To Online Judge";
 $result=false;	
///////////////////////////MAIN	

$sql="SELECT count(1) c FROM users";
$user=mysql_query_cache($sql);
$row=$user[0];  
$zhuce=$row['c']; 

$sql="select * from zaixian";
$zaixianuser=mysql_query_cache($sql);
$row=$zaixianuser[0];  
$zaixian=$row['c']; 

$sql="select * from submit_totle";
      $problem=mysql_query_cache($sql);
      $row=$problem[0];
$tijiao=$row['c']; 
    

$sql="select * from submit";
      $problem=mysql_query_cache($sql);
      $row=$problem[0];
$jinri=$row['c'];     

$sql="select * from ac";
      $problem=mysql_query_cache($sql);
      $row=$problem[0];
      $AC=$row['c']; 
      
      $sql="select * from star";
      $problem=pdo_query($sql);
      $row=$problem[0];
      $star=$row['nick']; 
      $starsc=$row['school']; 
/////////////////////////Template
require("template/".$OJ_TEMPLATE."/shishi.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');

?>
