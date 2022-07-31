<?php
$cur_path = "template/$OJ_TEMPLATE/";
?>
<!DOCTYPE html>
<html lang="en">
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
<style>
.org-header {
    padding: 100px 0;
    color: #fff;
    background: url(<?php echo $cur_path?>img/org-bg.png);
    text-align: center;
}
.org-header h2 {
    font-size: 45px;
}
.org-header p {
    margin-top: 20px;
    font-size: 18px;
    font-weight: 700;
}
.org-body-desc {
    padding: 50px 0 150px;
}
.org-body-desc .media-body {
    font-size: 16px;
}
.org-body-courses {
    padding: 50px 0;
    background: #fff;
}
.org-body-courses .container {
    position: relative;
    top: -110px;
}
.org-body-courses .media {
    display: block;
    padding: 10px;
    margin-bottom: 50px;
    color: #333;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 0 4px 2px #eee;
}
.org-body-courses .media:hover,
.org-body-courses .media:focus {
    text-decoration: none;
}
.org-body-courses .media img {
    width: 80px;
    height: 80px;
    border-radius: 4px;
    box-shadow: 0 0 4px 2px #eee;
}
.org-body-courses .media-body h4 {
    word-break: break-all;
    font-size: 16px;
    line-height: 1.6em;
}
.org-course-more {
    text-align: center;
}
.org-course-more .btn {
    padding: 4px 20px;
    border-radius: 4px;
}
</style>    
  	
    
</head>
<body>
<?php include("template/$OJ_TEMPLATE/nav.php");?>	
<?php
if(isset($_POST['year'])){
$year=$_POST['year'];
$week=$_POST['week'];}
else{
	$year=date('Y');
	$month=(int)date('m');
	if($month>2 && $month<8) 
		$week="春季学期";
	else if($month>=8 && $month<=9)
		$week="夏季学期";
	else
		$week="秋季学期";
}
if($week=="春季学期")
{
	$yw=date("yW",strtotime($year."-03-01"));
	$endyw=date("yW",strtotime($year."-08-01"));
}
else if($week=="夏季学期"){
	$yw=date("yW",strtotime($year."-07-01"));
	$endyw=date("yW",strtotime($year."-09-01"));
}
else {
	$yw=date("yW",strtotime($year."-09-01"));
	$nextyear=$year+1;
	$endyw=date("yW",strtotime($nextyear."-02-01"));
}

?>
<div class="container layout layout-margin-top">
    
    
    <div class="row">
        <div class="col-md-9 layout-body">
		<div class="content">
		<center>
	<h2><?php echo $user?>的个人分析（<?php echo $year;?>年<?php echo $week;?>）</h2>
	</center>
	
<form class="form-search form-inline" method='POST'>
		<select class="form-control" name='year'>
		<option value=''>请选择年份</option>
<?php
for($i=0;$i<4;$i++){
	$year=date('Y')-$i;
	$my_year.= "<option value='$year'>$year</option>";
	
}
echo $my_year;

?>
		</select>
		<select class="form-control" name='week'>
		<option value=''>请选择学期</option>
			<option>春季学期</option>
			<option>夏季学期</option>
			<option>秋季学期</option>
		</select>
		<button type="submit" class="form-control  btn-info">提交</button>
<!--<a href="/" type="button" class="btn btn-success" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >最新题目</a>	-->
</form>
<br>
		<div id="echarts" style="width:100%;height:400px;display:inline-block"></div>		             	
		<?php	
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];		
$sql="SELECT
week_problem2.w,
UNIX_TIMESTAMP(date(week_problem2.st))*1000 md,
week_problem2.user_id,
Avg(problem_score_full_view.diff_score) as score,
(week_problem2.w-?)/100*Avg(problem_score_full_view.diff_score) as shuliandu
FROM
week_problem2 ,
problem_score_full_view
WHERE
week_problem2.problem_id = problem_score_full_view.problem_id AND
week_problem2.user_id = ? AND
week_problem2.w>? AND
week_problem2.w<?
GROUP BY
week_problem2.w";
	$result2=pdo_query($sql,$yw,$prouser,$yw,$endyw);//mysql_escape_string($sql));
	$row=$result2[0];
			
$sql="SELECT
week_problem2.w,
UNIX_TIMESTAMP(date(week_problem2.st))*1000 md,
week_problem2.user_id,
Avg(problem_score_full_view.diff_score) as score,
(week_problem2.w-?)/100*Avg(problem_score_full_view.diff_score) as shuliandu
FROM
week_problem2 ,
problem_score_full_view
WHERE
week_problem2.problem_id = problem_score_full_view.problem_id AND
week_problem2.w>? AND
week_problem2.w<?
GROUP BY
week_problem2.w";
	$result4=pdo_query($sql,$yw,$yw,$endyw);//mysql_escape_string($sql));
	$row=$result4[0];
			?>
		
		 
      <div id="overall-typepie1" style="width:100%;height:350px;display:inline-block"></div>
	 
	<?php

	$sid=$_SESSION[$OJ_NAME.'_'.'user_id'];

      //查询问题信息
	  
	  //数据库查询
	  //$sql = "SELECT base.*,runtimeinfo.error FROM (SELECT sbase.*,sim.sim_s_id,sim FROM(SELECT solution_id,user_id,time,memory,result,language FROM solution where problem_id = ?)sbase LEFT JOIN sim ON sbase.solution_id = sim.s_id)base LEFT OUTER JOIN runtimeinfo ON base.solution_id = runtimeinfo.solution_id";
	  $sql = "SELECT
