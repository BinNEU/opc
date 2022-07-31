<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加课程</title>
</head>
<body leftmargin="30" >
<div class="container">

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
<form method=POST action=addcourse.php>
<p align=left>学校:
	<select  name=school>
<?php

 $sql="SELECT `school` FROM `school`";
$result=pdo_query($sql);
echo "<option value=''>下拉选择学校</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['school']}'>{$row['school']}</option>";
	}
}
?>
	</select>
</p>
<p align=left>添加课程:<input class="input input-xxlarge" type=text name=course size=71></p>
<div align=center>
<?php require_once("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>
</div>
</body></html>

