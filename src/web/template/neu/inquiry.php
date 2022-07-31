<?php
$cur_path = "template/$OJ_TEMPLATE/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="<?php echo $cur_path?>css/ui.css">
  <link rel="stylesheet" href="<?php echo $cur_path?>css/ui.progress-bar.css">
  <link media="only screen and (max-device-width: 480px)" href="<?php echo $cur_path?>css/ios.css" type="text/css" rel="stylesheet" />
<title>报告生成</title>
</head>
<style>
button {
    width: 210px;
    height: 50px;
    border: none;
    background-color: black;
    font-size: 23px;
    font-weight: 500px;
    letter-spacing: 1px;
    text-transform: uppercase;
    cursor: pointer;
    outline: none;
    position: relative;
    transition: 0.6s;
    overflow: hidden;
	border-radius:25px;
}

button:first-child {
    color: #2a468c;
    border: 1px solid #2a468c;
    margin: 0 40px;
}


button::before,
button::after {
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    background-color: rgba(255, 255, 255, 0.9);
    width: 100%;
    height: 100%;
    filter: blur(30px);
    //进行模糊度调整
    //filter文章末尾会说明
    opacity: 0.4;
    transition: 0.6s;
}

button::before {
    width: 60px;
    transform: translateX(-90px) skewX(-45deg);
    //skew文字末尾会说明
}

button::after {
    width: 40px;
    transform: translateX(-90px) skewX(-45deg);
}

button:hover::before,
button:hover::after {
    opacity: 0.6;
    transform: translateX(220px) skewX(-45deg);
}

button:hover {
    color: #fff;
}

button:hover:first-child {
    background-color: #2a468c;
}


}
</style>
<body style="background:#000; ">

<div style="height:80px;"></div>

<!--pulse wave-->
<div id="container">

    <center><img  width="300" src="<?php echo $cur_path?>img/logo.png"/></center>
	<div style="height:50px;"></div>
    <div class="content">
      <h1>正在为您生成报告</h1>
    </div>

    
    <!-- Progress bar -->
    <div id="progress_bar" class="ui-progress-bar ui-container">
      <div class="ui-progress" style="width: 79%;">
        <span class="ui-label" style="display:none;"><b class="value"></b></span>
      </div>
    </div>
    <!-- /Progress bar -->
    
    <div class="content" id="main_content" style="display: none;">
      <p>
	  任何技能的获得都需要不断练习和积累
      </p>
      <p>
	  温故而知新，快来看看你的实力如何
      </p>
	  <p style="font-size:12px">提示：请在PC端使用 Edge、Chrome、Firefox、360等浏览器（切换为极速模式）打开。</p>
	  <div style="height:50px;"></div>
	  <center><button onclick="window.location.href='report.php'">点击查看报告</button></center>

    </div>
    
  </div>
  

</body>
  <script src="<?php echo $cur_path?>js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $cur_path?>js/progress.js" type="text/javascript" charset="utf-8"></script>
</html>