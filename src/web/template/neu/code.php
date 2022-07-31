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
		
		<?php echo htmlentities(str_replace("\n\r","\n",$code),ENT_QUOTES,"utf-8")."\n"?>
		</div>
</div>
	</div>
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
    <script>
        Raven.config('https://bc3878b7ed0a4468a65390bd79e6e73f@sentry.xxxxxx.com/5', {
            release: '3.12.13'
        }).install();
    </script>

    


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