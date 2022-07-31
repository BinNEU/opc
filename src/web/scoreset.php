<?php 
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');
	
$user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
$problem_id=trim($_POST['pid']);
$score=trim($_POST['score']);
$sql="INSERT INTO problem_score VALUES(?,?,?)";
 
//echo $sql;
//exit(0);
pdo_query($sql,$problem_id,$user_id,$score);

	
	
	
	
	?>
<script language=javascript>
	window.location.href=document.referrer;
</script>