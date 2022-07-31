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
	
        
        
            






      <?php include("template/$OJ_TEMPLATE/nav.php");?>	  

    <div class="container layout layout-margin-top ">

    <!-- Main component for a primary marketing message or call to action -->
          <div id="d1" class="col-md-8 layout-body">
	  <div class="content">
      <?php
	  echo "<div id='d3'>";
      if($pr_flag){
        echo "<title>$MSG_PROBLEM".$row['problem_id']."--". $row['title']."</title>";
        echo "<center><h3 style='color: #777;font-size: 30px;'>$id: ".$row['title']."</h3> ";
      }else{
        //$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $id=$row['problem_id'];
        echo "<title >$MSG_PROBLEM ".$PID[$pid].": ".$row['title']." </title>";
        echo "<center><h3>$MSG_PROBLEM ".$PID[$pid].": ".$row['title']."</h3>";
      }
      echo "<div id='d3'>";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_Time_Limit: </span>".$row['time_limit']." Sec&nbsp;&nbsp;</a> ";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_Memory_Limit: </span>".$row['memory_limit']." MB</a> ";

      if($row['spj']) echo "&nbsp;&nbsp;<span class=red>Special Judge</span>";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_SUBMIT: </span>".$row['submit']."&nbsp;&nbsp;</a> ";
      echo "<a class='btn btn-default sign-up' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #6e6e6e;padding: 3px 10px;'><span class=green>$MSG_SOVLED: </span>".$row['accepted']."</a> <br>";
      echo "<br>";

      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='problemstatus.php?id=".$row['problem_id']."'>$MSG_STATUS</a> ";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='/admin/problem_analysis.php?id=".$row['problem_id']."'>$MSG_ANALYSIS</a> ";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href='bbs.php?pid=".$row['problem_id']."$ucid'>$MSG_BBS</a> ";
      echo "<a class='btn btn-default sign-up' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>$MSG_Creator ：<span  id='creator'></span></a> ";
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->	    
    </div>
  </div>
 <!-- /container -->
 <div id="d2" class="col-md-4 layout-body">
		  <div class="content">
              <!-- 目录-->
              <!-- Main component for a primary marketing message or call to action -->
              <!--<div class="jumbotron">-->
                  <center>
<script src="include/checksource.js"></script>
<form id=frmSolution action="submit.php" method="post" onsubmit='do_submit()'>
<?php if (isset($id)){?>
Problem <span class=blue><b><?php echo $id?></b></span>
<input id=problem_id type='hidden' value='<?php echo $id?>' name="id" ><br>
<?php }else{
//$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
//if ($pid>25) $pid=25;
?>
Problem <span class=blue><b><?php echo chr($pid+ord('A'))?></b></span> of Contest <span class=blue><b><?php echo $cid?></b></span><br>
<input id="cid" type='hidden' value='<?php echo $cid?>' name="cid">
<input id="pid" type='hidden' value='<?php echo $pid?>' name="pid">
<?php }?>
<span id="language_span">Language:
<select id="language" name="language" onChange="reloadtemplate($(this).val());" >
<?php
$lang_count=count($language_ext);
if(isset($_GET['langmask']))
$langmask=$_GET['langmask'];
else
$langmask=$OJ_LANGMASK;
$lang=(~((int)$langmask))&((1<<($lang_count))-1);
if(isset($_COOKIE['lastlang'])) $lastlang=$_COOKIE['lastlang'];
else $lastlang=0;
for($i=0;$i<$lang_count;$i++){
if($lang&(1<<$i))
echo"<option value=$i ".( $lastlang==$i?"selected":"").">
".$language_name[$i]."
</option>";
}
?>
</select>
<?php if($OJ_VCODE){?>
<?php echo $MSG_VCODE?>:
<input name="vcode" size=4 type=text><img id="vcode" alt="click to change" src="vcode.php" onclick="this.src='vcode.php?'+Math.random()">
<?php }?>

<br>
</span>
<?php if($OJ_ACE_EDITOR){ ?>
	<pre style="width:80%;height:600px" cols=180 rows=20 id="source"><?php echo htmlentities($view_src,ENT_QUOTES,"UTF-8")?></pre><br>
	<input type=hidden id="hide_source" name="source" value=""/>
<?php }else{ ?>
	<textarea style="width:80%;height:600" cols=180 rows=20 id="source" name="source"><?php echo htmlentities($view_src,ENT_QUOTES,"UTF-8")?></textarea><br>
<?php }?>

<?php if (isset($OJ_TEST_RUN)&&$OJ_TEST_RUN){?>
<?php echo $MSG_Input?>:<textarea style="width:30%" cols=40 rows=5 id="input_text" name="input_text" ><?php echo $view_sample_input?></textarea>
<?php echo $MSG_Output?>:
<textarea style="width:30%" cols=40 rows=5 id="out" name="out" >SHOULD BE:
<?php echo $view_sample_output?>
</textarea>
<br>
<?php } ?>
<input id="Submit" class="btn btn-info" type=button value="<?php echo $MSG_SUBMIT?>" onclick="do_submit();" >
<?php if (isset($OJ_ENCODE_SUBMIT)&&$OJ_ENCODE_SUBMIT){?>
<input class="btn btn-success" title="WAF gives you reset ? try this." type=button value="Encoded <?php echo $MSG_SUBMIT?>"  onclick="encoded_submit();">
<input type=hidden id="encoded_submit_mark" name="reverse2" value="reverse"/>
<?php }?>

