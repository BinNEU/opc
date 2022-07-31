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

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo $cur_path?>/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
		<?php include("template/$OJ_TEMPLATE/tonghji.php");?>	
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

    <div class="container layout layout-margin-top ">

    <!-- Main component for a primary marketing message or call to action -->
       <div class="content">
      <?php
      if($pr_flag){
        echo "<title>$MSG_PROBLEM".$row['problem_id']."--". $row['title']."</title>";
        echo "<center><h3 style='color: #777;font-size: 30px;'>$id: ".$row['title']."</h3> ";
      }else{
        //$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $id=$row['problem_id'];
        echo "<title >$MSG_PROBLEM ".$PID[$pid].": ".$row['title']." </title>";
        echo "<center><h3>$MSG_PROBLEM ".$PID[$pid].": ".$row['title']."</h3>";
      }
      echo "<div>";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_Time_Limit: </span>".$row['time_limit']." Sec&nbsp;&nbsp;</a> ";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_Memory_Limit: </span>".$row['memory_limit']." MB</a> ";

      if($row['spj']) echo "&nbsp;&nbsp;<span class=red>Special Judge</span>";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_SUBMIT: </span>".$row['submit']."&nbsp;&nbsp;</a> ";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_SOVLED: </span>".$row['accepted']."</a> <br>";
      echo "</div><br>";

      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='problemstatus.php?id=".$row['problem_id']."'>$MSG_STATUS</a> ";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='/admin/problem_analysis.php?id=".$row['problem_id']."'>$MSG_ANALYSIS</a> ";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='bbs.php?pid=".$row['problem_id']."$ucid'>$MSG_BBS</a> ";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>擂主 ：<span>".$row['source']."</span></a> ";

      if(strcmp($_SESSION[$OJ_NAME.'_'.'user_id'],$row['source'])==0||$_SESSION[$OJ_NAME.'_'.'administrator']){
      echo"<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='problem_edit.php?id=$id' >编辑</a>";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='javascript:phpfm(".$row['problem_id'].")'>测试用例</a>";
 }
 ?>
    <?php
 

    echo "</center>";
	
    echo "<!--StartMarkForVirtualJudge-->";
    echo "<h4>$MSG_Description</h4><div class='content'>".$row['description']."</div><br>";
    
    if($row['input'])echo "<h4>$MSG_Input</h4><div class=content>".$row['input']."</div><br>";
    if($row['output'])echo "<h4>$MSG_Output</h4><div class=content>".$row['output']."</div><br>";
    
    $sinput=str_replace("<","&lt;",$row['sample_input']);
    $sinput=str_replace(">","&gt;",$sinput);
    $soutput=str_replace("<","&lt;",$row['sample_output']);
    $soutput=str_replace(">","&gt;",$soutput);

    if(strlen($sinput)){
      echo "<h4>$MSG_Sample_Input</h4><pre class=content><span class=sampledata>".($sinput)."</span></pre><br>";
    }

    if(strlen($soutput)){
      echo "<h4>$MSG_Sample_Output</h4><pre class=content><span class=sampledata>".($soutput)."</span></pre><br>";
    }

    if($row['hint']){
      echo "<h4>$MSG_HINT</h4><div class='hint content'>".$row['hint']."</div><br>";
    }

    if($pr_flag){
      echo "<h4>擂主</h4><div class=content>";
      $cats=explode(" ",$row['source']);
      foreach($cats as $cat){
        echo "<a href='problemset.php?search=".urlencode(htmlentities($cat,ENT_QUOTES,'utf-8'))."'>".htmlentities($cat,ENT_QUOTES,'utf-8')."</a>&nbsp;";
      }
      echo "</div><br>";
    }
  if($pr_flag){
      echo "<h4>学校</h4><div class=content>";
      $school=explode(" ",$row['school']);
      foreach($school as $school){
        echo "$school";
      }
      echo "</div><br>";
    }
	  if($pr_flag){
      echo "<h4 >知识点</h4><div class=content>";
      $point=explode(" ",$row['point']);
      foreach($point as $point){
        echo "$point";
      }
      echo "</div><br>";
    }
 if($pr_flag){
   echo "<h4>质量</h4>";

   echo "<div class=content>";

   if ($score){ 

      echo "<form action='scoreset.php' method='post'>";
	  echo "<input id='pid' type='hidden' value=".$id." name='pid'>";
      echo "<input id='kartik' class='rating' data-stars='5' data-step='0.1' type='hidden' title=''/ name='score'>";
      echo "<div class='form-group' style='margin-top:10px'>";
      echo "<button type='submit' style='color: #fff;background-color: #3baeda;border: 10px solid #3baeda;border-radius: 4px;'>提交</button>";
	  echo"  ";
      echo "<button type='reset' style='color: #fff;background-color: #3baeda;border: 10px solid #3baeda;border-radius: 4px;'>重置</button>";
      echo "</div>";
      echo "</form>";
	}
    else{
		 echo"<form><input  value='".$problem_score."' id='rating-input' type='hidden' title=''/></form>";
	
     
	 }


	

   echo"</div><br>";
 }
    echo "<center>";
    echo "<!--EndMarkForVirtualJudge-->";
    if($pr_flag){
      echo "<a href='submitpage.php?id=$id' style='color: #fff;background-color: #3baeda;border: 10px solid #3baeda;border-radius: 4px;'>$MSG_SUBMIT</a> ";
    }else{
      echo "<a href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask' style='color: #fff;background-color: #3baeda;border: 10px solid #3baeda;border-radius: 4px;'>$MSG_SUBMIT</a>";
    }
    echo "</center>";
  ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->	    

<?php if($OJ_ACE_EDITOR){ ?>
<script src="ace/ace.js"></script>
<script src="ace/ext-language_tools.js"></script>
<script>
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("source");
    editor.setTheme("ace/theme/chrome");
    switchLang(<?php echo $lastlang ?>);
    editor.setOptions({
	    enableBasicAutocompletion: true,
	    enableSnippets: true,
	    enableLiveAutocompletion: true
    });
   reloadtemplate($("#language").val()); 
     
</script>
<?php }?>
    </div>
  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php include("template/$OJ_TEMPLATE/js.php");?>  
  <script>
  function phpfm(pid){
    //alert(pid);
    $.post("admin/phpfm.php",{'frame':3,'pid':pid,'pass':''},function(data,status){
      if(status=="success"){
        document.location.href="phpfm.php?frame=3&pid="+pid;
      }
    });
  }

  $(document).ready(function(){
    $("#creator").load("problem-ajax.php?pid=<?php echo $id?>");
  });
  </script>   
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
		    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <script src="<?php echo $cur_path?>/js/star-rating.js" type="text/javascript"></script>


    


<script src="<?php echo $cur_path?>app/dest/course/labs.js?=2016121272249"></script>
<script src="<?php echo $cur_path?>app/dest/frontend/index.js?=2016121272249"></script>


	
        
            
          <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false,
				disabled: !$inp.attr('disabled')
            });

           


            $('.btn-danger').on('click', function () {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function () {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function () {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
            });
            $("#input-21c").rating({
                min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
            });
        });
    </script>  

    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>

</body>
</html>
