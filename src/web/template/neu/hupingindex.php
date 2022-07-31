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
        <div class="col-md-9 layout-body">
		<div class="content">
		
		<center><h2><span>作业列表</span></h2></center>
         <table id='problemlist' width='100%'class="layui-table">
<thead>
<tr class='toprow'>
<th width='10%'  class='hidden-xs' style="text-align:center;">编号</th>
<th width='40%'style="text-align:center;">问题</th>
<th class='hidden-xs' width='20%' style="text-align:center;">擂主</th>

<th width='10%'  style="cursor:hand;text-align:center;">攻擂</th>


</tr>
</thead>
<tbody>
<?php
$cnt=0;
foreach($view_problemset as $row){
if ($cnt)
echo "<tr class='oddrow'>";
else
echo "<tr class='evenrow'>";
$i=0;
foreach($row as $table_cell){
	if($i==1||$i==3)echo "<td  class='hidden-xs'>";
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
				        <div class="col-md-3 layout-side">
            


<div class="sidebox">
    
	<div class="sidebox-header">
		<h4 class="sidebox-title">我的作业</h4>
		<?php
    if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
<a href="<?php echo $path_fix?>createleitai_page.php" type="button" class="btn btn-success col-md-4 col-xs-6 col-md-offset-1 register-btn" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>提交作业</a>															
          <?php }?>
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
    <th style="text-align:center;">题目</th>
    <th style="text-align:center;" >查看</th>
	<th style="text-align:center;" >状态</th>
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
		<h4 class="sidebox-title">擂台赛说明</h4>
	</div>
	<div class="sidebox-body course-content side-list-body">
    <p>擂台赛是一种将游戏融入编程训练的模式，用户可以自己出题创建擂台守擂，也可以提交代码攻擂。</p>
	<p>擂台赛流程介绍：</p>
	<p>1、创建擂台：点击创建擂台,填写题目信息提交，返回主页；</p>
	<p>2、提交代码：创建擂台者必须提交一份正确代码，然后在状态栏点击解禁按钮，才会创建擂台成功显示在擂台列表；</p>   
	<p>3、攻擂守擂：擂台创建成功之后，攻擂者在提交代码之后，点击擂台列表的攻擂按钮，如果有攻擂者的代码综合得分超越原擂主将成为本擂台新擂主。</p> 
	<h4><p>注意：</p> </h4>
	<h4><p>1、请勿恶意出题，不文明语言以及破坏题目等行为一经发现将停止账号使用该功能。</p> </h4>
	<h4><p>2、创建擂台时请务必保证信息完整，否则无法显示在列表中。</p> </h4>
	<h4><p>3、请各位出题人注意题目质量，质量评分低于2.0，系统将不公开此题目。</p> </h4>
	<h4><p>4、擂台功能测试中，有问题和建议请联系管理员</p> </h4>
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
   
</body>
</html>