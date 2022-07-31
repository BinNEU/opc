<?php 
   $view_discuss=ob_get_contents();
    ob_end_clean();
require_once("../lang/$OJ_LANG.php");
?>
<?php
$cur_path = "../template/$OJ_TEMPLATE/";
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
                <img src="<?php echo $cur_path?>img/logo.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav">
			    <li class="">
                    <a href="/">主页</a>
                </li>

                <li class="">
                    <a href="../problemset.php">题库</a>
                </li>
				 <?php
							if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
                <li class=" bootcamp new-nav logo-1111">
                    <a href="../status.php">状态</a>
                    
                </li>
							<?php }?>
                <li class=" new-nav logo-1111">
                    <a href="../ranklist.php">排名</a>
                    
                </li>
                                <li class=" new-nav logo-1111">
                    <a href="../bbs.php">社区</a>
                    
                </li>
				<li class="dropdown ">
				                    <a href="" data-toggle="dropdown">
                         竞赛/作业
                        <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu" >
                        <li><a class="" href="../contest.php" >竞赛</a></li>
						<li><a class="" href="../projectlist.php" >作业</a></li>
                        <li><a class="" href="../examlist.php">考试</a></li>
                    </ul>
					</li>
					<?php if(!$OJ_EXAM){?>
				<li class=" new-nav logo-1111">
                    <a href="../arena.php">擂台</a>
                    
                </li>
					<?php }?>
            </ul>

                                                                                 <?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>           
            <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="<?php echo $path_fix?>loginpage.php">登录/注册</a>
            </div>
 					<?php }?>
 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
					<ul class="nav navbar-nav">

				<?php if(isset($_GET['cid'])){
	$cid=intval($_GET['cid']);
?>
                   			
<li class="dropdown ">
                    <a href="../contest.php?user=<?php echo $sid ?>" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $cid?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                                      <li class="active" ><a href="../contest.php?cid=<?php echo $cid?>">
			<?php echo $MSG_PROBLEMS?>
	      </a></li>
               <li ><a href="../status.php?cid=<?php echo $cid?>">
			<?php echo $MSG_STATUS?>
	      </a></li>
              <li  ><a href="../contestrank.php?cid=<?php echo $cid?>">
			<?php echo $MSG_RANKLIST?>
	      </a></li>
              <li ><a href="../conteststatistics.php?cid=<?php echo $cid?>">
			<?php echo $MSG_STATISTICS?>
	      </a></li>
                    </ul>
                </li>
<?php }?>
<li class="dropdown " >
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        欢迎您，<?php echo $sid?>
                        <span class="caret"></span>
                    </a>
					<?php     function checkmail(){
		global $OJ_NAME;
			
		$sql="SELECT count(1) FROM `mail` WHERE 
				new_mail=1 AND `to_user`=?";
		$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
		if(!$result) return false;
		$row=$result[0];
		$retmsg="<span id=red>未读(".$row[0].")</span>";
		
		return $retmsg;
		
	}?>
                    <ul class="dropdown-menu" >
                        <li><a class="" href="../modifypage.php" >修改信息</a></li>
						<li><a class="" href="../analysis.php?user=<?php echo $sid ?>" >我的分析</a></li>
                        <li><a class="" href="../status.php?user_id=<?php echo $sid?>">我的提交</a></li>
						<li><a class="" href="../contest.php?my">我的竞赛</a></li>
												<?php
						$mail=checkmail();
				             if ($mail) { ?>
                        <li><a class="" href="../mail.php" >我的消息：<?php echo $mail?></a></li>
							 <?php }?>
                    </ul>
                </li>
				</ul>
					 <div class="navbar-right btns">
                 
				 <?php
							if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
							<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="../<?php echo $path_fix?>admin/">教师后台</a>
							<?php }?>
				<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="../<?php echo $path_fix?>logout.php">注销</a>
            </div>															
					<?php }?>																				

        </div>
    </div>
</nav>
<br>

<!--<div id=broadcast class="row">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span></button>
            <strong>
                <i class="fa fa-warning"></i>Alert!</strong>
            <marquee>
                <p style="font-family: Impact; font-size: 18pt">服务器将于2020.06.14 00:00 进行停机维护，请同学们留意在线时间。
</p></marquee>
        </div>
		 </div>-->
    <div class="container layout layout-margin-top ">
    <div class="row">
			<div class="content">
<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="newpost.php?<?php echo $new?>" data-toggle="modal" data-sign="signin">我要发帖</a>
	<?php echo $view_discuss?>
	  </div>

	  				  
    </div> <!-- /container -->
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("../template/$OJ_TEMPLATE/js.php");?>	    
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

    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>

  </body>
</html>
