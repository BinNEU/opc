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

	$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
	$id=intval($_GET['id']);
	$sql="SELECT Count(tblscore.score_id) as c FROM tblscore WHERE tblscore.pingshen_id=? AND tblscore.project_id=?";
	$result=pdo_query($sql,$user,$id);	 
	$row=$result[0];
	$count=intval($row["c"]);
	if($count>=5)
	{
		$view_errors= "您已完成所有互评作业";
	    require("template/".$OJ_TEMPLATE."/error.php");
	    exit(0);
	}
	$count=$count+1;
	
	$good=$_GET['good'];
	if($good=="good")
	{
		 $sql="SELECT
tblproject.work_id,
tblproject.user_id,
tblproject.project_id,
tblproject.file,
tblproject.filename,
tblscore.sum
FROM
tblproject,tblscore
WHERE
tblproject.work_id IN ((SELECT tblscore.work_id FROM tblscore WHERE tblscore.pingshen_id <> ? AND tblscore.project_id = ? ORDER BY tblscore.sum DESC)) AND
tblproject.work_id NOT IN ((SELECT tblscore.work_id FROM tblscore WHERE tblscore.pingshen_id = ? AND tblscore.project_id = ?)) AND
tblproject.user_id <> ? AND
tblproject.project_id = ? AND tblproject.work_id=tblscore.work_id
ORDER BY 
tblscore.sum DESC
";
		 $result=pdo_query($sql,$user,$id,$user,$id,$user,$id);	 
	     $flag=$result;
	     $row=$result[0];
		 if($row)
		 {
			
			$work_id=$row["work_id"];
			$user_id=$row["user_id"];
			$project_id=$row["project_id"];
			$file=$row["file"];
	        $filename=$row["filename"];

		 }
		 else{
				 $sql="SELECT
tblproject.work_id,
tblproject.user_id,
tblproject.user_name,
tblproject.class,
tblproject.school,
tblproject.project_id,
tblproject.file,
tblproject.filename
FROM
tblproject
WHERE
tblproject.user_id <> ? AND
tblproject.work_id NOT IN ((SELECT
tblscore.work_id
FROM
tblscore
WHERE
tblscore.pingshen_id = ?)) AND
tblproject.project_id = ?
ORDER BY
rand() 
LIMIT 1
";
		 $result=pdo_query($sql,$user,$user,$id);	 
	     $row=$result[0];
	     $work_id=$row["work_id"];
		 $user_id=$row["user_id"];
		 $project_id=$row["project_id"];
		 $file=$row["file"];
	     $filename=$row["filename"];
		 }

	}else{
		 $sql="SELECT
tblproject.work_id,
tblproject.user_id,
tblproject.user_name,
tblproject.class,
tblproject.school,
tblproject.project_id,
tblproject.file,
tblproject.filename
FROM
tblproject
WHERE
tblproject.user_id <> ? AND
tblproject.work_id NOT IN ((SELECT
tblscore.work_id
FROM
tblscore
WHERE
tblscore.pingshen_id = ?)) AND
tblproject.project_id = ?
ORDER BY
rand() 
LIMIT 1
";
		 $result=pdo_query($sql,$user,$user,$id);	 
	     $row=$result[0];
	     $work_id=$row["work_id"];
		 $user_id=$row["user_id"];
		 $project_id=$row["project_id"];
		 $file=$row["file"];
	     $filename=$row["filename"];
	}
if(isset($_POST['score1']))
	{
			$score1=intval($_POST['score1']);
			$score2=intval($_POST['score2']);
			$score3=intval($_POST['score3']);
			$score4=intval($_POST['score4']);
			$score5=intval($_POST['score5']);
			$score6=intval($_POST['score6']);
			$pingyu=$_POST['pingyu'];
			 if (get_magic_quotes_gpc ()){
                $pingyu = stripslashes ($pingyu);

        }
		
            $sum=$score1+$score2+$score3+$score4+$score5+$score6;
         $sql="insert INTO `tblscore`(`user_id`,`pingshen_id`,`work_id`,`project_id`,`score1`,`score2`,`score3`,`score4`,`score5`,`score6`,`sum`,`pingyu`)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	$score_id=pdo_query($sql,$user_id,$user,$work_id,$project_id,$score1,$score2,$score3,$score4,$score5,$score6,$sum,$pingyu) ;
	echo "<script language='JavaScript'>;alert('提交成功');location.href='./projectlist.php';</script>;";
	}
/////////////////////////Template
	require("template/".$OJ_TEMPLATE."/score.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
