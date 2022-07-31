<?php require_once("admin-header.php");

	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>NEUOPC管理系统</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
	</head>
	<body>
		<div class="main-layout" id='main-layout'>
			<!--侧边栏-->
			<div class="main-layout-side">
				<div class="m-logo">
				</div>
				<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
				  <li class="layui-nav-item layui-nav-itemed">
				    <a href="../status.php"><i class="iconfont">&#xe607;</i>返回前台</a>
				  </li>
				  <?php if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
	?>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe608;</i>新闻管理</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="news_list.php" data-id='3' data-text="新闻列表"><span class="l-line"></span>新闻列表</a></dd>
				      <dd><a href="javascript:;" data-url="news_add_page.php" data-id='9' data-text="添加新闻"><span class="l-line"></span>添加新闻</a></dd>
				    </dl>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;" data-url="user_list.php" data-id='5' data-text="用户列表"><i class="iconfont">&#xe606;</i>用户列表</a>
				  </li>
				  				  
				  <?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
?>                 				 
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe608;</i>课程管理</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="addcoursepage.php" data-id='55' data-text="添加课程"><span class="l-line"></span>添加课程</a></dd>
				      <dd><a href="javascript:;" data-url="courselist.php" data-id='57' data-text="课程列表"><span class="l-line"></span>课程列表</a></dd>
				    </dl>
				  </li> 
				  				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe608;</i>作业管理</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="addprojectpage.php" data-id='65' data-text="添加作业"><span class="l-line"></span>添加作业</a></dd>
				      <dd><a href="javascript:;" data-url="projectlist.php" data-id='67' data-text="作业列表"><span class="l-line"></span>作业列表</a></dd>
				    </dl>
				  </li> 
				  <li class="layui-nav-item">
				    <a href="javascript:;" data-url="addstudentpage.php" data-id='56' data-text="添加学生"><i class="iconfont">&#xe606;</i>添加学生</a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe604;</i>问题管理</a>
					<dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="problem_add_page.php" data-id='13' data-text="添加问题"><span class="l-line"></span>添加问题</a></dd>
				      <dd><a href="javascript:;" data-url="error.php" data-id='19' data-text="导入问题"><span class="l-line"></span>导入问题</a></dd>
		
		<?php }
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
?>			  
					  <dd><a href="javascript:;" data-url="problem_list.php" data-id='29' data-text="问题列表"><span class="l-line"></span>问题列表</a></dd>
				    </dl>
				  </li>
				  		          <li class="layui-nav-item">
				    <a href="javascript:;" data-url="shuju.php" data-id='555' data-text="数据管理"><i class="iconfont">&#xe606;</i>数据管理</a>
					
				  </li>
				  <li class="layui-nav-item">
				   <a href="javascript:;" data-url="week.php" data-id='5551' data-text="每周汇总"><i class="iconfont">&#xe606;</i>每周汇总</a>
				  </li>
				  <?php } ?>
				  <?php 
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])){
?>	
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe608;</i>竞赛管理</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="contest_add.php" data-id='23' data-text="添加竞赛"><span class="l-line"></span>添加竞赛</a></dd>
				      <dd><a href="javascript:;" data-url="contest_list.php" data-id='39' data-text="竞赛列表"><span class="l-line"></span>竞赛列表</a></dd>
					  <dd><a href="javascript:;" data-url="exam_list.php" data-id='3999' data-text="试卷列表"><span class="l-line"></span>试卷列表</a></dd>
				    </dl>
				  </li>
				  				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe608;</i>考试管理</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="exam_add.php" data-id='233' data-text="添加考试"><span class="l-line"></span>添加考试</a></dd>
				      <dd><a href="javascript:;" data-url="examlist.php" data-id='399' data-text="考试列表"><span class="l-line"></span>考试列表</a></dd>
				    </dl>
				  </li>
				  <?php } ?>
				 <?php if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
	?>  
				  <li class="layui-nav-item layui-nav-itemed">
				    <a a href="javascript:;" data-url="team_generate.php" data-id='30' data-text="比赛队账号生成器表"><i class="iconfont">&#xe607;</i>比赛队账号生成器</a>
				  </li>
				  <?php } ?>
				  <?php 
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset( $_SESSION[$OJ_NAME.'_'.'password_setter'] )){
?>
				   <li class="layui-nav-item">
				    <a href="javascript:;" data-url="changepass.php" data-id='49' data-text="修改密码"><i class="iconfont">&#xe60a;</i>修改密码</a>
				  </li>
				    <?php } ?>
					
				<?php 
if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?>
				   <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe60c;</i>权限管理</a>
					<dl class="layui-nav-child">
					<dd><a href="javascript:;" data-url="privilege_add.php" data-id='111' data-text="添加权限"><span class="l-line"></span>添加权限</a></dd>
				    <dd><a href="javascript:;" data-url="privilege_list.php" data-id='112' data-text="权限列表"><span class="l-line"></span>权限列表</a></dd>
				  </dl>
				  </li>

				  <li class="layui-nav-item">
				    <a href="javascript:;" data-url="rejudge.php" data-id='4' data-text="重判题目"><i class="iconfont">&#xe60d;</i>重判题目</a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe600;</i>备份管理</a>
					<dl class="layui-nav-child">
					<dd><a href="javascript:;" data-url="source_give.php" data-id='113' data-text="转移源码"><span class="l-line"></span>转移源码</a></dd>
				    <dd><a href="javascript:;" data-url="problem_export.php" data-id='114' data-text="导出问题"><span class="l-line"></span>导出问题</a></dd>
				    <dd><a href="javascript:;" data-url="problem_import.php" data-id='115' data-text="导入问题"><span class="l-line"></span>导入问题</a></dd>
				  </dl>
				  </li>
				  
				  <li class="layui-nav-item">
				  	<a href="javascript:;" data-url="update_db.php" data-id='6' data-text="更新数据库"><i class="iconfont">&#xe60b;</i>更新数据库</a>
				  </li>
				  <?php } ?>
				</ul>
			</div>
			<!--右侧内容-->
			<div class="main-layout-container">
				<!--头部-->
				<div class="main-layout-header">
					<div class="menu-btn" id="hideBtn">
						<a href="javascript:;">
							<span class="iconfont">&#xe60e;</span>
						</a>
					</div>
					<ul class="layui-nav" lay-filter="rightNav">
					  <li class="layui-nav-item">
					  
					  <li class="layui-nav-item">     <div id="CurrentTime"></div>
 </li>
					  <li class="layui-nav-item"><a href="../logout.php">退出</a></li>
					</ul>
				</div>
				<!--主体内容-->
				<div class="main-layout-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
					  <ul class="layui-tab-title">
					    <li class="layui-this welcome">后台主页</li>
					  </ul>
					  <div class="layui-tab-content">
					    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
					    	<!--1-->
					    	<iframe src="welcome.php" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe>
					    	<!--1end-->
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<!--遮罩-->
			<div class="main-mask">
				
			</div>
		</div>
		<script type="text/javascript">
			var scope={
				link:'./welcome.html'
			}
		</script>
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
		<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="../static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="../static/admin/js/main.js" type="text/javascript" charset="utf-8"></script>
		
	</body>
</html>
