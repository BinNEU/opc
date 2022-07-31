<?php
require_once("../include/db_info.inc.php");
;?>

<?php if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||
			isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||
			isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please login with an administrator account first!</a>";
	exit(1);
}
if(file_exists("../lang/$OJ_LANG.php")) require_once("../lang/$OJ_LANG.php");

$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `school` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$school=$row['school'];}
$sql="select DISTINCT class from users where school='$school' order by convert(class using gbk)  asc";
$result=pdo_query($sql);//mysql_escape_string($sql));
$class=array();
foreach ($result as $row){
	$cate=explode(" ",$row['class']);
	foreach($cate as $cat){
		array_push($class,trim($cat));	
		}
	}
$class=array_unique($class);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>班级选择</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
	</head>
	<body>
		<div>
		<div id="demo1" class="xm-select-demo-alert"></div>
		<button class="layui-btn layui-btn-primary" id="transmit">给父页面传值</button>
	</div>
			<script type="text/javascript" src="../static/admin/lib/echarts/echarts.min.js"></script>
	<script type="text/javascript" src="../static/admin/lib/echarts/analysis.js"></script>	
	<script src="../static/admin/layui/layui2.js" type="text/javascript" charset="utf-8"></script>
	<script src="../static/admin/layui/xm-select.js" type="text/javascript" charset="utf-8"></script>
  <script>
var demo1 = xmSelect.render({
	el: '#demo1', 
	tips: '搜索选择班级',
	filterable: true,
	autoRow: true,
	
	data: [
<?php 
	foreach ($class as $cat){
                    if(trim($cat)=="") continue;
					$my_class2.= "{name: '".$cat."', value: '".$cat."'},";
                }	
				echo $my_class2	;
	?>
	]
})
</script>
   <script>
   layui.use(['form', 'layedit', 'laydate','element','jquery'], function() {
	   var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
var form = layui.form,
layer = layui.layer,
element=layui.element,
$=layui.jquery;
$(document).on('click',"#transmit",function(){
		parent.layer.tips("11", '#demo1-btn', {time: 5000});
        parent.layer.close(index+1);
 });
});


</script>
				

	</body>
	
</html>
