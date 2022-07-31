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
  <meta http-equiv="Cache-Control" content="no-transform">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="csrf-token" content="1483758872##fd2cac389b2b7c009a744bcaecaa41d71592cfe8">
	<meta baidu-gxt-verify-token="911cf34dd52e180f5f8bc155f4d8c807">	
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

    
</head>

<body>
	  
            






<?php include("template/$OJ_TEMPLATE/nav.php");?>	

   <div class="container layout layout-margin-top" class="display-flex"> 
    <div class="row">
        <div class="col-md-9 layout-body">

    <div class="content">
	<div class="tab-content">
        <ul class="nav nav-tabs" role="tablist">
            
            <li role="presentation" class="active">
                <a href="#labs" aria-controls="labs" role="tab" data-toggle="tab">学校课程</a>
            </li>
			<?php if (isset($weekcourse)&&isset($week)){?>
			<li role="presentation" class="stat-event">
                <a href="/" type="button" class="btn btn-success" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >最新题目</a>
            </li>
			<?php }?>
            <li role="presentation">
                <a href="#comments" class="stat-event" data-stat="course_comment" aria-controls="comments" role="tab" data-toggle="tab">推荐练习</a>
            </li>
            <li role="presentation">
                <a href="#reports" class="stat-event" data-stat="course_report" aria-controls="reports" role="tab" data-toggle="tab">最新比赛/练习</a>
            </li>
        </ul>
        <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane active" id="labs">
		<div class="content">
		<div class="tab-content">
		            <div role="tabpanel" class="tab-pane active" id="labs">
					
<form class="form-search form-inline" method='POST'>
<select class="form-control search-query" name='weekcourse' onChange="javascript:this.form.submit();">
<option value=''>下拉选择课程</option>
<?php if(isset($weekcourse) )echo "<option selected='selected'>{$weekcourse}</option>";?>
<?php
foreach ($category as $cat){
                    if(trim($cat)=="") continue;
                    $my_category.= "<option value='$cat'>$cat</option>";
                }	
				echo $my_category	
?>
</select>
<script type="text/javascript">

                    function mbar(sobj) {
                    var docurl =sobj.options[sobj.selectedIndex].value;
                    if (docurl != "") {
                       open(docurl,'_blank');
                       sobj.selectedIndex=0;
                       sobj.blur();
                    }
                    }

 </script>

<select class="form-control search-query" name=week onChange="javascript:this.form.submit();">
<option value=''>选择周数</option>
<?php if(isset($week) )echo "<option selected='selected'>第 {$week} 周</option>";?>
<?php 
foreach ($weekcategory as $weekcat){
                    if(trim($weekcat)=="") continue;
                    $my_weeks.= "<option value='$weekcat'>第 $weekcat 周</option>";
                }	
				echo $my_weeks
?></select>
<!--<a href="/" type="button" class="btn btn-success" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >最新题目</a>	-->
</form>
                    <?php echo $problemresult?>
</div>
</div>


        

        <div class="clearfix item-footer">
            <div class="pull-right watch-all">
                <a href="<?php echo $path_fix?>problemset.php">查看更多 ></a>
            </div>
        </div>
		</div>
	</div>
            <div role="tabpanel" class="tab-pane" id="comments">
		<div class="content">
		<div class="tab-content">
		            <div role="tabpanel" class="tab-pane active" id="labs">
                    <?php echo $recommend?>
</div>
</div>
		</div>
			</div>
			            <div role="tabpanel" class="tab-pane" id="reports">
				
               		<div class="content">
		<div class="tab-content">
		            <div role="tabpanel" class="tab-pane active" id="labs">
                    <?php echo $contestresult?>
</div>
</div>
		</div>
            </div>
</div>

</div>
</div>
    <div class="content">
	<div class="tab-content">
        <ul class="nav nav-tabs" role="tablist">
           
            <li role="presentation" class="active"> 
                <a href="#zhoubang" aria-controls="zhoubang" role="tab" data-toggle="tab">周榜排名</a>
            </li>
			            <li role="presentation">
                <a href="#leitai" aria-controls="leitai" role="tab" data-toggle="tab">擂台排名</a>
            </li>
        </ul>
        <div class="tab-content">
            
           
            <div role="tabpanel" class="tab-pane active" id="zhoubang">
		<div class="content">
		<div class="tab-content">
		            <div role="tabpanel" class="tab-pane active" id="zhoubang">
                     <table align=center width=100% class="layui-table">
