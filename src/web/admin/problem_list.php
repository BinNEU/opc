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

if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `school` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$school=$row['school'];}
$sql=	"select course "
	."FROM `course` WHERE `school`='$school'" ;
$result=pdo_query($sql);//mysql_escape_string($sql));
$category=array();
foreach ($result as $row){
	$cate=explode(" ",$row['course']);
	foreach($cate as $cat){
		array_push($category,trim($cat));	
		}
	}
$category=array_unique($category);

if((isset($_GET['weekcourse'])&&trim($_GET['weekcourse'])!="")){
					$weekcourse=$_GET['weekcourse'];
				    $sql="SELECT problem.`week` FROM problem WHERE problem.source = '$weekcourse' GROUP BY problem.`week`";
					$resultweek=pdo_query($sql);//mysql_escape_string($sql));
				$weekcategory=array();
					foreach ($resultweek as $row){
					$weekcate=explode(" ",$row['week']);
					foreach($weekcate as $weekcat){
						array_push($weekcategory,trim($weekcat));	
						}
	}
	$weekcategory=array_unique($weekcategory);
				}
				if((isset($_GET['week'])&&trim($_GET['week'])!="")){
				$week=intval($_GET['week']);}

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
echo "<form action=problem_list.php>";
echo "<div class='layui-form-item'><div class='layui-inline'><select style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' onchange=\"location.href='problem_list.php?page='+this.value;\">";
for ($i=1;$i<=$cnt;$i++){
        if ($i>1) echo '&nbsp;';
        if ($i==$page) echo "<option value='$i' selected>";
        else  echo "<option value='$i'>";
        echo $i+9;
        echo "**</option>";
}
echo "</select></div>";
$sql="";
if((isset($_GET['week'])&&trim($_GET['week'])!="")&&(isset($_GET['weekcourse'])&&trim($_GET['weekcourse'])!="")){
    $sql="select `problem_id` as a,`title`,`point`,`accepted`,concat((1-(SELECT count(DISTINCT user_id) FROM solution WHERE problem_id= a AND result='4' )/accepted)*100,'%') as rate,`in_date`,`school`,`source`,`defunct` FROM `problem` where week=? and source = ? ORDER BY problem.title ASC";
    $result=pdo_query($sql,$week,$weekcourse);
}
else if($keyword) {
	$keyword="%$keyword%";
	$sql="select `problem_id` as a,`title`,`point`,`accepted`,concat((1-(SELECT count(DISTINCT user_id) FROM solution WHERE problem_id= a AND result='4' )/accepted)*100,'%') as rate,`in_date`,`school`,`source`,`defunct` FROM `problem` where title like ? or source like ?";
	$result=pdo_query($sql,$keyword,$keyword);
}else{
	$sql="select `problem_id` as a,`title`,`point`,`accepted`,concat((1-(SELECT count(DISTINCT user_id) FROM solution WHERE problem_id= a AND result='4' )/accepted)*100,'%') as rate,`in_date`,`school`,`source`,`defunct` FROM `problem` where problem_id>=? and problem_id<=? order by `problem_id` desc";
	$result=pdo_query($sql,$pstart,$pend);
}

?>

<div class="layui-inline">
<input type="text" name=keyword placeholder="请输入关键字" autocomplete="off" class="layui-input"></div><input class="layui-btn layui-btn-normal" type=submit value="<?php echo $MSG_SEARCH?>" ></div>
<select style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' name='weekcourse' onChange="javascript:this.form.submit();">
<option value=''>下拉选择课程</option>
<?php if(isset($weekcourse) )echo "<option selected='selected'>{$weekcourse}</option>";?>
<?php
foreach ($category as $cat){
                    if(trim($cat)=="") continue;
                    $my_category.= "<option value='$cat'>$cat</option>";
                }	
				echo $my_category	
?>
</select>
<script type="text/javascript">

                    function mbar(sobj) {
                    var docurl =sobj.options[sobj.selectedIndex].value;
                    if (docurl != "") {
                       open(docurl,'_blank');
                       sobj.selectedIndex=0;
                       sobj.blur();
                    }
                    }

 </script>

<select style='height: 38px;line-height: 38px;line-height: 36px\9;border: 1px solid #e6e6e6;background-color: #fff;border-radius: 2px;' name=week onChange="javascript:this.form.submit();">
<option value=''>选择周数</option>
<?php if(isset($week) )echo "<option selected='selected'>第 {$week} 周</option>";?>
<?php 
foreach ($weekcategory as $weekcat){
                    if(trim($weekcat)=="") continue;
                    $my_weeks.= "<option value='$weekcat'>第 $weekcat 周</option>";
                }	
				echo $my_weeks
?></select>
</form>

<?php
echo "<div class='layui-form' id='table-list'><table class='layui-table' lay-even lay-skin='nob'>";
echo "<form method=post action=contest_add.php>";
echo "<input type=checkbox lay-skin='primary' onchange='$(\"input[type=checkbox]\").prop(\"checked\", this.checked)'>";
echo "<input class='layui-btn layui-btn-normal'  type=submit name='problem2contest' value='CheckToNewContest'>";
echo "<thead>";
echo "<tr><td><td>ID<td>题目<td>来源<td>学校<td>正确提交<td>日期";
if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
        if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))   echo "<td>状态<td>删除";
        echo "<td>编辑<td>TestData</tr></thead>";
}
foreach($result as $row){
        echo "<tr>";
		echo "<td><input type=checkbox lay-skin='primary' name='pid[]' value='".$row['a']."'>";
        echo "<td>".$row['a'];

        echo "<td><a href='../problem.php?id=".$row['a']."'>".$row['title']."</a>";
		echo "<td>".$row['source'];
		echo "<td>".$row['school'];
        echo "<td>".$row['accepted'];
        echo "<td>".$row['in_date'];
  if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){
                if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'."p".$row['a']])){
                        echo "<td><a href=problem_df_change.php?id=".$row['a']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">"
                        .($row['defunct']=="N"?"<span titlc='click to reserve it' class='layui-btn layui-btn-mini layui-btn-normal table-list-status'>显示</span>":"<span class='layui-btn layui-btn-mini layui-btn-warm table-list-status' title='click to be available'>隐藏</span>")."</a><td>";
                        if($OJ_SAE||function_exists("system")){
                              ?>
                              <a class="layui-btn layui-btn-mini layui-btn-danger del-btn" href=# onclick='javascript:if(confirm("Delete?")) location.href="problem_del.php?id=<?php echo $row['a']?>&getkey=<?php echo $_SESSION[$OJ_NAME.'_'.'getkey']?>";'>
                              <i class="layui-icon">&#xe640;</i></a>
                              <?php
                        }
                }
                if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'."p".$row['a']])){
                        echo "<td><a class='layui-btn layui-btn-mini layui-btn-normal  add-btn' href=problem_edit.php?id=".$row['a']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey']."><i class='layui-icon'>&#xe642;</i></a>";
			echo "<td><a  class='layui-btn layui-btn-mini layui-btn-normal  add-btn' href='javascript:phpfm(".$row['a'].");'><i class='layui-icon'>&#xe654;</i></a>";
                }
        }
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
