		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>

<?php require("admin-header.php");
require_once("../include/set_get_key.php");
if (!isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
echo "<title>News List</title>";
echo "<div class='container'>";
$sql="select `news_id`,`user_id`,`title`,`time`,`defunct` FROM `news` order by `news_id` desc";
$result=pdo_query($sql) ;
echo "<center><div class='layui-form'><table class='layui-table' lay-even lay-skin='nob'>";
echo "<thead><tr><td>ID<td>标题<td>发布日期<td>状态<td>编辑</tr></thead>";
foreach($result as $row){
	echo "<tr>";
	echo "<td>".$row['news_id'];
	//echo "<input type=checkbox name='pid[]' value='$row['problem_id']'>";
	echo "<td><a href='news_edit.php?id=".$row['news_id']."'>".$row['title']."</a>";
	echo "<td>".$row['time'];
	echo "<td><a  href=news_df_change.php?id=".$row['news_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">".($row['defunct']=="N"?"<span class='layui-btn layui-btn-mini layui-btn-normal table-list-status'>显示</span>":"<span class='layui-btn layui-btn-mini layui-btn-warm table-list-status'>隐藏</span>")."</a>";
	echo "<td><a class='layui-btn layui-btn-mini layui-btn-normal  add-btn' href=news_edit.php?id=".$row['news_id']."><i class='layui-icon'>&#xe654;</i></a>";
	
	echo "</tr>";
}

echo "</tr></form>";
echo "</table></div></div>";

?>
<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="../static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>