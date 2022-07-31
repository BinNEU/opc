<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>打卡授权</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
</head>
<body leftmargin="30" >
<script language="javascript">
function copyob1toob2(){
    document.all["ob_text_2"].value=document.all["ob_text_1"].value
}
</script>
<div class="container">
<br><br>
<?php require_once("../include/db_info.inc.php");?>
<?php require_once("admin-header.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php
include_once("kindeditor.php") ;
?>

<br>
添加授权：
<form method=POST action=shouquan.php>
<p align=left>学号:<input class="input input-xxlarge" type=text name=user_id size=71></p>

<div align=center>
<?php require_once("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
已授权账户：
<?php
     $sql="select * from test order by id desc";
	 $result=pdo_query($sql);
echo "<center><div class='layui-form'><table class='layui-table' lay-even lay-skin='nob'>";
echo "<thead><tr><td>序号<td>学号<td>状态<td>解除授权";
echo "</tr></thead>";
foreach($result as $row){
        echo "<tr>";
		echo "<td>".$row['id']."</a>";
        echo "<td><a href='../userinfo.php?user=".$row['user_id']."'>".$row['user_id']."</a>";
        $cid=$row['user_id'];
        echo "<td><span class='layui-btn layui-btn-mini layui-btn-normal table-list-status'>已授权</span>";
		echo "<td><a href=shouquan_df.php?cid=".$row['user_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey']."><span class='layui-btn layui-btn-mini layui-btn-warm table-list-status'>解除授权</span></a>";
        echo "</tr>";
}
echo "</table></div></center>";
require("../oj-footer.php");
?>

</div>
</body></html>

