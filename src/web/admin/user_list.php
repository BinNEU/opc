		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
<?php require("admin-header.php");

        if(isset($OJ_LANG)){
                require_once("../lang/$OJ_LANG.php");
        }

echo "<title>User List</title>";
echo "<center><h2>用户列表</h2></center>";
require_once("../include/set_get_key.php");
$sql="";
if(isset($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	$keyword="%$keyword%";
	 $sql="select `user_id`,`nick`,`reg_time`,`ip`,`school`,`defunct` FROM `users` where user_id like ? ";
	 $result=pdo_query($sql,$keyword);
}else{
     $sql="select `user_id`,`nick`,`reg_time`,`ip`,`school`,`defunct` FROM `users`  order by `reg_time` desc limit 100 ";
	 $result=pdo_query($sql);
}
?>

<form class="layui-form center" action=user_list.php >					<div class="layui-form-item"><div class="layui-inline"><input class="layui-input" autocomplete="off" type="text" name=keyword></div><input class="layui-btn layui-btn-normal" type=submit value="<?php echo $MSG_SEARCH?>" ></div></form>

<?php
echo "<center><div class='layui-form'><table class='layui-table' lay-even lay-skin='nob'>";
echo "<thead><tr><td>学号<td>姓名<td>状态<td>注册时间<td>IP<td>学校";
echo "</tr></thead>";
foreach($result as $row){
        echo "<tr>";
        echo "<td><a href='../userinfo.php?user=".$row['user_id']."'>".$row['user_id']."</a>";
        echo "<td>".$row['nick'];
        $cid=$row['user_id'];
        if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
                echo "<td><a href=user_df_change.php?cid=".$row['user_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">".($row['defunct']=="N"?"<span class='layui-btn layui-btn-mini layui-btn-normal table-list-status'>正常</span>":"<span class='layui-btn layui-btn-mini layui-btn-warm table-list-status'>封禁</span>")."</a>";
        }else{
                echo "<td>No permissions";
        }
        echo "<td>".$row['reg_time'];
        echo "<td>".$row['ip'];
        echo "<td>".$row['school'];
        echo "</tr>";
}
echo "</table></div></center>";
require("../oj-footer.php");
?>
