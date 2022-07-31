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
	
		
        <title><?php echo $OJ_NAME?></title>
		
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../favicon.ico">
	<link rel="stylesheet" href="<?php echo $cur_path?>static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo $cur_path?>/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
	<?php include("template/$OJ_TEMPLATE/tonghji.php");?>	
	<style>
		@font-face {
			font-family: "lantingxihei";
			src: url("<?php echo $cur_path?>fonts/FZLTCXHJW.TTF");
		}

        /* modal 模态框*/
        #invite-user .modal-body {
            overflow: hidden;
        }
		#invite-user .modal-body .form-label {
			margin-bottom: 16px;
			font-size:14px;
		}
		#invite-user .modal-body .form-invite {
			width: 80%;
			padding: 6px 12px;
			background-color: #eeeeee;
			border: 1px solid #cccccc;
			border-radius: 5px;
			float: left;
			margin-right: 10px;
		}
		#invite-user .modal-body .msg-modal-style {
			background-color: #7dd383;
			margin-top: 10px;
			padding: 6px 0;
			text-align: center;
			width: 100%;
		}
		#invite-user .modal-body .modal-flash {
			position: absolute;
			top: 53px;
			right: 74px;
			z-index: 999;
		}
		/* end modal */

        .en-footer {
            padding: 30px;
            text-align: center;
            font-size: 14px;
        }
    </style>
	
<style style="text/css">
.navbar-banner {
    margin-top: 50px;
    background: url("<?php echo $cur_path?>img/homepage-bg.png");
    background-size: cover;
    backgtound-repeat: no-repeat;
}
</style>
<style style="text/css">
#J_to_bottom{display: inline-block;width: 100px;border-radius: 50%;position: fixed;bottom: 10%;right: 5%;}
</style>
<style style="text/css">
#J_to_bottom img{width: 100px;border-radius: 50%}
</style>
<link rel="stylesheet" href="<?php echo $cur_path?>restatic/js/libs/marked/katex/katex.min.css">
	<style>
    .bootcamp-infobox {
        margin: 50px 0 0;
    }
    .invite-friends-link {
        margin-top:10px;
        padding-left:8px;
    }
    .invite-friends-link input {
        margin-left:-5px;
    }
    .invite-friends-link button {
        float:left;
        margin-top:5px;
        margin-left:-5px;
    }
    .invite-friends-link .copy-msg {
        float:left;
        margin-top:10px;
        margin-left:20px;
        color:#42b1ad;
    }
    p.join-vip-faq {
        margin-top:20px;
        margin-bottom:-50px;
        font-size:13px;
    }
    p.join-vip-faq img {
        height:13px;
        width:13px;
        margin-top:-2px;
    }
    a.vip-without-bean {
        font-size:18px;
        line-height:30px;
    }
</style>  
    
</head>

<body>
      <?php include("template/$OJ_TEMPLATE/nav.php");?>	  

    <div class="container layout layout-margin-top ">
   <div class="content">
    <!-- Main component for a primary marketing message or call to action -->
        <center>
<div>
<h3>作业<?php echo $view_id?> - <?php echo $view_title ?></h3>
<br>开始时间: <font color=#993399><?php echo $view_start_time?></font>
截止时间: <font color=#993399><?php echo $view_end_time?></font><br>
当前时间: <font color=#993399><span id=nowdate > <?php echo date("Y-m-d H:i:s")?></span></font>
状态:&nbsp;&nbsp<?php
if ($now>$end_time)
echo "<span class=red>已结束</span>";
else if ($now<$start_time)
echo "<span class=red>未开始</span>";
else
echo "<span class=red>收集中</span>";
?>&nbsp;&nbsp;
权限：
<?php
if ($view_private=='0')
echo "<span class=blue>公开</font>";
else
echo "&nbsp;&nbsp;<span class=red>私有</font>";
?>
<br>
</div>

</center><br>
<h4>附件：<?php echo $filename?> - <a href="<?php echo $file?>" target="_blank"  download="<?php echo "作业$view_id-".$filename?>">点击下载</a></h3>
<br>
<div class='content'><?php echo $view_description?></div>
<h4>我的提交(仅能提交一次，请务必检查提交正确)</h4>
<div id="J_footer" class=content> 
<?php if (!$projectsub) {?>
	<form method=POST enctype="multipart/form-data" action='stuproject.php?id=<?php echo $id?>'>
	<p align=left>学号：<input class=input-xxlarge  type=text name=user_id size=34 value="<?php echo isset($user)?$user:""?>"></p>
	<p align=left>姓名：<input class=input-xxlarge  type=text name=user_name size=34 value="<?php echo $nick?>"></p>
	<p align=left>专业班级：<input class=input-xxlarge  type=text name=class size=30 value="<?php echo $class?>"></p>
	<p align=left>学校：<input class=input-xxlarge  type=text name=school size=34 value="<?php echo $school?>"></p>
	<p align=left>作业ID：<input class=input-xxlarge  type=text name=project_id size=32 value="<?php echo $id?>"></p>
	<p align=left>题目：<input class=input-xxlarge  type=text name=title size=34 value="<?php echo $view_title?>"></p>
	<br>
	<p align=left>上传报告作业：(仅允许上传的格式 "pdf"，大小应小于20M)<input type=file value=fileup name=fileup>
	<br>
	<input type=submit value=Submit name=submit>   <input type=reset value=Reset name=reset>
	</form>
<?php }
  else echo "<h2>您已提交!</h2>";

?>
</div>
<a href="javascript:;" id="J_to_bottom" onclick="goToBottom()"><center><h4>点击提交</h4></center><img src="<?php echo $cur_path?>/img/to_bottom.png"></a></div>
<script>
function goToBottom() {
    $("html,body").animate({scrollTop: $("#J_footer").offset().top}, 300);//定位到 id为J_footer的地方，后面的300是3秒滑到定位处
}
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->	     <!-- /container -->
</div>
</div>
   
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo $cur_path?>app/dest/lib/lib.js?=2016121272249"></script>
    <script src="<?php echo $cur_path?>static/ace/1.2.5/ace.js"></script>
    <script src="<?php echo $cur_path?>static/aliyun/aliyun-oss-sdk-4.3.0.min.js"></script>
    <script src="<?php echo $cur_path?>static/highlight.js/9.8.0/highlight.min.js"></script>
    <script src="<?php echo $cur_path?>static/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="<?php echo $cur_path?>static/plupload/2.1.9/js/plupload.full.min.js"></script>
    <script src="<?php echo $cur_path?>static/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
    <script src="<?php echo $cur_path?>static/videojs/video.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-table/1.11.0/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

    <script src="<?php echo $cur_path?>static/ravenjs/3.7.0/raven.min.js"></script>
	   <script src="<?php echo $cur_path?>/js/star-rating.js" type="text/javascript"></script>
	   <script src="include/checksource.js"></script>
<script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
//alert(diff);
function clock()
{
var x,h,m,s,n,xingqi,y,mon,d;
var x = new Date(new Date().getTime()+diff);
y = x.getYear()+1900;
if (y>3000) y-=1900;
mon = x.getMonth()+1;
d = x.getDate();
xingqi = x.getDay();
h=x.getHours();
m=x.getMinutes();
s=x.getSeconds();
n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
//alert(n);
document.getElementById('nowdate').innerHTML=n;
setTimeout("clock()",1000);
}
clock();
</script>


</body>
</html>
