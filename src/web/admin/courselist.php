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

	$sql="SELECT course.course_id, course.school,course.course,course.user_id FROM course ORDER BY course.course_id DESC";
	$result=pdo_query($sql);
?>



<?php
echo "<div class='layui-form' id='table-list'><table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead><form>";
echo "<tr><td>ID<td>课程<td>学校<td>教师<td>删除</tr></thead>";

foreach($result as $row){
        echo "<tr>";
		
        echo "<td>".$row['course_id']."";

        echo "<td>".$row['course']."";
        echo "<td>".$row['school']."";
        echo "<td>".$row['user_id']."";

        if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||($_SESSION[$OJ_NAME.'_'.'user_id']==$row['user_id'])){
          echo "<td><a class='layui-btn layui-btn-mini layui-btn-danger del-btn' href=coursedel.php?id=".$row['course_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey']."><i class='layui-icon'>&#xe640;</i></a>";
                }
        
        echo "</tr>";
}

echo "</form>";
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
