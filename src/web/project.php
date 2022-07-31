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
	$view_title= "作业列表";
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

	if (isset($_GET['id'])){
			$id=intval($_GET['id']);
			$view_id=$id;
		//	print $cid;
			
			
			// check contest valid
			$sql="SELECT * FROM `project` WHERE `project_id`=?";
			$result=pdo_query($sql,$id);
			$rows_cnt=count($result);
			$weikai=true;
			$project_ok=true;
		        $password="";	
		        if(isset($_POST['password'])) $password=$_POST['password'];
			if (get_magic_quotes_gpc ()) {
			        $password = stripslashes ( $password);
			}
			if ($rows_cnt==0){
				
				$view_title= "作业已经关闭!";
				
			}else{
				 $row=$result[0];
				$view_private=$row['private'];
				if($password!=""&&$password==$row['password']) $_SESSION["flag"]=true;
				if ($row['private'] && !isset($_SESSION["flag"])) $project_ok=false;
				if ($row['defunct']=='Y') $weikai=false;
				if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])) $project_ok=true;
									
				$now=time();
				$start_time=strtotime($row['start_time']);
				$end_time=strtotime($row['end_time']);
				$view_description=$row['description'];
				$view_title= $row['title'];
				$view_start_time=$row['start_time'];
				$view_end_time=$row['end_time'];
				$filename=$row['filename'];
				$file=$row['file'];
				
				if (!$weikai){
					$view_errors=  "<h2>作业已关闭</h2>";
					require("template/".$OJ_TEMPLATE."/error.php");
					exit(0);
				}
				if (!isset($_SESSION[$OJ_NAME.'_'.'administrator']) && $now>$end_time){
					$view_errors=  "<h2>作业已过截止期</h2>";
					require("template/".$OJ_TEMPLATE."/error.php");
					exit(0);
				}
				if (!isset($_SESSION[$OJ_NAME.'_'.'administrator']) && $now<$start_time){
					$view_errors=  "<h2>$MSG_PRIVATE_WARNING</h2>";
					require("template/".$OJ_TEMPLATE."/error.php");
					exit(0);
				}
			}
			if (!$project_ok){
            			 $view_errors=  "<h2>$MSG_PRIVATE_WARNING <br></h2>";
            			 $view_errors.=  "<form method=post action='project.php?id=$id'>$MSG_CONTEST $MSG_PASSWORD:<input class=input-mini type=password name=password><input class=btn type=submit></form>";
				require("template/".$OJ_TEMPLATE."/error.php");
				exit(0);
			}
	}
	$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
	 $id=intval($_GET['id']);
	 
	 $sql="select * from tblproject where user_id= ? and project_id= ?";	
	 $result=pdo_query($sql,$user,$id);
	 $flag=$result;
	 if(empty($flag))
	 {
		 $projectsub=false;
		 $sqls="select * from users where user_id= ?";
		 $results=pdo_query($sqls,$user);
	     $row=$results[0];
		 $nick=$row["nick"];
		 $school=$row["school"];

		 
	 }
	 else{
		 $projectsub=true;
	 }
	 
/////////////////////////Template
	require("template/".$OJ_TEMPLATE."/project.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
