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
   <div class="container layout layout-margin-top"> 
    <div class="content">
<div align=center class="input-append">
<?php
?>
<form id=simform class=form-inline action="status.php" method="get">
<?php echo $MSG_PROBLEM_ID?>:<input class="form-control" type=text size=4 name=problem_id value='<?php echo htmlspecialchars($problem_id, ENT_QUOTES)?>'>
<?php echo $MSG_USER?>:<input class="form-control" type=text size=4 name=user_id value='<?php echo htmlspecialchars($user_id, ENT_QUOTES)?>'>
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
<?php echo $MSG_RESULT?>:<select class="form-control" size="1" name="jresult">
<?php if (isset($_GET['jresult'])) $jresult_get=intval($_GET['jresult']);
else $jresult_get=-1;
if ($jresult_get>=12||$jresult_get<0) $jresult_get=-1;
/*if ($jresult_get!=-1){
$sql=$sql."AND `result`='".strval($jresult_get)."' ";
$str2=$str2."&jresult=".strval($jresult_get);
}*/
if ($jresult_get==-1) echo "<option value='-1' selected>All</option>";
else echo "<option value='-1'>All</option>";
for ($j=0;$j<12;$j++){
$i=($j+4)%12;
if ($i==$jresult_get) echo "<option value='".strval($jresult_get)."' selected>".$jresult[$i]."</option>";
else echo "<option value='".strval($i)."'>".$jresult[$i]."</option>";
}
echo "</select>";
?>
</select>
<?php if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'source_browser'])){
if(isset($_GET['showsim']))
$showsim=intval($_GET['showsim']);
else
$showsim=0;
echo "SIM:
<select id=\"appendedInputButton\" class=\"form-control\" name=showsim onchange=\"document.getElementById('simform').submit();\">
<option value=0 ".($showsim==0?'selected':'').">All</option>
<option value=50 ".($showsim==50?'selected':'').">50</option>
<option value=60 ".($showsim==60?'selected':'').">60</option>
<option value=70 ".($showsim==70?'selected':'').">70</option>
<option value=80 ".($showsim==80?'selected':'').">80</option>
<option value=90 ".($showsim==90?'selected':'').">90</option>
<option value=100 ".($showsim==100?'selected':'').">100</option>
</select>";
/* if (isset($_GET['cid']))
echo "<input type=hidden name=cid value='".$_GET['cid']."'>";
if (isset($_GET['language']))
echo "<input type=hidden name=language value='".$_GET['language']."'>";
if (isset($_GET['user_id']))
echo "<input type=hidden name=user_id value='".$_GET['user_id']."'>";
if (isset($_GET['problem_id']))
echo "<input type=hidden name=problem_id value='".$_GET['problem_id']."'>";
//echo "<input type=submit>";
*/
}
echo "<input type=submit class='form-control' value='$MSG_SEARCH'></form>";
?>
</div>
<div id=center>
    <div id=center>
      <table id=result-tab class="layui-table" align=center width=90%>
        <thead>
          <tr class='toprow'>
            <td class="text-center">
              <?php echo $MSG_RUNID?>
            </td>
            <td class="text-center">
              <?php echo $MSG_USER?>
            </td>
            <td class="text-center">
              <?php echo $MSG_PROBLEM_ID?>
            </td>
            <td class="text-center">
              <?php echo $MSG_RESULT?>
            </td>
            <td class="text-center hidden-xs">
              <?php echo $MSG_MEMORY?>
            </td>
            <td class="text-center hidden-xs">
              <?php echo $MSG_TIME?>
            </td>
            <td class="text-center hidden-xs"> 
              <?php echo $MSG_LANG?>
            </td>
            <td class="text-center hidden-xs">
              <?php echo $MSG_CODE_LENGTH?>
            </td>
            <td class="text-center hidden-xs">
              <?php echo $MSG_SUBMIT_TIME?>
            </td>
            <?php 
              echo "<th class='text-center hidden-xs'>";
                echo $MSG_JUDGER;
			echo "</th>";
             ?>
          </tr>
        </thead>
        <tbody>
        <?php
          $cnt = 0;
          foreach ($view_status as $row) {
            if ($cnt)
              echo "<tr class='oddrow'>";
            else
              echo "<tr class='evenrow'>";
          
            $i = 0;
            foreach ($row as $table_cell) {
              if ($i==2)
				  echo "<td class='text-center'>";
			  else if ($i==0)
				  echo "<td class='text-right '>";
			  else if ($i==8|| $i==9)
				  echo "<td class='text-center hidden-xs'>";
			  else if ($i==4 || $i==5 || $i==6 || $i==7)
				  echo "<td class='text-right hidden-xs'>";
              else
                echo "<td>";
            
              echo $table_cell;
                echo "</td>";
              $i++;
            }
          
            echo "</tr>\n";
            $cnt = 1-$cnt;
          }
        ?>
        </tbody>
      </table>
    </div>
    <div align=center id=center>
      <nav id="page" class="center">
        <small>
        <ul class="pagination">
          <?php
          echo "<li class='page-item'> <a href=status.php?".$str2.">&lt;&lt; Top</a></li>";
          if (isset($_GET['prevtop']))
            echo "<li class='page-item'> <a href=status.php?".$str2."&top=".intval($_GET['prevtop']).">&lt Prev</a></li>";
          else
            echo "<li class='page-item'> <a href=status.php?".$str2."&top=".($top+50).">&lt Prev</a></li>";
          echo "<li class='page-item'> <a href=status.php?".$str2."&top=".$bottom."&prevtop=$top>Next &gt;</a></li>";
          ?>
        </ul>
        </small>
      </nav>
    </div>

      </div>

    </div> <!-- /container -->
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
			    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
	<script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.downCount.js"></script> 
	<script>
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
	<script src="template/<?php echo $OJ_TEMPLATE?>/auto_refresh.js" ></script>
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
