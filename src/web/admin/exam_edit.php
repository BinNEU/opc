<?php require_once("admin-header.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Edit a exam</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
<?php require("admin-header.php");
include_once("kindeditor.php") ;
include_once("../lang/$OJ_LANG.php");
include_once("../include/const.inc.php");
if (isset($_POST['startdate']))
{
	require_once("../include/check_post_key.php");
	
	$starttime=$_POST['startdate']." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=$_POST['enddate']." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	echo $starttime;
//	echo $endtime;
    $title=($_POST['title']);
    $password=$_POST['password'];
	$exam=$_POST['exam'];
    $description=$_POST['description'];
    $private=$_POST['private'];
       
        if (get_magic_quotes_gpc ()) {
      		  $title = stripslashes ( $title);
	          $password = stripslashes ( $password);
			  $exam = stripslashes ($exam);
			  $description = stripslashes ( $description);
        }


	$eid=intval($_POST['eid']);
	if(!(isset($_SESSION[$OJ_NAME.'_'."m$cid"])||isset($_SESSION[$OJ_NAME.'_'.'administrator']))) exit();
	$sql="UPDATE `exam` set `title`=?,description=?,`start_time`=?,`end_time`=?,`private`=? ,`password`=? WHERE `exam_id`=?";
	//echo $sql;
	pdo_query($sql,$title,$description,$starttime,$endtime,$private,$password,$eid) ;
	$sql="DELETE FROM `exam_problem` WHERE `exam_id`=?";
	pdo_query($sql,$eid);
	$plist=trim($_POST['cproblem']);
	$pieces = explode(",",$plist );
	if (count($pieces)>0 && intval($pieces[0])>0){
		$sql_1="INSERT INTO `exam_problem`(`exam_id`,`contest_id`,`num`) 
			VALUES (?,?,?)";
		$plist="";
		for ($i=0;$i<count($pieces);$i++){
			
			if($plist)$plist.=",";
			$plist.=$pieces[$i];
			pdo_query($sql_1,$eid,$pieces[$i],$i);
		}
		//echo $sql_1;
	}

	
    echo "<script>window.location.href=\"examlist.php\";</script>";
	exit();
}else{
	$eid=intval($_GET['eid']);
	$sql="SELECT * FROM `exam` WHERE `exam_id`=?";
	$result=pdo_query($sql,$eid);
	if (count($result)!=1){
		echo "No such Exam!";
		exit(0);
	}
	$row=$result[0];
	$starttime=$row['start_time'];
	$endtime=$row['end_time'];
	$private=$row['private'];
	$password=$row['password'];
	$description=$row['description'];
	$title=htmlentities($row['title'],ENT_QUOTES,"UTF-8");
	
	$plist="";
	$sql="SELECT `contest_id` FROM `exam_problem` WHERE `exam_id`=? ORDER BY `num`";
	$result=pdo_query($sql,$eid);
	foreach($result as $row){
		if($plist) $plist.=",";
		$plist.=$row[0];
	}
	$ulist="";
	
	
}
?>

<div class="container">
<form method=POST >
<?php require_once("../include/set_post_key.php");?>
<input type=hidden name='eid' value=<?php echo $eid?>>
<p align=left><?php echo $MSG_TITLE?>:<input class=input-xxlarge type=text name=title size=71 value='<?php echo $title?>'></p>
<p align=left><?php echo $MSG_Start?>:
<input type="date" name='startdate' value='<?php echo substr($starttime,0,10)?>' >
Hour:<input class=input-mini  type=text name=shour size=2 value='<?php echo substr($starttime,11,2)?>'>
Minute:<input class=input-mini  type=text name=sminute size=2 value=<?php echo substr($starttime,14,2)?>></p>
<p align=left><?php echo $MSG_End?>:

<input class=input-large  type=date name='enddate' value=<?php echo substr($endtime,0,10)?> size=4 >
Hour:<input class=input-mini  type=text name=ehour size=2 value=<?php echo substr($endtime,11,2)?>> 
Minute:<input class=input-mini  type=text name=eminute size=2 value=<?php echo substr($endtime,14,2)?>></p>

<?php echo $MSG_Public?>/<?php echo $MSG_Private?>:<select name=private>
	<option value=0 <?php echo $private=='0'?'selected=selected':''?>><?php echo $MSG_Public?></option>
	<option value=1 <?php echo $private=='1'?'selected=selected':''?>><?php echo $MSG_Private?></option>
</select>
<?php echo $MSG_PASSWORD?>:<input type=text name=password value="<?php echo htmlentities($password,ENT_QUOTES,'utf-8')?>">
<br>Contest:(注意英文逗号",")<input class=input-xxlarge type=text size=60 name=cproblem value='<?php echo $plist?>'>

<br>

<p align=left><?php echo $MSG_Description?>:<br><textarea class="kindeditor" rows=13 name=description cols=80><?php echo htmlentities($description,ENT_QUOTES,"UTF-8")?></textarea>
<br>
<input class="layui-btn layui-btn-normal" type=submit value=Submit name=submit><input class="layui-btn layui-btn-normal" type=reset value=Reset name=reset>

</form>
</div>

