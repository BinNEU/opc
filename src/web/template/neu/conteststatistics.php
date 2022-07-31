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
<style>
layui-table{width:90%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
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
  	<?php
	 function formatTimeLength($length)
{
	$hour = 0;
	$minute = 0;
	$second = 0;
	$result = '';
	
	if ($length >= 60)
	{
		$second = $length % 60;
		if ($second > 0)
		{
			$result = $second . '秒';
		}
		$length = floor($length / 60);
		if ($length >= 60)
		{
			$minute = $length % 60;
			if ($minute == 0)
			{
				if ($result != '')
				{
					$result = '0分' . $result;
				}
			}
			else
			{
				$result = $minute . '分' . $result;
			}
			$length = floor($length / 60);
			if ($length >= 24)
			{
				$hour = $length % 24;
				if ($hour == 0)
				{
					if ($result != '')
					{
						$result = '0小时' . $result;
					}
				}
				else
				{
					$result = $hour . '小时' . $result;
				}
				$length = floor($length / 24);
				$result = $length . '天' . $result;
			}
			else
			{
				$result = $length . '小时' . $result;
			}
		}
		else
		{
			$result = $length . '分' . $result;
		}
	}
	else
	{
		$result = $length . '秒';
	}
	return $result;
}?>
</head>

  <body>

   <?php include("template/$OJ_TEMPLATE/nav.php");?>   
   <div class="container layout layout-margin-top"> 
    <div class="content">
				<?php
			if (isset($_GET['cid'])) {
				$cid = intval($_GET['cid']);
				$view_cid = $cid;
				//print $cid;

				//check contest valid
				$sql = "SELECT * FROM `contest` WHERE `contest_id`=?";
				$result = pdo_query($sql,$cid);

				$rows_cnt = count($result);
				$contest_ok = true;
				$password = "";

				if (isset($_POST['password']))
					$password = $_POST['password'];

				if (get_magic_quotes_gpc()) {
					$password = stripslashes($password);
				}

				if ($rows_cnt==0) {
					$view_title = "比赛已经关闭!";
				}
				else{
					$row = $result[0];
					$view_private = $row['private'];

					if ($password!="" && $password==$row['password'])
						$_SESSION[$OJ_NAME.'_'.'c'.$cid] = true;

					if ($row['private'] && !isset($_SESSION[$OJ_NAME.'_'.'c'.$cid]))
						$contest_ok = false;

					if($row['defunct']=='Y')
						$contest_ok = false;

					if (isset($_SESSION[$OJ_NAME.'_'.'administrator']))
						$contest_ok = true;

					$now = time();
					$start_time = strtotime($row['start_time']);
					$end_time = strtotime($row['end_time']);
					$view_description = $row['description'];
					$view_title = $row['title'];
					$view_start_time = $row['start_time'];
					$view_end_time = $row['end_time'];
				}
			}
			?>
						<?php if (isset($_GET['cid'])) {?>
			<center>
			<div>
				<h3>竞赛 : <?php echo $view_cid?> - <?php echo $view_title ?></h3>
				<p>
					<?php echo $view_description?>
				</p>
				
				<?php if (isset($OJ_RANK_LOCK_PERCENT)&&$OJ_RANK_LOCK_PERCENT!=0) { ?>
				Lock Board Time: <?php echo date("Y-m-d H:i:s", $view_lock_time) ?><br/>
				<?php } ?>
				
				<?php if ($now>$end_time) {
					echo "<span class=text-muted>$MSG_Ended</span>";
				}
				else if ($now<$start_time) {
					echo "<span class=text-success>$MSG_Start&nbsp;</span>";
					echo "<span class=text-success>$MSG_TotalTime</span>"." ".formatTimeLength($end_time-$start_time);
				}
				else {
					echo "<span class=text-danger>$MSG_Running</span>&nbsp;";
					echo "<span class=text-danger>$MSG_LeftTime</span>"." ".formatTimeLength($end_time-$now);
				}
				?>

				<br><br>

				状态 : 
				
				<?php
				if ($now>$end_time)
					echo "<span class=text-muted>".$MSG_Ended."</span>";
				else if ($now<$start_time)
					echo "<span class=text-success>".$MSG_Start."</span>";
				else
					echo "<span class=text-danger>".$MSG_Running."</span>";
				?>
				&nbsp;&nbsp;

				Private

				<?php if ($view_private=='0')
					echo "<span class=text-primary>".$MSG_Public."</span>";
				else
					echo "<span class=text-danger>".$MSG_Private."</span>";
				?>

			   <br>

				开始 : <?php echo $view_start_time?>
			
				结束 : <?php echo $view_end_time?>
				
			</div>
			</center>
			<?php }?>
			<br><br>	
			<center>
				<h4><?php if (isset($locked_msg)) echo $locked_msg;?></h4>
	           <div style="overflow: auto">
				<table class="layui-table" width=90%>
					<thead>
						<tr class=toprow>
							<th><th>AC<th>PE<th>WA<th>TLE<th>MLE<th>OLE<th>RE<th>CE<th><th>TR<th>Total
							<?php 
							$i = 0;
							foreach ($language_name as $lang) {
								if (isset($R[$pid_cnt][$i+11]) )	
									echo "<th class='center'>$language_name[$i]</th>";
							
								$i++;
							}
							?>
						</tr>
					</thead>
					<tbody>
						<?php
						for ($i=0;$i<$pid_cnt;$i++){
							if(!isset($PID[$i])) $PID[$i]="";
							if ($i&1)
								echo "<tr align=center class=oddrow><td>";
							else
								echo "<tr align=center class=evenrow><td>";
							echo "<a href='contestproblem.php?cid=$cid&pid=$i'>$PID[$i]</a>";
							for ($j=0;$j<count($language_name)+11;$j++) {
															if($j<12){
							if(!isset($R[$i][$j])) $R[$i][$j]="";
							echo "<td>".$R[$i][$j];}
							else{
								if(isset($R[$i][$j]))
							echo "<td>".$R[$i][$j];
								
							}
							}
							echo "</tr>";
						}
						echo "<tr align=center class=evenrow><td>Total";
						for ($j=0;$j<count($language_name)+11;$j++) {
							if($j<12){
							if(!isset($R[$i][$j])) $R[$i][$j]="";
							echo "<td>".$R[$i][$j];}
							else{
								if(isset($R[$i][$j]))
							echo "<td>".$R[$i][$j];
								
							}
						}
						echo "</tr>";
						?>
					</tbody>
					<table>
					</div>
					<br>
					</center>
					<div id=submission style="width:600px;height:300px" ></div>   
					 
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#cs").tablesorter();
}
);
</script>

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
