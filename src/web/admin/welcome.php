<?php
require_once("../include/db_info.inc.php");
;?>
<!--<script>
    $("document").ready(function (){
        $("form").append("<div id='csrf' />");
        $("#csrf").load("../csrf.php");
    });

</script>-->
<?php if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||
			isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||
			isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please login with an administrator account first!</a>";
	exit(1);
}
if(file_exists("../lang/$OJ_LANG.php")) require_once("../lang/$OJ_LANG.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>网站后台管理</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
	</head>
	<body>
		<div class="wrap-container welcome-container">
			<div class="row">
				<div class="welcome-left-container col-lg-9">
					<div class="data-show">
						<ul class="clearfix">
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a class="clearfix">
									<div class="icon-bg bg-org f-l">
										<span class="iconfont">&#xe606;</span>
									</div>
									<div class="right-text-con">
										<p class="name">用户数</p>
																<?php 
						$sql="SELECT count(1) c FROM users";
						$user=pdo_query($sql);
						$row=$user[0];
						?>
										<p><span class="color-org"><?php echo $row['c'] ?></span>数据<span class="iconfont">&#xe628;</span></p>
									</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-blue f-l">
										<span class="iconfont">&#xe602;</span>
									</div>
									<div class="right-text-con">
										<p class="name">题目数</p>
										<?php 
						$sql="SELECT count(1) c FROM problem";
						$problem=pdo_query($sql);
						$row=$problem[0];
						?>
										<p><span class="color-blue"><?php echo $row['c'] ?></span>数据<span class="iconfont">&#xe628;</span></p>
									</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-green f-l">
										<span class="iconfont">&#xe628;</span>
									</div>
									<div class="right-text-con">
										<p class="name">提交数</p>
												<?php 
						$sql="SELECT count(1) c FROM solution";
						$problem=pdo_query($sql);
						$row=$problem[0];
						?>
										<p><span class="color-green"><?php echo $row['c'] ?></span>数据<span class="iconfont">&#xe628;</span></p>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<!--图表-->
					<div class="chart-panel panel panel-default">
						<div class="panel-body" id="echarts" style="height: 376px;"></div>
						<?php 
						$sql="SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) c,count(if(result=4,true,null)) as ac FROM (select * from solution order by solution_id desc limit 10000) solution  where result<13 group by md order by md asc limit 200";
						$result2=pdo_query($sql);
						?>
					</div>
					<!--服务器信息-->
					<div class="server-panel panel panel-default">
						<div class="panel-header">服务器信息</div>
						<div class="panel-body clearfix">
							<div class="col-md-2">
								<p class="title">服务器环境</p>
								<span class="info">Apache/2.4.4 (Win32) PHP/5.4.16</span>
							</div>
							<div class="col-md-2">
								<p class="title">服务器IP地址</p>
								<span class="info">127.0.0.1   </span>
							</div>
							<div class="col-md-2">
								<p class="title">服务器域名</p>
								<span class="info">localhost </span>
							</div>
							<div class="col-md-2">
								<p class="title"> PHP版本</p>
								<span class="info">5.4.16</span>
							</div>
							<div class="col-md-2">
								<p class="title">数据库信息</p>
								<span class="info">5.6.12-log </span>
							</div>
							<div class="col-md-2">
								<p class="title">服务器当前时间</p>
								<span class="info"> <div id="CurrentTime"></div></span>
							</div>
						</div>
					</div>
				</div>
				<div class="welcome-edge col-lg-3">
										<div class="panel panel-default contact-panel">
						<div class="panel-header">更新通知</div>
						<div class="panel-body">
							<p>1、添加课程之后可以在添加问题界面直接选择课程不必手工输入。</p>
							<p>2、新增添加学生功能，教师可在该模块注册新学生信息。目前只支持手工添加，暂未支持批量导入。</p>
							<!--<p></p>-->
						</div>
					</div>				
					<div class="panel panel-default comment-panel">
						<div class="panel-header">功能解释</div>
						<div class="panel-body">
							<div class="commentbox">
								<ul class="commentList">
								  <li>
		<b><?php echo $MSG_SEEOJ?>：</b><?php echo $MSG_HELP_SEEOJ?>
<?php if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
	?>
	<li>
		<b><?php echo $MSG_ADD.$MSG_NEWS?>：</b><?php echo $MSG_HELP_ADD_NEWS?>
	<li>
	    <b><?php echo $MSG_NEWS.$MSG_LIST?>：</b><?php echo $MSG_HELP_NEWS_LIST?>	
	<li>
	<b><?php echo $MSG_USER.$MSG_LIST?>：</b><?php echo $MSG_HELP_USER_LIST?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
?>
	<li>
		<b><?php echo $MSG_ADD.$MSG_PROBLEM?>：</b><?php echo $MSG_HELP_ADD_PROBLEM?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
?>
	<li>
		<b><?php echo $MSG_cong.$MSG_IMPORT.$MSG_PROBLEM?>：</b><?php echo $MSG_HELP_ADD_NEWPROBLEM?>

<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
?>
	<li>
		<b><?php echo $MSG_PROBLEM.$MSG_LIST?>：</b><?php echo $MSG_HELP_PROBLEM_LIST?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])){
?>		
<li>
	<b><?php echo $MSG_ADD.$MSG_CONTEST?>：</b></a><?php echo $MSG_HELP_ADD_CONTEST?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])){
?>
<li>
	<b><?php echo $MSG_CONTEST.$MSG_LIST?>：</b></a><?php echo $MSG_HELP_CONTEST_LIST?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?>
<li>
	<b><?php echo $MSG_TEAMGENERATOR?>：</b></a><?php echo $MSG_HELP_TEAMGENERATOR?>

<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset( $_SESSION[$OJ_NAME.'_'.'password_setter'] )){
?><li>
	<b><?php echo $MSG_SETPASSWORD?>：</b></a><?php echo $MSG_HELP_SETPASSWORD?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_REJUDGE?>：</b></a><?php echo $MSG_HELP_REJUDGE?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_ADD.$MSG_PRIVILEGE?>：</b></a><?php echo $MSG_HELP_ADD_PRIVILEGE?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_PRIVILEGE.$MSG_LIST?>：</b></a><?php echo $MSG_HELP_PRIVILEGE_LIST?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_GIVESOURCE?>：</b></a><?php echo $MSG_HELP_GIVESOURCE?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_EXPORT.$MSG_PROBLEM?>：</b></a><?php echo $MSG_HELP_EXPORT_PROBLEM?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_IMPORT.$MSG_PROBLEM?>：</b></a><?php echo $MSG_HELP_IMPORT_PROBLEM?>
<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><li>
	<b><?php echo $MSG_UPDATE_DATABASE?>：</b></a><?php echo $MSG_HELP_UPDATE_DATABASE?>
<?php }
if (isset($OJ_ONLINE)&&$OJ_ONLINE){
?><li>
	<b><?php echo $MSG_ONLINE?>：</b></a><?php echo $MSG_HELP_ONLINE?>
<?php }
?>
								</ul>
							</div>
							<div id="pagesbox" style="text-align: center;padding-top: 5px;">
								
							</div>
						</div>
					</div>
					<!--联系-->
					
					<div class="panel panel-default contact-panel">
						<div class="panel-header">联系我们</div>
						<div class="panel-body">
							<p>邮箱  <i class="iconfont">&#xe603;</i>：yansheng1117@foxmail.com</p>
							<!--<p></p>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script>
    <?php
	  //输送classConfig
	  echo "classConfig='".$class_data."';\n";
	  echo "pdoData='".addslashes(json_encode($results))."';\n";
	  echo "Data='".addslashes(json_encode($result2))."';\n";
	?>
	</script>
				<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="../static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="../static/admin/js/main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../static/admin/lib/echarts/echarts.min.js"></script>
	<script type="text/javascript" src="../static/admin/lib/echarts/analysis.js"></script>	
		    <script type="text/javascript">
		function changetime(){
			var ary = Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
			var Timehtml = document.getElementById('CurrentTime');
			var date = new Date();
			Timehtml.innerHTML = ''+date.toLocaleString()+'   '+ary[date.getDay()];
		}
		window.onload = function(){
			changetime();
			setInterval(changetime,1000);	
		}
    </script>
	</body>
</html>
