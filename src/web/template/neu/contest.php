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
		<?php include("template/$OJ_TEMPLATE/tonghji.php");?>	
<style>
layui-table{width:100%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
</style>
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
    
</head>

  <body>

   <?php 
   
   if(isset($eid))
	   include("template/$OJ_TEMPLATE/examnav.php");
   else
   include("template/$OJ_TEMPLATE/nav.php");
   
   ?>   
   <div class="container layout layout-margin-top"> 
    <div class="content">
<center>
<div>
<?php if(isset($eid)){?>
<h3>Exam<?php echo $eid?> - <?php echo $title ?></h3>
<?php } else{?>
<h3>Contest<?php echo $view_cid?> - <?php echo $view_title ?></h3>
<p><?php echo $view_description?></p>
<?php }?>
<?php if(!isset($eid)){?>
<br>Start Time: <font color=#993399><?php echo $view_start_time?></font>
End Time: <font color=#993399><?php echo $view_end_time?></font><br>
Current Time: <font color=#993399><span id=nowdate > <?php echo date("Y-m-d H:i:s")?></span></font>
Status:<?php
if ($now>$end_time)
echo "<span class=red>Ended</span>";
else if ($now<$start_time)
echo "<span class=red>Not Started</span>";
else
echo "<span class=red>Running</span>";
?>&nbsp;&nbsp;
<?php
if ($view_private=='0')
echo "<span class=blue>Public</font>";
else
echo "&nbsp;&nbsp;<span class=red>Private</font>";
?>
<br>

[<a href='status.php?cid=<?php echo $view_cid?>'>Status</a>]
[<a href='contestrank.php?cid=<?php echo $view_cid?>'>Standing</a>]
[<a href='conteststatistics.php?cid=<?php echo $view_cid?>'>Statistics</a>]
<?php }?>
</div>
<table id='problemset' class=layui-table  width='90%' lay-filter="demo">
<thead>
<tr align=center class='toprow'>
<td width='5' lay-data="{field:'u1',width:10}">
<td lay-data="{field:'u2',sort: true}" style="cursor:hand" onclick="sortTable('problemset', 1, 'int');" ><?php echo $MSG_PROBLEM_ID?>
<td width='60%' lay-data="{field:'u3',}"><?php echo $MSG_TITLE?></td>
<td width='10%' lay-data="{field:'u6',}"><?php echo $MSG_SOURCE?></td>
<td lay-data="{field:'u4',sort: true}" style="cursor:hand" onclick="sortTable('problemset', 4, 'int');" width='5%'><?php echo $MSG_AC?></td>
<td lay-data="{field:'u5',sort: true}" style="cursor:hand" onclick="sortTable('problemset', 5, 'int');" width='5%'><?php echo $MSG_SUBMIT?></td>
</tr>
</thead>
<tbody>
<?php
$cnt=0;
$limit = 0;
foreach($view_problemset as $row){
if ($cnt)
echo "<tr class='oddrow'>";
else
echo "<tr class='evenrow'>";
foreach($row as $table_cell){
echo "<td>";
echo "\t".$table_cell;
echo "</td>";
}
echo "</tr>";
$cnt=1-$cnt;
    $limit++;
}
?>
</tbody>
</table></center>
      </div>

    </div> <!-- /container -->

<?php if(isset($eid)){?>

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
<?php }?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
	<script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.downCount.js"></script>    
    <script src="include/sortTable.js"></script>
<script>
//alert(diff);
function clock()
{
var x,h,m,s,n,xingqi,y,mon,d;
var x = new Date(new Date().getTime());
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
    <script>

        layui.use('table', function(){
            var table = layui.table;

            //转换静态表格
            table.init('demo', {
                // height: 315 //设置高度
                // ,
                limit: <?php echo $limit ?>//注意：请务必确保 limit 参数（默认：10）是与你服务端限定的数据条数一致
                //支持所有基础参数
            });
            // var element = layui.element;
            //…
        });

    </script>
<script class="source" type="text/javascript">
	$('.countdown').downCount({
		date: <?php echo $clocks ?>,
		offset: +8
	}, function () {
		alert('考试已结束!');
		window.location.href="examlist.php"
	});
</script>
  </body>
</html>
