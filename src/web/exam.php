 <?php
 
	$cache_time=30;
	$OJ_CACHE_SHARE=false;//!(isset($_GET['cid'])||isset($_GET['my']));
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
    require_once('./include/memcache.php');
	require_once('./include/my_func.inc.php');
	require_once('./include/const.inc.php');
	require_once('./include/setlang.php');
	 if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

	$view_errors= "<a href=loginpage.php>$MSG_Login</a>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
//	$_SESSION[$OJ_NAME.'_'.'user_id']="Guest";
}
	$view_title= "考试列表";
	$sql="SELECT * FROM `exam` WHERE `exam_id`=1004";
	$result=pdo_query($sql);
	$row=$result[0];
	$shuoming=$row["description"];
  function formatTimeLength($length)
{
	$hour = 0;
	$minute = 0;
	$second = 0;
	$result = '';
	
	if ($length >= 60)
	{
		$second = $length % 60;
		if ($second > 0)
		{
			$result = $second . '秒';
		}
		$length = floor($length / 60);
		if ($length >= 60)
		{
			$minute = $length % 60;
			if ($minute == 0)
			{
				if ($result != '')
				{
					$result = '0分' . $result;
				}
			}
			else
			{
				$result = $minute . '分' . $result;
			}
			$length = floor($length / 60);
			if ($length >= 24)
			{
				$hour = $length % 24;
				if ($hour == 0)
				{
					if ($result != '')
					{
						$result = '0小时' . $result;
					}
				}
				else
				{
					$result = $hour . '小时' . $result;
				}
				$length = floor($length / 24);
				$result = $length . '天' . $result;
			}
			else
			{
				$result = $length . '小时' . $result;
			}
		}
		else
		{
			$result = $length . '分' . $result;
		}
	}
	else
	{
		$result = $length . '秒';
	}
	return $result;
}

	if (isset($_GET['eid'])){
			$id=intval($_GET['eid']);
			$eid=$id;
			$view_id=$id;
		//	print $cid;
			
			
			// check contest valid
			$sql="SELECT * FROM `exam` WHERE `exam_id`=?";
			$result=pdo_query($sql,$id);
			$rows_cnt=count($result);
			$weikai=true;
			$exam_ok=true;
		        $password="";	
		        if(isset($_POST['password'])) $password=$_POST['password'];
			if (get_magic_quotes_gpc ()) {
			        $password = stripslashes ( $password);
			}
			if ($rows_cnt==0){
				
				$view_title= "考试已经关闭!";
				$view_errors=  "考试已经关闭!";
				require("template/".$OJ_TEMPLATE."/error.php");
				exit(0);
				
			}else{
				 $row=$result[0];
				$view_private=$row['private'];
				if($password!=""&&$password==$row['password']) $_SESSION["flag"]=true;
				if ($row['private'] && !isset($_SESSION["flag"])) $exam_ok=false;
				if ($row['defunct']=='Y') $weikai=false;
				if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])) $exam_ok=true;
									
				$now=time();
				
				$start_time=strtotime($row['start_time']);
				$end_time=strtotime($row['end_time']);
				$view_description=$row['description'];
				$view_title= $row['title'];
				$view_start_time=$row['start_time'];
				$view_end_time=$row['end_time'];
				$filename=$row['filename'];
				$file=$row['file'];
				$timestamp=strtotime($view_end_time)+1;
				$clock=date("m/d/y H:i:s" , $timestamp);
				$clocks="'".$clock."'";
				if (!$weikai){
					$view_errors=  "<h2>考试已关闭</h2>";
					require("template/".$OJ_TEMPLATE."/error.php");
					exit(0);
				}
				if (!isset($_SESSION[$OJ_NAME.'_'.'administrator']) && $now>$end_time){
					$view_errors=  "<h2>考试已过截止期</h2>";
					require("template/".$OJ_TEMPLATE."/error.php");
					exit(0);
				}
				if (!isset($_SESSION[$OJ_NAME.'_'.'administrator']) && $now<$start_time){
					$view_errors=  "<h2>考试尚未开始，不能查看题目。</h2>";
					require("template/".$OJ_TEMPLATE."/error.php");
					exit(0);
				}
			}
			if (!$exam_ok){
            			 $view_errors=  "<h2>考试私有，不能查看题目。<br></h2>";
            			 $view_errors.=  "<form method=post action='exam.php?eid=$id'>考试 密码:<input class=input-mini type=password name=password><input class=btn type=submit></form>";
				require("template/".$OJ_TEMPLATE."/error.php");
				exit(0);
			}
	}
		 $user=$_SESSION[$OJ_NAME.'_'.'user_id'];	 
		 $sqls="select * from users where user_id= ?";
		 $results=pdo_query($sqls,$user);
	     $row=$results[0];
		 $nick=$row["nick"];
		 $name=$row["name"];
		 $class=$row["class"];
		 $school=$row["school"];

		$view_info[0][0]="<div class='center'>".$row['user_id']."</div>";
	    $view_info[0][1]="<div class='center'>".$name."</div>";
		$view_info[0][2]="<div class='center'>".$class."</div>";
		$view_info[0][3]="<div class='center'>".$school."</div>";
		$view_info[0][4]="<div class='center'>".$id."</div>";
		$view_info[0][5]="<div class='center'>".$view_title."</div>";
	 
/////////////////////////Template
	require("template/".$OJ_TEMPLATE."/exam.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
