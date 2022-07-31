<?php require("admin-header.php");
include_once("kindeditor.php") ;
include_once("../lang/$OJ_LANG.php");
include_once("../include/const.inc.php");
if (isset($_POST['startdate']))
{
	require_once("../include/check_post_key.php");
	$exam=$_POST['exam'];
	if($exam==1)
	{
		$starttime="2020-01-01"." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime="2050-12-30"." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	}
	else {
		$starttime=$_POST['startdate']." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=$_POST['enddate']." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	}
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

   $lang=$_POST['lang'];
   $langmask=0;
   foreach($lang as $t){
			$langmask+=1<<$t;
	} 
	$langmask=((1<<count($language_ext))-1)&(~$langmask);
	echo $langmask;	

	$cid=intval($_POST['cid']);
	if(!(isset($_SESSION[$OJ_NAME.'_'."m$cid"])||isset($_SESSION[$OJ_NAME.'_'.'administrator']))) exit();
	$sql="UPDATE `contest` set `title`=?,description=?,`start_time`=?,`end_time`=?,`private`=?,`langmask`=? ,password=?,`exam`=? WHERE `contest_id`=?";
	//echo $sql;
	pdo_query($sql,$title,$description,$starttime,$endtime,$private,$langmask,$password, $exam,$cid) ;
	$sql="DELETE FROM `contest_problem` WHERE `contest_id`=?";
	pdo_query($sql,$cid);
	$plist=trim($_POST['cproblem']);
	
	$pieces = explode(',', $plist);
	if (count($pieces)>0 && strlen($pieces[0])>0){
		$sql_1="INSERT INTO `contest_problem`(`contest_id`,`problem_id`,`num`) 
			VALUES (?,?,?)";
		for ($i=0;$i<count($pieces);$i++){
			pdo_query($sql_1,$cid,intval($pieces[$i]),$i) ;
		}
		pdo_query("update solution set num=-1 where contest_id=?",$cid);
		$plist="";
		for ($i=0;$i<count($pieces);$i++){
			if($plist) $plist.=",";
			$plist.=$pieces[$i];
			$sql_2="update solution set num=? where contest_id=? and problem_id=?;";
			pdo_query($sql_2,$i,$cid,$pieces[$i]);
		}
		
		$sql="update `problem` set defunct='N' where `problem_id` in ($plist)";
		pdo_query($sql) ;
	
	}
	
	$sql="DELETE FROM `privilege` WHERE `rightstr`=?";
	pdo_query($sql,"c$cid");
	$pieces = explode("\n", trim($_POST['ulist']));
	if (count($pieces)>0 && strlen($pieces[0])>0){
		$sql_1="INSERT INTO `privilege`(`user_id`,`rightstr`) 
			VALUES (?,?)";
		for ($i=0;$i<count($pieces);$i++){
			pdo_query($sql_1,trim($pieces[$i]),"c$cid") ;
		}
	}
	
		if($exam==0)
	echo "<script>window.location.href=\"contest_list.php\";</script>";
else
	echo "<script>window.location.href=\"exam_list.php\";</script>";
	exit();
}else{
	$cid=intval($_GET['cid']);
	$sql="SELECT * FROM `contest` WHERE `contest_id`=?";
	$result=pdo_query($sql,$cid);
	if (count($result)!=1){
		echo "No such Contest!";
		exit(0);
	}
	$row=$result[0];
	$starttime=$row['start_time'];
	$endtime=$row['end_time'];
	$private=$row['private'];
	$password=$row['password'];
	$exam=$row['exam'];
	$langmask=$row['langmask'];
	$description=$row['description'];
	$title=htmlentities($row['title'],ENT_QUOTES,"UTF-8");
	
	$plist="";
	$sql="SELECT `problem_id` FROM `contest_problem` WHERE `contest_id`=? ORDER BY `num`";
	$result=pdo_query($sql,$cid);
	foreach($result as $row){
		if($plist) $plist.=",";
		$plist.=$row[0];
	}
	$ulist="";
	$sql="SELECT `user_id` FROM `privilege` WHERE `rightstr`=? order by user_id";
	$result=pdo_query($sql,"c$cid");
	foreach($result as $row){
		if ($ulist) $ulist.="\n";
		$ulist.=$row[0];
	}
	
	
}
?>

<div class="container">
<form method=POST >
<?php require_once("../include/set_post_key.php");?>
<input type=hidden name='cid' value=<?php echo $cid?>>
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
<br>Problems:<input class=input-xxlarge type=text size=60 name=cproblem value='<?php echo $plist?>'>
	<br>
	<label>
    <input type="radio" name="exam" value="0" <?php if($exam==0)echo 'checked'; ?>>普通竞赛</label>
    <label>
    <input type="radio" name="exam" value="1" <?php if($exam==1)echo 'checked'; ?>>应用于考试</label>
	（应用于考试请设置为公开）
<br>

<p align=left><?php echo $MSG_Description?>:<br><textarea class="kindeditor" rows=13 name=description cols=80><?php echo htmlentities($description,ENT_QUOTES,"UTF-8")?></textarea>

 Language:<select name="lang[]"  multiple="multiple"    style="height:220px">
<?php
$lang_count=count($language_ext);


  $lang=(~((int)$langmask))&((1<<$lang_count)-1);
if(isset($_COOKIE['lastlang'])) $lastlang=$_COOKIE['lastlang'];
 else $lastlang=0;
 for($i=0;$i<$lang_count;$i++){
               
                 echo  "<option value=$i ".( $lang&(1<<$i)?"selected":"").">
                        ".$language_name[$i]."
                 </option>";
  }

?>
	
   </select>
	


Users:<textarea name="ulist" rows="12" cols="20"><?php if (isset($ulist)) { echo $ulist; } ?></textarea>
<input type=submit value=Submit name=submit><input type=reset value=Reset name=reset>

</form>
</div>

