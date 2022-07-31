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
$course = $_POST ['course'];

if (get_magic_quotes_gpc ()) {
	$school = stripslashes ( $school);
    $course = stripslashes ( $course );
}
//echo "->".$OJ_DATA."<-"; 
$sql="INSERT INTO `course`(`school`,`course`,`user_id`) values(?,?,?)";

@pdo_query($sql,$school,$course,$_SESSION[$OJ_NAME.'_'.'user_id']) ;
echo "添加成功!";		
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


