<?php require("admin-header.php");

        if(isset($OJ_LANG)){
                require_once("../lang/$OJ_LANG.php");
        }


echo "<title>Problem List</title>";
echo "<div class=\"container\">";
require_once("../include/set_get_key.php");
$sql="SELECT max(`exam_id`) as upid, min(`exam_id`) as btid  FROM `exam`";
$page_cnt=50;
$result=pdo_query($sql);
$row=$result[0];
$base=intval($row['btid']);
$cnt=intval($row['upid'])-$base;
$cnt=intval($cnt/$page_cnt)+(($cnt%$page_cnt)>0?1:0);
if (isset($_GET['page'])){
        $page=intval($_GET['page']);
}else $page=$cnt;
$pstart=$base+$page_cnt*intval($page-1);
$pend=$pstart+$page_cnt;
/*
for ($i=1;$i<=$cnt;$i++){
        if ($i>1) echo '&nbsp;';
        if ($i==$page) echo "<span class=red>$i</span>";
        else echo "<a href='examlist.php?page=".$i."'>".$i."</a>";
}
*/
$sql="";
if(isset($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	$keyword="%$keyword%";
	 $sql="select * FROM `exam` where title like ? ";
	 $result=pdo_query($sql,$keyword);
}else{
     $sql="select * FROM `exam` where exam_id>=? and exam_id <=? order by `exam_id` desc";
	 $result=pdo_query($sql,$pstart,$pend);
}
?>

<div style="float:left;">
<form action=examlist.php class="pagination" ><input name=keyword><input type=submit value="<?php echo $MSG_SEARCH?>" ></form>
</div><div style="display:inline;">
<nav class="center"><ul class="pagination">
<li class="page-item"><a href="examlist.php?page=1">&lt;&lt;</a></li>
<?php
if(!isset($page)) $page=1;
$page=intval($page);
$section=3;
$start=$page>$section?$page-$section:1;
$end=$page+$section>$cnt?$cnt:$page+$section;
for ($i=$start;$i<=$end;$i++){
 echo "<li class='".($page==$i?"active ":"")."page-item'>
            <a title='go to page' href='examlist.php?page=".$i.(isset($_GET['my'])?"&my":"")."'>".$i."</a></li>";
}
?>
<li class="page-item"><a href="examlist.php?page=<?php echo $cnt?>">&gt;&gt;</a></li>
</ul>
</nav>
</div>
<?php
echo "<center><table class='table table-striped' width=100% border=1>";
echo "<tr><td>考试ID<td>考试标题<td>开始时间<td>截止时间<td>访问权限<td>公开状态<td>编辑考试<td>数据查看";
echo "</tr>";
foreach($result as $row){
        echo "<tr>";
        echo "<td>".$row['exam_id'];
        echo "<td><a href='../exam.php?eid=".$row['exam_id']."'>".$row['title']."</a>";
        echo "<td>".$row['start_time'];
        echo "<td>".$row['end_time'];
		$eid=$row['exam_id'];
        $cid=$row['contest_id'];
        if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'."m$cid"])){
                echo "<td><a href=exam_pr_change.php?eid=".$row['exam_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">".($row['private']=="0"?"<span class=green>Public</span>":"<span class=red>Private<span>")."</a>";
                echo "<td><a href=exam_df_change.php?eid=".$row['exam_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">".($row['defunct']=="N"?"<span class=green>Available</span>":"<span class=red>Reserved</span>")."</a>";
                echo "<td><a href=exam_edit.php?eid=".$row['exam_id'].">Edit</a>";
     echo "<td> <a href='../examrank.xls.php?eid=$eid' >Download</a>";
        }

        echo "</tr>";
}
echo "</table></center></div>";
require("../oj-footer.php");
?>
