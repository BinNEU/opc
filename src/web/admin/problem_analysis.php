<?php
require_once("admin-headers.php");
if(!(isset($_SESSION[$OJ_NAME.'_'.'administrator']) || isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
  echo "<a href='../loginpage.php'>请使用管理员账户登录！</a>";
  exit(1);
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
	<link rel="stylesheet" href="../template/neu/static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../template/neu/static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="../template/neu/app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/neu/app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="../template/neu/app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="../template/neu/app/css/dest/styles.css?=2016121272249">
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>

	<style>
		@font-face {
			font-family: "lantingxihei";
			src: url("../template/neu/fonts/FZLTCXHJW.TTF");
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
    background: url("../template/neu/img/homepage-bg.png");
    background-size: cover;
    backgtound-repeat: no-repeat;
}
</style>

<link rel="stylesheet" href="../template/neu/restatic/js/libs/marked/katex/katex.min.css">
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

<nav class="navbar navbar-default navbar-fixed-top header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                <span class="sr-only">东北大学在线编程社区</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="../template/neu/img/logo_03.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav">
			    <li class="">
                    <a href="../<?php echo $path_fix?>index.php">主页</a>
                </li>
                <li class="">
                    <a href="../<?php echo $path_fix?>problemlist.php">练习</a>
                </li>
                <li class="">
                    <a href="../<?php echo $path_fix?>problemset.php">题库</a>
                </li>
                <li class=" bootcamp new-nav logo-1111">
                    <a href="../<?php echo $path_fix?>status.php"">状态</a>
                    
                </li>
                <li class=" new-nav logo-1111">
                    <a href="../<?php echo $path_fix?>ranklist.php">排名</a>
                    
                </li>
                                <li class=" new-nav logo-1111">
                    <a href="../<?php echo $path_fix?>bbs.php">社区</a>
                    
                </li>
            </ul>

                                                                                 <?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>           
            <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up"  href="../<?php echo $path_fix?>loginpage.php">登录/注册</a>
            </div>
 					<?php }?>
 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
					<ul class="nav navbar-nav">
									 <li class=" new-nav logo-1111">
                    <a href="../<?php echo $path_fix?>analysis.php?user=<?php echo $sid ?>">我的分析</a>
                    
                </li>
				    <li class="dropdown ">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $sid?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="" href="../<?php echo $path_fix?>modifypage.php" >修改信息</a></li>
                        <li><a class="" href="../<?php echo $path_fix?>mail.php" >我的消息</a></li>
                        <li><a class="" href="../<?php echo $path_fix?>status.php?user_id=<?php echo $sid?>">我的提交</a></li>
						<li><a class="" href="../<?php echo $path_fix?>contest.php?my">我的竞赛/作业</a></li>
                    </ul>
                </li>
				</ul>
					 <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="" data-toggle="modal">欢迎您，<?php echo $sid?></a>
				 <?php
							if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
							<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="../<?php echo $path_fix?>admin/">教师后台</a>
							<?php }?>
				<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="../<?php echo $path_fix?>logout.php">注销</a>
            </div>															
					<?php }?>																			
        </div>
    </div>
