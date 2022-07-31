<?php require_once ("admin-header.php");
require_once("../include/check_post_key.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php require_once ("../include/db_info.inc.php");
?>

<?php // contest_id

$school = $_POST ['school'];
$user_id = $_POST ['user_id'];
$nick= $_POST ['nick'];
$email = $_POST ['email'];
$password = $_POST ['password'];
$name = $_POST ['name'];
$class = $_POST ['class'];
$grade = $_POST ['grade'];
if (get_magic_quotes_gpc ()) {
	$school = stripslashes ( $school);
    $user_id = stripslashes ( $user_id );
	$nick = stripslashes ( $nick );
	$name = stripslashes ( $name );
	$class = stripslashes ( $class );
	$grade = stripslashes ( $grade );
	$email = stripslashes ( $email );
	$password = stripslashes ( $password );
}
//echo "->".$OJ_DATA."<-"; 
$sql="INSERT INTO `users`(`user_id`,`email`,`password`,`nick`,`school`,`name`,`class`,`grade`,`ip`,`accesstime`,`reg_time`) values(?,?,?,?,?,?,?,?,'127.0.0.12',now(),now())";

@pdo_query($sql,$user_id,$email,$password,$nick,$school,$name,$class,$grade) ;
echo "添加学生成功!";		
?>
<script src='../template/bs3/jquery.min.js' ></script>
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


