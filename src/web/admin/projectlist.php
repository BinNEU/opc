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

	$sql="SELECT * FROM project ORDER BY project_id DESC";
	$result=pdo_query($sql);
?>



<?php
echo "<div class='layui-form' id='table-list'><table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead><form>";
echo "<tr><td>ID<td>题目<td>开始时间<td>截止时间<td>状态<td>权限<td>教师</tr></thead>";

foreach($result as $row){
        echo "<tr>";
		
        echo "<td>".$row['project_id']."";

        echo "<td>".$row['title']."";
		echo "<td>".$row['start_time']."";
		echo "<td>".$row['end_time']."";
		if($row['defunct']=="N")
        echo "<td>"."开放"."";
	     else
			  echo "<td>"."禁用"."";
		  if($row['private']==0)
        echo "<td>"."公开"."";
	     else
			  echo "<td>"."私有"."";
        echo "<td>".$row['user_id']."";
        
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
