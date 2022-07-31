		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>

<?php require("admin-header.php");
        if(isset($OJ_LANG)){
                require_once("../lang/$OJ_LANG.php");
        }
require_once("../include/set_get_key.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])
                ||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])
                ||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])
                )){
        echo "<a href='../loginpage.php'>Please Login First!</a>";
        exit(1);
}
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `school` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$school=$row['school'];}
if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
	$sql=	"select class "
    ."FROM `class` " ;}
else { $sql=	"select class "
."FROM `class` WHERE `school`='$school' and `teacher_id`='$user'" ;}
$result=pdo_query($sql);//mysql_escape_string($sql));
$class=array();
foreach ($result as $row){
	$cate=explode(" ",$row['class']);
	foreach($cate as $cat){
		array_push($class,trim($cat));	
		}
	}
$class=array_unique($class);
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
	$sql=	"select course "
."FROM `course`" ;
}
else{
$sql=	"select course "
."FROM `course` WHERE `school`='$school'" ;}
$result=pdo_query($sql);//mysql_escape_string($sql));
$category=array();
foreach ($result as $row){
	$cate=explode(" ",$row['course']);
	foreach($cate as $cat){
		array_push($category,trim($cat));	
		}
	}
$category=array_unique($category);

if(isset($_GET['shuju']))
	$shuju=$_GET['shuju'];
if(isset($_GET['myclass']))
	$myclass=$_GET['myclass'];
if(isset($_GET['course']))
	$course=$_GET['course'];

echo "<form action=shuju.php>";
if($shuju==1 ){
	$sql="select * from shujujilu where class=? and source=?";
$result=pdo_query($sql,$myclass,$course);
}
else if($shuju==2){
	$sql="select  a.user_id,a.name,a.alls,a.corrs,b.allp,b.corrp from (SELECT
solution.user_id,
users.`name`,
Count(solution.solution_id) AS `alls`,
Count(IF(solution.result=4,1,NULL)) AS corrs
FROM
solution ,
users ,
problem
WHERE
solution.problem_id = problem.problem_id AND
solution.user_id = users.user_id AND
users.class = ? AND
problem.source = ?
GROUP BY
solution.user_id)  a  JOIN 
(SELECT
solution.user_id,
users.`name`,
COUNT(DISTINCT solution.problem_id) AS allp,
COUNT(IF(solution.result=4,1,null)) AS corrp
FROM
solution ,
users ,
problem
WHERE
solution.problem_id = problem.problem_id AND
solution.user_id = users.user_id AND
users.class = ? AND
problem.source = ?
GROUP BY
solution.user_id) b on a.user_id=b.user_id

";
$result=pdo_query($sql,$myclass,$course,$myclass,$course);
}

?>
<select style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' name='shuju'>
<option value=''>选择类型</option>
<?php if($shuju==1)
{
	echo "<option selected='selected'>提交记录</option>";
	} else if($shuju==2)
	{ 
		echo 
		"<option selected='selected'>统计数据</option>";
		}?>
<option value=1>提交记录</option>
<option value=2>统计数据</option>
</select>
<input list="class" placeholder="输入或下拉选择班级" style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' name=myclass>
<datalist  id="class">
<?php 
if(isset($myclass))
	echo "<option selected='selected'>{$myclass}</option>";?>

<?php
foreach ($class as $cat){
                    if(trim($cat)=="") continue;
                    $my_class.= "<option value='$cat'>$cat</option>";
                }	
				echo $my_class	;
?>
</select>
</datalist>
<script type="text/javascript">

                    function mbar(sobj) {
                    var docurl =sobj.options[sobj.selectedIndex].value;
                    if (docurl != "") {
                       open(docurl,'_blank');
                       sobj.selectedIndex=0;
                       sobj.blur();
                    }
                    }

 </script>

<select style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' name='course'>
<option value=''>下拉选择课程</option>
<?php if(isset($course) )echo "<option selected='selected'>{$course}</option>";?>
<?php
foreach ($category as $cat){
                    if(trim($cat)=="") continue;
                    $my_category.= "<option value='$cat'>$cat</option>";
                }	
				echo $my_category	
?>
</select>
<input class="layui-btn layui-btn-normal" type=submit value="<?php echo $MSG_SEARCH?>" >
<div id="myAlert2" class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>提示：</strong>请选择您需要的数据类型。数据提取与打包过程稍长请耐心等待。
</div>
<script>
$(function(){
    $(".close").click(function(){
        $("#myAlert").alert();
        $("#myAlert2").alert();
    });
});
</script>
</form>
<br>
<?php if($shuju==1 ){
echo "<a href='../shuju.xls.php?shuju=$shuju&myclass=$myclass&course=$course' class='layui-btn layui-btn-normal' >下载数据</a>";
echo "<div class='layui-form' id='table-list'><table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead>";
echo "<tr><td>学号<td>姓名<td>班级<td>提交序号<td>题目<td>结果<td>运行时间<td>运行内存<td>提交时间</tr></thead>";

foreach($result as $row){
        echo "<tr>";
		echo "<td>".$row['user_id'];
		echo "<td>".$row['name'];
		echo "<td>".$row['class'];
		echo "<td>".$row['solution_id'];
		echo "<td>".$row['problem_id'];
		if($row['result']==4) echo "<td>"."正确";
		else if($row['result']==5) echo "<td>"."格式错误";
		else if($row['result']==6) echo "<td>"."答案错误";
		else if($row['result']==7) echo "<td>"."时间超限";
		else if($row['result']==8) echo "<td>"."内存超限";
		else if($row['result']==9) echo "<td>"."输出超限";
		else if($row['result']==10) echo "<td>"."运行错误";
		else if($row['result']==11) echo "<td>"."编译错误";
		else if($row['result']==12) echo "<td>"."编译成功";
		else if($row['result']==13) echo "<td>"."运行完成";
		echo "<td>".$row['time'];
		echo "<td>".$row['memory'];
		echo "<td>".$row['in_date'];
        echo "</tr>";
}

echo "</table></div>";}
else if($shuju==2 ){
echo "<a href='../shuju.xls.php?shuju=$shuju&myclass=$myclass&course=$course' class='layui-btn layui-btn-normal' >下载数据</a>";
echo "<div class='layui-form' id='table-list'><table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead>";
echo "<tr><td>学号<td>姓名<td>提交总数<td>提交正确<td>题目提交数<td>题目完成数</tr></thead>";

foreach($result as $row){
        echo "<tr>";
		echo "<td>".$row['user_id'];
		echo "<td>".$row['name'];
		echo "<td>".$row['alls'];
		echo "<td>".$row['corrs'];
		echo "<td>".$row['allp'];
		if($row['allp']<$row['corrp'])
			$row['corrp']=$row['allp'];
		echo "<td>".$row['corrp'];
        echo "</tr>";
}

echo "</table></div>";
}
?>

<script src='../template/bs3/jquery.min.js' ></script>
<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="../static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</div>
