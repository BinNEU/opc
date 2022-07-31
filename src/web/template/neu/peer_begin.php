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
	
<style style="text/css">
.navbar-banner {
    margin-top: 50px;
    
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
    <div class="container layout layout-margin-top ">
	<div class="line-and-laboratory">
<div align=center class="input-append">
<?php
?>
<form id=simform class=form-inline action="peer_begin.php" method="get">
<?php echo $MSG_PROBLEM_ID?>:<input class="form-control"  type=text size=4 name=problem_id value='<?php echo  htmlspecialchars($problem_id, ENT_QUOTES) ?>'>
<?php if (isset($cid)) echo "<input type='hidden' name='cid' value='$cid'>";?>   
<?php echo $MSG_LANG?>:<select class="form-control" size="1" name="language">
	<option value="-1">All</option>
	<?php
	if(isset($_GET['language'])){
		$selectedLang=intval($_GET['language']);
	}else{
		$selectedLang=-1;
	}
	$lang_count=count($language_ext);
	$langmask=$OJ_LANGMASK;
	$lang=(~((int)$langmask))&((1<<($lang_count))-1);
	for($i=0;$i<$lang_count;$i++){ 
		if($lang&(1<<$i))
		echo"<option value=$i ".( $selectedLang==$i?"selected":"").">
		".$language_name[$i]."
		</option>";
	}
	?>
</select>
</form>

</div>
<br>
<div id=center>
<table id=result-tab class="layui-table" align=center width=90%  lay-filter="demo">
<thead>
<tr class='toprow' >
<th lay-data="{field:'u3',}" ><?php echo $MSG_PROBLEM?>
<th lay-data="{field:'u4',}"><?php echo $MSG_RESULT?>
<th lay-data="{field:'u5',}" class='hidden-xs' ><?php echo $MSG_MEMORY?>
<th lay-data="{field:'u6',}" class='hidden-xs' ><?php echo $MSG_TIME?>
<th lay-data="{field:'u7',}" class='hidden-xs' ><?php echo $MSG_LANG?>
<th lay-data="{field:'u8',}" class='hidden-xs' ><?php echo $MSG_CODE_LENGTH?>
<th lay-data="{field:'u9',}" class='hidden-xs' ><?php echo '开始互评'?>
</tr>
</thead>
<?php echo "$cnt";?>
<tbody>


</tbody>
</table>


<nav id="page" class="center"><ul class="pagination">
<li class="page-item"><a href="problemlist.php?page=1">&lt;&lt;</a></li>    <!-- 就是设置<<的,点击跳转到第一页 -->
<?php
if(!isset($page)) $page=1;
$page=intval($page);
$section=8;
$start=$page>$section?$page-$section:1;
$end=$page+$section>$view_total_page?$view_total_page:$page+$section;
for ($i=$start;$i<=$end;$i++){
 echo "<li class='".($page==$i?"active ":"")."page-item'>
        <a href='problemlist.php?page=".$i."'>".$i."</a></li>";
}
?>
<li class="page-item"><a href="problemlist.php?page=<?php echo $view_total_page?>">&gt;&gt;</a></li>  <!-- 就是设置>>的，点击跳转到最后一页 -->
</ul></nav>
</div>

<!-- 最下面页面设置 -->
<div id=center>
				<?php echo "[<a href='status.php?".$str2."'>Top</a>]&nbsp;&nbsp;";
if (isset($_GET['prevtop']))
echo "[<a href='status.php?".$str2."&top=".intval($_GET['prevtop'])."'>Previous Page</a>]&nbsp;&nbsp;";
else
echo "[<a href='status.php?".$str2."&top=".($top+20)."'>Previous Page</a>]&nbsp;&nbsp;";
echo "[<a href='status.php?".$str2."&top=".$bottom."&prevtop=$top'>Next Page</a>]";
?>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
	<script>var i=0;
		var judge_result=[<?php
		foreach($judge_result as $result){
		echo "'$result',";
		}
		?>''];

		var judge_color=[<?php
		 foreach($judge_color as $result){
		 echo "'$result',";
		 }
		?>''];
	</script>
	<script src="template/<?php echo $OJ_TEMPLATE?>/auto_refresh.js?v=0.34" ></script>
	
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
    <script>
        Raven.config('https://bc3878b7ed0a4468a65390bd79e6e73f@sentry.xxxxxx.com/5', {
            release: '3.12.13'
        }).install();
    </script>

    


<script src="<?php echo $cur_path?>app/dest/course/labs.js?=2016121272249"></script>
<script src="<?php echo $cur_path?>app/dest/frontend/index.js?=2016121272249"></script>


	

    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>


   </body>
</html>