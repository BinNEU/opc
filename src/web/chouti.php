 <?php
 	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');
 	 if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

	$view_errors= "<a href=loginpage.php>$MSG_Login</a>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
//	$_SESSION[$OJ_NAME.'_'.'user_id']="Guest";
}
 $user=$_SESSION[$OJ_NAME.'_'.'user_id'];
 $id=$_POST["id"];
 echo $user;
 echo $id;
 $sql="select * from tblexam where user_id= ? and exam_id= ?";
 $result=pdo_query($sql,$user,$id);
 $flag=$result;
 if(empty($flag))
	 {
		 $sqls="SELECT exam_problem.contest_id,exam_problem.exam_id,exam_problem.title,exam_problem.num FROM exam_problem WHERE exam_id=? ORDER BY RAND() LIMIT 1";
		 $result=pdo_query($sqls,$id);
		 $row=$result[0];
		 $contest_id=$row["contest_id"];
		 $sqls="select * from users where user_id= ?";
		 $results=pdo_query($sqls,$user);
	     $row=$results[0];
		 $name=$row["name"];
		 $class=$row["class"];
		 $school=$row["school"];
		 $sql="insert INTO `tblexam`(`user_id`,`user_name`,`class`,`school`,`contest_id`,`exam_id`) VALUES(?,?,?,?,?,?)";
		 pdo_query($sql,$user,$name,$class,$school,$contest_id,$id);
		 header("location:contest.php?cid=$contest_id&eid=$id");
	 }
	 else{
		  $row=$result[0];
		  $contest_id=$row["contest_id"];
		  header("location:contest.php?cid=$contest_id&eid=$id");
	 }
	 
/////////////////////////Template
?>