week_score_final.w,
UNIX_TIMESTAMP(date(week_score_final.st))*1000 md,
week_score_final.id,
week_score_final.score,
week_score_final.max,
week_score_final.min,
week_score_final.final
FROM
week_score_final
where id=? and w>? and w<?";
	  
	  $results = pdo_query($sql,$prouser,$yw,$endyw);
	  $row=$results[0];
		?>	
	
                   
      <div id="leida" style="width:100%;height:350px;display:inline-block"></div>	
			<?php	
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];		
$sql="SELECT
week_point2.w,
UNIX_TIMESTAMP(DATE(week_point2.st))*1000 md,
week_point2.user_id,
week_point2.point,
week_point2.c
FROM
week_point2
where user_id=? and w>? and w<?";
	$result3=pdo_query($sql,$prouser,$yw,$endyw);//mysql_escape_string($sql));
			?>
   
		
				</div>
				</div>
				        <div class="col-md-3 layout-side">
            

<div class="panel panel-default panel-userinfo">
    <div class="panel-body body-userinfo">
        <div class="media userinfo-header">
            <div class="media-left">
                <div class="user-avatar">
                    
                     <a class="avatar" href="#sign-modal" data-toggle="modal" data-sign="signin">
                         <img class="circle" src="<?php echo $cur_path?>img/logo-grey.png">
                     </a>
                      
                </div>
             </div>
            <div class="media-body">
                
                  
				 <span class="media-heading username">东北大学在线编程社区</span>
                 <p class="vip-remain">IF（BOOL 学习==FALSE）BOOL 落后=TRUE；不断的学习，我们才能不断的前进。</p>
				 
            </div>
        </div> 
        
        <div class="row userinfo-data">
            
            <hr>
            <div class="btn-group-lr">
			  <?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>      
            <a href="<?php echo $path_fix?>loginpage.php" type="button" class="btn btn-success col-md-5 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >登录/注册</a>
																				<?php }?>
																				 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
 <a  type="button" class="btn btn-success col-md-11 col-xs-6 login-btn" style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #3baeda;padding: 4px 10px;'>欢迎您,<?php echo $sid?></a>

					<?php }?>																		
            </div>
            
        </div>
        
        <div class="row userinfo-data">
            
            <br>
            <div class="btn-group-lr">
																				 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
																				<?php echo $emailattention2?>
   <a href="<?php echo $path_fix?>inquiry.php" target="view_window" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >每周报告</a>	
  <a href="<?php echo $path_fix?>problemset.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >题库练习</a>		
<?php }?>																		
            </div>
            
        </div>
    </div>
</div>

<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">成绩评定</h4>
	</div>
	<div class="sidebox-body course-content side-list-body">
		<div id="leida2" style="width:100%;height:300px;display:inline-block"></div>
		<?php 
		$user=$_SESSION[$OJ_NAME.'_'.'user_id'];		
$sql="SELECT
week_submitscore.w,
week_submitscore.id,
Sum(week_submitscore.score) as score,
week_submitscore.st
FROM
week_submitscore
where id=? and w>? and w<?
";
	$result5=pdo_query($sql,$prouser,$yw,$endyw);//mysql_escape_string($sql));
		
		?>
	</div>
</div>

<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">数据说明</h4>
	</div>
	<div class="sidebox-body course-content side-list-body">
    <p>1.编程熟练度根据提交正确率和题目难度综合计算得出，按周进行统计。训练次数越多，结果越准确。</p>
	<p>2.排名趋势亦是按照周进行统计，数据表明超过了总人数的比例，数据越高排名越靠前。</p>
	<p>3.知识点热力图可展示知识点覆盖变化以及知识点的回答情况。</p>
	<p>4.成绩评定由AI根据答题历史以及考勤情况预测，仅供成绩参考，不做为最终成绩。</p>
	<p>5.日期代表所在周，不指定具体日期。</p>
	<p>6.统计数据每晚24:00更新。</p>
	
	</div>
</div>
<div class="side-image side-qrcode">
    <img src="<?php echo $cur_path?>/img/QRCode.png">
	<img src="<?php echo $cur_path?>/img/search.png">
</div>

        </div>
				
				
				</div>

</div>
		<script>
    <?php
	  //输送classConfig
	  echo "classConfig='".$class_data."';\n";
	  echo "pdoData='".addslashes(json_encode($results))."';\n";
	  echo "Data='".addslashes(json_encode($result2))."';\n";
	  echo "Data2='".addslashes(json_encode($result4))."';\n";
	  echo "Data3='".addslashes(json_encode($result5))."';\n";
	  	  echo "LDData='".addslashes(json_encode($result3))."';\n";
	?>
	</script>
	
    <script type="text/javascript" src="<?php echo $cur_path?>echarts.min.js"></script>
	<script type="text/javascript" src="<?php echo $cur_path?>dark.js"></script>

	<script type="text/javascript" src="<?php echo $cur_path?>indanalysis.js"></script>	
	
    <script src="<?php echo $cur_path?>app/dest/lib/lib.js?=2016121272249"></script>
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
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


    


<script src="<?php echo $cur_path?>app/dest/course/labs.js?=2016121272249"></script>
<script src="<?php echo $cur_path?>app/dest/frontend/index.js?=2016121272249"></script>	
	
	
	<script>
$('.org-body-courses .media h4').each(function() {
    var h = $(this).height();
    if (h > 25) {
        $(this).css({
            width: $(this).width(),
            'white-space': 'nowrap',
            'text-overflow': 'ellipsis',
            overflow: 'hidden'
        });
    }
});
</script>	
   
    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>
</body>
</html>