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
   <div class="container layout layout-margin-top"> 
    <div class="content">

      <form action="modify.php" method="post" role="form" class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo $MSG_REG_INFO?></label>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo $MSG_USER_ID?></label>
          <div class="col-sm-4"><label class="col-sm-2 control-label"><?php echo $_SESSION[$OJ_NAME.'_'.'user_id']?></label></div>
          <?php require_once('./include/set_post_key.php');?>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo $MSG_NICK?></label>
          <div class="col-sm-4"><input name="nick" class="form-control" value="<?php echo htmlentities($row['nick'],ENT_QUOTES,"UTF-8")?>" type="text"></div>
        </div>
		<div class="form-group">
          <label class="col-sm-4 control-label">姓名</label>
          <div class="col-sm-4"><input name="name" class="form-control" value="<?php echo htmlentities($row['name'],ENT_QUOTES,"UTF-8")?>" type="text"  readonly="readonly"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo $MSG_PASSWORD?></label>
          <div class="col-sm-4"><input name="opassword" class="form-control" placeholder="<?php echo $MSG_PASSWORD?>*" type="password"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo "New ".$MSG_PASSWORD?></label>
          <div class="col-sm-4"><input name="npassword" class="form-control" type="password"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo "New ".$MSG_REPEAT_PASSWORD?></label>
          <div class="col-sm-4"><input name="rptpassword" class="form-control" type="password"></div>
        </div>
		<div class="form-group">
          <label class="col-sm-4 control-label">班级</label>
          <div class="col-sm-4"><input name="class" class="form-control" value="<?php echo htmlentities($row['class'],ENT_QUOTES,"UTF-8")?>" type="text" readonly="readonly"></div>
          <?php if(isset($_SESSION[$OJ_NAME."_printer"])) echo "$MSG_HELP_BALLOON_SCHOOL";?>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo $MSG_SCHOOL?></label>
          <div class="col-sm-4"><input name="school" class="form-control" value="<?php echo htmlentities($row['school'],ENT_QUOTES,"UTF-8")?>" type="text" readonly="readonly"></div>
          <?php if(isset($_SESSION[$OJ_NAME."_printer"])) echo "$MSG_HELP_BALLOON_SCHOOL";?>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo $MSG_EMAIL?></label>
          <div class="col-sm-4"><input name="email" class="form-control" value="<?php echo htmlentities($row['email'],ENT_QUOTES,"UTF-8")?>" type="text"></div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-2">
            <button name="submit" type="submit" class="btn btn-default btn-block"style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'><?php echo $MSG_SUBMIT; ?></button>
          </div>
          <div class="col-sm-2">
            <button name="reset" type="reset" class="btn btn-default btn-block" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>重置</button>
          </div>
        </div>
      </form>
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
  </div> <!-- /container -->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php include("template/$OJ_TEMPLATE/js.php");?>    
    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>
</body>

</html>
