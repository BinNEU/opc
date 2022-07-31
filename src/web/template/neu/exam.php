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
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/clock.css">
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
 <style>
layui-table{width:100%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
</style>   
</head>

<body>
        <?php 
   
   if(isset($eid))
	   include("template/$OJ_TEMPLATE/examnav.php");
   else
   include("template/$OJ_TEMPLATE/nav.php");
   
   ?>  

    <div class="container layout layout-margin-top ">
   <div class="content">
    <!-- Main component for a primary marketing message or call to action -->
        <center>
<div>

<h3>考试<?php echo $view_id?> - <?php echo $view_title ?></h3>
<br>开始时间: <font color=#993399><?php echo $view_start_time?></font>
截止时间: <font color=#993399><?php echo $view_end_time?></font><br>
当前时间: <font color=#993399><span id=nowdate > <?php echo date("Y-m-d H:i:s")?></span></font>
状态:&nbsp;&nbsp<?php
if ($now>$end_time)
echo "<span class=red>已结束</span>";
else if ($now<$start_time)
echo "<span class=red>未开始</span>";
else
echo "<span class=red>考试中</span>";
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
<center><h4>考试操作说明<h4></center>
<br>
<div class='content'><?php echo $shuoming?></div>
<h4>考试注意事项<h4>
<div class='content'><?php echo $view_description?></div>
<div class='content'><h4>个人信息(请务必检查是否正确)<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="modifypage.php">修改信息</a></h4>
<table id='problemlist' width='100%'class="layui-table">
<thead>
<tr class='toprow'>
<th>学号</th>
<th  style="text-align:center;">姓名</th>
<th  style="text-align:center;">专业班级</th>
<th  style="text-align:center;">学校</th>
<th  style="text-align:center;"  class="text-center hidden-xs">考试ID</th>
<th  style="text-align:center;"  class="text-center hidden-xs">考试名称</th>

</tr>
</thead>
<tbody>
<?php
$cnt=0;
foreach($view_info as $row){
if ($cnt)
echo "<tr class='oddrow'>";
else
echo "<tr class='evenrow'>";
$i=0;
foreach($row as $table_cell){
if ($i==3||$i==4)
	echo "<td class='text-center hidden-xs'>";
else 
	echo "<td class='text-center'>";
	echo "\t".$table_cell;
	echo "</td>";
	$i++;
}
echo "</tr>";
$cnt=1-$cnt;
}
?>
</tbody>
</table>

</div>
<form method=post action='chouti.php'>
<input type=hidden value="<?php echo $view_id?>" name="id">
<center><input style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' class=btn type=submit value="进入考试"></center>
</form>
<div id="idOuterDiv" class="CsOuterDiv">
<ul class="countdown">
  <li> <span class="hours">00</span>
  </li>
  <li class="seperator">:</li>
  <li> <span class="minutes">00</span>
  </li>
  <li class="seperator">:</li>
  <li> <span class="seconds">00</span>
  </li>
</ul>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->	     <!-- /container -->
</div>
</div>
   
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
	<script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.downCount.js"></script>
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

//alert(diff);
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
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
<script class="source" type="text/javascript">
	$('.countdown').downCount({
		date: <?php echo $clocks ?>,
		offset: +8
	}, function () {
		alert('考试结束!');
		window.location.href="examlist.php"
	});
</script>

</body>
</html>