<thead>
	<tr class='toprow'>
    <th style="text-align:center;"><?php echo $MSG_Number?></th>
    <th style="text-align:center;">用户</th>
    <th style="text-align:center;" >学校</th>
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
</div>
        <div class="clearfix item-footer">
            <div class="pull-right watch-all">
                <a href="<?php echo $path_fix?>ranklist.php">查看完整榜单 ></a>
            </div>
        </div>
</div>
		</div>
			</div>
			             <div role="tabpanel" class="tab-pane" id="leitai">
		<div class="content">
		<div class="tab-content">
		            <div role="tabpanel" class="tab-pane active" id="leitai">
                     <table align=center width=100% class="layui-table">
<thead>
	<tr class='toprow'>
    <th style="text-align:center;"><?php echo $MSG_Number?></th>
    <th style="text-align:center;">用户</th>
	<th class='hidden-xs' style="text-align:center;" >昵称</th>
    <th style="text-align:center;" >擂台数</th>
</tr>
</thead>
<tbody>
	<?php
				$cnt=0;
$limit = 0;
foreach($leitai as $row){
if ($cnt)
echo "<tr style='text-align:center;' class='oddrow'>";
else
echo "<tr style='text-align:center;' class='evenrow'>";
$i=0;
foreach($row as $table_cell){
if($i==2)echo "<td  class='hidden-xs'>";
	else echo "<td>";
echo "\t".$table_cell;
echo "</td>";
$i++;
}
echo "</tr>";
$cnt=1-$cnt;
$limit++;
}
	
	
	
	
	
	?>
	    </tbody>
	</table>
</div>
</div>
		</div>
			</div>         
</div>

</div>
</div>
 <div class="content">
<div class="tab-content">
        <ul class="nav nav-tabs" role="tablist">
            
            <li role="presentation" class="active">
                <a href="#labs" aria-controls="labs" role="tab" data-toggle="tab">相关资料</a>
        </ul>
	 <div class="row">	
	         <div class="col-sm-4">
            <a data-toggle="modal" data-target=".bs-example-modal-lg">
                <div class="path-item">
                    <div class="col-xs-5 col-md-4  path-img">
                        <img src="<?php echo $cur_path?>/img/shipin.png">
                    </div>
                    <div class="col-xs-7 col-md-8">
                        <div class="path-name">入门操作视频</div>
                        <div class="path-course-num">东北大学在线编程社区学生使用教程</div>
                    </div>
                </div>
            </a>
        </div>
		        <div class="col-sm-4">
            <a href="<?php echo $cur_path?>/file/shouce.pdf" target="_blank"  download="东北大学在线编程社区学生操作手册.pdf">
                <div class="path-item">
                    <div class="col-xs-5 col-md-4  path-img">
                        <img src="<?php echo $cur_path?>/img/shouce.png">
                    </div>
                    <div class="col-xs-7 col-md-8">
                        <div class="path-name">操作手册</div>
                        <div class="path-course-num">东北大学在线编程社区学生操作手册</div>
                    </div>
                </div>
            </a>
        </div>
		<div class="col-sm-4">
            <a href="<?php echo $cur_path?>/file/codeblocks-17.12mingw-setup.exe" target="_blank">
                <div class="path-item">
                    <div class="col-xs-5 col-md-4  path-img">
                        <img src="<?php echo $cur_path?>/img/cb.png">
                    </div>
                    <div class="col-xs-7 col-md-8">
                        <div class="path-name">Code::Blocks17.2</div>
                        <div class="path-course-num">包含来自TDM-GCC版本的CB安装包。</div>
                    </div>

                </div>
            </a>
        </div>
	
    <!-- Large modal -->
	
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    东北大学在线编程社区学生使用教程
                </h4>
            </div>
            <div class="modal-body">
                <video id="video1" src="<?php echo $cur_path?>file/jiaocheng.mp4" width="700" controls preload="metadata"></video>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
   $(function () { $('#myModal').modal('hide')});
