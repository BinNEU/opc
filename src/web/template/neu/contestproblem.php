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
			<link rel="stylesheet" href="<?php echo $cur_path?>app/css/clock.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249">
	<?php include("template/$OJ_TEMPLATE/tonghji.php");?>	
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo $cur_path?>/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->

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
        <?php 
   
   if(isset($eid))
	   include("template/$OJ_TEMPLATE/examnav.php");
   else
   include("template/$OJ_TEMPLATE/nav.php");
   
   ?> 

    <div class="container layout layout-margin-top ">

		<!-- Main component for a primary marketing message or call to action -->
<div class="content">
      <?php
	   if(strpos($row['title'], "：")){
				$resulttitle = strstr($row['title'],"：");
				 $resulttitle=str_replace("：", "", $resulttitle);}
				 else $resulttitle=$row['title'];
	  echo "<div id='d3'>";
      if($pr_flag){
        echo "<title>$MSG_PROBLEM".$row['problem_id']."--". $resulttitle."</title>";
        echo "<center><h3 style='color: #777;font-size: 30px;'>$id: ".$resulttitle."</h3> ";
      }else{
        //$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $id=$row['problem_id'];
        echo "<title >$MSG_PROBLEM ".$PID[$pid].": ".$resulttitle." </title>";
        echo "<center><h3>$MSG_PROBLEM ".$PID[$pid].": ".$resulttitle."</h3>";
      }

      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_Time_Limit: </span>".$row['time_limit']." Sec&nbsp;&nbsp;</a> ";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_Memory_Limit: </span>".$row['memory_limit']." MB</a> ";

      if($row['spj']) echo "&nbsp;&nbsp;<span class=red>Special Judge</span>";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_SUBMIT: </span>".$row['submit']."&nbsp;&nbsp;</a> ";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_SOVLED: </span>".$row['accepted']."</a> <br>";
      echo "<br>";


      if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
        require_once("include/set_get_key.php");
      ?>
      <a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="admin/problem_edit.php?id=<?php echo $id?>&getkey=<?php echo $_SESSION[$OJ_NAME.'_'.'getkey']?>" >编辑</a>
      <a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='javascript:phpfm(<?php echo $row['problem_id'];?>)'>测试用例</a>

    <?php
    }
  
    echo "</center>";
	 echo "</div>";
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
    echo "<div id='d4'>";
    if($pr_flag){
      echo "<h4>$MSG_SOURCE</h4><div class=content>";
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
      echo "</div>";
    }
 if($pr_flag){
   echo "<h4>难度</h4>";

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


	
   echo "</div>";
   echo"</div><br>";
   echo "<center>";
 }
?>

				</div>
			<center>
				<!--EndMarkForVirtualJudge-->
				<div >
				<?php 
        if($pr_flag){
			if(isset($eid))
					echo "<a class='btn btn-info btn-sm' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='submitpage.php?id=$id&eid=$eid' role='button'>开始答题</a>";
            else
				echo "<a class='btn btn-info btn-sm' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='submitpage.php?id=$id' role='button'>开始答题</a>";
	   }else{
		   if(isset($eid))
					echo "<a class='btn btn-info btn-sm' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask&eid=$eid' role='button'>开始答题</a>";
         else
		            echo "<a class='btn btn-info btn-sm' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask' role='button'>开始答题</a>";
	   }
        //echo "[<a href='bbs.php?pid=".$row['problem_id']."$ucid'>$MSG_BBS</a>]";
        ?>
				</div>
			</center>
		</div>
	</div>
	<?php if(isset($eid)){?>

<div id="idOuterDiv" class="CsOuterDiv">
<ul class="countdown">

  <li> <span class="hours">00</span>
  </li>
  <li class="seperator">:</li>
  <li> <span class="minutes">00</span>
  </li>
  <li class="seperator">:</li>
  <li> <span class="seconds">00</span>
  </li>
</ul>
</div>
<?php }?>
	<!-- /container -->


	<!-- Bootstrap core JavaScript
  ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include("template/$OJ_TEMPLATE/js.php");?>
	    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
	<script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.downCount.js"></script>    
	<script>
		function phpfm( pid ) {
			//alert(pid);
			$.post( "admin/phpfm.php", {
				'frame': 3,
				'pid': pid,
				'pass': ''
			}, function ( data, status ) {
				if ( status == "success" ) {
					document.location.href = "admin/phpfm.php?frame=3&pid=" + pid;
				}
			} );
		}

		$( document ).ready( function () {
			$( "#creator" ).load( "problem-ajax.php?pid=<?php echo $id?>" );
		} );
		function CopyToClipboard (input) {
			var textToClipboard = input;
			 
			var success = true;
			if (window.clipboardData) { // Internet Explorer
			    window.clipboardData.setData ("Text", textToClipboard);
			}
			else {
				// create a temporary element for the execCommand method
			    var forExecElement = CreateElementForExecCommand (textToClipboard);
			 
				    /* Select the contents of the element 
					(the execCommand for 'copy' method works on the selection) */
			    SelectContent (forExecElement);
			 
			    var supported = true;
			 
				// UniversalXPConnect privilege is required for clipboard access in Firefox
			    try {
				if (window.netscape && netscape.security) {
				    netscape.security.PrivilegeManager.enablePrivilege ("UniversalXPConnect");
				}
			 
				    // Copy the selected content to the clipboard
				    // Works in Firefox and in Safari before version 5
				success = document.execCommand ("copy", false, null);
			    }
			    catch (e) {
				success = false;
			    }
			 
				// remove the temporary element
			    document.body.removeChild (forExecElement);
			}
			 
			if (success) {
			    alert ("The text is on the clipboard, try to paste it!");
			}
			else {
			    alert ("Your browser doesn't allow clipboard access!");
			}
			}
			 
			function CreateElementForExecCommand (textToClipboard) {
			var forExecElement = document.createElement ("pre");
			    // place outside the visible area
			forExecElement.style.position = "absolute";
			forExecElement.style.left = "-10000px";
			forExecElement.style.top = "-10000px";
			    // write the necessary text into the element and append to the document
			forExecElement.textContent = textToClipboard;
			document.body.appendChild (forExecElement);
			    // the contentEditable mode is necessary for the  execCommand method in Firefox
			forExecElement.contentEditable = true;
			 
			return forExecElement;
			}
			 
			function SelectContent (element) {
			    // first create a range
			var rangeToSelect = document.createRange ();
			rangeToSelect.selectNodeContents (element);
			 
			    // select the contents
			var selection = window.getSelection ();
			selection.removeAllRanges ();
			selection.addRange (rangeToSelect);
			}
	</script>
<script class="source" type="text/javascript">
	$('.countdown').downCount({
		date: <?php echo $clocks ?>,
		offset: +8
	}, function () {
		alert('考试已结束!');
		window.location.href="examlist.php"
	});
</script>
</body>
</html>
