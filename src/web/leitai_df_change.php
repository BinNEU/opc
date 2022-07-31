<?php
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');
$cid=$_GET['cid'];
$sql="SELECT problem_id,solution_id, result FROM solution WHERE solution.result = 4 AND solution.problem_id=?";
$result=pdo_query($sql,$cid);
$num=count($result);
if ($num<1){
	echo "没有正确的解答!";
	require_once("../oj-footer.php");
	exit(0);
}
else{
	$sql="UPDATE `problem` SET `defunct`='N' WHERE `problem_id`=?";

pdo_query($sql,$cid);
}
?>
<script language=javascript>
	history.go(-1);
</script>

