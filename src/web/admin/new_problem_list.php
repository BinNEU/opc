		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>

<?php require("admin-header.php");
        if(isset($OJ_LANG)){
                require_once("../lang/$OJ_LANG.php");
        }
require_once("../include/set_get_key.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])
                ||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])
                ||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])
                )){
        echo "<a href='../loginpage.php'>Please Login First!</a>";
        exit(1);
}
if(isset($_GET['keyword']))
	$keyword=$_GET['keyword'];
else
	$keyword="";
$sql="SELECT max(`problem_id`) as upid FROM `problem`";
$page_cnt=100;
$result=pdo_query($sql);
$row=$result[0];
$cnt=intval($row['upid'])-1000;
$cnt=intval($cnt/$page_cnt)+(($cnt%$page_cnt)>0?1:0);
if (isset($_GET['page'])){
        $page=intval($_GET['page']);
}else $page=$cnt;
$pstart=1000+$page_cnt*intval($page-1);
$pend=$pstart+$page_cnt;
echo "<div class='page-content-wrap'>";
echo "<form action=new_problem_list.php>";
echo "<div class='layui-form-item'><div class='layui-inline'><select style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' onchange=\"location.href='new_problem_list.php?page='+this.value;\">";
for ($i=1;$i<=$cnt;$i++){
        if ($i>1) echo '&nbsp;';
        if ($i==$page) echo "<option value='$i' selected>";
        else  echo "<option value='$i'>";
        echo $i+9;
        echo "**</option>";
}
echo "</select></div>";
$sql="";
if($keyword) {
	$keyword="%$keyword%";
	$sql="select `problem_id` as a,`title`,`point`,`accepted`,concat((1-(SELECT count(DISTINCT user_id) FROM solution WHERE problem_id= a AND result='4' )/accepted)*100,'%') as rate,`in_date`,`school`,`source`,`defunct` FROM `problem` where title like ? or source like ?";
	$result=pdo_query($sql,$keyword,$keyword);
}else{
	$sql="select `problem_id` as a,`title`,`point`,`accepted`,concat((1-(SELECT count(DISTINCT user_id) FROM solution WHERE problem_id= a AND result='4' )/accepted)*100,'%') as rate,`in_date`,`school`,`source`,`defunct` FROM `problem` where problem_id>=? and problem_id<=? order by `problem_id` desc";
	$result=pdo_query($sql,$pstart,$pend);
}
?>

<div class="layui-inline">
<input type="text" name=keyword placeholder="请输入关键字" autocomplete="off" class="layui-input"></div><input class="layui-btn layui-btn-normal" type=submit value="<?php echo $MSG_SEARCH?>" ></div></form>

<?php
echo "<div class='layui-form' id='table-list'><table class='layui-table' lay-even lay-skin='nob'>";
echo "<form method=post action=contest_add.php>";
echo "<input type=checkbox lay-skin='primary' onchange='$(\"input[type=checkbox]\").prop(\"checked\", this.checked)'>";
echo "<input class='layui-btn layui-btn-normal'  type=submit name='problem2contest' value='CheckToNewContest'>";
echo "<thead>";

echo "<tr><td><td>ID<td>题目<td>来源<td>学校<td>正确提交<td>难度<td>知识点<td>日期";
if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
        echo "<td>导入</tr></thead>";
}
foreach($result as $row){

        echo "<tr>";
		echo "<td><input type=checkbox lay-skin='primary' name='pid[]' value='".$row['a']."'>";
        echo "<td>".$row['a'];
        echo "<td><a href='../problem.php?id=".$row['a']."'>".$row['title']."</a>";
		echo "<td>".$row['source'];
		echo "<td>".$row['school'];
        echo "<td>".$row['accepted'];
		echo "<td>".$row['rate'];
		echo "<td>".$row['point'];
        echo "<td>".$row['in_date'];
        echo "<td><a class='layui-btn layui-btn-mini layui-btn-normal  add-btn' href=new_problem_import.php?id=".$row['a']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey']."><i class='layui-icon'>&#xe654;</i></a>";
        echo "</tr>";
}
echo "<tr><td colspan=8><input class='layui-btn layui-btn-normal' type=submit name='problem2contest' value='CheckToNewContest'>";
echo "</tr></form>";
echo "</table></div>";
?>
<script src='../template/bs3/jquery.min.js' ></script>
<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="../static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script>
function phpfm(pid){
        //alert(pid);
        $.post("phpfm.php",{'frame':3,'pid':pid,'pass':''},function(data,status){
                if(status=="success"){
                        document.location.href="phpfm.php?frame=3&pid="+pid;
                }
        });
}
</script>
</div>

