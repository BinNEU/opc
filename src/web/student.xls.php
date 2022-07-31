<?php
ini_set("display_errors","On");
		ob_start();
		header ( "content-type:   application/excel" );
		
?>
<?php require_once("./include/db_info.inc.php");
global $mark_base,$mark_per_problem,$mark_per_punish;
 $mark_start=60;
 $mark_end=100;
 $mark_sigma=5;
if(isset($OJ_LANG)){
		require_once("./lang/$OJ_LANG.php");
}
require_once("./include/const.inc.php");
require_once("./include/my_func.inc.php");




// contest start time
if (!isset($_GET['myclass'])) die("No Such Information!");
$myclass=$_GET['myclass'];
$newclass=explode('_',$myclass); 
for($index=0;$index<count($newclass);$index++){ 
$newclass2[$index]="'".$newclass[$index]."'";
} 
$myclass2=implode(", ", $newclass2);
//require_once("contest-header.php");
$w=$_GET['w'];
	header ( "content-disposition:   attachment;   filename=".$myclass."_".$w.".xls" );



$sql="select * from (select a.user_id as id,name,email,w from (select user_id,name,email from users where class in($myclass2)) a left join
(select user_id,w from week_loginlog2 where user_id in(select user_id from users where class in($myclass2) ) and w=?) b on a.user_id=b.user_id) m
 left join(SELECT user_id,acc from (select user_id,name,email from users where class in($myclass2)) a left join 
 (select * from week_submit2 where w=? and id in (select user_id as id from users where class in($myclass2))) b 
 on a.user_id=b.id) n on m.id=n.user_id";
$result=pdo_query($sql,$w,$w);
echo "<center><h3>需要关注的学生 -- $myclass -- $w</h3></center>";
echo "<table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead>";
echo "<tr><td>学号<td>姓名<td>原因</tr></thead>";
foreach($result as $row){
        echo "<tr>";
		if((is_null($row['w']))&&(is_null($row['acc']))){
			echo "<td>".$row['id'];
			echo "<td>".$row['name'];
			echo "<td>缺勤且未提交";
}		else if(is_null($row['acc'])){
			echo "<td>".$row['id'];
			echo "<td>".$row['name'];
			echo "<td>考勤但未提交";
						
}			
		else if($row['acc']<0.5){
			echo "<td>".$row['id'];
			echo "<td>".$row['name'];
			echo "<td>正确率低";
}			

			echo "</tr>";
}

echo "</table>";

?>
