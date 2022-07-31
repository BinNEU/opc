<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Problem</title>
</head>
<body>
<?php require_once("./include/db_info.inc.php");require_once('./include/setlang.php');
if(isset($_GET['id'])){
$problem_id=$_GET['id'];
$sql="SELECT problem.source FROM problem WHERE problem.problem_id = ?";
$result=pdo_query($sql,$problem_id);
$row=$result[0];
$source=$row['source'];

if($source==$_SESSION[$OJ_NAME.'_'.'user_id'])
{}
else{
	echo "<a>您没有该题目的权限</a>";
	exit(1);
}}


?>

<?php
include_once("kindeditor.php") ;
?>
<div class="container">
<?php if(isset($_GET['id'])){
;//	require_once("../include/check_get_key.php");
?>
<form method=POST action=problem_edit.php>
<?php $sql="SELECT * FROM `problem` WHERE `problem_id`=?";
$result=pdo_query($sql,intval($_GET['id']));
 $row=$result[0];
 $rowsss=$result[0];
?>
<p>Problem Id: <?php echo $row['problem_id']?></p>
<input type=hidden name=problem_id value='<?php echo $row['problem_id']?>'>
<p><?php echo $MSG_TITLE?>:<input class="input-xxlarge" type=text name=title value='<?php echo htmlentities($row['title'],ENT_QUOTES,"UTF-8")?>'></p>
<?php echo $MSG_Time_Limit?>:<input class="input-mini" type=text name=time_limit size=20 value='<?php echo $row['time_limit']?>'>S
<?php echo $MSG_Memory_Limit?>:<input class="input-mini" type=text name=memory_limit size=20 value='<?php echo $row['memory_limit']?>'>MByte</p>
<p><?php echo $MSG_Description?>:<br><textarea class="kindeditor" rows=13 name=description cols=120><?php echo htmlentities($row['description'],ENT_QUOTES,"UTF-8")?></textarea></p>
<p><?php echo $MSG_Input?>:<br><textarea class="kindeditor" rows=13 name=input cols=120><?php echo htmlentities($row['input'],ENT_QUOTES,"UTF-8")?></textarea></p>
<p><?php echo $MSG_Output?>:<br><textarea class="kindeditor" rows=13 name=output cols=120><?php echo htmlentities($row['output'],ENT_QUOTES,"UTF-8")?></textarea></p>

<p><?php echo $MSG_Sample_Input?>:<textarea rows=13 name=sample_input cols=120><?php echo htmlentities($row['sample_input'],ENT_QUOTES,"UTF-8")?></textarea></p>
<p><?php echo $MSG_Sample_Output?>:<textarea rows=13 name=sample_output cols=120><?php echo htmlentities($row['sample_output'],ENT_QUOTES,"UTF-8")?></textarea></p>
<p><?php echo $MSG_HINT?>:<br>
<textarea class="kindeditor" rows=13 name=hint cols=120><?php echo htmlentities($row['hint'],ENT_QUOTES,"UTF-8")?></textarea></p>
</p>
<p><?php echo $MSG_SPJ?>: 
N<input type=radio name=spj value='0' <?php echo $row['spj']=="0"?"checked":""?>>
Y<input type=radio name=spj value='1' <?php echo $row['spj']=="1"?"checked":""?>></p>

<p align=left><?php echo $MSG_Source?>:
<input list="source" name=source value='<?php echo htmlentities($rowsss['source'],ENT_QUOTES,"UTF-8")?>'>
<datalist  id="source">
<?php

 $sql="SELECT `course` FROM `course`,`users` WHERE course.school=users.school and user_id=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
echo "<option selected='selected'>{$rowsss['source']}</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['course']}' >{$row['course']}</option>";
	}
}
?>
</datalist>
</p>


<p align=left>学校:
<select  name=school>
<?php

 $sql="SELECT `school` FROM `school`";
$result=pdo_query($sql);
echo "<option selected='selected'>{$rowsss['school']}</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['school']}'>{$row['school']}</option>";
	}
}
?>
	</select>
</p>
<p align=left>知识点:
<input list="points" name=point value='<?php echo htmlentities($rowsss['point'],ENT_QUOTES,"UTF-8")?>'>
<datalist  id="points">
<?php

 $sql="SELECT `point` FROM `point`";
$result=pdo_query($sql);
echo "<option selected='selected'>{$rowsss['point']}</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['point']}' >{$row['point']}</option>";
	}
}
?>
</datalist>
</p>
<div align=center>
<?php require_once("./include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>

<?php }else{
require_once("./include/check_post_key.php");
$id=intval($_POST['problem_id']);
if(!(isset($_SESSION[$OJ_NAME.'_'."p$id"])||isset($_SESSION[$OJ_NAME.'_'.'administrator']))) exit();	
$title=$_POST['title'];
$time_limit=$_POST['time_limit'];
$memory_limit=$_POST['memory_limit'];
$description=$_POST['description'];
$input=$_POST['input'];
$output=$_POST['output'];
$sample_input=$_POST['sample_input'];
$sample_output=$_POST['sample_output'];
$hint=$_POST['hint'];
$source=$_POST['source'];
$spj=$_POST['spj'];
$school=$_POST['school'];
$point=$_POST['point'];
if (get_magic_quotes_gpc ()) {
	$title = stripslashes ( $title);
	$time_limit = stripslashes ( $time_limit);
	$memory_limit = stripslashes ( $memory_limit);
	$description = stripslashes ( $description);
	$input = stripslashes ( $input);
	$output = stripslashes ( $output);
	$sample_input = stripslashes ( $sample_input);
	$sample_output = stripslashes ( $sample_output);
//	$test_input = stripslashes ( $test_input);
//	$test_output = stripslashes ( $test_output);
	$hint = stripslashes ( $hint);
	$source = stripslashes ( $source); 
	$spj = stripslashes ( $spj);
	$source = stripslashes ( $source );
	$school = stripslashes ( $school );
	$point = stripslashes ( $point );
}
$basedir=$OJ_DATA."/$id";
echo "Sample data file in $basedir Updated!<br>";

	if($sample_input&&file_exists($basedir."/sample.in")){
		//mkdir($basedir);
		$fp=fopen($basedir."/sample.in","w");
		fputs($fp,preg_replace("(\r\n)","\n",$sample_input));
		fclose($fp);
		
		$fp=fopen($basedir."/sample.out","w");
		fputs($fp,preg_replace("(\r\n)","\n",$sample_output));
		fclose($fp);
	}

	$spj=intval($spj);
	
$sql="UPDATE `problem` set `title`=?,`time_limit`=?,`memory_limit`=?,
	`description`=?,`input`=?,`output`=?,`sample_input`=?,`sample_output`=?,`hint`=?,`source`=?,`spj`=?,`school`=?,`point`=?,`in_date`=NOW()
	WHERE `problem_id`=?";

@pdo_query($sql,$title,$time_limit,$memory_limit,$description,$input,$output,$sample_input,$sample_output,$hint,$source,$spj,$school,$point,$id) ;


echo "Edit OK!";
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
$sql="SELECT user_id,password,ip,`time` FROM `loginlog` WHERE `user_id`=? order by `time` desc LIMIT 0,10";
$result=pdo_query($sql,$user) ;
$row=$result[0];
$ip = $row['ip'];
$sql="INSERT INTO `operationlog` VALUES(?,'编辑问题',?,?,NOW())";
@pdo_query($sql,$user,$ip,$id) ;

		
echo "<a href='./leitaiproblem.php?id=$id'>See The Problem!</a>";
}
?>
</div>
</body>
</html>

