<?php require_once ("admin-header.php");
require_once("../include/check_post_key.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php require_once ("../include/db_info.inc.php");
?>
<?php require_once ("../include/problem.php");
?>
<?php // contest_id


$title = $_POST ['title'];
$time_limit = $_POST ['time_limit'];
$memory_limit = $_POST ['memory_limit'];
$description = $_POST ['description'];
$input = $_POST ['input'];
$output = $_POST ['output'];
$sample_input = $_POST ['sample_input'];
$sample_output = $_POST ['sample_output'];
$test_input = $_POST ['test_input'];
$test_output = $_POST ['test_output'];
$hint = $_POST ['hint'];
$source = $_POST ['source'];
$spj = $_POST ['spj'];
$school = $_POST ['school'];
$point = $_POST ['point'];
$zhuhanshu = $_POST ['zhuhanshu'];
$hanshu = $_POST ['hanshu'];
$buquan = $_POST ['buquan'];
$week = $_POST ['week'];
$import = $_POST ['import'];
if (get_magic_quotes_gpc ()) {
	$title = stripslashes ( $title);
	$time_limit = stripslashes ( $time_limit);
	$memory_limit = stripslashes ( $memory_limit);
	$description = stripslashes ( $description);
	$input = stripslashes ( $input);
	$output = stripslashes ( $output);
	$sample_input = stripslashes ( $sample_input);
	$sample_output = stripslashes ( $sample_output);
	$test_input = stripslashes ( $test_input);
	$test_output = stripslashes ( $test_output);
	$hint = stripslashes ( $hint);
	$source = stripslashes ( $source);
	$spj = stripslashes ( $spj);
	$source = stripslashes ( $source );
	$school = stripslashes ( $school );
    $point = stripslashes ( $point );
	$zhuhanshu = stripslashes ( $zhuhanshu);
	$hanshu = stripslashes ( $hanshu);
	$buquan = stripslashes ( $buquan);
	$week = stripslashes ( $week);
	$import = stripslashes ( $import);
}
//echo "->".$OJ_DATA."<-"; 
$pid=addproblem ( $title, $time_limit, $memory_limit, $description, $input, $output, $sample_input, $sample_output, $hint, $source, $spj, $school,$point,$zhuhanshu,$hanshu,$buquan,$week,$OJ_DATA);
$basedir = "$OJ_DATA/$pid";
mkdir ( $basedir );
if(strlen($sample_output)&&!strlen($sample_input)) $sample_input="0";
if(strlen($sample_input)) mkdata($pid,"sample.in",$sample_input,$OJ_DATA);
if(strlen($sample_output))mkdata($pid,"sample.out",$sample_output,$OJ_DATA);
if(strlen($test_output)&&!strlen($test_input)) $test_input="0";
if(strlen($test_input))mkdata($pid,"test.in",$test_input,$OJ_DATA);
if(strlen($test_output))mkdata($pid,"test.out",$test_output,$OJ_DATA);

$sql="insert into `privilege` (`user_id`,`rightstr`)  values(?,?)";
pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id'],"p$pid");
$_SESSION[$OJ_NAME.'_'."p$pid"]=true;

$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
$sql="SELECT user_id,password,ip,`time` FROM `loginlog` WHERE `user_id`=? order by `time` desc LIMIT 0,10";
$result=pdo_query($sql,$user) ;
$row=$result[0];
$ip = $row['ip'];
$sql="select problem_id as id from problem order by problem_id desc limit 1";
$result=pdo_query($sql) ;
$row=$result[0];
$id = $row['id'];
$sql="INSERT INTO `operationlog` VALUES(?,'添加问题',?,?,NOW())";
@pdo_query($sql,$user,$ip,$id) ;
if(strlen($import))
{
	echo "<br>";
	$sql="select source_id from import where aim_id= ? ";
	$result=pdo_query($sql,$pid) ;
	$row=$result[0];
	$sid=$row['source_id'];
	$src="$OJ_DATA/$sid";
	$dst="$OJ_DATA/$pid";
	dir_copy($src,$dst);
	echo "<a >样例已经复制From $src to $dst</a><br>";
}

echo "<a href='javascript:phpfm($pid);'>Add more TestData now !</a>";
/*	*/
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


