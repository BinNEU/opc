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


$user_id = $_POST ['user_id'];

if (get_magic_quotes_gpc ()) {
	
    $user_id = stripslashes ( $user_id );
}
//echo "->".$OJ_DATA."<-"; 
$sql="INSERT INTO `test`(`user_id`) values(?)";

@pdo_query($sql,$user_id) ;
?>
<script language=javascript>
	self.location=document.referrer;
</script>
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


