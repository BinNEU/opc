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

<div class="container layout layout-margin-top">
    
    
    <div class="row">
        <div class="col-md-8 layout-body">
		<div class="content">
		<div id="myAlert2" class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>提示：</strong>如遇到正常时间内显示考试已结束，请切换浏览器使用。推荐：Edge、Chrome、Firefox、360（切换为极速模式）。
</div>
		<center><h2><span>考试列表</span></h2></center> 
		<center>当前时间：<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'> <div id="CurrentTime"></div></a>	</center> 
         <table id='examlist' width='100%'class="layui-table">
<thead>
<tr class='toprow'>
<th width='5%'  style="text-align:center;">编号</th>
<th width='28%'style="text-align:center;"><?php echo $MSG_TITLE?></th>
<th class='hidden-xs' width='40%' style="text-align:center;">状态</th>
<th class='hidden-xs' width='10%' style="text-align:center;">权限</th>
<th width='12%'style="cursor:hand;text-align:center;">答题</th>


</tr>
</thead>
<tbody>
<?php
$cnt=0;
foreach($view_projectset as $row){
if ($cnt)
echo "<tr class='oddrow'>";
else
echo "<tr class='evenrow'>";
$i=0;
foreach($row as $table_cell){
	if($i==2||$i==3)echo "<td  class='hidden-xs'>";
	else echo "<td>";
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
				
				</div>
				        <div class="col-md-4 layout-side">
            

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
  <a href="<?php echo $path_fix?>problemlist.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>学校课程</a>		
  <a href="<?php echo $path_fix?>problemset.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >题库练习</a>		
<?php }?>																		
            </div>
            
        </div>
    </div>
</div>
<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">我的考试</h4>

	</div>
	<div class="sidebox-body course-content side-list-body">
          
			<?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>      
            <a href="<?php echo $path_fix?>loginpage.php" type="button" class="btn btn-success col-md-5 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >登录/注册</a>
																				<?php }?>

	</div>
		<div class="sidebox-body course-content side-list-body">
<?php
       if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
																	
   <table align=center width=100% class="layui-table">
<thead>
	<tr class='toprow'>
    <th  width='20%' style="text-align:center;">考试ID</th>
	<th  width='20%' style="text-align:center;">学号</th>
    <th  width='30%' style="text-align:center;" >姓名</th>
	<th  width='30%' style="text-align:center;" >学校</th>
</tr>
</thead>
<tbody>
	<?php
				$cnt=0;
$limit = 0;
foreach($view_rank as $row){
if ($cnt)
echo "<tr style='text-align:center;' class='oddrow'>";
else
echo "<tr style='text-align:center;' class='evenrow'>";
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
	</table>		
<?php }?>																		
            </div>
			
            
</div>
<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">考试说明</h4>
	</div>
	<div class="sidebox-body course-content side-list-body">
    <p>1、请务必检查个人信息，如有信息错误请及时联系老师；
     </p><p>2、确认考生信息无误后，点击“进入考试”开始抽卷；
     </p><p>3、开始答题后，可重复提交答案代码，如运行正确会在编号左侧显示“Y”,错误显示“N”; 
	 
	 </p><p>4、如在答题过程中因误操作退出，可通过考试列表页面重新进入；
	 </p><p>5、请在规定的时间作答，超过时间将无法提交，考试只能作答一次。
	 </p><p>6、如遇到正常时间内显示考试已结束，请切换浏览器使用。推荐：Edge、Chorm、Firefox、360（切换为极速模式）。
	 </p>
	</div>
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
	  	  echo "LDData='".addslashes(json_encode($result3))."';\n";
	?>
	</script>
	
    <script type="text/javascript" src="<?php echo $cur_path?>echarts.min.js"></script>
	<script type="text/javascript" src="<?php echo $cur_path?>analysis.js"></script>	
	
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
   		    <script type="text/javascript">
			var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
		function changetime(){
			var ary = Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
			var Timehtml = document.getElementById('CurrentTime');
			var date = new Date(new Date().getTime()+diff);
			Timehtml.innerHTML = ''+date.toLocaleString()+'   '+ary[date.getDay()];
		}
		window.onload = function(){
			changetime();
			setInterval(changetime,1000);	
		}
    </script>
</body>
</html>