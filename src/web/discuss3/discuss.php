<?php
	ob_start();
	require_once("discuss_func.inc.php");
	$parm="";
	if(isset($_GET['pid'])){
		$pid=intval($_GET['pid']);
		$parm="pid=".$pid;
	}else{
		$pid=0;
	}
	if(isset($_GET['cid'])){
		$cid=intval($_GET['cid']);
	}else{
		$cid=0;
	}
	$parm.="&cid=".$cid;
    $prob_exist = problem_exist($pid, $cid);
	require_once("oj-header.php");
	echo "<title>HUST Online Judge WebBoard</title>";
?>

<div style="width:90%">
<?php
if ($prob_exist){	?>
<?php 
	if ($pid!=0 && $cid!=null) 
			$new="pid=".$pid."&cid=".$cid;
		else if ($pid!=0) 
			$new="pid=".$pid;
		else if ($cid!=0) 
			$new="cid=".$cid;
	?>
		<div class='question-item-title'>
		当前位置:
		<?php if ($cid!=null) echo "<a href=\"discuss.php?cid=".$cid."\">Contest ".$cid."</a>"; else echo "<a href=\"discuss.php\">全部</a>";
		if ($pid!=null && $pid!=0){
				$query="?pid=$pid";
				if($cid!=0) $query.="&cid=$cid";
				 echo " >> <a href=\"discuss.php".$query."\">Problem ".$pid."</a>";

		}
		?>
		</div>
		<br>
		<div style="float:right;font-size:80%;color:red;font-weight:bold">
		<?php if ($pid!=null && $pid!=0 && ($cid=='' || $cid==null)){?>
		<a href="../problem.php?id=<?php echo $pid?>">查看问题</a>
		<?php }?>
		</div>
		<?php 
}
$sql = "SELECT `tid`, `title`, `top_level`, `t`.`status`, `cid`, `pid`, CONVERT(MIN(`r`.`time`),DATE) `posttime`,
		MAX(`r`.`time`) `lastupdate`, `t`.`author_id`, COUNT(`rid`) `count`
		FROM `topic` t left join `reply` r on t.tid=r.topic_id
		WHERE `t`.`status`!=2  ";
if (array_key_exists("cid",$_REQUEST)&&$_REQUEST['cid']!='') 
	$sql.= " AND ( `cid` = '".intval($_REQUEST['cid'])."'";
else 
	$sql.=" AND (`cid`=0 ";
$sql.=" OR `top_level` = 3 )";
if (array_key_exists("pid",$_REQUEST)&&$_REQUEST['pid']!=''){
  $sql.=" AND ( `pid` = '".intval($_REQUEST['pid'])."' OR `top_level` >= 2 )";
  $level="";
}else{
  $level=" - ( `top_level` = 1 )";
}
$sql.=" GROUP BY t.tid ORDER BY `top_level`$level DESC, MAX(`r`.`time`) DESC";
$sql.=" LIMIT 30";
//echo $sql;
$result = pdo_query($sql);
$rows_cnt = count($result);
$cnt=0;
$isadmin = isset($_SESSION[$OJ_NAME.'_'.'administrator']);
?>

<?php 
$i=0;
echo "<ul class='row question-items'>";
foreach ( $result as $row){
        
        echo "<li class='question-item'><div class='col-sm-12'>";
		        if ($row['pid']!=0) {
			echo "<div class='col-sm-2 question-item-author'><div class='user-avatar'><a class='question-item-title' href='discuss.php?pid={$row['pid']}' target='_blank'>{$row['pid']}</a></div></div>";
        } 
		else
			echo "<div class='col-sm-2 question-item-author'><div class='user-avatar'><a class='question-item-title' href='discuss.php?pid={$row['pid']}' target='_blank'></a></div></div>";
			
		echo "<div class='col-sm-8'><h4><a class='question-item-title' href='thread.php?tid={$row['tid']}&cid={$row['cid']}' target='_blank'>".htmlentities($row['title'],ENT_QUOTES,"UTF-8")."</a></h4>";
		echo "<div class='question-item-summary'><div class='user-username '><a class='avatar' href=\"../userinfo.php?user={$row['author_id']}\" target='_blank'>{$row['author_id']}</a></div>";
        echo "<span class='question-item-date'>发布于：{$row['posttime']}</span> 最后回复：{$row['lastupdate']} <span class='question-item-date'>";
        echo "</span></div></div>";
		echo "<div class='col-md-2 question-item-rank'><div class='question-item-answered'><div>".($row['count']-1)."</div><div>回复</div></div></div></li>";

	$i++;
}
echo "<ul>";

?>

</table>
</div>

<?php require_once("../template/$OJ_TEMPLATE/discuss.php")?>

