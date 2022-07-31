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
$sub_arr=Array();
$sub_time=Array();
// submit
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id`,`in_date` FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       // " AND `problem_id`<'$pend'".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$sub_arr[$row[0]]=true;
}
$sub_time=Array();
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id`,max(`in_date`) as c FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       // " AND `problem_id`<'$pend'".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$sub_time[$row[0]]=$row['c'];
}
$acc_arr=Array();
// ac
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       //  " AND `problem_id`<'$pend'".
	" AND `result`=4".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$acc_arr[$row[0]]=true;
}
if (isset($_GET['eid'])){
$eid=intval($_GET['eid']);
$sql="SELECT * FROM `tblexam` WHERE `exam_id`=? and user_id=?";
$result=pdo_query($sql,$eid,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$cid=$row['contest_id'];
$sql="SELECT * FROM `contest_problem` WHERE `contest_id`=?";
$result=pdo_query($sql,$cid);
$view_problemset=Array();
$i=0;
foreach ($result as $row){
	$view_problemset[$i]=Array();
	if (isset($sub_arr[$row['problem_id']])){
		if (isset($acc_arr[$row['problem_id']])) {
			$view_problemset[$i][0]="<div class='btn btn-success'>成功提交</div>";
		$view_problemset[$i][1]="<div class='center'>".$sub_time[$row['problem_id']]."</div>";}
		else {
		$view_problemset[$i][0]= "<div class='btn btn-danger'>错误提交</div>";
		$view_problemset[$i][1]="<div class='center'>".$sub_time[$row['problem_id']]."</div>";
		}
	}else{
		$view_problemset[$i][0]= "<div class=none>无提交记录 </div>";
		$view_problemset[$i][1]="<div class=none>无提交记录 </div>";
	}
	$view_problemset[$i][2]="<div class='center'>".$row['problem_id']."</div>";
	
	$i++;
}

   
}
?>

<?php
/////////////////////////Template
	require("template/".$OJ_TEMPLATE."/chakan.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>