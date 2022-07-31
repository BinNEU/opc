<?php
 require_once("admin-header.php");
ini_set("display_errors","On");
require_once("../include/check_get_key.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
        echo "<a href='../loginpage.php'>Please Login First!</a>";
        exit(1);
}
?> 
<?php

        $id=intval($_GET['id']);
        $sql="delete FROM `project` WHERE `project_id`=?";
        pdo_query($sql,$id) ;
        $sql="select max(project_id) FROM `project`" ;
        $result=pdo_query($sql);
        $row=$result[0];
        $max_id=$row[0];
        $max_id++;
        if($max_id<1)$max_id=1;
        $sql="ALTER TABLE project AUTO_INCREMENT = $max_id";
        pdo_query($sql);
		$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
		$sql="SELECT user_id,password,ip,`time` FROM `loginlog` WHERE `user_id`=? order by `time` desc LIMIT 0,10";
		$result=pdo_query($sql,$user) ;
		$row=$result[0];
		$ip = $row['ip'];
		$sql="INSERT INTO `operationlog` VALUES(?,'删除作业',?,?,NOW())";
		@pdo_query($sql,$user,$ip,$id) ;
        ?>
        <script language=javascript>
                history.go(-1);
        </script>

