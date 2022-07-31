<?php require_once("admin-header.php");
require_once("../include/check_get_key.php");
$cid=$_GET['cid'];
$sql="delete from test where user_id =?";
pdo_query($sql,$cid);
?>
<script language=javascript>
	self.location=document.referrer;
</script>

