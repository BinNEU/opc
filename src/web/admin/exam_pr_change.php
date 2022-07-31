<?php require_once("admin-header.php");
require_once("../include/check_get_key.php");
$eid=intval($_GET['eid']);
	if(!(isset($_SESSION[$OJ_NAME.'_'."m$cid"])||isset($_SESSION[$OJ_NAME.'_'.'administrator']))) exit();
$sql="select `private` FROM `exam` WHERE `exam_id`=?";
$result=pdo_query($sql,$eid);
$num=count($result);
if ($num<1){
	echo "No Such Problem!";
	
	exit(0);
}
$row=$result[0];
if (intval($row[0])==0) $sql="UPDATE `exam` SET `private`='1' WHERE `exam_id`=?";
else $sql="UPDATE `exam` SET `private`='0' WHERE `exam_id`=?";

pdo_query($sql,$eid);
?>
<script language=javascript>
	history.go(-1);
</script>

