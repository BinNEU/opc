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
    
</head>

  <body>

    <?php include("template/$OJ_TEMPLATE/nav.php");?>	    
      <!-- Main component for a primary marketing message or call to action -->
   <div class="container layout layout-margin-top"> 
    <div class="content">
	
<center>
	<h2>答题状态</h2>
<table class="layui-table" id=statics width=90%>
<caption>
<?php echo $user."--".htmlentities($nick,ENT_QUOTES,"UTF-8")?>
<?php
echo "<a href=mail.php?to_user=$user>$MSG_MAIL</a>";
?>
</caption>
	
<tr ><td width=15%><?php echo $MSG_Number?><td width=25% align=center><?php echo $Rank?><td width=30% align=center>Solved Problems List</tr>
<tr ><td><?php echo $MSG_SOVLED?><td align=center><a href='status.php?user_id=<?php echo $user?>&jresult=4'><?php echo $AC?></a>
<td rowspan=14 align=center>
<script language='javascript'>
function p(id,c){
	document.write("<a href=problem.php?id="+id+">"+id+" </a>(<a href='status.php?user_id=<?php echo $user?>&problem_id="+id+"'>"+c+"</a>)");

}
<?php $sql="SELECT `problem_id`,count(1) from solution where `user_id`=? and result=4 group by `problem_id` ORDER BY `problem_id` ASC";
if ($result=pdo_query($sql,$user)){ 
    foreach($result as $row)
    echo "p($row[0],$row[1]);";
}

?>
</script>
<div id=submission style="width:600px;height:300px" ></div>
</td>
</tr>
<tr ><td><?php echo $MSG_SUBMIT?><td align=center><a href='status.php?user_id=<?php echo $user?>'><?php echo $Submit?></a></tr>
<?php
foreach($view_userstat as $row){
//i++;
echo "<tr ><td>".$jresult[$row[0]]."<td align=center><a href=status.php?user_id=$user&jresult=".$row[0]." >".$row[1]."</a></tr>";
}
//}
echo "<tr id=pie ><td>Statistics<td><div id='PieDiv' style='position:relative;height:105px;width:120px;'></div></tr>";
?>
<script type="text/javascript" src="include/wz_jsgraphics.js"></script>
<script type="text/javascript" src="include/pie.js"></script>
<script language="javascript">
var y= new Array ();
var x = new Array ();
var dt=document.getElementById("statics");
var data=dt.rows;
var n;
for(var i=3;dt.rows[i].id!="pie";i++){
n=dt.rows[i].cells[0];
n=n.innerText || n.textContent;
x.push(n);
n=dt.rows[i].cells[1].firstChild;
n=n.innerText || n.textContent;
//alert(n);
n=parseInt(n);
y.push(n);
}
var mypie= new Pie("PieDiv");
mypie.drawPie(y,x);
//mypie.clearPie();
</script>
<tr ><td>School:<td align=center><?php echo $school?></tr>
<tr ><td>Email:<td align=center>***<?php// echo $email?></tr>
</table>
<?php
if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
?><h2>登陆状态</h2>
<table class="layui-table" width=80%  border=1><tr class=toprow><td>UserID<td>Password<td>IP<td>Time</tr>
<tbody>
<?php
$cnt=0;
foreach($view_userinfo as $row){
	if ($cnt)
		echo "<tr class='oddrow'>";
	else
		echo "<tr class='evenrow'>";
	for($i=0;$i<count($row)/2;$i++){
		echo "<td>";
		echo "\t".$row[$i];
		echo "</td>";
	}
	echo "</tr>";
	$cnt=1-$cnt;
}
?>
</tbody>
</table>
<?php
}
?>
</center>
      </div>
	  <br><br><br><br><br><br>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<script type="text/javascript">
$(function () {
var d1 = [];
var d2 = [];
<?php
foreach($chart_data_all as $k=>$d){
?>
d1.push([<?php echo $k?>, <?php echo $d?>]);
<?php }?>
<?php
foreach($chart_data_ac as $k=>$d){
?>
d2.push([<?php echo $k?>, <?php echo $d?>]);
<?php }?>
//var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];
// a null signifies separate line segments
var d3 = [[0, 12], [7, 12], null, [7, 2.5], [12, 2.5]];
$.plot($("#submission"), [
{label:"<?php echo $MSG_SUBMIT?>",data:d1,lines: { show: true }},
{label:"<?php echo $MSG_AC?>",data:d2,bars:{show:true}} ],{
xaxis: {
mode: "time"
//, max:(new Date()).getTime()
//,min:(new Date()).getTime()-100*24*3600*1000
},
grid: {
backgroundColor: { colors: ["#fff", "#333"] }
}
});
});
//alert((new Date()).getTime());
</script>
 </body>
</html>
