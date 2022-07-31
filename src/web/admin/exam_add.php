<?php require_once("admin-header.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Add a exam</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
<?php
	require_once("../include/db_info.inc.php");
	require_once("../lang/$OJ_LANG.php");
	require_once("../include/const.inc.php");
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
$description="";
 if (isset($_POST['startdate']))
{
	
	require_once("../include/check_post_key.php");
	
	$starttime=$_POST['startdate']." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=$_POST['enddate']." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	//	echo $starttime;
	//	echo $endtime;

        $title=$_POST['title'];
        $private=$_POST['private'];
        $password=$_POST['password'];
        $description=$_POST['description'];
        if (get_magic_quotes_gpc ()){
                $title = stripslashes ($title);
                $private = stripslashes ($private);
                $password = stripslashes ($password);
                $description = stripslashes ($description);
        }
	//echo $langmask;	
	
        $sql="insert INTO `exam`(`title`,`start_time`,`end_time`,`private`,`description`,`password`,`user_id`)
                VALUES(?,?,?,?,?,?,?)";
	echo $sql.$title.$starttime.$endtime.$private.$description.$password;
	$eid=pdo_query($sql,$title,$starttime,$endtime,$private,$description,$password,$user) ;
	echo "Add Exam ".$eid;
	$sql="DELETE FROM `exam_problem` WHERE `exam_id`=$eid";
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
}
else{
	
   if(isset($_GET['cid'])){
		   $cid=intval($_GET['cid']);
		   $sql="select * from contest WHERE `contest_id`=?";
		   $result=pdo_query($sql,$cid);
		    $row=$result[0];
		   $title=$row['title'];
		   
			$plist="";
			$sql="SELECT `problem_id` FROM `contest_problem` WHERE `contest_id`=? ORDER BY `num`";
			$result=pdo_query($sql,$cid) ;
			foreach($result as $row){
				if ($plist) $plist=$plist.',';
				$plist=$plist.$row[0];
			}
			
   }
else if(isset($_POST['contest2exam'])){
	   $plist="";
	   //echo $_POST['pid'];
	   sort($_POST['pid']);
	   foreach($_POST['pid'] as $i){		    
			if ($plist) 
				$plist.=','.$i;
			else
				$plist=$i;
	   }
}else if(isset($_GET['spid'])){
	require_once("../include/check_get_key.php");
		   $spid=intval($_GET['spid']);
		 
			$plist="";
			$sql="SELECT `problem_id` FROM `problem` WHERE `problem_id`>=? ";
			$result=pdo_query($sql,$spid) ;
			foreach ($result as $row){
				if ($plist) $plist.=',';
				$plist.=$row[0];
			}
			
}  
  include_once("kindeditor.php") ;
?>
	
<div class="container">
	<form method=POST >
	<br>
	<p align=left><?php echo $MSG_TITLE?><input class=input-xxlarge  type=text name=title size=71 value="<?php echo isset($title)?$title:""?>"></p>
	<p align=left><?php echo $MSG_Start?>:
	<input  class=input-large type=date name='startdate' value='<?php echo date('Y').'-'. date('m').'-'.date('d')?>' size=4 >
	Hour:<input class=input-mini    type=text name=shour size=2 value=<?php echo date('H')?>>&nbsp;
	Minute:<input class=input-mini    type=text name=sminute value=00 size=2 ></p>
	<p align=left>截止于:
	<input  class=input-large type=date name='enddate' value='<?php echo date('Y').'-'. date('m').'-'.date('d')?>' size=4 >
	Hour:<input class=input-mini  type=text name=ehour size=2 value=<?php echo (date('H')+4)%24?>>&nbsp;
	Minute:<input class=input-mini  type=text name=eminute value=00 size=2 ></p>
	Public:<select name=private><option value=0><?php echo $MSG_Public?></option>
				    <option value=1><?php echo $MSG_Private?></option>
               </select>
	<?php echo $MSG_PASSWORD?>:<input type=text name=password value="">
	<?php require_once("../include/set_post_key.php");?>
	<br>Contest:<input class=input-xxlarge placeholder="Example:1000,1001,1002" type=text size=60 name=cproblem value="<?php echo isset($plist)?$plist:""?>">
	<br>
	<p align=left>Description:<br><textarea class=kindeditor rows=13 name=description cols=80></textarea>
    <br>
	<input class="layui-btn layui-btn-normal" type=submit value=Submit name=submit><input class="layui-btn layui-btn-normal" type=reset value=Reset name=reset>
	</form>
</div>
<?php }
require_once("../oj-footer.php");

?>

