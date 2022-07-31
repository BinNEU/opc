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

   <div class="container layout layout-margin-top" class="display-flex"> 
    <div class="row">
        <div class="col-md-9 layout-body">
		<div class="content">

		<embed width="100%"
             height="1000px"
             src="./pdfviewer/web/viewer.html?file=http://202.118.11.198/<?php echo $file;?>"></embed>

				</div>
				
				</div>
				        <div class="col-md-3 layout-side">
            
<div class="sidebox">
    
<center><h4><span>第<?php echo $count;?>次互评作业</span></h4></center>

</div>
<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">评分说明</h4>
	</div>
	<div class="sidebox-body course-content side-list-body">
	<p>1、作业随机发放，请勿退出或刷新页面，否则将中断此次评分。
     </p>
    <p>2、评分共六大项，每一项分为：不符合、比较符合、中立、非常符合、完全符合 五个等级，请酌情给分。
     </p><p>3、请勿恶意评分，后台会使用相关技术记录恶意评分和消极评分行为，这些记录将会影响个人成绩。
     </p><p>4、最后，对于作业一定要认真，不要抄袭。每一次评分都会影响到你和别人的成绩，请认真对待。 </p>
	</div>
</div>
<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">评分列表</h4>

	</div>
	<div class="sidebox-body course-content side-list-body">
          
			<?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>      
            <a href="<?php echo $path_fix?>loginpage.php" type="button" class="btn btn-success col-md-5 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' >登录/注册</a>
																				<?php }?>

	</div>
		<div class="sidebox-body course-content side-list-body">
		<form method=POST > 
		<div class="control-group">
		<div class="controls">
        <p class=" " style="float:left; margin-right:10px;">1、报告内容准确性（20分）</p><input  onkeyup="value=value.replace(/[^\d]/g,'') " type="text" class="form-control" style="width:50px" name="score1" required="required"/>
		<p class=" "></p>
		</div>
				<div class="controls">
        <p class=" " style="float:left; margin-right:10px;">2、报告格式规范性（10分）</p><input  onkeyup="value=value.replace(/[^\d]/g,'') " type="text" class="form-control" style="width:50px" name="score2" required="required"/>
		<p class=" "></p>
		</div>
				<div class="controls">
        <p class=" " style="float:left; margin-right:10px;">3、报告结构条理性（10分）</p><input   onkeyup="value=value.replace(/[^\d]/g,'') " type="text" class="form-control" style="width:50px" name="score3" required="required"/>
		<p class=" "></p>
		</div>
				<div class="controls">
        <p class=" " style="float:left; margin-right:10px;">4、程序编码规范性（20分）</p><input   onkeyup="value=value.replace(/[^\d]/g,'') " type="text" class="form-control" style="width:50px" name="score4" required="required"/>
		<p class=" "></p>
		</div>
				<div class="controls">
        <p class=" " style="float:left; margin-right:10px;">5、程序功能完整性（20分）</p><input   onkeyup="value=value.replace(/[^\d]/g,'') " type="text" class="form-control" style="width:50px" name="score5" required="required"/>
		<p class=" "></p>
		</div>
				<div class="controls">
        <p class=" " style="float:left; margin-right:10px;">6、程序结构清晰性（20分）</p><input   onkeyup="value=value.replace(/[^\d]/g,'') " type="text" class="form-control" style="width:50px" name="score6" required="required"/>
		<p class=" "></p>
		</div>
		</div> 	

		<div class="control-group">
		<h4>评语：<h4><div class="controls">
	    <textarea rows="10" cols="100" class="form-control" name="pingyu" style="resize:none" required
		data-validation-required-message="请输入您的信息" minlength="5" 
		data-validation-minlength-message="最少5个字符" 
		maxlength="999"></textarea>
		</div>
		</div> 		 
		<div id="success"> </div> <!-- For success/fail messages -->
		<br><button type="submit"   class="btn btn-primary pull-right"style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>提交</button><br />
		</form>																		
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
	
	


</body>
</html>