<?php if (isset($OJ_TEST_RUN)&&$OJ_TEST_RUN){?>
<input id="TestRun" class="btn btn-info" type=button value="<?php echo $MSG_TR?>" onclick=do_test_run();>
<span class="btn" id=result>状态</span>
<?php }?>
<?php if (isset($OJ_BLOCKLY)&&$OJ_BLOCKLY){?>
	<input id="blockly_loader" type=button class="btn" onclick="openBlockly()" value="<?php echo $MSG_BLOCKLY_OPEN?>" style="color:white;background-color:rgb(169,91,128)">
	<input id="transrun" type=button  class="btn" onclick="loadFromBlockly() " value="<?php echo $MSG_BLOCKLY_TEST?>" style="display:none;color:white;background-color:rgb(90,164,139)">
<div id="blockly" class="center">Blockly</div>
<?php }?>
</form>
</center>
          </div>

      </div> <!-- /container -->
</div>
   
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo $cur_path?>app/dest/lib/lib.js?=2016121272249"></script>
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
	   <script src="<?php echo $cur_path?>/js/star-rating.js" type="text/javascript"></script>
<script>

var sid=0;
var i=0;
var using_blockly=false;
var judge_result=[<?php
foreach($judge_result as $result){
echo "'$result',";
}
?>''];
function print_result(solution_id)
{
sid=solution_id;
$("#out").load("status-ajax.php?tr=1&solution_id="+solution_id);
}
function fresh_result(solution_id)
{
	var tb=window.document.getElementById('result');
	if(solution_id==undefined){
		tb.innerHTML="Vcode Error!";		
		if($("#vcode")!=null) $("#vcode").click();
		return ;
	}
	sid=solution_id;
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
	var r=xmlhttp.responseText;
	var ra=r.split(",");
	// alert(r);
	// alert(judge_result[r]);
	var loader="<img width=18 src=image/loader.gif>";
	var tag="span";
	if(ra[0]<4) tag="span disabled=true";
	else tag="a";
	{
		if(ra[0]==11)
		
		tb.innerHTML="<"+tag+" href='ceinfo.php?sid="+solution_id+"' class='badge badge-info' target=_blank>"+judge_result[ra[0]]+"</"+tag+">";
		else
		tb.innerHTML="<"+tag+" href='reinfo.php?sid="+solution_id+"' class='badge badge-info' target=_blank>"+judge_result[ra[0]]+"</"+tag+">";
	}
	if(ra[0]<4)tb.innerHTML+=loader;
	tb.innerHTML+="Memory:"+ra[1]+"kb&nbsp;&nbsp;";
	tb.innerHTML+="Time:"+ra[2]+"ms";
	if(ra[0]<4)
	window.setTimeout("fresh_result("+solution_id+")",2000);
	else{
		window.setTimeout("print_result("+solution_id+")",2000);
		count=1;
	}
	}
	}
	xmlhttp.open("GET","status-ajax.php?solution_id="+solution_id,true);
	xmlhttp.send();
}
function getSID(){
var ofrm1 = document.getElementById("testRun").document;
var ret="0";
if (ofrm1==undefined)
{
ofrm1 = document.getElementById("testRun").contentWindow.document;
var ff = ofrm1;
ret=ff.innerHTML;
}
else
{
var ie = document.frames["frame1"].document;
ret=ie.innerText;
}
return ret+"";
}
var count=0;
	 
function encoded_submit(){

      var mark="<?php echo isset($id)?'problem_id':'cid';?>";
        var problem_id=document.getElementById(mark);

	if(typeof(editor) != "undefined")
		$("#hide_source").val(editor.getValue());
        if(mark=='problem_id')
                problem_id.value='<?php if(isset($id)) echo $id?>';
        else
                problem_id.value='<?php if(isset($cid))echo $cid?>';

        document.getElementById("frmSolution").target="_self";
        document.getElementById("encoded_submit_mark").name="encoded_submit";
        var source=$("#source").val();
	if(typeof(editor) != "undefined") {
		source=editor.getValue();
        	$("#hide_source").val(encode64(utf16to8(source)));
	}else{
        	$("#source").val(encode64(utf16to8(source)));
	}
//      source.value=source.value.split("").reverse().join("");
//      alert(source.value);
        document.getElementById("frmSolution").submit();
}

