<?php 
	$OJ_CACHE_SHARE=false;
	$cache_time=60;
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');
    $view_title= "Problem Set";
$first=1000;
  //if($OJ_SAE) $first=1;
$sql="select count(*) as c from problem where leitai is null";
$page_cnt=100;
$result=mysql_query_cache($sql);
$row=$result[0];
$max_p=$row['c'];//2019.3.21 修改倒序输出
if((isset($_POST['actionw']))){
	  $actionw=$_POST['actionw'];
	  $simw=1-$actionw;
}
$sqls="SELECT * FROM simtable ";
//3.21 修改添加desc

$results=mysql_query_cache($sqls);
$cnt=0;
$view_problemset=Array();
$i=0;
foreach ($results as $row){
	
	
	$view_problemset[$i]=Array();
	$a=round(($row['aas']/$max_p+$row['aac']/$row['aas']),4)*100;
	$b=round(($row['bbs']/$max_p+$row['bbc']/$row['bbs']),4)*100;
	$view_problemset[$i][0]="<div class='center'>".$row['aid']."</div>";
	$view_problemset[$i][1]="<div class='center'>".$row['bid']."</div>";
	$view_problemset[$i][2]="<div class='center'>".$a."%</div>";
	$view_problemset[$i][3]="<div class='center'>".$b."%</div>";
	$view_problemset[$i][4]="<div class='center'>".$row['sim']."%</div>";
	$simresult=round(($actionw*max($a,$b)+$simw*$row['sim']),2);
	$view_problemset[$i][5]="<div class='center'>".$simresult."%</div>";

	
	
	$i++;
}



require("template/".$OJ_TEMPLATE."/sim.php");
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
