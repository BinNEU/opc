<?php
 $cache_time=10; 
 $OJ_CACHE_SHARE=false;
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');
	 require_once('./include/memcache.php');
	require_once("./include/const.inc.php");
	require_once("./include/my_func.inc.php");
 	 if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

	$view_errors= "<a href=loginpage.php>$MSG_Login</a>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
//	$_SESSION[$OJ_NAME.'_'.'user_id']="Guest";
}
  $Newresult=false;	
///////////////////////////MAIN	
	
	$view_news="";
	$sql=	"select * "
			."FROM `news` "
			."WHERE `defunct`!='Y'"
			."ORDER BY `importance` ASC,`time` DESC "
			."LIMIT 50";
	$Newresult=mysql_query_cache($sql);//mysql_escape_string($sql));
	if (!$Newresult){
		$view_news= "<h3>No News Now!</h3>";
	}else{
		$view_news.= "<table width=100%>";
		
		foreach ($Newresult as $row){
			$view_news.= "<div class='lab-item'><div class='lab-item-index'>".$row['title']."</b></big>-<small>发布人:".$row['user_id']."</small>-<small>发布时间:".$row['time']."</small></tr>";
			$view_news.= "<tr>".$row['content']."</tr>";
		}
		
		/*$view_news.= "<tr><td width=10%><td>This <a href=http://cm.baylor.edu/welcome.icpc>ACM/ICPC</a> OnlineJudge is a GPL product from <a href=https://github.com/zhblue/hustoj>hustoj</a></tr>";*/
		$view_news.= "</table>";
	}
$view_apc_info="";

$sql=	"SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) c FROM (select * from solution order by solution_id desc limit 8000) solution  where Newresult<13 group by md order by md desc limit 200";
	$Newresult=mysql_query_cache($sql);//mysql_escape_string($sql));
	$chart_data_all= array();
//echo $sql;
     
    foreach ($Newresult as $row){
		array_push($chart_data_all,array($row['md'],$row['c']));
    }
    
$sql=	"SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) c FROM  (select * from solution order by solution_id desc limit 8000) solution where Newresult=4 group by md order by md desc limit 200";
	$Newresult=mysql_query_cache($sql);//mysql_escape_string($sql));
	$chart_data_ac= array();
//echo $sql;
    
    foreach ($Newresult as $row){
		array_push($chart_data_ac,array($row['md'],$row['c']));
    }
  if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
  	$sql="select avg(sp) sp from (select  count(1) sp,judgetime from solution where Newresult>3 and judgetime>convert(now()-100,DATETIME)  group by judgetime order by sp) tt;";
  	$Newresult=mysql_query_cache($sql);
  	$speed=$Newresult[0][0]; 
  }
 
 // check user
$user=$_GET['user'];
$prouser=$user;
if (!is_valid_user_name($user)){
	echo "No such User!";
	exit(0);
}
$view_title=$user ."@".$OJ_NAME;
$sql="SELECT `school`,`email`,`nick`,`name`FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$user);
$row_cnt=count($result);
if ($row_cnt==0){ 
	$view_errors= "No such User!";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
}

 $row=$result[0];
$school=$row['school'];
$email=$row['email'];
$nick=$row['nick'];
$name=$row['name'];
// count solved
$sql="SELECT count(DISTINCT problem_id) as `ac` FROM `solution` WHERE `user_id`=? AND `result`=4";
$result=pdo_query($sql,$user) ;
 $row=$result[0];
$AC=$row['ac'];

// count submission
$sql="SELECT count(solution_id) as `Submit` FROM `solution` WHERE `user_id`=? and  problem_id>0";
$result=pdo_query($sql,$user) ;
 $row=$result[0];
$Submit=$row['Submit'];

// update solved 
$sql="UPDATE `users` SET `solved`='".strval($AC)."',`submit`='".strval($Submit)."' WHERE `user_id`=?";
$result=pdo_query($sql,$user);
$sql="SELECT count(*) as `Rank` FROM `users` WHERE `solved`>?";
$result=pdo_query($sql,$AC);
 $row=$result[0];
$Rank=intval($row[0])+1;

 if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
$sql="SELECT user_id,password,`time` FROM `loginlog` WHERE `user_id`=? order by `time` desc LIMIT 0,5";
$view_userinfo=pdo_query($sql,$user) ;
echo "</table>";

}
$sql="SELECT result,count(1) FROM solution WHERE `user_id`=? AND result>=4 group by result order by result";
	$result=pdo_query($sql,$user);
	$view_userstat=array();
	$i=0;
	 foreach($result as $row){
		$view_userstat[$i++]=$row;
	}
	

$sql=	"SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) c FROM `solution` where  `user_id`=?  group by md order by md desc ";
	$result=pdo_query($sql,$user);//mysql_escape_string($sql));
	$chart_data_all= array();
//echo $sql;
    
	 foreach($result as $row){
		$chart_data_all[$row['md']]=$row['c'];
    }
    
$sql=	"SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) c FROM `solution` where  `user_id`=? and result=4 group by md order by md desc ";
	$result=pdo_query($sql,$user);//mysql_escape_string($sql));
	$chart_data_ac= array();
//echo $sql;
    
	 foreach($result as $row){
		$chart_data_ac[$row['md']]=$row['c'];
    }
	

  
  
  
    
/////////////////////////Template
require("template/".$OJ_TEMPLATE."/analysis.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>

