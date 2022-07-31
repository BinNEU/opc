<?php
$cur_path = "template/$OJ_TEMPLATE/";
$url=basename($_SERVER['REQUEST_URI']);
$dir=basename(getcwd());
if($dir=="discuss3") $path_fix="../";
else $path_fix="";
if(isset($OJ_NEED_LOGIN)&&$OJ_NEED_LOGIN&&(
        $url!='loginpage.php'&&
        $url!='lostpassword.php'&&
        $url!='lostpassword2.php'&&
        $url!='registerpage.php'
    ) && !isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

    header("location:".$path_fix."loginpage.php");
    exit();
}

if($OJ_ONLINE){
    require_once($path_fix.'include/online.php');
    $on = new online();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yansheng">
  <meta http-equiv="Cache-Control" content="o-transform">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="csrf-token" content="1483758872##fd2cac389b2b7c009a744bcaecaa41d71592cfe8">
	<meta baidu-gxt-verify-token="911cf34dd52e180f5f8bc155f4d8c807">	
        <title><?php echo $OJ_NAME?></title>
		
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../favicon.ico">
<link rel="stylesheet" href="<?php echo $cur_path?>css/css/style.css">

</head>
<body>

<div class="about">
   <a class="bg_links social portfolio" href="http://wpa.qq.com/msgrd?v=3&uin=851921629&site=qq&menu=yes">
      <span class="icon"></span>
   </a>
   <a class="bg_links social dribbble" href="http://weibo.cn/yansheng1995">
      <span class="icon"></span>
   </a>
   <a class="bg_links social linkedin" href="#">
      <span class="icon">	</span>
   </a>
   <a class="bg_links logo"></a>
</div>

<nav>
	<div class="menu">
		<p class="website_name">东北大学在线编程社区</p>
		
	</div>

</nav>

<section class="wrapper">

	<div class="container">

		<div id="scene" class="scene" data-hover-only="false">


			<div class="circle" data-depth="1.2"></div>

			<div class="one" data-depth="0.9">
				<div class="content">
					<span class="piece"></span>
					<span class="piece"></span>
					<span class="piece"></span>
				</div>
			</div>

			<div class="two" data-depth="0.60">
				<div class="content">
					<span class="piece"></span>
					<span class="piece"></span>
					<span class="piece"></span>
				</div>
			</div>

			<div class="three" data-depth="0.40">
				<div class="content">
					<span class="piece"></span>
					<span class="piece"></span>
					<span class="piece"></span>
				</div>
			</div>

			<p class="p404" data-depth="0.50">404</p>
			<p class="p404" data-depth="0.10">404</p>

		</div>

		<div class="text">
			<article>
				<p>暂时无法访问<br>
				请稍后再试</p>
			</article>
			
		</div>
	</div>
</section>
<script src='<?php echo $cur_path?>js/js/parallax.min.js'></script>
<script src='<?php echo $cur_path?>js/js/jquery.min.js'></script>
<script src="<?php echo $cur_path?>js/js/script.js"></script>

</body>
</html>