function do_submit(){
	if(using_blockly) 
		 translate();
	if(typeof(editor) != "undefined"){ 
		$("#hide_source").val(editor.getValue());
	}
	var mark="<?php echo isset($id)?'problem_id':'cid';?>";
	var problem_id=document.getElementById(mark);
	if(mark=='problem_id')
	problem_id.value='<?php if (isset($id))echo $id?>';
	else
	problem_id.value='<?php if (isset($cid))echo $cid?>';
	document.getElementById("frmSolution").target="_self";
	document.getElementById("frmSolution").submit();
}
var handler_interval;
function do_test_run(){
	if( handler_interval) window.clearInterval( handler_interval);
	var loader="<img width=18 src=image/loader.gif>";
	var tb=window.document.getElementById('result');
        var source=$("#source").val();
	if(typeof(editor) != "undefined") {
		source=editor.getValue();
        	$("#hide_source").val(source);
	}
	if(source.length<10) return alert("too short!");
	if(tb!=null)tb.innerHTML=loader;

	var mark="<?php echo isset($id)?'problem_id':'cid';?>";
	var problem_id=document.getElementById(mark);
	problem_id.value=-problem_id.value;
	document.getElementById("frmSolution").target="testRun";
	//$("#hide_source").val(editor.getValue());
	//document.getElementById("frmSolution").submit();
	$.post("submit.php?ajax",$("#frmSolution").serialize(),function(data){fresh_result(data);});
  	$("#Submit").prop('disabled', true);
  	$("#TestRub").prop('disabled', true);
	problem_id.value=-problem_id.value;
	count=20;
	handler_interval= window.setTimeout("resume();",1000);
}
function resume(){
	count--;
	var s=$("#Submit")[0];
	var t=$("#TestRub")[0];
	if(count<0){
		s.disabled=false;
		if(t!=null)t.disabled=false;
		s.value="<?php echo $MSG_SUBMIT?>";
		if(t!=null)t.value="<?php echo $MSG_TR?>";
		if( handler_interval) window.clearInterval( handler_interval);
		if($("#vcode")!=null) $("#vcode").click();
	}else{
		s.value="<?php echo $MSG_SUBMIT?>("+count+")";
		if(t!=null)t.value="<?php echo $MSG_TR?>("+count+")";
		window.setTimeout("resume();",1000);
	}
}
function switchLang(lang){
   var langnames=new Array("c_cpp","c_cpp","pascal","java","ruby","sh","python","php","perl","csharp","objectivec","vbscript","scheme","c_cpp","c_cpp","lua","javascript","golang");
   editor.getSession().setMode("ace/mode/"+langnames[lang]);

}
function reloadtemplate(lang){
   console.log("lang="+lang);
   document.cookie="lastlang="+lang.value;
   //alert(document.cookie);
   var url=window.location.href;
   var i=url.indexOf("sid=");
   if(i!=-1) url=url.substring(0,i-1);
 //  if(confirm("<?php echo  $MSG_LOAD_TEMPLATE_CONFIRM?>"))
 //       document.location.href=url;
   switchLang(lang);
}
function openBlockly(){
   $("#frame_source").hide();
   $("#TestRun").hide();
   $("#language")[0].scrollIntoView();
   $("#language").val(6).hide();
   $("#language_span").hide();
   $("#EditAreaArroundInfos_source").hide();
   $('#blockly').html('<iframe name=\'frmBlockly\' width=90% height=580 src=\'blockly/demos/code/index.html\'></iframe>'); 
  $("#blockly_loader").hide();
  $("#transrun").show();
  $("#Submit").prop('disabled', true);
  using_blockly=true;
  
}
function translate(){
  var blockly=$(window.frames['frmBlockly'].document);
  var tb=blockly.find('td[id=tab_python]');
  var python=blockly.find('pre[id=content_python]');
  tb.click();
  blockly.find('td[id=tab_blocks]').click();
  if(typeof(editor) != "undefined") editor.setValue(python.text());
  else $("#source").val(python.text());
  $("#language").val(6);
 
}
function loadFromBlockly(){
 translate();
 do_test_run();
  $("#frame_source").hide();
//  $("#Submit").prop('disabled', false);
}

function phpfm(pid){
    //alert(pid);
    $.post("admin/phpfm.php",{'frame':3,'pid':pid,'pass':''},function(data,status){
      if(status=="success"){
        document.location.href="admin/phpfm.php?frame=3&pid="+pid;
      }
    });
  }

  $(document).ready(function(){
    $("#creator").load("problem-ajax.php?pid=<?php echo $id?>");
  });
  
  $(document).ready(function(){
  $("#d1").click(function(){
	$("#d1").removeClass("col-md-4"); 
    $("#d1").addClass("col-md-8");
	$("#d2").removeClass("col-md-8");
	$("#d2").addClass("col-md-4");
	$("#d3").show();
	$("#d4").show();
  });
});

$(document).ready(function(){
  $("#d2").click(function(){
	$("#d2").removeClass("col-md-4"); 
    $("#d2").addClass("col-md-8");
	$("#d1").removeClass("col-md-8");
	$("#d1").addClass("col-md-4");
	$("#d3").hide();
	$("#d4").hide();
  });
});
</script>



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
