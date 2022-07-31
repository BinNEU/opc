<?php
require_once("../include/db_info.inc.php");
;?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<script>
    $("document").ready(function (){
        $("form").append("<div id='csrf' />");
        $("#csrf").load("../csrf.php");
    });

</script>-->
<?php if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||
			isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||
			isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>请使用管理员账户登录！</a>";
	exit(1);
}
if(file_exists("../lang/$OJ_LANG.php")) require_once("../lang/$OJ_LANG.php");
?>

