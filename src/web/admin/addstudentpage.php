<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加学生</title>
</head>
<body leftmargin="30" >
<script language="javascript">
function copyob1toob2(){
    document.all["ob_text_2"].value=document.all["ob_text_1"].value
}
</script>
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
<form method=POST action=addstudent.php>
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
<p align=left>学号:<input class="input input-xxlarge" type=text name=user_id size=71></p>
<p align=left>姓名:<input class="input input-xxlarge" id="ob_text_1" type=text name=name size=71 onkeyup="copyob1toob2()"></p>
<p align=left>昵称:<input class="input input-xxlarge" id="ob_text_2" type=text name=nick size=71></p>
<p align=left>班级:
<input list="class" name=class>
<datalist  id="class">
<?php

 $sql="SELECT `class` FROM `users`";
$result=pdo_query($sql);
echo "<option value=''>下拉选择班级</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['class']}' >{$row['class']}</option>";
	}
}
?>
</datalist>
</p>
<p align=left>年级:	<input list="grade" name=grade>
<datalist  id="grade">
<?php

 $sql="SELECT `grade` FROM `users`";
$result=pdo_query($sql);
echo "<option value=''>下拉选择</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['grade']}' >{$row['grade']}</option>";
	}
}
?>
</datalist></p>
<p align=left>邮箱:<input class="input input-xxlarge" type=text name=email size=71></p>
<p align=left>密码:
	<select  name=password>
<?php

 $sql="SELECT `password`,`name` FROM `password`";
$result=pdo_query($sql);
echo "<option value=''>下拉选择default</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['password']}'>{$row['name']}</option>";
	}
}
?>
	</select>
</p>
<div align=center>
<?php require_once("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>
</div>
</body></html>

