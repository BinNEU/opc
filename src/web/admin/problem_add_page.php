<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>New Problem</title>

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
<form method=POST action=problem_add.php>
<input type=hidden name=problem_id value="New Problem">
<p align=left><?php echo $MSG_TITLE?>:<input class="input input-xxlarge" type=text name=title size=71></p>
<p align=left><?php echo $MSG_Time_Limit?>:<input class="input input-mini" type=text name=time_limit size=20 value=1>S
<?php echo $MSG_Memory_Limit?>:<input class="input input-mini" type=text name=memory_limit size=20 value=128>MByte</p>
<p align=left><?php echo $MSG_Description?>:<br>
<textarea class="kindeditor" rows=13 name=description cols=80></textarea>

</p>

<p align=left><?php echo $MSG_Input?>:<br>
<textarea  class="kindeditor" rows=13 name=input cols=80></textarea>

</p>

</p>
<p align=left><?php echo $MSG_Output?><br>
<textarea  class="kindeditor" rows=13 name=output cols=80></textarea>



</p>
<p align=left><?php echo $MSG_Sample_Input?><textarea  class="input input-large"  rows=13 name=sample_input cols=40></textarea>
              <?php echo $MSG_Sample_Output?><textarea  class="input input-large"  rows=13 name=sample_output cols=40></textarea></p>
<p align=left><?php echo $MSG_Test_Input?><textarea  class="input input-large" rows=13 name=test_input cols=40></textarea>
              <?php echo $MSG_Test_Output?><textarea  class="input input-large"  rows=13 name=test_output cols=40></textarea></p>
<p align=left><?php echo $MSG_HELP_MORE_TESTDATA_LATER?></p>
<p align=left><?php echo $MSG_HINT?>:<br>
<textarea class="kindeditor" rows=13 name=hint cols=80></textarea>
</p>
<input type="button" value="添加主函数" id="btn20" />
<div id="dv" style='display:none;'><p align=left>规定的主函数:（如要求规定的主函数，请填写该栏，没有要求请勿填写！！！输入法切换至英文！！）<br></p>
<p>主函数<textarea id="fname"  class="input input-large" rows=13 name=zhuhanshu cols=80></textarea>
参考样例
<?php 
$sql="SELECT code FROM problem WHERE problem_id=1527";
$result=pdo_query($sql);
$row=$result[0];
echo "<textarea  class='input input-large'  readonly rows=13 cols=40>".$row['code']."</textarea>";
?>

</p></div>
        <script type="text/javascript">
            //凡是css中这个属性是对个单词的写法,在jsDOM操作的时候,把-去掉,
            //后面单词的首字母大写即可.比如:background-color 写成 backgroundColor
            function my$(id) {
                return document.getElementById(id);
            }
            my$("btn20").onclick=function(){
                if(this.value=="关闭"){
                    my$("dv").style.display="none";
                    this.value="添加主函数";
                }else if(this.value=="添加主函数"){
                    my$("dv").style.display="block";
                    this.value="关闭";
                }
            };
            
        </script>
		<input type="button" value="补全代码" id="btn201" />
<div id="dv2" style='display:none;'><p align=left>规定的代码:（如要求补全代码，请填写该栏，没有要求请勿填写！！！输入法切换至英文！！）<br></p>
<p><textarea id="fname"  class="input input-large" rows=13 name=hanshu cols=80></textarea>
参考样例
<?php 
$sql="SELECT * FROM problem WHERE problem_id=1573";
$result=pdo_query($sql);
$row=$result[0];
echo "<textarea  class='input input-large'  readonly rows=13 cols=40>".$row['code']."</textarea><br>";
?>
//这里是空缺需要学生补全的代码！//这里是空缺需要学生补全的代码！//这里是空缺需要学生补全的代码！//这里是空缺需要学生补全的代码！<br>
<textarea id="fname" class="input input-large" rows=13 name=buquan cols=80></textarea>
参考样例
<?php 
$sql="SELECT * FROM problem WHERE problem_id=1573";
$result=pdo_query($sql);
$row=$result[0];
echo "<textarea  class='input input-large'  readonly rows=13 cols=40>".$row['code2']."</textarea><br>";
?>
</p></div>
        <script type="text/javascript">
            //凡是css中这个属性是对个单词的写法,在jsDOM操作的时候,把-去掉,
            //后面单词的首字母大写即可.比如:background-color 写成 backgroundColor
            function my$(id) {
                return document.getElementById(id);
            }
            my$("btn201").onclick=function(){
                if(this.value=="关闭"){
                    my$("dv2").style.display="none";
                    this.value="补全代码";
                }else if(this.value=="补全代码"){
                    my$("dv2").style.display="block";
                    this.value="关闭";
                }
            };
            
        </script>
<p><?php echo $MSG_SPJ?>: N<input type=radio name=spj value='0' checked>Y<input type=radio name=spj value='1'>
 <?php echo $MSG_HELP_SPJ?>
</p>
<p align=left><?php echo $MSG_Source?>:
<input list="sources" name=source>
<datalist  id="sources">
<?php

 $sql="SELECT `course` FROM `course`,`users` WHERE course.school=users.school and users.user_id=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
echo "<option value=''>下拉选择课程</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['course']}' >{$row['course']}</option>";
	}
}
?>
</datalist>
第<select style="width:50px;" name=week><?php for($x=1; $x<=20; $x++) {echo "<option value='{$x}' >{$x}</option>";}?></select>周

</p>
<p align=left><?php echo $MSG_CONTEST?>:
	<select  name=contest_id>
<?php

 $sql="SELECT `contest_id`,`title` FROM `contest` WHERE `start_time`>NOW() order by `contest_id`";
$result=pdo_query($sql);
echo "<option value=''>none</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['contest_id']}'>{$row['contest_id']} {$row['title']}</option>";
	}
}
?>
	</select>
</p>
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
<p align=left>知识点:
<input list="points" name=point>
<datalist  id="points">
<?php

 $sql="SELECT `point` FROM `point`";
$result=pdo_query($sql);
echo "<option value=''>下拉选择知识点</option>";
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
<?php require_once("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>
</div>



</body></html>

