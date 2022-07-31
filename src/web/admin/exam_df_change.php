<?php require_once("admin-header.php");
require_once("../include/check_get_key.php");
$eid=intval($_GET['eid']);
if(!(isset($_SESSION[$OJ_NAME.'_'."m$cid"])||isset($_SESSION[$OJ_NAME.'_'.'administrator']))) exit();
$sql="select `defunct` FROM `exam` WHERE `exam_id`=?";
$result=pdo_query($sql,$eid);
$num=count($result);
if ($num<1){
	
	echo "No Such Exam!";
	require_once("../oj-footer.php");
	exit(0);
}
$row=$result[0];
if ($row[0]=='N') 
	$sql="UPDATE `exam` SET `defunct`='Y' WHERE `exam_id`=?";
else 
	$sql="UPDATE `exam` SET `defunct`='N' WHERE `exam_id`=?";
pdo_query($sql,$eid);
?>
<script language=javascript>
	self.location=document.referrer;
</script>