</script>
<script>
   var myVideo = document.getElementById("video1");
   $(function () { $('#myModal').on('hide.bs.modal', function () {

	      if(myVideo.play)
                myVideo.pause();
			//myVideo.stop();
		  
		  })
          //myVideo.stop();
   });
</script>
 <!-- Large modal -->

 </div>
 </div>
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
                
                  
				 <span class="media-heading username">欢迎访问东北大学在线编程社区</span>
				 
                 <p class="vip-remain">IF(BOOL 学习==FALSE)</p>
				 <p class="vip-remain">BOOL 落后=TRUE；</p>
				 <p class="vip-remain">不断的学习，</p>
				 <p class="vip-remain">我们才能不断的前进。</p>
            </div>
        </div> 
        <div class="row userinfo-data">
            		        <div class="row userinfo-data">
            
            <br>
            <div class="btn-group-lr">
			 <a href="<?php echo $path_fix?>introduction.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>关于我们</a>
																				 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
																				<?php echo $emailattention2?>		
  <a href="https://wj.qq.com/s2/7011219/6512/" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >平台反馈</a>
<?php }?>																		
            </div>
            
        </div>
            <hr>
            <div class="btn-group-lr">
			  <?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>      
            <a href="<?php echo $path_fix?>loginpage.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >学生登录</a>
			 <a href="http://202.118.11.198/loginpage.php?id=teacher" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >教师登录</a>
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
  <a href="analysis.php?user=<?php echo $sid ?>" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>我的分析</a>		
  <a href="<?php echo $path_fix?>inquiry.php" target="view_window" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >每周报告</a>		
<?php }?>																		
            </div>
            
        </div>
		
		        <div class="row userinfo-data">
            
            <br>
            <div class="btn-group-lr">
																				 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
																				<?php echo $emailattention2?>
  <a href="<?php echo $path_fix?>examlist.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>进入考试</a>		
  <a href="<?php echo $path_fix?>projectlist.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >提交作业</a>		
<?php }?>																		
            </div>
            
        </div>
    </div>
</div>
<div class="sidebox">
<div id="myCarousel" class="carousel slide">

 

	<div class="carousel-inner">
	     <div class="item active">
			<a href="http://bmfw.www.gov.cn/xxgzbdfyyqfkzsk/index.html" target="_blank"><img src="<?php echo $cur_path?>/img/fangyi.png" alt="First slide"></a>
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide1.png" alt="Second slide">
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide2.png" alt="Third slide">
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide3.png" alt="Third slide">
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide4.png" alt="Third slide">
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide5.png" alt="Third slide">
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide6.png" alt="Third slide">
		</div>
		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide7.png" alt="Third slide">
		</div>

		<div class="item">
			<img src="<?php echo $cur_path?>/img/slide9.png" alt="Third slide">
		</div>		
	</div>

	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div> 
</div>
<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">最新通知</h4>
	</div>
	
	<div class="sidebox-body course-content side-list-body">
	        <?php echo $view_news?>
	</div>

</div>  
 
<div class="side-image side-qrcode">
    <img src="<?php echo $cur_path?>/img/QRCode.png">
	<img src="<?php echo $cur_path?>/img/search.png">
</div>
<div class="sidebox">
<div class="sidebox-header">
<h4 class="sidebox-title">联系我们</h4>
							</div>
<div class="sidebox-body course-content side-list-body">
<?php 
echo hide_email('1871590@stu.neu.edu.cn'); 

function hide_email($email)
{ $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

  $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

  for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

  $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';

  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

  $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';

  $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 

  $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

  return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;

}
?>

							<!--<p></p>-->
</div>
</div> 

        </div>

</div>
</div>


    
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

<?php echo $emailattention?>
    


<script src="<?php echo $cur_path?>app/dest/course/labs.js?=2016121272249"></script>
<script src="<?php echo $cur_path?>app/dest/frontend/index.js?=2016121272249"></script>


	
        
            
            


    <div class="text-center copyright">
        <span>Copyright 2019</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>


            
        
	
</body>
</html>