</nav>

    <div class="container layout layout-margin-top ">

    <!-- Main component for a primary marketing message or call to action -->
       <div class="content">
    <?php
    if(isset($_GET['id'])){
		$sql="SELECT class,GROUP_CONCAT(user_id) as id from users GROUP BY class order by convert(class using gbk)  asc";
		$result=pdo_query($sql);
		if($result) $rows_cnt=count($result);
		$class_data="";
		$i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
                        $row=$result[$i]; 						
                        $class_data.= $row['class'];
						$class_data.= "[";
						$class_data.= $row['id'];
						$class_data.= "]";
						$class_data.= "\n";
//                      $i++;
                }
		
      //获得班级数据

	  $class_data = addslashes($class_data);
	  $class_data = str_replace("\n", "\\n", $class_data);
	
      //查询问题信息
	  $pid = $_GET['id'];
      $sql="SELECT * FROM `problem` WHERE `problem_id`=?";
	  $result=pdo_query($sql,intval($_GET['id']));
	  $row=$result[0];
	  echo "<center><h3>Analyse-".$row['problem_id']." ".$row['title']."</h3></center>";
	  
	  //数据库查询
	  //$sql = "SELECT base.*,runtimeinfo.error FROM (SELECT sbase.*,sim.sim_s_id,sim FROM(SELECT solution_id,user_id,time,memory,result,language FROM solution where problem_id = ?)sbase LEFT JOIN sim ON sbase.solution_id = sim.s_id)base LEFT OUTER JOIN runtimeinfo ON base.solution_id = runtimeinfo.solution_id";
	  $sql = "SELECT base.*,runtimeinfo.error FROM (SELECT solution_id,user_id,time,memory,result,language FROM solution where problem_id = ?)base LEFT OUTER JOIN runtimeinfo ON base.solution_id = runtimeinfo.solution_id";
	  
	  $result = pdo_query($sql, $pid);

		?>
		
		<h3 style="text-align: center">总览</h3><br>
		<center><div id="overall">
			<div id="overall-typepie1" style="width:400;height:400;display:inline-block"></div>
			<div id="overall-typepie2" style="width:400;height:400;display:inline-block;"></div>
			<div id="overall-timeline" style="height:350;"></div>
			<div id="overall-memoryline" style="height:350;"></div>
		</div></center>
		<div id="graph_analysis" style="min-width:800;height:800"></div>
		<h3 style="text-align: center">班级教学</h3><br>
		<div id="teach">
		
			<div style="text-align: center" >
			
				<select id='class_selection' class="queryDevice selectpicker form-control" data-live-search="true">
					<option value='null'>点击选择班级（周报入口请下拉选择我的班级）</option>
					<option value='<?php echo $_GET['class'];?>'>您的班级：<?php echo $_GET['class'];?></option>
				</select>
			</div>
			<br>
                                                <center><div id="teach">
			<div id="teach-typepie" style="width:350;height:300;display:inline-block"></div>
			<div id="teach-passpie" style="width:350;height:300;display:inline-block"></div>
                                                </div></center>
			<br>
			<a id='teach-passa'></a>
			<br><br>
			<div id="teach-submission" style="height:450;"></div>
		</div>
	<script>
    <?php
	  //输送classConfig
	  echo "classConfig='".$class_data."';\n";
	  $arr = array();
	  //while($row=mysql_fetch_array($result,MYSQL_ASSOC){
	  foreach($result as $row){
		for($i=0; $i<count($row); $i+=1){
		  if(array_key_exists($i, $row)){
			unset($row[$i]);
		  }
		}
		
		array_push($arr, $row);
	    //echo $row['solution_id'];
	  }
	  //print($row)

	  echo "pdoData='".addslashes(json_encode($arr))."';\n";
	?>
	</script>

    <script type="text/javascript" src="echarts.min.js"></script>
	<script type="text/javascript" src="problem_analysis.js"></script>
    <?php
    }else{
      echo "<center><h3>404 Not Found</h3></center>";
    }
    ?>
  </div>
  </div>
      <script src="../template/neu/static/jquery/2.2.4/jquery.min.js"></script>
    <script src="../template/neu/static/ace/1.2.5/ace.js"></script>
    <script src="../template/neu/static/aliyun/aliyun-oss-sdk-4.3.0.min.js"></script>
    <script src="../template/neu/static/highlight.js/9.8.0/highlight.min.js"></script>
    <script src="../template/neu/static/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="../template/neu/static/plupload/2.1.9/js/plupload.full.min.js"></script>
    <script src="../template/neu/static/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
    <script src="../template/neu/static/videojs/video.min.js"></script>
    <script src="../template/neu/static/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js"></script>
    <script src="../template/neu/static/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
    <script src="../template/neu/static/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="../template/neu/static/bootstrap-table/1.11.0/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

    <script src="../template/neu/static/ravenjs/3.7.0/raven.min.js"></script>
    <script>
        Raven.config('https://bc3878b7ed0a4468a65390bd79e6e73f@sentry.xxxxxx.com/5', {
            release: '3.12.13'
        }).install();
    </script>

    


<script src="../template/neu/app/dest/course/labs.js?=2016121272249"></script>
<script src="../template/neu/app/dest/frontend/index.js?=2016121272249"></script>


	
        
            
            

    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>
</div>
</body>
</html>    
